<div class="d-flex align-items-center flex-wrap">
<div class="d-flex align-items-center">
	<a href="/users/{{$data->user->username}}.html" class="avatar avatar-xs avatar-rounded me-2" style="background-image: url({{super_avatar($data->user)}})"></a>
	<div class="d-flex align-items-center  me-1 me-sm-3">
	<a href="/users/{{$data->user->username}}.html" class="text-muted me-1"><strong>{{$data->user->username}}</strong></a>
	<a href="/users/group/{{$data->user->Class->id}}.html" target="_blank" class="tips--top" aria-label="{{$data->user->class->name}}" style="color:{{$data->user->class->color}}; ">{!! $data->user->class->icon !!}</a>
	</div>
</div>
<div class="d-flex align-items-center mt-2 mt-sm-0">
	<div class="me-1 me-sm-3 text-muted tips--top" aria-label="创建于:{{$data->created_at}}">
	<span class="d-flex align-items-center opacity-75">
	<svg xmlns="http://www.w3.org/2000/svg" class="icon w-3 h-3 me-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><circle cx="12" cy="12" r="9"></circle><polyline points="12 7 12 12 15 15"></polyline></svg>{{format_date($data->created_at)}}</span>
	</div>
	<div class="d-flex align-items-center  me-1 me-sm-3 text-muted tips--top" aria-label="更新于:{{$data->updated_at}}">
	<span class="d-flex align-items-center opacity-75">
	<svg class="icon w-3 h-3 me-1" width="24" height="24" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill="#fff" fill-opacity=".01" d="M0 0h48v48H0z"/><path d="M48 0H0v48h48V0z" fill="#fff" fill-opacity=".01"/><path d="M24 44c11.046 0 20-8.954 20-20S35.046 4 24 4 4 12.954 4 24s8.954 20 20 20z" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/><path d="M33.542 27c-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7v6M33.542 15v6c-1.274-4.057-5.064-7-9.542-7-4.477 0-8.268 2.943-9.542 7" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/></svg>{{format_date($data->updated_at)}}</span>
	</div>
	<a class="text-muted  me-1 me-sm-3 tips--top" aria-label="浏览次数">
	<span class="d-flex align-items-center opacity-75">
	<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="2" /><path d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7" /></svg> {{$data->view}}</span>
	</a>
	<a href="#comment" class="text-muted  me-1 me-sm-3 tips--top" aria-label="评论数">
	<span class="d-flex align-items-center opacity-75">
	<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path d="M0 0h24v24H0z" stroke="none"/><path d="M3 20l1.3-3.9A9 8 0 1 1 7.7 19L3 20M12 12v.01M8 12v.01M16 12v.01"/></svg> @php echo \App\Plugins\Comment\src\Model\TopicComment::query()->where(['topic_id'=>$data->id,'status'=>'publish'])->count(); @endphp </span>
	</a>
</div>
<div class="d-flex align-items-center mt-2 mt-sm-0">
@if(auth()->check())
	@if(Authority()->check("admin_topic_edit") && curd()->GetUserClass(auth()->data()->class_id)['permission-value']>curd()->GetUserClass($data->user->class_id)['permission-value'])
	<a href="/topic/{{$data->id}}/edit" class="text-muted  me-1 me-sm-3 tips--top" aria-label="修改主题信息">
	<span class="d-flex align-items-center opacity-75">
		<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path d="M0 0h24v24H0z" stroke="none"/><path d="M9 7H6a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2-2v-3"/><path d="M9 15h3l8.5-8.5a1.5 1.5 0 0 0-3-3L9 12v3M16 5l3 3"/></svg> 编辑</span>
	</a>
	@elseif(Authority()->check("topic_edit") && auth()->id() === $data->user->id)
	<a href="/topic/{{$data->id}}/edit" class="text-muted  me-1 me-sm-3 tips--top" aria-label="修改主题信息">
	<span class="d-flex align-items-center opacity-75">
		<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path d="M0 0h24v24H0z" stroke="none"/><path d="M9 7H6a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2-2v-3"/><path d="M9 15h3l8.5-8.5a1.5 1.5 0 0 0-3-3L9 12v3M16 5l3 3"/></svg> 编辑</span>
	</a>
	@endif
