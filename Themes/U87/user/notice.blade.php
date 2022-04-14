@extends("App::app")
@section('title','我的通知 - '.get_options('web_name', 'CodeFec') )
@section('content')
<div class="row row-cards">
	<div class="col-lg-9">
<div class="card">
 <div class="card-header d-flex align-items-center justify-content-between">
 <ol class="breadcrumb" aria-label="breadcrumbs">
   <li class="breadcrumb-item"><a href="/" class="d-flex align-items-center"><svg xmlns="http://www.w3.org/2000/svg" class="icon w-3 h-3" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path d="M0 0h24v24H0z" stroke="none"/><path d="M5 12H3l9-9 9 9h-2M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2v-7"/><path d="M9 21v-6a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2v6"/></svg>首页</a></li>
   <li class="breadcrumb-item"><a href="/user/draft">我的通知</a></li>
 </ol>
 <a href="javascript:void(0);" u87-click="notice_allread" class="list-group-item-actions tips--left cursor-pointer" aria-label="一键清空未读通知"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M7 12l5 5l10 -10"></path><path d="M2 12l5 5m5 -5l5 -5"></path></svg> </a>
 </div>
 @if($page->count())
<div class="list-group list-group-flush list-group-hoverable"> 
@foreach($page as $value)
	<div class="list-group-item tips--top" aria-label="{{format_date($value->created_at)}} : {{$value->title}}">
	  <div class="row align-items-center">
		<div class="col-auto" >
			<span class="status-dot status-dot-animated status-{{randBg()}}"></span>
		</div>
		{!! $value->content !!}
		@if($value->action)
		<div class="col-auto">
		<a href="javascript:void(0);" u87-click="notice_action" notice-href="{{$value->action}}" notice-id="{{$value->id}}" class="list-group-item-actions tips--top cursor-pointer" aria-label="查看"><svg xmlns="http://www.w3.org/2000/svg" class="icon me-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="2" /><path d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7" /></svg></a>
		</div>
		@endif
		<div class="col-auto">
		<a href="javascript:void(0);" u87-click="notice_read" notice-id="{{$value->id}}" class="list-group-item-actions tips--top cursor-pointer" aria-label="设为已读"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path d="M0 0h24v24H0z" stroke="none"/><path d="M5 12l5 5L20 7"/></svg> </a>
		</div>
	  </div>
	</div>
@endforeach
</div>
    @else
    <div class="empty">
      <div class="empty-img"><img src="/themes/U87/image/notify.svg" alt="" style="width: 12.5rem;height: 12.5rem;"></div>
      <p class="text-muted"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-alert-circle" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path d="M0 0h24v24H0z" stroke="none"/><circle cx="12" cy="12" r="9"/><path d="M12 8v4M12 16h.01"/></svg> 暂无通知</p>
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
<script src="{{mix('plugins/Core/js/user.js')}}"></script>
<script src="{{mix('plugins/U87/js/u87.js')}}"></script>
@endsection