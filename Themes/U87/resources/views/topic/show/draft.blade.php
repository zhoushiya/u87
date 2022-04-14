@extends("App::app")
@section('title',$data->title)
@section('content')
<div class="row row-cards">
	<div class="col-lg-9">
		<div class="card order-5 mb-3">
			<div class="card-header d-flex align-items-center justify-content-between">
			<ol class="breadcrumb" aria-label="breadcrumbs">
			  <li class="breadcrumb-item"><a href="/" class="d-flex align-items-center"><svg xmlns="http://www.w3.org/2000/svg" class="icon w-3 h-3" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path d="M0 0h24v24H0z" stroke="none"/><path d="M5 12H3l9-9 9 9h-2M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2v-7"/><path d="M9 21v-6a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2v6"/></svg>首页</a></li>
			  <li class="breadcrumb-item"><a href="/user/draft">我的草稿</a></li>
			  <li class="breadcrumb-item" aria-current="page">草稿预览</li>
			</ol>
			</div>
			<div class="card-body">
			<h2>{{ $data->title }}</h2>	
			@include('App::topic.show.info')
			</div>	
			<div class="card-body border-top markdown vditor-reset topic" id="topic-content">
			    {!! ShortCodeR()->handle($data->content) !!}
			</div>
		</div>
	</div>
	<div class="col-lg-3">
		@include('App::common.myinfo')
	</div>
</div>
@endsection
