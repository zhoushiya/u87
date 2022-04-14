@extends("App::app")
@section('title',$user->username.'的粉丝列表 - '.get_options('web_name', 'CodeFec') )
@section('description','为你展示「'.$user->username.'」的粉丝列表')
@section('content')
<div class="row row-cards">
@include('App::common.userinfo')
<div class="col-lg-9">
<div class="card  mb-3">
  <div class="card-header">
	<ul class="nav nav-pills card-header-pills">
	<li class="nav-item">
	<a class="nav-link" href="/users/{{$user->username}}.html">
	<svg xmlns="http://www.w3.org/2000/svg" class="icon me-1 d-none d-md-block" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path d="M0 0h24v24H0z" stroke="none"/><path d="M14 3v4a1 1 0 0 0 1 1h4"/><path d="M17 21H7a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h7l5 5v11a2 2 0 0 1-2 2zM12 10v4M10 12h4M10 17h4"/></svg> 主题 @php echo \App\Plugins\Topic\src\Models\Topic::query()->where(['status' => 'publish','user_id' => $user->id])->count(); @endphp</a>
	</li>
	<li class="nav-item">
	<a class="nav-link" href="/users/follow/{{$user->username}}.html">
	<svg class="icon me-1 d-none d-md-block" width="24" height="24" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg"><circle cx="24" cy="11" r="7" stroke="currentColor" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/><path d="M4 41c0-8.837 8.059-16 18-16M31.85 28C29.724 28 28 30.009 28 32.486c0 4.487 4.55 8.565 7 9.514 2.45-.949 7-5.027 7-9.514C42 30.01 40.276 28 38.15 28c-1.302 0-2.453.753-3.15 1.906C34.303 28.753 33.152 28 31.85 28z" stroke="currentColor" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/></svg> 关注 @php echo \App\Plugins\User\src\Models\UserFans::query()->where("fans_id",$user->id)->count(); @endphp</a>
	</li>
	<li class="nav-item">
	<a class="nav-link active fw-bold" href="/users/fans/{{$user->username}}.html">
	<svg xmlns="http://www.w3.org/2000/svg" class="icon me-1 d-none d-md-block" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path d="M0 0h24v24H0z" stroke="none"/><circle cx="7" cy="5" r="2"/><path d="M5 22v-5l-1-1v-4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v4l-1 1v5"/><circle cx="17" cy="5" r="2"/><path d="M15 22v-4h-2l2-6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1l2 6h-2v4"/></svg> 粉丝 {{$user->fans}}</a>
	</li>
	<li class="nav-item">
	<a class="nav-link" href="/users/fav/{{$user->username}}.html">
	<svg xmlns="http://www.w3.org/2000/svg" class="icon me-1 d-none d-md-block" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z"></path></svg> 收藏 @php echo \App\Plugins\User\src\Models\UsersCollection::query()->where('user_id',$user->id)->count(); @endphp</a>
	</li>
	</ul>
  </div>
<div class="card-body">  
<div class="row row-cards">
@if ($page->count())
@foreach ($page as $data)
<div class="col-md-6 col-xl-4">
	<div class="card">
	  <div class="card-body p-4 text-center">
		{!! avatar($data->fans->id,"avatar-xl mb-3 avatar-rounded") !!}
		<h3 class="m-0 mb-1"><a href="/users/{{$data->fans->username}}.html">{{ $data->fans->username }}</a></h3>
		<div class="d-flex align-items-center justify-content-center mb-3">
		 <div class="tips--top" aria-label="权限值 : {{$data->fans['class']['permission-value']}}">{!! $data->fans->class->icon !!}</div>
		 <div class="badge badge-outline ms-1" style="color:{{$data->fans->class->color}}; ">{{$data->fans->class->name}}</div>
		</div>
		<div class="position-absolute bottom-0 start-0 ms-2 mb-5 "> <span class="status status-azure opacity-50"><svg xmlns="http://www.w3.org/2000/svg" class="icon me-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path d="M0 0h24v24H0z" stroke="none"/><circle cx="7" cy="5" r="2"/><path d="M5 22v-5l-1-1v-4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v4l-1 1v5"/><circle cx="17" cy="5" r="2"/><path d="M15 22v-4h-2l2-6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1l2 6h-2v4"/></svg>{{$data->fans->fans}} 位粉丝</span></div>
		<div class="position-absolute top-0 end-0 me-2 mt-2 tips--top" aria-label="加入时间:{{$data->fans->created_at}}">
		<span class="status status-lime opacity-50">
		<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><circle cx="12" cy="12" r="9"></circle><polyline points="12 7 12 12 15 15"></polyline></svg>{{format_date($data->fans->created_at)}}
		</span>
		</div>
		<div class="position-absolute bottom-0 end-0 me-2 mb-5 tips--top" aria-label="关注时间:{{$data->created_at}}">
		<span class="status status-pink opacity-50">
		<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><circle cx="12" cy="12" r="9"></circle><polyline points="12 7 12 12 15 15"></polyline></svg>{{format_date($data->created_at)}}
		</span>
		</div>
		<div class="position-absolute top-0 start-0 ms-2 mt-2 tips--top" aria-label="本站第 {{$data->fans->id}} 位会员">
		<span class="status status-indigo opacity-50">
		 <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path d="M0 0h24v24H0z" stroke="none"/><circle cx="12" cy="7" r="4"/><path d="M6 21v-2a4 4 0 0 1 4-4h4a4 4 0 0 1 4 4v2"/></svg> NO.{{$data->fans->id}}
		</span>
		</div>
	  </div>
	  <div class="d-flex">
		<a class="card-btn cursor-pointer" user-click="user_follow" user-id="{{ $data->fans_id }}"><svg class="icon me-2" width="24" height="24" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg"><circle cx="24" cy="11" r="7" stroke="currentColor" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/><path d="M4 41c0-8.837 8.059-16 18-16M31.85 28C29.724 28 28 30.009 28 32.486c0 4.487 4.55 8.565 7 9.514 2.45-.949 7-5.027 7-9.514C42 30.01 40.276 28 38.15 28c-1.302 0-2.453.753-3.15 1.906C34.303 28.753 33.152 28 31.85 28z" stroke="currentColor" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/></svg> <span>关注</span></a>
		<a href="/users/{{$data->fans->username}}.html" class="card-btn"><svg class="icon me-2" width="24" height="24" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg"><rect x="4" y="8" width="40" height="32" rx="2" stroke="currentColor" stroke-width="4" stroke-linejoin="round"/><path d="M17 25a4 4 0 1 0 0-8 4 4 0 0 0 0 8z" stroke="currentColor" stroke-width="4" stroke-linejoin="round"/><path d="M23 31a6 6 0 0 0-12 0M28 20h8M30 28h6" stroke="currentColor" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/></svg> 资料</a>
	  </div>
	</div>
</div>
@endforeach
@else
    <div class="empty">
      <div class="empty-img"><img src="/themes/U87/image/people.svg" alt="" style="width: 12.5rem;height: 12.5rem;"></div>
      <p class="text-muted"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-alert-circle" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path d="M0 0h24v24H0z" stroke="none"/><circle cx="12" cy="12" r="9"/><path d="M12 8v4M12 16h.01"/></svg> 暂无粉丝</p>
    </div>
@endif
{!! make_page($page) !!}
</div>
</div>
</div>
</div>
	<div class="col-lg-3">
		@include('App::common.userright')
		@include('App::common.user')
	</div>
</div>
@endsection
@section('scripts')
    <script src="{{mix("plugins/Core/js/user.js")}}"></script>
@endsection