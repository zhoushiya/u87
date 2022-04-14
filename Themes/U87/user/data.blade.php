@extends("App::app")
@section('title', $user->username.'的信息 - '.get_options('web_name', 'CodeFec') )
@section('description', '为您展示本站'.$user->username.'用户的信息')
@section('keywords', '为您展示本站'.$user->username.'用户的信息')
@section('content')
<div class="row row-cards">
@include('App::common.userinfo')
<div class="col-lg-9">
<div class="card">
  <div class="card-header">
	<ul class="nav nav-pills card-header-pills">
	<li class="nav-item">
	<a class="nav-link active fw-bold" href="/users/{{$user->username}}.html">
	<svg xmlns="http://www.w3.org/2000/svg" class="icon me-1 d-none d-md-block" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path d="M0 0h24v24H0z" stroke="none"/><path d="M14 3v4a1 1 0 0 0 1 1h4"/><path d="M17 21H7a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h7l5 5v11a2 2 0 0 1-2 2zM12 10v4M10 12h4M10 17h4"/></svg> 主题 {{\App\Plugins\Topic\src\Models\Topic::query()->where(['status' => 'publish','user_id' => $user->id])->count()}}</a>
	</li>
	<li class="nav-item">
	<a class="nav-link" href="/users/follow/{{$user->username}}.html">
	<svg class="icon me-1 d-none d-md-block" width="24" height="24" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg"><circle cx="24" cy="11" r="7" stroke="currentColor" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/><path d="M4 41c0-8.837 8.059-16 18-16M31.85 28C29.724 28 28 30.009 28 32.486c0 4.487 4.55 8.565 7 9.514 2.45-.949 7-5.027 7-9.514C42 30.01 40.276 28 38.15 28c-1.302 0-2.453.753-3.15 1.906C34.303 28.753 33.152 28 31.85 28z" stroke="currentColor" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/></svg> 关注 {{\App\Plugins\User\src\Models\UserFans::query()->where("fans_id",$user->id)->count()}}</a>
	</li>
	<li class="nav-item">
	<a class="nav-link" href="/users/fans/{{$user->username}}.html">
	<svg xmlns="http://www.w3.org/2000/svg" class="icon me-1 d-none d-md-block" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path d="M0 0h24v24H0z" stroke="none"/><circle cx="7" cy="5" r="2"/><path d="M5 22v-5l-1-1v-4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v4l-1 1v5"/><circle cx="17" cy="5" r="2"/><path d="M15 22v-4h-2l2-6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1l2 6h-2v4"/></svg> 粉丝 {{$user->fans}}</a>
	</li>
	<li class="nav-item">
	<a class="nav-link" href="/users/fav/{{$user->username}}.html">
	<svg xmlns="http://www.w3.org/2000/svg" class="icon me-1 d-none d-md-block" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z"></path></svg> 收藏 {{\App\Plugins\User\src\Models\UsersCollection::query()->where('user_id',$user->id)->count()}}</a>
	</li>
	</ul>
  </div>
 @if($page->count())