@endif
@if(auth()->check())
	@if(Authority()->check("admin_topic_delete") && curd()->GetUserClass(auth()->data()->class_id)['permission-value']>curd()->GetUserClass($data->user->class_id)['permission-value'])
	<a class="text-muted  me-1 me-sm-3 cursor-pointer tips--top" core-click="topic-delete" topic-id="{{$data->id}}" aria-label="删除此主题">
	<span class="d-flex align-items-center opacity-75"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path d="M0 0h24v24H0z" stroke="none"/><path d="M4 7h16M10 11v6M14 11v6M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2l1-12M9 7V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v3"/></svg> 删除</span>
	</a>
	@elseif(Authority()->check("topic_delete") && auth()->id() === $data->user->id)
	<a class="text-muted  me-1 me-sm-3 cursor-pointer tips--top" core-click="topic-delete" topic-id="{{$data->id}}" aria-label="删除此主题">
	<span class="d-flex align-items-center opacity-75"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path d="M0 0h24v24H0z" stroke="none"/><path d="M4 7h16M10 11v6M14 11v6M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2l1-12M9 7V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v3"/></svg> 删除</span>
	</a>
	@endif
@endif
@if(auth()->check() && Authority()->check("topic_options"))
<a class="text-muted  me-1 me-sm-3 cursor-pointer tips--top" core-click="topic-topping" topic-id="{{$data->id}}" aria-label="将此主题置顶"><span class="d-flex align-items-center opacity-75"><svg xmlns="http://www.w3.org/2000/svg" class="icon" viewBox="0 0 1024 1024"><path d="M584.704 900.608c-20.992 12.288-54.272 12.288-75.264 0l-375.808-225.28c-20.992-12.288-20.992-32.768 0-45.056l375.808-225.28c20.992-12.288 54.272-12.288 75.264 0l375.808 225.28c20.992 12.288 20.992 32.768 0 45.056l-375.808 225.28z" fill="#FFE182"/><path d="M584.704 729.088c-20.992 12.288-54.272 12.288-75.264 0l-375.808-225.28c-20.992-12.288-20.992-32.768 0-45.056l375.808-225.28c20.992-12.288 54.272-12.288 75.264 0l375.808 225.28c20.992 12.288 20.992 32.768 0 45.056l-375.808 225.28z" fill="#FFAA64"/><path d="M584.704 557.568c-20.992 12.288-54.272 12.288-75.264 0l-375.808-225.28c-20.992-12.288-20.992-32.768 0-45.056L509.44 61.952c20.992-12.288 54.272-12.288 75.264 0l375.808 225.28c20.992 12.288 20.992 32.768 0 45.056l-375.808 225.28z" fill="#FF8C5A"/></svg> 置顶</span></a>
@endif
@if(auth()->check() && Authority()->check("topic_options"))
<a class="text-muted  me-1 me-sm-3 cursor-pointer tips--top" core-click="topic-essence" topic-id="{{$data->id}}" aria-label="将此主题设为精华主题"><span class="d-flex align-items-center opacity-75"><svg xmlns="http://www.w3.org/2000/svg" class="icon" viewBox="0 0 1024 1024"><path d="M720.258 344.276L512 944.552l512-600.276z" fill="#FFE182"/><path d="M211.862 79.448L0 344.276h303.742zm508.396 264.828H1024L812.138 79.448zm0 0L512 79.448 303.742 344.276z" fill="#FFCD73"/><path d="M512 79.448H211.862l91.88 264.828z" fill="#FFAA64"/><path d="M812.138 79.448H512l208.258 264.828z" fill="#FFE182"/><path d="M303.742 344.276L512 944.552l208.258-600.276z" fill="#FFAA64"/><path d="M0 344.276l512 600.276-208.258-600.276z" fill="#FF8C5A"/></svg> 精华</span></a>
@endif
</div>
</div>