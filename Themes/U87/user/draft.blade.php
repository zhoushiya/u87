@extends("App::app")
@section('title','我的草稿 - '.get_options('web_name', 'CodeFec') )
@section('content')
<div class="row row-cards">
	<div class="col-lg-9">
<div class="card">
 <div class="card-header d-flex align-items-center justify-content-between">
 <ol class="breadcrumb" aria-label="breadcrumbs">
   <li class="breadcrumb-item"><a href="/" class="d-flex align-items-center"><svg xmlns="http://www.w3.org/2000/svg" class="icon w-3 h-3" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path d="M0 0h24v24H0z" stroke="none"/><path d="M5 12H3l9-9 9 9h-2M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2v-7"/><path d="M9 21v-6a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2v6"/></svg>首页</a></li>
   <li class="breadcrumb-item"><a href="/user/draft">我的草稿</a></li>
 </ol>
 </div>
 @if($page->count())
@foreach($page as $data)
 <article class="col-md-12 p-3 border-bottom hoverable">
 	<div class="d-flex align-items-center justify-content-between">
 		<div class="d-flex align-items-center">
 		<div class="tips--top" aria-label="创建于 : {{$data->created_at}}">
 		<span class="d-flex align-items-center opacity-50">
 		<svg xmlns="http://www.w3.org/2000/svg" class="icon w-3 h-3 me-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><circle cx="12" cy="12" r="9"></circle><polyline points="12 7 12 12 15 15"></polyline></svg>创建时间 : {{format_date($data->created_at)}}
 		</span>
 		</div> 
 		</div>
		@if(auth()->check())
		<div class="d-flex align-items-center">
			@if(Authority()->check("admin_topic_edit") && curd()->GetUserClass(auth()->data()->class_id)['permission-value']>curd()->GetUserClass($data->user->class_id)['permission-value'])
			<a href="/topic/{{$data->id}}/edit" class="text-blue me-1 me-sm-3 tips--top" aria-label="编辑草稿发布">
			<span class="d-flex align-items-center opacity-75">
				<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path d="M0 0h24v24H0z" stroke="none"/><path d="M9 7H6a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2-2v-3"/><path d="M9 15h3l8.5-8.5a1.5 1.5 0 0 0-3-3L9 12v3M16 5l3 3"/></svg> 编辑</span>
			</a>
			@elseif(Authority()->check("topic_edit") && auth()->id() === $data->user->id)
			<a href="/topic/{{$data->id}}/edit" class="text-blue me-1 me-sm-3 tips--top" aria-label="编辑草稿发布">
			<span class="d-flex align-items-center opacity-75">
				<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path d="M0 0h24v24H0z" stroke="none"/><path d="M9 7H6a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2-2v-3"/><path d="M9 15h3l8.5-8.5a1.5 1.5 0 0 0-3-3L9 12v3M16 5l3 3"/></svg> 编辑</span>
			</a>
			@endif
		</div>	
		@endif 
 	</div>
 		<div class="col-md-12 markdown home-article mt-2">
 			<a href="/draft/{{$data->id}}" class="text-reset">
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
      <div class="empty-img"><img src="/themes/U87/image/web.svg" alt="" style="width: 12.5rem;height: 12.5rem;"></div>
      <p class="text-muted"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-alert-circle" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path d="M0 0h24v24H0z" stroke="none"/><circle cx="12" cy="12" r="9"/><path d="M12 8v4M12 16h.01"/></svg> 暂无内容</p>
    </div>
    @endif
    {!! make_page($page) !!}
</div>
	</div>
	<div class="d-none d-lg-block col-lg-3">
		@include('App::common.myinfo')
	</div>
</div>
@endsection
@section('scripts')
	<script src="{{mix('plugins/U87/js/u87.js')}}"></script>
@endsection