@foreach ($page as $data)
 <article class="col-md-12 p-3 border-bottom hoverable">
 	<div class="d-flex align-items-center justify-content-between">
 		<div class="d-flex align-items-center">
 		<div class="tips--top" aria-label="发表于 : {{$data->created_at}}">
 		<span class="d-flex align-items-center opacity-50">
 		<svg xmlns="http://www.w3.org/2000/svg" class="icon w-3 h-3 me-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><circle cx="12" cy="12" r="9"></circle><polyline points="12 7 12 12 15 15"></polyline></svg>{{format_date($data->created_at)}}
 		</span>
 		</div>
		<div class="ms-2 tips--top" aria-label="更新于:{{$data->updated_at}}">
		<span class="d-flex align-items-center opacity-50">
		<svg class="icon w-3 h-3 me-1" width="24" height="24" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill="#fff" fill-opacity=".01" d="M0 0h48v48H0z"/><path d="M48 0H0v48h48V0z" fill="#fff" fill-opacity=".01"/><path d="M24 44c11.046 0 20-8.954 20-20S35.046 4 24 4 4 12.954 4 24s8.954 20 20 20z" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/><path d="M33.542 27c-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7v6M33.542 15v6c-1.274-4.057-5.064-7-9.542-7-4.477 0-8.268 2.943-9.542 7" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/></svg>{{format_date($data->updated_at)}}
		</span>
		</div>
 		</div>
 		<div class="d-flex align-items-center">
 		@if($data->essence>0)
 		<div class="tips--top" aria-label="精华主题">
 		<svg xmlns="http://www.w3.org/2000/svg" class="icon" viewBox="0 0 1024 1024"><path d="M720.258 344.276L512 944.552l512-600.276z" fill="#FFE182"/><path d="M211.862 79.448L0 344.276h303.742zm508.396 264.828H1024L812.138 79.448zm0 0L512 79.448 303.742 344.276z" fill="#FFCD73"/><path d="M512 79.448H211.862l91.88 264.828z" fill="#FFAA64"/><path d="M812.138 79.448H512l208.258 264.828z" fill="#FFE182"/><path d="M303.742 344.276L512 944.552l208.258-600.276z" fill="#FFAA64"/><path d="M0 344.276l512 600.276-208.258-600.276z" fill="#FF8C5A"/></svg>
 		</div>
 		@endif
 		@if($data->topping>0)
 		<div class="ms-1 tips--top" aria-label="置顶主题">
 		<svg xmlns="http://www.w3.org/2000/svg" class="icon" viewBox="0 0 1024 1024"><path d="M584.704 900.608c-20.992 12.288-54.272 12.288-75.264 0l-375.808-225.28c-20.992-12.288-20.992-32.768 0-45.056l375.808-225.28c20.992-12.288 54.272-12.288 75.264 0l375.808 225.28c20.992 12.288 20.992 32.768 0 45.056l-375.808 225.28z" fill="#FFE182"/><path d="M584.704 729.088c-20.992 12.288-54.272 12.288-75.264 0l-375.808-225.28c-20.992-12.288-20.992-32.768 0-45.056l375.808-225.28c20.992-12.288 54.272-12.288 75.264 0l375.808 225.28c20.992 12.288 20.992 32.768 0 45.056l-375.808 225.28z" fill="#FFAA64"/><path d="M584.704 557.568c-20.992 12.288-54.272 12.288-75.264 0l-375.808-225.28c-20.992-12.288-20.992-32.768 0-45.056L509.44 61.952c20.992-12.288 54.272-12.288 75.264 0l375.808 225.28c20.992 12.288 20.992 32.768 0 45.056l-375.808 225.28z" fill="#FF8C5A"/></svg>
 		</div>
 		@endif
 		</div>
 	</div>
 		<div class="col-md-12 markdown home-article mt-2">
 			<a href="/{{$data->id}}.html" class="text-reset">
 			<h2>{{$data->title}}</h2>
 			<span class="home-summary">{{ \Hyperf\Utils\Str::limit(core_default(deOptions($data->options)["summary"],"未捕获到本文摘要"),300) }}</span>
 				@if(count(deOptions($data->options)["images"])<=6)
 				<div class="row">
 					@if(count(deOptions($data->options)["images"])>=3)
 						@foreach(deOptions($data->options)["images"] as $key=>$image)
 							<div class="col-4 imgItem">
 								<img src="{{$image}}" class="mio-lazy-img" alt="{{$image}}">
 							</div>
 						@endforeach
 					@endif
 					@if(count(deOptions($data->options)["images"])===2)
 						@foreach(deOptions($data->options)["images"] as $key=>$image)
 							<div class="col-4 imgItem">
 								<img src="{{$image}}" class="mio-lazy-img" alt="{{$image}}">
 							</div>
 						@endforeach
 					@endif
 					@if(count(deOptions($data->options)["images"])===1)
 						@foreach(deOptions($data->options)["images"] as $key=>$image)
 							<div class="col-4 imgItem">
 								<img src="{{$image}}" class="mio-lazy-img" alt="{{$image}}">
 							</div>
 						@endforeach
 					@endif
 				</div>
 				@endif
 			</a>
 		</div>
 	<div class="row align-items-center justify-content-between mt-2">
 		<div class="col-auto d-flex align-items-center  flex-wrap">
 		<a href="/tags/{{$data->tag->id}}.html" class="d-flex align-items-center text-reset text-decoration-none me-1 me-sm-3">
 		<span class="status status-blue p-0 pe-2 h-100">
 		  <img src="{{$data->tag->icon}}" class="avatar avatar-xs avatar-rounded me-1" alt="{{$data->tag->name}}">
 		  {{$data->tag->name}}
 		</span>
 		</a>
 		<a href="/{{$data->id}}.html" class="text-reset me-1 me-sm-3 tips--bottom" aria-label="浏览次数">
 			<span class="d-flex align-items-center opacity-50"><svg xmlns="http://www.w3.org/2000/svg" class="icon me-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="2" /><path d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7" /></svg> {{$data->view}}
 		</span></a>
 		<a href="/{{$data->id}}.html" class="text-reset me-1 me-sm-3 tips--bottom" aria-label="评论数"><span class="d-flex align-items-center opacity-50"><svg xmlns="http://www.w3.org/2000/svg" class="icon me-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path d="M0 0h24v24H0z" stroke="none"/><path d="M3 20l1.3-3.9A9 8 0 1 1 7.7 19L3 20M12 12v.01M8 12v.01M16 12v.01"/></svg>{{\App\Plugins\Comment\src\Model\TopicComment::query()->where(['topic_id'=>$data->id,'status'=>'publish'])->count()}}
 		</span></a>
 		</div>
 		<div class="col-auto">
 			<a href="javascript:void(0);" u87-click="like-topic" topic-id="{{$data->id}}" class="text-reset cursor-pointer me-1 me-sm-3 tips--bottom" aria-label=" @if(auth()->check()) @if(\App\Plugins\Topic\src\Models\TopicLike::query()->where(['topic_id' => $data->id,'user_id' => auth()->id()])->count()) 取消点赞 @else 赞 @endif @else 赞 @endif">
 			<div class="d-flex align-items-center opacity-50"><svg xmlns="http://www.w3.org/2000/svg" class="icon me-1 @if(auth()->check() && \App\Plugins\Topic\src\Models\TopicLike::query()->where(['topic_id' => $data->id,'user_id' => auth()->id()])->count()) icon-filled text-red @endif " width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none" /><path d="M19.5 13.572l-7.5 7.428l-7.5 -7.428m0 0a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" /></svg>
 			<span u87-show="topic-likes">{{$data->like}}</span>
 			</div></a>
 			<a href="javascript:void(0);" u87-click="star-topic" topic-id="{{$data->id}}" class="text-reset cursor-pointer tips--bottom" aria-label=" @if(auth()->check()) @if(\App\Plugins\User\src\Models\UsersCollection::query()->where(['type_id' => $data->id,'type'=>'topic','user_id' => auth()->id()])->count()) 取消收藏 @else 收藏 @endif @else 收藏 @endif">
 			<div class="d-flex align-items-center opacity-50"><svg xmlns="http://www.w3.org/2000/svg" class="icon me-1  @if(auth()->check() && \App\Plugins\User\src\Models\UsersCollection::query()->where(['type_id' => $data->id,'type'=>'topic','user_id' => auth()->id()])->count()) icon-filled text-blue @endif " width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z"></path></svg>
 			<span u87-show="topic-stars">{{\App\Plugins\User\src\Models\UsersCollection::query()->where(['type_id' => $data->id,'type'=>'topic','user_id' => auth()->id()])->count()}}</span>
 			</div></a>
 		</div>
 	</div>
 </article>
@endforeach
@else
    <div class="empty">
      <div class="empty-img"><img src="/themes/U87/image/chat.svg" alt="" style="width: 12.5rem;height: 12.5rem;"></div>
      <p class="text-muted"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-alert-circle" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path d="M0 0h24v24H0z" stroke="none"/><circle cx="12" cy="12" r="9"/><path d="M12 8v4M12 16h.01"/></svg> 暂无主题</p>
    </div>
@endif
{!! make_page($page) !!}
</div>
</div>
	<div class="col-lg-3">
		@include('App::common.userright')
	</div>
</div>
@endsection
@section('scripts')
    <script src="{{mix('plugins/Core/js/user.js')}}"></script>
	<script src="{{mix('plugins/U87/js/u87.js')}}"></script>
@endsection
