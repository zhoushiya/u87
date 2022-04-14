<div class="card">
<div class="card-stamp">
<div class="card-stamp-icon bg-white text-primary">
<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-circle" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path d="M0 0h24v24H0z" stroke="none"/><circle cx="12" cy="12" r="9"/><circle cx="12" cy="10" r="3"/><path d="M6.168 18.849A4 4 0 0 1 10 16h4a4 4 0 0 1 3.834 2.855"/></svg>
</div>
</div>
  <div class="card-header">
	<ul class="nav nav-pills card-header-pills">
	<li class="nav-item">
	<a class="nav-link fw-bold">
	<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-circle" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path d="M0 0h24v24H0z" stroke="none"/><circle cx="12" cy="12" r="9"/><circle cx="12" cy="10" r="3"/><path d="M6.168 18.849A4 4 0 0 1 10 16h4a4 4 0 0 1 3.834 2.855"/></svg>
	 @if($user->id!=auth()->id())Ta的资料 @else 我的资料@endif</a>
	</li>
	</ul>
  </div>
<div class="card-body">
<div class="d-flex justify-content-between flex-wrap">	
<div class="col-6 col-md-4 mb-1 text-end">加入时间：</div>
<div class="col-6 col-md-8 mb-1"><span class="tips--top"  aria-label="{{$user->created_at}}">{{format_date($user->created_at)}}</span></div>
@if($user->Options->email) 
<div class="col-6 col-md-4 mb-1 text-end">邮箱：</div>
<div class="col-6 col-md-8 mb-1 user-select-all">{{ $user->Options->email }}</div>
@endif
@if($user->Options->wx) 
<div class="col-6 col-md-4 mb-1 text-end">微信：</div>
<div class="col-6 col-md-8 mb-1 user-select-all">{{ $user->Options->wx }}</div>
@endif
@if($user->Options->qq) 
<div class="col-6 col-md-4 mb-1 text-end">QQ：</div>
<div class="col-6 col-md-8 mb-1 user-select-all">{{ $user->Options->qq }}</div>
@endif
@if($user->Options->website) 
<div class="col-6 col-md-4 mb-1 text-end">个人网站：</div>
<div class="col-6 col-md-8 mb-1 user-select-all">{{ $user->Options->website }}</div>
@endif
<div class="col-6 col-md-4 mb-1 text-end">个人签名：</div>
<div class="col-6 col-md-8 mb-1 user-select-all"> {{$user->Options->qianming}}</div>
</div>
  </div>
</div>
<div class="card mt-3">
<div class="card-stamp">
<div class="card-stamp-icon bg-white text-primary">
<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-medal" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path d="M0 0h24v24H0z" stroke="none"/><path d="M12 4v3M8 4v6m8-6v6M12 18.5L9 20l.5-3.5-2-2 3-.5 1.5-3 1.5 3 3 .5-2 2L15 20z"/></svg>
</div>
</div>
  <div class="card-header">
	<ul class="nav nav-pills card-header-pills">
	<li class="nav-item">
	<a class="nav-link fw-bold">
	<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-medal" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path d="M0 0h24v24H0z" stroke="none"/><path d="M12 4v3M8 4v6m8-6v6M12 18.5L9 20l.5-3.5-2-2 3-.5 1.5-3 1.5 3 3 .5-2 2L15 20z"/></svg>
	 @if($user->id!=auth()->id())Ta的成就 @else 我的成就@endif </a>
	</li>
	</ul>
  </div>
