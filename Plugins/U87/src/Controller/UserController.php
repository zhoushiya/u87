<?php

namespace App\Plugins\U87\src\Controller;

use App\CodeFec\Annotation\RouteRewrite;
use App\Plugins\Topic\src\Models\Topic;
use App\Plugins\User\src\Models\User;
use App\Plugins\User\src\Models\UserClass;
use App\Plugins\User\src\Models\UsersCollection;
use App\Plugins\User\src\Models\UsersNotice;
use App\Plugins\U87\src\Models\UserFans;
use Hyperf\HttpServer\Annotation\Controller;
use Hyperf\HttpServer\Annotation\GetMapping;

#[Controller]
class UserController
{
    #[RouteRewrite(route:"/users/{username}.html")]
   public function data($username){
       $username = urldecode($username);
       if(!User::query()->where("username",$username)->count()){
           return admin_abort("用户名为:".$username."的用户不存在");
       }
       $user = User::query()->with("Class","Options")->where("username",$username)->first();
	   $page = Topic::query()->where(['status' => 'publish','user_id' => $user->id])
	       ->orderBy('created_at','desc')
	       ->paginate(15);
       return view("U87::user/data",['page' => $page,'user'=>$user]);
   }
   // 用户关注
   #[GetMapping(path:"/users/follow/{username}.html")]
   public function follow($username){
   	$username = urldecode($username);
       if(!User::query()->where("username",$username)->count()){
           return admin_abort("用户名为:".$username."的用户不存在");
       }
       $user = User::query()->where("username",$username)->first();
       $page = UserFans::query()
           ->where("fans_id",$user->id)
           ->with('follow')
           ->paginate(15);
       return view("U87::user/follow",['page' => $page,'user' => $user]);
   }
   // 用户收藏
   #[GetMapping(path:"/users/fav/{username}.html")]
   public function fav($username){
       $username = urldecode($username);
	  if(!User::query()->where("username",$username)->count()){
		  return admin_abort("用户名为:".$username."的用户不存在");
	  }
	  $user = User::query()->where("username",$username)->first();
       $quanxian = false;
       if(auth()->id()==$user->id){
           $quanxian = true;
       }
       $page = UsersCollection::query()->where("user_id",$user->id)->orderBy("id","desc")->paginate(15);
       return view("U87::user/fav",['page' => $page,'quanxian' => $quanxian,'user' => $user]);
   }
  // 个人通知
  #[RouteRewrite(route:"/user/notice")]
  public function notice(){
      $page = UsersNotice::query()->where(['user_id'=>auth()->id(),'status' => 'publish'])->orderByDesc('id')->paginate(15);
      return view("User::notice",['page' => $page]);
  }
}
