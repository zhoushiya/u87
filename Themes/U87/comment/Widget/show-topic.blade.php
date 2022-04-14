@if($comment_count)
<div class="card mb-3">
<div class="card-header">
<div class="card-title"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-message-circle" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path d="M0 0h24v24H0z" stroke="none"/><path d="M3 20l1.3-3.9A9 8 0 1 1 7.7 19L3 20M12 12v.01M8 12v.01M16 12v.01"/></svg> 全部评论 ({{$comment_count}})</div>
</div>
    @if(get_options("comment_topic_show_type","default")==="ajax")
        <div class="col-md-12"  comment-load="topic" topic-id="{{$data->id}}">
            <div class="row row-cards">
                <span class="text-center" comment-load="remove"><h1>正在加载评论<span class="animated-dots"></span></h1></span>
            </div>
        </div>
    @endif
    @if(get_options("comment_topic_show_type","default")==="default")
        @php $caina = false; @endphp
        @if($data->user_id == auth()->id() && Authority()->check("comment_caina")) @php $caina = true;@endphp @endif
        @if(Authority()->check("admin_comment_caina")) @php $caina = true; @endphp @endif
        @if($comment->count())
			@foreach($comment as $key=>$value)
			<article class="d-flex align-tiems-start p-3 border-bottom hoverable @if($value->optimal) position-relative bg-orange-lt @endif" id="comment-{{$value->id}}" name="comment-{{$value->id}}">
				<div class="col">
					<div class="d-flex align-tiems-center justify-content-between">
						<div class="d-flex align-items-center flex-wrap">
							<div class="d-flex align-items-center  me-1 me-sm-3" id="comment-user-avatar-{{$value->id}}" comment-show="user-data" user-id="{{$value->user_id}}">
							<a href="/users/{{$value->user->username}}.html"><span class="avatar avatar-xs avatar-rounded" style="background-image: url({{super_avatar($value->user)}})"></span></a>	
							<a href="/users/{{$value->user->username}}.html" class="text-reset mx-1"><strong>{{$value->user->username}}</strong></a>
							<a href="/users/group/{{$value->user->class->id}}.html" target="_blank" class="d-flex align-items-center tips--top" aria-label="{{$value->user->class->name}}" style="color:{{$value->user->class->color}}; ">{!! $value->user->class->icon !!}</a>
							</div>
							<div class="tips--top" aria-label="发表于:{{$value->created_at}}">
							<span class="d-flex align-items-center opacity-50"><svg xmlns="http://www.w3.org/2000/svg" class="icon w-3 h-3 me-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><circle cx="12" cy="12" r="9"></circle><polyline points="12 7 12 12 15 15"></polyline></svg>{{format_date($value->created_at)}}</span>
							</div>
							@if($value->optimal)
							 <div class="ribbon bg-orange">
							    <span class="tips--top-left" aria-label="最佳评论">最佳</span>
							  </div>
							   @endif
						</div>
						<div>
						@if($caina)
							<a comment-click="comment-caina-topic" comment-id="{{ $value->id }}" aria-label="@if($value->optimal) 取消采纳@else采纳@endif此评论" class="btn btn-sm btn-outline-orange me-2 tips--top item-actions">
								@if($value->optimal) 取消采纳 @else 采纳 @endif
							</a>
						@endif
						{{ ($key + 1)+(($comment->currentPage()-1)*get_options('comment_page_count',15)) }}楼
						</div>
					</div>
					<div core-show="comment" comment-id="{{$value->id}}" class="col markdown my-2 fs-4">
						@if($value->parent_id)
						<div class="border bg-blue-lt p-2 rounded mb-1">
							<a href="{{$value->parent_url}}" class="fs-5 text-muted" target="_blank">
							回复 {{$value->parent_id}} 楼 <strong>{{$value->parent->user->username}}</strong> 发表于 {{format_date($value->parent->created_at)}} 的评论
							</a>
							<div class="fs-5 text-muted pt-2 border-top">
							{!! \Hyperf\Utils\Str::limit(remove_bbCode(strip_tags($value->parent->content)),60) !!}
							</div>
						</div>
						@endif
						{!! ShortCodeR()->handle($value->content) !!}
					</div>
					<div class="d-flex align-tiems-center justify-content-between item-actions">
						<div class="d-flex align-tiems-center">
						<a @if(auth()->check()) comment-click="comment-reply-topic" comment-id="{{ $value->id }}" @else href="#comment" @endif class="cursor-pointer text-muted me-1 me-sm-3 tips--bottom" aria-label="回复"><span class="opacity-50"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-message-circle" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path d="M0 0h24v24H0z" stroke="none"/><path d="M3 20l1.3-3.9A9 8 0 1 1 7.7 19L3 20M12 12v.01M8 12v.01M16 12v.01"/></svg>
						</span></a>
						<a href="/comment/topic/{{ $value->id }}.md" target="_blank" class="cursor-pointer text-muted me-1 me-sm-3 tips--bottom" aria-label="查看markdown文本" >
						<span class="opacity-50"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path d="M0 0h24v24H0z" stroke="none"/><rect x="3" y="5" width="18" height="14" rx="2"/><path d="M7 15V9l2 2 2-2v6M14 13l2 2 2-2m-2 2V9"/></svg>
						</span></a>
						<a comment-click="quote-comment" comment-id="{{ $value->id }}" class="cursor-pointer text-muted me-1 me-sm-3 tips--bottom" aria-label="引用"><span class="opacity-50"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path d="M0 0h24v24H0z" stroke="none"/><path d="M6 15h15M21 19H6M15 11h6M21 7h-6M9 9h1a1 1 0 1 1-1 1V7.5a2 2 0 0 1 2-2M3 9h1a1 1 0 1 1-1 1V7.5a2 2 0 0 1 2-2"/></svg>
						</span></a>
						@if(auth()->check())
						<span class="tips--bottom" aria-label="举报此评论">
						<a class="cursor-pointer text-muted me-1 me-sm-3" data-bs-toggle="modal" data-bs-target="#modal-report" url="/{{$data->id}}.html/{{$value->id}}?page={{$comment->currentPage()}}" topic-id="{{$data->id}}" comment-click="report-comment" comment-id="{{ $value->id }}"><span class="opacity-50"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path d="M0 0h24v24H0z" stroke="none"/><path d="M5 14h14l-4.5-4.5L19 5H5v16"/></svg>
						</span></a>
						</span>
						@if(Authority()->check("admin_comment_edit") && curd()->GetUserClass(auth()->data()->class_id)['permission-value']>curd()->GetUserClass($value->user->class_id)['permission-value'])
						<a class="text-muted  me-1 me-sm-3 cursor-pointer tips--bottom" href="/comment/topic/{{$value->id}}/edit" aria-label="编辑此评论"><span class="opacity-50"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path d="M0 0h24v24H0z" stroke="none"/><path d="M9 7H6a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2-2v-3"/><path d="M9 15h3l8.5-8.5a1.5 1.5 0 0 0-3-3L9 12v3M16 5l3 3"/></svg></span></a>
						@elseif(Authority()->check("comment_remove") && auth()->id() === $value->user->id)
						<a class="text-muted  me-1 me-sm-3 cursor-pointer tips--bottom" href="/comment/topic/{{$value->id}}/edit" aria-label="编辑此评论"><span class="opacity-50"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path d="M0 0h24v24H0z" stroke="none"/><path d="M9 7H6a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2-2v-3"/><path d="M9 15h3l8.5-8.5a1.5 1.5 0 0 0-3-3L9 12v3M16 5l3 3"/></svg></span></a>
						@endif
						@if(Authority()->check("admin_comment_edit") && curd()->GetUserClass(auth()->data()->class_id)['permission-value']>curd()->GetUserClass($value->user->class_id)['permission-value'])
						<a class="text-muted cursor-pointer tips--bottom" comment-click="comment-delete-topic" comment-id="{{ $value->id }}" aria-label="删除此评论"><span class="opacity-50"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path d="M0 0h24v24H0z" stroke="none"/><path d="M4 7h16M10 11v6M14 11v6M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2l1-12M9 7V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v3"/></svg></span></a>
						@elseif(Authority()->check("comment_remove") && auth()->id() === $value->user->id)
						<a class="text-muted cursor-pointer tips--bottom" comment-click="comment-delete-topic" comment-id="{{ $value->id }}" aria-label="删除此评论"><span class="opacity-50"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path d="M0 0h24v24H0z" stroke="none"/><path d="M4 7h16M10 11v6M14 11v6M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2l1-12M9 7V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v3"/></svg></span></a>
						@endif
						@endif
						</div>
						<div class="d-flex align-items-center">
						<a href="javascript:void(0);" u87-click="comment-like-topic" comment-id="{{$value->id}}" class=" me-1 me-sm-3 text-reset cursor-pointer tips--bottom" aria-label=" @if(auth()->check()) @if(\App\Plugins\Comment\src\Model\TopicCommentLike::query()->where(['comment_id' => $value->id,'user_id' => auth()->id()])->count()) 取消点赞 @else 赞 @endif @else 赞 @endif">
						<div class="d-flex align-items-center opacity-50"><svg xmlns="http://www.w3.org/2000/svg" class="icon me-1 @if(auth()->check() && \App\Plugins\Comment\src\Model\TopicCommentLike::query()->where(['comment_id' => $value->id,'user_id' => auth()->id()])->count()) icon-filled text-red @endif " width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none" /><path d="M19.5 13.572l-7.5 7.428l-7.5 -7.428m0 0a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" /></svg>
						<span comment-show="topic-likes">{{$value->likes}}</span>
						</div></a>
						<a href="javascript:void(0);" topic-id="{{$data->id}}" u87-click="star-comment" comment-id="{{$value->id}}"  class="text-reset cursor-pointer tips--bottom" aria-label=" @if(auth()->check()) @if(\App\Plugins\User\src\Models\UsersCollection::query()->where(['type_id' => $value->id,'type'=>'comment','user_id' => auth()->id()])->count()) 取消收藏 @else 收藏 @endif @else 收藏 @endif">
						<div class="d-flex align-items-center opacity-50"><svg xmlns="http://www.w3.org/2000/svg" class="icon me-1  @if(auth()->check() && \App\Plugins\User\src\Models\UsersCollection::query()->where(['type_id' => $value->id,'type'=>'comment','user_id' => auth()->id()])->count()) icon-filled text-blue @endif " width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z"></path></svg>
						<span u87-show="comment-stars">{{\App\Plugins\User\src\Models\UsersCollection::query()->where(['type_id' => $value->id,'type'=>'comment','user_id' => auth()->id()])->count()}}</span>
						</div></a>
						</div>
					</div>
					@if(auth()->check())
					<div class="col-md-12" comment-dom="comment-{{$value->id}}" comment-status="off">
						<div class="hr-text my-3" style="display: none">回复 {{$value->user->username}} 的评论</div>
					</div>
					<div class="col-md-12" style="display: none" comment-url="/{{$data->id}}.html/{{$value->id}}?page={{$comment->currentPage()}}" comment-dom="comment-vditor-{{$value->id}}" comment-status="off">
						<div id="comment-reply-vditor-{{$value->id}}"></div>
						<button style="margin-top:10px" class="btn btn-primary" type="button" comment-dom="comment-vditor-submit-{{$value->id}}">提交</button>
					</div>
					@endif
				</div>
			</article>
			@endforeach
            <div>
                {!! make_page($comment) !!}
            </div>
        @endif
    @endif
</div>	
@endif