<div class="card-body">
<div class="d-flex justify-content-between flex-wrap">	
<div class="col-6 col-xl-3 mb-1 text-end"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path d="M0 0h24v24H0z" stroke="none"/><path d="M14 3v4a1 1 0 0 0 1 1h4"/><path d="M17 21H7a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h7l5 5v11a2 2 0 0 1-2 2zM12 10v4M10 12h4M10 17h4"/></svg> 主题：</div>
<div class="col-6 col-xl-3 mb-1"> @php echo \App\Plugins\Topic\src\Models\Topic::query()->where(['status' => 'publish','user_id' => $user->id])->count(); @endphp </div>
<div class="col-6 col-xl-3 mb-1 text-end"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path d="M0 0h24v24H0z" stroke="none"/><path d="M3 20l1.3-3.9A9 8 0 1 1 7.7 19L3 20M12 12v.01M8 12v.01M16 12v.01"/></svg> 评论：</div>
<div class="col-6 col-xl-3 mb-1"> @php echo \App\Plugins\Comment\src\Model\TopicComment::query()->where(['status' => 'publish','user_id' => $user->id])->count(); @endphp </div>
<div class="col-6 col-xl-3 mb-1 text-end"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none" /><path d="M19.5 13.572l-7.5 7.428l-7.5 -7.428m0 0a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" /></svg> 获赞：</div>
<div class="col-6 col-xl-3 mb-1"> @php echo \App\Plugins\Topic\src\Models\Topic::query()->where(['status' => 'publish','user_id' => $user->id])->sum('like'); @endphp</div>
<div class="col-6 col-xl-3 mb-1 text-end"><svg xmlns="http://www.w3.org/2000/svg" class="icon h-3" width="24" height="24" viewBox="0 0 48 48"><g stroke-width="3" fill-rule="evenodd"><path fill="#fff" fill-opacity=".01" d="M0 0h48v48H0z"></path><g stroke="currentColor" fill="none"><path d="M10.636 5h26.728L45 18.3 24 43 3 18.3z"></path><path d="M10.636 5L24 43 37.364 5M3 18.3h42"></path><path d="M15.41 18.3L24 5l8.59 13.3"></path></g></g></svg> 精华：</div>
<div class="col-6 col-xl-3 mb-1"> @php echo \App\Plugins\Topic\src\Models\Topic::query()->where(['status' => 'publish','user_id' => $user->id])->sum('essence'); @endphp</div>
<div class="col-6 col-xl-3 mb-1 text-end"><svg class="icon" width="24" height="24" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg"><circle cx="24" cy="11" r="7" stroke="currentColor" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/><path d="M4 41c0-8.837 8.059-16 18-16M31.85 28C29.724 28 28 30.009 28 32.486c0 4.487 4.55 8.565 7 9.514 2.45-.949 7-5.027 7-9.514C42 30.01 40.276 28 38.15 28c-1.302 0-2.453.753-3.15 1.906C34.303 28.753 33.152 28 31.85 28z" stroke="currentColor" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/></svg> 关注：</div>
<div class="col-6 col-xl-3 mb-1"> @php echo \App\Plugins\U87\src\Models\UserFans::query()->where("fans_id",$user->id)->count(); @endphp</div>
<div class="col-6 col-xl-3 mb-1 text-end"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path d="M0 0h24v24H0z" stroke="none"/><circle cx="7" cy="5" r="2"/><path d="M5 22v-5l-1-1v-4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v4l-1 1v5"/><circle cx="17" cy="5" r="2"/><path d="M15 22v-4h-2l2-6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1l2 6h-2v4"/></svg> 粉丝：</div>
<div class="col-6 col-xl-3 mb-1"> {{$user->fans}}</div>
</div>
  </div>
</div>
<div class="card mt-3">
<div class="card-stamp">
<div class="card-stamp-icon bg-white text-primary">
<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path d="M0 0h24v24H0z" stroke="none"/><circle cx="7" cy="5" r="2"/><path d="M5 22v-5l-1-1v-4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v4l-1 1v5"/><circle cx="17" cy="5" r="2"/><path d="M15 22v-4h-2l2-6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1l2 6h-2v4"/></svg>
</div>
</div>
  <div class="card-header">
	<ul class="nav nav-pills card-header-pills">
	<li class="nav-item">
	<a class="nav-link fw-bold">
	<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path d="M0 0h24v24H0z" stroke="none"/><circle cx="7" cy="5" r="2"/><path d="M5 22v-5l-1-1v-4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v4l-1 1v5"/><circle cx="17" cy="5" r="2"/><path d="M15 22v-4h-2l2-6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1l2 6h-2v4"/></svg>
	@if($user->id!=auth()->id())Ta的朋友 @else 我的朋友@endif</a>
	</li>
	</ul>
  </div>
<div class="card-body">
<ul class="list list-timeline">
	  <li>
	    <div class="list-timeline-icon bg-red">
	     <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path d="M0 0h24v24H0z" stroke="none"/><circle cx="7" cy="5" r="2"/><path d="M5 22v-5l-1-1v-4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v4l-1 1v5"/><circle cx="17" cy="5" r="2"/><path d="M15 22v-4h-2l2-6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1l2 6h-2v4"/></svg>
	    </div>
	    <div class="list-timeline-content pt-0">
	      <div class="list-timeline-time">最近关注的人</div>
	      <div class="avatar-list avatar-list-stacked mt-1">
			@foreach(\App\Plugins\U87\src\Models\UserFans::query()->where(['fans_id' => $user->id])->with('follow')->orderBy('created_at')->take(4)->get() as $data)
	        <a href="/users/{{$data->follow->username}}.html" class="tips--top" aria-label="关注时间:{{$data->follow->created_at}}">{!! avatar($data->follow->id,'avatar-sm avatar-rounded') !!}</a>
			@endforeach
	      </div>
	    </div>
	  </li>
      <li>
        <div class="list-timeline-icon bg-pink">
         <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path d="M0 0h24v24H0z" stroke="none"/><circle cx="7" cy="5" r="2"/><path d="M5 22v-5l-1-1v-4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v4l-1 1v5"/><circle cx="17" cy="5" r="2"/><path d="M15 22v-4h-2l2-6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1l2 6h-2v4"/></svg>
        </div>
        <div class="list-timeline-content pt-0">
          <div class="list-timeline-time">最近的粉丝</div>
          <div class="avatar-list avatar-list-stacked mt-1">
			   @foreach(\App\Plugins\U87\src\Models\UserFans::query()->where(['user_id' => $user->id])->with('fans')->orderBy('created_at')->take(4)->get() as $data)  
            <a href="/users/{{$data->fans->username}}.html" class="tips--top" aria-label="关注时间:{{$data->fans->created_at}}">{!! avatar($data->fans->id,'avatar-sm avatar-rounded') !!}</a>
		@endforeach
          </div>
        </div>
      </li>
    </ul>
  </div>
</div>