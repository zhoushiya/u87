import axios from "axios";
import iziToast from "izitoast";

$(function(){
    $('a[u87-click="like-topic"]').click(function(){
        const topic_id = $(this).attr("topic-id")
        axios.post("/api/topic/like.topic", {
            topic_id: topic_id,
            _token: csrf_token
        }).then(r  =>{
            const data = r.data;
            if(!data.success){
                iziToast.error({
                    title:"error",
                    message:data.result.msg,
                    position:"topRight",
                    timeout:10000
                })
            }else{
                // 点赞成功!
                var likes_text = $(this).find('span[u87-show="topic-likes"]');
                var y_likes = likes_text.text();
                y_likes = parseInt(y_likes);
                if(data.code===200){
                    $(this).find('span[u87-show="topic-likes"]').text(y_likes+1);
					$(this).find('svg').addClass('icon-filled text-red');
					$(this).attr({'aria-label':'取消点赞'});
					iziToast.success({
					    title:"success",
					    message:data.result.msg,
					    position:"topRight",
					})
                }else if(data.code===201){
                    $(this).find('span[u87-show="topic-likes"]').text(y_likes-1);
					$(this).find('svg').removeClass('icon-filled text-red');
					$(this).attr({'aria-label':'点赞'});
					iziToast.info({
					    title:"info",
					    message:data.result.msg,
					    position:"topRight",
					})
                }
            }
        }).catch(e=>{
            iziToast.error({
                title:"error",
                message:"请求出错,详细查看控制台",
                position:"topRight",
                timeout:10000
            })
            console.error(e)
        })
    })
})

$(function(){
    // 收藏帖子
    $('a[u87-click="star-topic"]').click(function(){
        var th = $(this);
        var topic_id = th.attr("topic-id");
        axios.post("/api/topic/star.topic",{
            _token:csrf_token,
            topic_id: topic_id,
        }).then(r=>{
			const data = r.data;
			if(!data.success){
			    iziToast.error({
			        title:"error",
			        message:data.result.msg,
			        position:"topRight",
			        timeout:10000
			    })
			}else{
			var stars_text = $(this).find('span[u87-show="topic-stars"]');
			var y_stars = stars_text.text();
			y_stars = parseInt(y_stars);
			if(data.code===200){
			    $(this).find('span[u87-show="topic-stars"]').text(y_stars+1);
				$(this).find('svg').addClass('icon-filled text-blue');
				$(this).attr({'aria-label':'取消收藏'});
				iziToast.success({
				    title:"success",
				    message:data.result.msg,
				    position:"topRight",
				})
			}else if(data.code===201){
			    $(this).find('span[u87-show="topic-stars"]').text(y_stars-1);
				$(this).find('svg').removeClass('icon-filled text-blue');
				$(this).attr({'aria-label':'收藏'});
				iziToast.info({
				    title:"info",
				    message:data.result.msg,
				    position:"topRight",
				})
			}
          }
        }).catch(e=>{
            console.error(e)
            iziToast.error({
                title:"Error",
                message:"请求出错,详细查看控制台",
                position:"topRight"
            })
        })
    })
})

// 评论点赞
$(function(){
    $('a[u87-click="comment-like-topic"]').click(function(){
        var comment_id = $(this).attr('comment-id');
        axios.post("/api/comment/like.topic.comment", {
            comment_id: comment_id,
            _token: csrf_token
        }).then(r  =>{
            const data = r.data;
            if(!data.success){
                iziToast.error({
                    title:"error",
                    message:data.result.msg,
                    position:"topRight",
                    timeout:10000
                })
            }else{
				var likes_text = $(this).find('span[u87-show="comment-topic-likes"]');
				var y_likes = likes_text.text();
				y_likes = parseInt(y_likes);
				if(data.code===200){
				    $(this).find('span[u87-show="comment-topic-likes"]').text(y_likes+1);
					$(this).find('svg').addClass('icon-filled text-red');
					$(this).attr({'aria-label':'取消点赞'});
					iziToast.success({
					    title:"success",
					    message:data.result.msg,
					    position:"topRight",
					})
				}else if(data.code===201){
				    $(this).find('span[u87-show="comment-topic-likes"]').text(y_likes-1);
					$(this).find('svg').removeClass('icon-filled text-red');
					$(this).attr({'aria-label':'点赞'});
					iziToast.info({
					    title:"info",
					    message:data.result.msg,
					    position:"topRight",
					})
				}
            }
        }).catch(e=>{
            iziToast.error({
                title:"error",
                message:"请求出错,详细查看控制台",
                position:"topRight",
                timeout:10000
            })
            console.error(e)
        })
    })
})

