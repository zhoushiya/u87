<div class="card order-5 mb-3">
	<div class="card-header d-flex align-items-center justify-content-between">
	<ol class="breadcrumb" aria-label="breadcrumbs">
	  <li class="breadcrumb-item"><a href="/" class="d-flex align-items-center"><svg xmlns="http://www.w3.org/2000/svg" class="icon w-3 h-3" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path d="M0 0h24v24H0z" stroke="none"/><path d="M5 12H3l9-9 9 9h-2M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2v-7"/><path d="M9 21v-6a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2v6"/></svg>首页</a></li>
	  <li class="breadcrumb-item"><a href="/tags/{{$data->tag->id}}.html" class="d-flex align-items-center">
		<img src="{{$data->tag->icon}}" class="avatar avatar-xs tag-icon avatar-rounded me-1" alt="{{$data->tag->name}}">{{$data->tag->name}}</a></li>
	  <li class="breadcrumb-item" aria-current="page"><a href="javascript:void(0);">主题详情</a></li>
	</ol>
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
	<div class="card-body">
	<h2>{{ $data->title }}</h2>	
	@include('App::topic.show.info')
	</div>	
	<div class="card-body border-top markdown vditor-reset topic" id="topic-content">
	    {!! ShortCodeR()->handle($data->content) !!}
	</div>
	<div class="card-footer py-2 d-flex align-items-center justify-content-between">
		<div class="d-flex align-items-center">
			<a href="javascript:void(0);" u87-click="star-topic" topic-id="{{$data->id}}" class="text-reset cursor-pointer me-3 tips--bottom" aria-label=" @if(auth()->check()) @if(\App\Plugins\User\src\Models\UsersCollection::query()->where(['type_id' => $data->id,'type'=>'topic','user_id' => auth()->id()])->count()) 取消收藏 @else 收藏 @endif @else 收藏 @endif">
			<div class="d-flex align-items-center opacity-50"><svg xmlns="http://www.w3.org/2000/svg" class="icon me-1  @if(auth()->check() && \App\Plugins\User\src\Models\UsersCollection::query()->where(['type_id' => $data->id,'type'=>'topic','user_id' => auth()->id()])->count()) icon-filled text-blue @endif " width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z"></path></svg>
			<span u87-show="topic-stars">{{\App\Plugins\User\src\Models\UsersCollection::query()->where(['type_id' => $data->id,'type'=>'topic','user_id' => auth()->id()])->count()}}</span>
			</div></a>
			<a href="/{{ $data->id }}.md" class="text-reset cursor-pointer me-3 tips--bottom" aria-label="查看markdown文本"  target="_blank">
			<svg xmlns="http://www.w3.org/2000/svg" class="icon opacity-75" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path d="M0 0h24v24H0z" stroke="none"/><rect x="3" y="5" width="18" height="14" rx="2"/><path d="M7 15V9l2 2 2-2v6M14 13l2 2 2-2m-2 2V9"/></svg>
			</a>
			<a class="text-reset cursor-pointer me-3 tips--bottom" core-click="quote-topic" topic-id="{{ $data->id }}" aria-label="引用此主题">
			<svg xmlns="http://www.w3.org/2000/svg" class="icon opacity-75" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path d="M0 0h24v24H0z" stroke="none"/><path d="M6 15h15M21 19H6M15 11h6M21 7h-6M9 9h1a1 1 0 1 1-1 1V7.5a2 2 0 0 1 2-2M3 9h1a1 1 0 1 1-1 1V7.5a2 2 0 0 1 2-2"/></svg>
			</a>
			<span class="tips--bottom" aria-label="举报此主题">
			<a class="text-reset cursor-pointer" data-bs-toggle="modal" data-bs-target="#modal-report" core-click="report-topic" topic-id="{{ $data->id }}">
			<svg xmlns="http://www.w3.org/2000/svg" class="icon opacity-75" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path d="M0 0h24v24H0z" stroke="none"/><path d="M5 14h14l-4.5-4.5L19 5H5v16"/></svg>
			</a>
			</span>
		</div>
		<div class="d-flex align-items-center">
		<a href="javascript:void(0);" u87-click="like-topic" topic-id="{{$data->id}}" class="text-reset cursor-pointer tips--bottom" aria-label=" @if(auth()->check()) @if(\App\Plugins\Topic\src\Models\TopicLike::query()->where(['topic_id' => $data->id,'user_id' => auth()->id()])->count()) 取消点赞 @else 赞 @endif @else 赞 @endif">
		<div class="d-flex align-items-center opacity-50"><svg xmlns="http://www.w3.org/2000/svg" class="icon me-1 @if(auth()->check() && \App\Plugins\Topic\src\Models\TopicLike::query()->where(['topic_id' => $data->id,'user_id' => auth()->id()])->count()) icon-filled text-red @endif " width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none" /><path d="M19.5 13.572l-7.5 7.428l-7.5 -7.428m0 0a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" /></svg>
		<span u87-show="topic-likes">{{$data->like}}</span>
		</div></a>
		@if($data->like>0)
		<div class="avatar-list avatar-list-stacked ms-2">
		@foreach(\App\Plugins\Topic\src\Models\TopicLike::query()->where(['topic_id'=>$data->id])->orderByDesc('created_at')->take(5)->get() as $like)
		@foreach(\App\Plugins\User\src\Models\User::query()->where(['id'=>$like->user_id])->take(5)->get() as $like)
		  <a href="/users/{{$like->username}}.html" class="tips--bottom-left" aria-label="{{$like->username}}于 {{format_date($like->created_at)}} 点了赞"><span class="avatar avatar-xs avatar-rounded" style="background-image: url({{super_avatar($like)}})"></span></a>
		  @endforeach
		@endforeach
		</div>
		@endif
		</div>
	</div>
</div>
@include('Comment::Widget.show-topic')
@include('Comment::Widget.topic')
@if(auth()->check())
<div class="modal fade" id="modal-report" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modal-report-title"></h5>
				<button type="button" modal-click="close" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div class="row mb-3 align-items-end">
					<div class="col-auto">
						<label class="form-label">举报原因</label>
						<select class="form-select" id="modal-report-select">
							<option value="水贴">水贴</option>
							<option value="广告">广告</option>
							<option value="引战">引战</option>
							<option value="违法">违法</option>
							<option value="翻墙">翻墙</option>
							<option value="政治">政治</option>
							<option value="其他">其他</option>
						</select>
					</div>
					<div class="col">
						<label class="form-label">标题</label>
						<input type="text" id="modal-report-input-title" class="form-control" />
						<input type="hidden" value="" id="modal-report-input-type" />
						<input type="hidden" value="" id="modal-report-input-type-id" />
						<input type="hidden" value="" id="modal-report-input-url" />
					</div>
				</div>
				<div>
					<label class="form-label">详细说明</label>
					<textarea class="form-control" id="modal-report-input-content"></textarea>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn me-auto" data-bs-dismiss="modal" modal-click="close">取消</button>
				<button type="button" class="btn btn-primary" data-bs-dismiss="modal" id="modal-report-submit">提交</button>
			</div>
		</div>
	</div>
</div>
@endif