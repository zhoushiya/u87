@extends("App::app")
@section('title', $data->name.'会员组 - '.get_options('web_name', 'CodeFec') )
@section('description', '本站会员组,共'.$user->count().'位会员')
@section('keywords', '会员组')
@section('content')
<div class="row row-cards">
	<div class="col-lg-9">
		<div class="card mb-3">
		<div class="card-header border-bottom-0 d-flex align-items-center justify-content-between">
		<ol class="breadcrumb" aria-label="breadcrumbs">
		  <li class="breadcrumb-item"><a href="/" class="d-flex align-items-center"><svg xmlns="http://www.w3.org/2000/svg" class="icon w-3 h-3" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path d="M0 0h24v24H0z" stroke="none"/><path d="M5 12H3l9-9 9 9h-2M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2v-7"/><path d="M9 21v-6a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2v6"/></svg>首页</a></li>
		  <li class="breadcrumb-item" aria-current="page"><a href="javascript:void(0);" class="d-flex align-items-center"><svg xmlns="http://www.w3.org/2000/svg" class="icon w-3 h-3" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path d="M0 0h24v24H0z" stroke="none"/><circle cx="9" cy="7" r="4"/><path d="M3 21v-2a4 4 0 0 1 4-4h4a4 4 0 0 1 4 4v2M16 3.13a4 4 0 0 1 0 7.75M21 21v-2a4 4 0 0 0-3-3.85"/></svg> 会员组</a></li>
		</ol>
		</div>
		</div>
<div class="row row-cards">
<div class="col-md-12">
<div class="card">
  <div class="card-body">
	<div class="row g-2 align-items-center">
	  <div class="col-auto">
		<span class="avatar avatar-md text-white" style="background-color:{{$data->color}}">
			{!! $data->icon !!}
		</span>
	  </div>
	  <div class="col">
			<div class="d-flex justify-content-between flex-wrap"> 
				<div class="d-flex align-items-center">
				<strong class="fs-3">{{$data->name}}</strong>
				<div class="ms-1 tips--top" aria-label="权限值 : {{$data['permission-value']}}">
				<span class="status status-{{randBG()}} py-1 h-100" style="color:{{$data->color}}"><span class="status-dot status-dot-animated"></span> {{$data['permission-value']}}</span>
				</div>
				</div>
				@if($userCount)
				<div class="col-auto tips--top" aria-label="该组共有 {{$userCount}} 位会员">
				<span class="status status-{{randBG()}} py-0 h-100" style="color:{{$data->color}}"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-users" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path d="M0 0h24v24H0z" stroke="none"/><circle cx="9" cy="7" r="4"/><path d="M3 21v-2a4 4 0 0 1 4-4h4a4 4 0 0 1 4 4v2M16 3.13a4 4 0 0 1 0 7.75M21 21v-2a4 4 0 0 0-3-3.85"/></svg>{{$userCount}} 位会员</span>
				</div>
				@endif
			</div> 
			<div class="text-muted">
			  创建日期 : {{$data->created_at}} @if($data->updated_at)<br/>最后更新时间 : {{$data->updated_at}}@endif
			</div>
	  </div>
	</div>
	</div>
  </div>
</div>
@if($userCount)
	@if($user->count())
	@foreach($user as $value)
	<div class="col-md-6 col-xl-4">
	<div class="card card-link">
	  <div class="card-body">
		<div class="row">
		  <div class="col-auto">
			<a href="/users/{{$value->username}}.html">{!! avatar($value->id) !!}</a>
		  </div>
		  <div class="col">
			<div class="fw-bold"><a class="text-reset" href="/users/{{$value->username}}.html">{{$value->username}}</a></div>
			<div class="text-muted tips--bottom" aria-label="加入时间:{{$value->created_at}}">
			{{format_date($value->created_at)}}加入
			</div>
		  </div>
		  <div class="col-auto d-flex align-items-center">
		  <a class="badge badge-outline text-blue cursor-pointer d-flex" user-click="user_follow" user-id="{{ $value->id }}"><svg class="icon w-3 h-3 me-1" width="24" height="24" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg"><circle cx="24" cy="11" r="7" stroke="currentColor" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/><path d="M4 41c0-8.837 8.059-16 18-16M31.85 28C29.724 28 28 30.009 28 32.486c0 4.487 4.55 8.565 7 9.514 2.45-.949 7-5.027 7-9.514C42 30.01 40.276 28 38.15 28c-1.302 0-2.453.753-3.15 1.906C34.303 28.753 33.152 28 31.85 28z" stroke="currentColor" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/></svg> <span>关注</span></a>
		  </div>
		</div>
	  </div>
	</div>
  </div>
	@endforeach
	@else
		<div class="empty">
		  <div class="empty-img"><img src="/themes/U87/image/people.svg" alt="" style="width: 12.5rem;height: 12.5rem;"></div>
		  <div class="text-muted"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-alert-circle" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path d="M0 0h24v24H0z" stroke="none"/><circle cx="12" cy="12" r="9"/><path d="M12 8v4M12 16h.01"/></svg> 暂无会员</div>
		</div>
	@endif
	{!! make_page($user) !!}
@endif
</div>
	</div>
	<div class="d-none d-lg-block col-lg-3">
		@include('App::index.right')
	</div>
</div>
@endsection
@section('scripts')
    <script src="{{mix("plugins/Core/js/user.js")}}"></script>
@endsection