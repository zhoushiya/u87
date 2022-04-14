@extends("App::app")
@section('title','监督举报中心 - '.get_options('web_name', 'CodeFec') )
@section('content')
<div class="row row-cards">
	<div class="col-lg-9">
<div class="card">
 <div class="card-header d-flex align-items-center justify-content-between">
 <ol class="breadcrumb" aria-label="breadcrumbs">
   <li class="breadcrumb-item"><a href="/" class="d-flex align-items-center"><svg xmlns="http://www.w3.org/2000/svg" class="icon w-3 h-3" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path d="M0 0h24v24H0z" stroke="none"/><path d="M5 12H3l9-9 9 9h-2M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2v-7"/><path d="M9 21v-6a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2v6"/></svg>首页</a></li>
   <li class="breadcrumb-item"><a href="/report">监督举报中心</a></li>
 </ol>
 </div>
 @if($page->count())
@foreach($page as $data)
 <article class="col-md-12 p-3 border-bottom hoverable position-relative">
 	<div class="d-flex align-items-center justify-content-between">
 		<div class="d-flex align-items-center">
		<a href="/users/{{$data->user->username}}.html">{!! avatar($data->user->id,"avatar-xs avatar-rounded me-1 me-sm-2") !!}
		</a>
		<div class="d-flex align-items-center me-1 me-sm-3">
		<a href="/users/{{$data->user->username}}.html" class="text-reset me-1"><strong>{{$data->user->username}}</strong></a>
		<a href="/users/group/{{$data->user->Class->id}}.html" target="_blank" class="tips--top" aria-label="{{$data->user->class->name}}" style="color:{{$data->user->class->color}}; ">{!! $data->user->class->icon !!}</a>
		</div>
 		<div class="tips--top" aria-label="创建于 : {{$data->created_at}}">
 		<span class="d-flex align-items-center opacity-50">
 		<svg xmlns="http://www.w3.org/2000/svg" class="icon w-3 h-3 me-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><circle cx="12" cy="12" r="9"></circle><polyline points="12 7 12 12 15 15"></polyline></svg>创建时间 : {{format_date($data->created_at)}}
 		</span>
 		</div> 
 		</div>
		<div class="d-flex align-items-center">
		@if($data->status==="pending")
			<div class="ribbon bg-indigo">待审</div>
		@elseif($data->status==="reject")
			<div class="ribbon bg-red">驳回</div>
		@elseif($data->status==="approve")
			<div class="ribbon bg-green">批准</div>
		@endif
		</div>	
 	</div>
 		<div class="col-md-12 markdown home-article mt-2">
 			<a href="/report/{{$data->id}}.html" class="text-reset">
 			<h2>{{$data->title}}</h2>
 			</a>
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