// 收藏评论
$(function(){
    $('a[u87-click="star-comment"]').click(function(){
        var th = $(this);
		var topic_id = th.attr("topic-id");
        var comment_id = th.attr("comment-id");
        axios.post("/api/comment/star.comment",{
            _token:csrf_token,
			 topic_id: topic_id,
            comment_id: comment_id,
        }).then(r=>{
			const data = r.data;
			if(!data.success){
			    iziToast.error({
			        title:"error",
			        message:data.result.msg,
			        position:"topRight",
			        timeout:10000
			    })
			}else{
			var stars_text = $(this).find('span[u87-show="comment-stars"]');
			var y_stars = stars_text.text();
			y_stars = parseInt(y_stars);
			if(data.code===200){
			    $(this).find('span[u87-show="comment-stars"]').text(y_stars+1);
				$(this).find('svg').addClass('icon-filled text-blue');
				$(this).attr({'aria-label':'取消收藏'});
				iziToast.success({
				    title:"success",
				    message:data.result.msg,
				    position:"topRight",
				})
			}else if(data.code===201){
			    $(this).find('span[u87-show="comment-stars"]').text(y_stars-1);
				$(this).find('svg').removeClass('icon-filled text-blue');
				$(this).attr({'aria-label':'收藏'});
				iziToast.info({
				    title:"info",
				    message:data.result.msg,
				    position:"topRight",
				})
			}
          }
        }).catch(e=>{
            console.error(e)
            iziToast.error({
                title:"Error",
                message:"请求出错,详细查看控制台",
                position:"topRight"
            })
        })
    })
})

// 用户通知
$(function(){
    // action
    $('a[u87-click="notice_action"]').click(function(){
        var href = $(this).attr("notice-href")
        var notice_id = $(this).attr("notice-id")
        axios.post("/api/user/notice.read",{
            _token:csrf_token,
            notice_id:notice_id,
        }).then(r=>{
            location.href=href
        })
    })
    // 确认已读
    $('a[u87-click="notice_read"]').click(function(){
        var notice_id = $(this).attr("notice-id")
        axios.post("/api/user/notice.read",{
            _token:csrf_token,
            notice_id:notice_id,
        }).then(r=>{
            var data = r.data
            if(data.success===false){
                iziToast.error({
                    title: "Error",
                    position:"topRight",
                    message:data.result.msg
                })
            }else{
                iziToast.success({
                    title: "Success",
                    position:"topRight",
                    message:data.result.msg
                })
                setTimeout(function(){
                    location.reload()
                },1500)
            }
        })
    })
	// 确认已读
	$('a[u87-click="notice_allread"]').click(function(){
	    axios.post("/api/user/notice.allread",{
	        _token:csrf_token,
	    }).then(r=>{
	        var data = r.data
	        if(data.success===false){
	            iziToast.error({
	                title: "Error",
	                position:"topRight",
	                message:data.result.msg
	            })
	        }else{
	            iziToast.success({
	                title: "Success",
	                position:"topRight",
	                message:data.result.msg
	            })
	            setTimeout(function(){
	                location.reload()
	            },1500)
	        }
	    })
	})
})