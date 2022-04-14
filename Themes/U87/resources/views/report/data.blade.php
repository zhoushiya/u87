@extends("App::app")
@section('title',$data->title.'的举报详情 - 监督举报中心 - '.get_options('web_name', 'CodeFec') )
@section('content')
<div class="row row-cards">
	<div class="col-lg-9">
<div class="card">
 <div class="card-header d-flex align-items-center justify-content-between">
 <ol class="breadcrumb" aria-label="breadcrumbs">
   <li class="breadcrumb-item"><a href="/" class="d-flex align-items-center"><svg xmlns="http://www.w3.org/2000/svg" class="icon w-3 h-3" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path d="M0 0h24v24H0z" stroke="none"/><path d="M5 12H3l9-9 9 9h-2M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2v-7"/><path d="M9 21v-6a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2v6"/></svg>首页</a></li>
   <li class="breadcrumb-item"><a href="/report">监督举报中心</a></li>
   <li class="breadcrumb-item" aria-current="page">{{$data->title}}举报详情</li>
 </ol>
 </div>
 <div class="card-body position-relative">
 <h2>{{ $data->title }}</h2>	
 @if($data->status==="pending")
 	<div class="ribbon bg-indigo">待审</div>
 @elseif($data->status==="reject")
 	<div class="ribbon bg-red">驳回</div>
 @elseif($data->status==="approve")
 	<div class="ribbon bg-green">批准</div>
 @endif
 </div>	
 <div class="card-body border-top markdown vditor-reset topic" id="topic-content">
     {!! ShortCodeR()->handle($data->content) !!}
 </div>
 @if(auth()->check() && Authority()->check("admin_report"))
 	<div class="card-footer" id="report-data-card-footer">
 		<button @click="submit" class="btn" :class="{'btn-primary':btn.class.isPrimary,'btn-danger':btn.class.isDanger}"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-checks" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M7 12l5 5l10 -10"></path><path d="M2 12l5 5m5 -5l5 -5"></path></svg> @{{ btn.text }}</button>
 		<button style="margin-left:5px" @click="remove" class="btn btn-dark"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path d="M0 0h24v24H0z" stroke="none"/><path d="M18 6L6 18M6 6l12 12"/></svg> 删除</button>
 	</div>
 @endif
</div>
	</div>
	<div class="col-lg-3">
		@include('App::common.myinfo')
	</div>
</div>
@endsection
@section('scripts')
    <script> var report_id = "{{$data->id}}" </script>
    <script src="{{mix('plugins/Core/js/report.js')}}"></script>
@endsection