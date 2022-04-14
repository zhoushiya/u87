@extends("App::app")
@section('title', '帖子标签')
@section('description', '本站帖子标签列表')
@section('keywords', '本站帖子标签列表')
@section('content')
<div class="row row-cards">
	<div class="col-lg-9">
		<div class="card">
		<div class="card-header d-flex align-items-center justify-content-between">
		<ol class="breadcrumb" aria-label="breadcrumbs">
		  <li class="breadcrumb-item"><a href="/" class="d-flex align-items-center"><svg xmlns="http://www.w3.org/2000/svg" class="icon w-3 h-3" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path d="M0 0h24v24H0z" stroke="none"/><path d="M5 12H3l9-9 9 9h-2M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2v-7"/><path d="M9 21v-6a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2v6"/></svg>首页</a></li>
		  <li class="breadcrumb-item" aria-current="page"><a href="javascript:void(0);" class="d-flex align-items-center"><svg xmlns="http://www.w3.org/2000/svg" class="icon  w-3 h-3" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M11 3l9 9a1.5 1.5 0 0 1 0 2l-6 6a1.5 1.5 0 0 1 -2 0l-9 -9v-4a4 4 0 0 1 4 -4h4"></path><circle cx="9" cy="9" r="2"></circle></svg> 标签列表</a></li>
		</ol>
		</div>
		<div class="row row-cards p-3">
		@if ($page->count())
		    @foreach ($page as $value)
			<div class="col-md-6 col-xl-4">
				<div class="card" style="border-color:{{ $value->color }}">
					<div class="card-body">
						<div class="row">
							<div class="col-auto">
								<span class="avatar avatar-lg avatar-rounded" style="background-image: url({{ $value->icon }})"></span>
							</div>
							<div class="col">
								<a href="/tags/{{ $value->id }}.html"
									class="card-title text-h2">{{ $value->name }}</a>
								{{ \Hyperf\Utils\Str::limit(core_default($value->description, '暂无描述'), 32) }}
							</div>
						</div>
					</div>
				</div>
			</div>
		    @endforeach
		@else
		<div class="empty">
		  <div class="empty-img"><img src="/themes/U87/image/web.svg" alt="" style="width: 12.5rem;height: 12.5rem;"></div>
		  <div class="text-muted"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-alert-circle" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path d="M0 0h24v24H0z" stroke="none"/><circle cx="12" cy="12" r="9"/><path d="M12 8v4M12 16h.01"/></svg> 暂无标签</div>
		</div>
		@endif
		{!! make_page($page) !!}
		</div>
		</div>
	</div>
	<div class="d-none d-lg-block col-lg-3">
		@include('App::index.right')
	</div>
</div>
@endsection
