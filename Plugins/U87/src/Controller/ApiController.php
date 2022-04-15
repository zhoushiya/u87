<?php

namespace App\Plugins\U87\src\Controller;

use App\CodeFec\Annotation\RouteRewrite;
use App\Plugins\Topic\src\Models\Topic;
use App\Plugins\Comment\src\Model\TopicComment;
use App\Plugins\Comment\src\Model\TopicCommentLike;
use App\Plugins\User\src\Models\UsersCollection;
use App\Plugins\User\src\Models\UsersNotice;
use Hyperf\RateLimit\Annotation\RateLimit;
use Hyperf\HttpServer\Annotation\Controller;
use Hyperf\HttpServer\Annotation\PostMapping;

#[Controller]
class ApiController
{
	#[RouteRewrite(route:"/api/topic/star.topic",method:"POST")]
	#[RateLimit(create:1, capacity:3)]
	public function star_topic(){
		if(!auth()->check()){
		    return Json_Api(403,false,['msg' => '未登录!']);
		}
		$topic_id = request()->input("topic_id");
		if(!$topic_id){
			return Json_Api(403,false,['msg' => '请求参数:topic_id 不存在!']);
		}
		if(!Topic::query()->where("id",$topic_id)->exists()){
			return Json_Api(403,false,['msg' => '要收藏的帖子不存在']);
		}
		if(UsersCollection::query()->where(['type' => 'topic','type_id' => $topic_id,'user_id' => auth()->id()])->exists()){
			UsersCollection::query()->where(['type' => 'topic','type_id' => $topic_id,'user_id' => auth()->id()])->delete();
			// 发送通知
			$topic_data = Topic::query()->where('id', $topic_id)->first();
			if($topic_data->user_id!=auth()->id()){
			    $title = auth()->data()->username."对你的帖子取消了收藏";
			    $content = view("Topic::Notice.nofav_topic",['user_data' => auth()->data(),'data' => $topic_data]);
			    $action = "/".$topic_data->id.".html";
			    user_notice()->send($topic_data->user_id,$title,$content,$action);
			}
			return Json_Api(201,true,['msg' => '取消收藏成功!']);
		}
		UsersCollection::query()->create([
			'user_id' => auth()->id(),
			'type' => 'topic',
			'type_id' => $topic_id,
		]);
		$topic_data = Topic::query()->where('id', $topic_id)->first();
		if($topic_data->user_id!=auth()->id()){
		    $title = auth()->data()->username."收藏了你的帖子";
		    $content = view("Topic::Notice.fav_topic",['user_data' => auth()->data(),'data' => $topic_data]);
		    $action = "/".$topic_data->id.".html";
		    user_notice()->send($topic_data->user_id,$title,$content,$action);
		}
		return Json_Api(200,true,['msg'=>'已收藏']);
	}
	
	#[RouteRewrite(route:"/api/comment/star.comment",method:"POST")]
	#[RateLimit(create:1, capacity:3)]
	public function star_comment(){
		if(!auth()->check()){
			return Json_Api(403,false,['msg' => '未登录!']);
		}
		$topic_id = request()->input("topic_id");
		$comment_id = request()->input("comment_id");
		if(!$comment_id){
			return Json_Api(403,false,['msg' => '请求参数不足,缺少:comment_id']);
		}
		if(!TopicComment::query()->where("id",$comment_id)->exists()){
			return Json_Api(403,false,['msg' => '要收藏的评论不存在']);
		}
		if(UsersCollection::query()->where(['type' => 'comment','type_id' => $comment_id,'user_id' => auth()->id()])->exists()){
			UsersCollection::query()->where(['type' => 'comment','type_id' => $comment_id,'user_id' => auth()->id()])->delete();
			return Json_Api(201,true,['msg' => '取消收藏成功!']);
		}
		UsersCollection::query()->create([
			'user_id' => auth()->id(),
			'type' => 'comment',
			'type_id' => $comment_id,
		]);
		return Json_Api(200,true,['msg'=>'已收藏']);
	}
	// 一键清空未读通知
	#[RouteRewrite(route:"/api/user/notice.allread",method:"POST")]
	public function notice_allread(): array
	{
	    if(!auth()->check()){
	        return Json_Api(401,false,['msg' => '未登录!']);
	    }
	    if(!UsersNotice::query()->where(['status' => 'publish','user_id' => auth()->id()])->exists()){
	        return Json_Api(403,false,['msg' => '没有未读通知!']);
	    }
	    UsersNotice::query()->where(['status' => 'publish','user_id' => auth()->id()])->update([
	        'status' => 'read'
	    ]);
	    return Json_Api(200,true,['msg' => '一键清空未读通知成功!']);
	}
	#[RouteRewrite(route:"/api/comment/topic.caina.comment",method:"POST")]
	public function topic_caina_comment(){
	    $comment_id = request()->input('comment_id');
	    if(!$comment_id){
	        return Json_Api(403,false,['请求参数不足,缺少:comment_id']);
	    }
	    if(!TopicComment::query()->where([["id",$comment_id],['status','publish']])->exists()){
	        return Json_Api(403,false,['id为:'.$comment_id."的评论不存在"]);
	    }
	    $data = TopicComment::query()
	        ->where([["id",$comment_id],['status','publish']])
	        ->with("topic")
	        ->first();
	    $quanxian = false;
	    if($data->topic->user_id == auth()->id() && Authority()->check("comment_caina")){
	        $quanxian = true;
	    }
	    if(Authority()->check("admin_comment_caina")){
	        $quanxian = true;
	    }
	    if($quanxian === false){
	        return Json_Api(401,false,['无权限!']);
	    }
	    $caina = "取消采纳";
	    if($data->optimal===null){
	        TopicComment::query()->where([["id",$comment_id],['status','publish']])->update([
	            "optimal" => date("Y-m-d H:i:s")
	        ]);
	        $caina = "采纳";
	    }else{
	        TopicComment::query()->where([["id",$comment_id],['status','publish']])->update([
	            "optimal" => null
	        ]);
	    }
	    if($data->user_id !== auth()->id()){
	        $topic = Topic::query()->where("id",$data->topic_id)->first();
			$title = auth()->data()->username.$caina."了你的评论";
			$content = view("Comment::Notice.caina",['user_data' => auth()->data(),'data' => $topic,'caina' =>$caina]);
			$action = "/".$topic->id.".html";
			user_notice()->send($data->user_id,$title,$content,$action);
	    }
	    return Json_Api(200,true,['更新成功!']);
	}
}

