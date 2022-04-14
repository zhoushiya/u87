<div class="row row-cards justify-content-center mb-1 mb-sm-2">
		<div id="comment-{{$value->id}}" name="comment-{{$value->id}}" class="col-md-12">
			<div class="card @if($value->optimal) bg-orange-lt  @endif">
				<div class="card-body p-1 p-sm-3">
					<div class="row">
						<div class="col-md-12">
							<div class="row">
								<div class="col d-flex align-items-center" id="comment-user-avatar-{{$value->id}}" comment-show="user-data" user-id="{{$value->user_id}}">
								<a href="/users/{{$value->user->username}}.html"><span class="avatar avatar-xs avatar-rounded" style="background-image: url({{super_avatar($value->user)}})"></span></a>
								<a href="/users/{{$value->user->username}}.html" class="text-reset mx-1"><strong>{{$value->user->username}}</strong></a>
								<a href="/users/group/{{$value->user->Class->id}}.html" target="_blank" class="d-flex align-items-center tips--top" aria-label="{{$value->user->class->name}}" style="color:{{$value->user->class->color}}; ">{!! $value->user->class->icon !!}</a>
								<div class="tips--top" aria-label="发表于:{{$value->created_at}}">
								<span class="d-flex align-items-center opacity-50 fs-5 ms-1"><svg xmlns="http://www.w3.org/2000/svg" class="icon w-3 h-3" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><circle cx="12" cy="12" r="9"></circle><polyline points="12 7 12 12 15 15"></polyline></svg>{{format_date($value->created_at)}}</span>
								</div>
								@if($value->optimal)<span class="ms-2 tips--top" aria-label="最佳评论"><svg xmlns="http://www.w3.org/2000/svg" class="icon text-orange" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path d="M0 0h24v24H0z" stroke="none"/><circle cx="12" cy="9" r="6"/><path d="M12.002 15.003l3.4 5.89L17 17.66l3.598.232-3.4-5.889M6.802 12.003l-3.4 5.89L7 17.66l1.598 3.232 3.4-5.889"/></svg></span> @endif
									<a class=" d-flex align-items-center ms-2 text-muted tips--top" href="/{{$value->topic_id}}.html" aria-label="访问所在主题"><svg xmlns="http://www.w3.org/2000/svg" class="icon w-3 h-3" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path d="M0 0h24v24H0z" stroke="none"/><circle cx="12" cy="11" r="3"/><path d="M17.657 16.657L13.414 20.9a2 2 0 0 1-2.827 0l-4.244-4.243a8 8 0 1 1 11.314 0z"/></svg></a>
								</div>
							</div>
						</div>
						<div core-show="comment" comment-id="{{$value->id}}" class="col-md-12 markdown fs-4 py-1">
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
						<div class="w-100 d-flex align-tiems-center justify-content-between item-actions">
							<div>
								
							<a href="/comment/topic/{{ $value->id }}.md" target="_blank" class="cursor-pointer text-muted me-2 tips--bottom" aria-label="查看markdown文本" >
							<span class="opacity-50"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path d="M0 0h24v24H0z" stroke="none"/><rect x="3" y="5" width="18" height="14" rx="2"/><path d="M7 15V9l2 2 2-2v6M14 13l2 2 2-2m-2 2V9"/></svg>
							</span></a>
							<a comment-click="quote-comment" comment-id="{{ $value->id }}" class="cursor-pointer text-muted me-2 tips--bottom" aria-label="引用"><span class="opacity-50"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path d="M0 0h24v24H0z" stroke="none"/><path d="M6 15h15M21 19H6M15 11h6M21 7h-6M9 9h1a1 1 0 1 1-1 1V7.5a2 2 0 0 1 2-2M3 9h1a1 1 0 1 1-1 1V7.5a2 2 0 0 1 2-2"/></svg>
							</span></a>
							</div>
							<div class="d-flex align-items-center">
							<a href="javascript:void(0);" u87-click="comment-like-topic" comment-id="{{$value->id}}" class=" me-1 me-sm-3 text-reset cursor-pointer tips--bottom" aria-label=" @if(auth()->check()) @if(\App\Plugins\Comment\src\Model\TopicCommentLike::query()->where(['comment_id' => $value->id,'user_id' => auth()->id()])->count()) 取消点赞 @else 赞 @endif @else 赞 @endif">
							<div class="d-flex align-items-center opacity-50"><svg xmlns="http://www.w3.org/2000/svg" class="icon me-1 @if(auth()->check() && \App\Plugins\Comment\src\Model\TopicCommentLike::query()->where(['comment_id' => $value->id,'user_id' => auth()->id()])->count()) icon-filled text-red @endif " width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none" /><path d="M19.5 13.572l-7.5 7.428l-7.5 -7.428m0 0a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" /></svg>
							<span comment-show="topic-likes">{{$value->likes}}</span>
							</div></a>
							<a href="javascript:void(0);" u87-click="star-comment" comment-id="{{$value->id}}" class="text-reset cursor-pointer tips--bottom" aria-label=" @if(auth()->check()) @if(\App\Plugins\User\src\Models\UsersCollection::query()->where(['type_id' => $value->id,'type'=>'comment','user_id' => auth()->id()])->count()) 取消收藏 @else 收藏 @endif @else 收藏 @endif">
							<div class="d-flex align-items-center opacity-50"><svg xmlns="http://www.w3.org/2000/svg" class="icon me-1  @if(auth()->check() && \App\Plugins\User\src\Models\UsersCollection::query()->where(['type_id' => $value->id,'type'=>'comment','user_id' => auth()->id()])->count()) icon-filled text-blue @endif " width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z"></path></svg>
							<span u87-show="comment-stars">{{\App\Plugins\User\src\Models\UsersCollection::query()->where(['type_id' => $value->id,'type'=>'comment','user_id' => auth()->id()])->count()}}</span>
							</div></a>
							</div>
						</div>
					</div>
				</div>
            </div>
        </div>
</div>