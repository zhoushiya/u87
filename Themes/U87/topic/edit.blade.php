@extends("App::app")
@section('title', '编辑主题:'.$data['title'])
@section('content')
<div id="edit-topic-vue">
	<form action="" method="post" @@submit.prevent="submit">
		<div class="row row-cards">
			<div class="col-lg-9">
				<div class="card">
				<div class="card-header d-flex align-items-center justify-content-between">
				<ol class="breadcrumb" aria-label="breadcrumbs">
				  <li class="breadcrumb-item"><a href="/" class="d-flex align-items-center"><svg xmlns="http://www.w3.org/2000/svg" class="icon w-3 h-3" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path d="M0 0h24v24H0z" stroke="none"/><path d="M5 12H3l9-9 9 9h-2M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2v-7"/><path d="M9 21v-6a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2v6"/></svg>首页</a></li>
				  <li class="breadcrumb-item"><a href="/tags/{{$data->tag->id}}.html" class="d-flex align-items-center">
					<img src="{{$data->tag->icon}}" class="avatar avatar-xs tag-icon avatar-rounded me-1" alt="{{$data->tag->name}}">{{$data->tag->name}}</a></li>
				  <li class="breadcrumb-item" aria-current="page"><a href="javascript:void(0);">编辑主题</a></li>
				</ol>
				</div>
				<div class="card-body">
					<div class="form-floating mb-3">
					  <input type="text" class="form-control" v-model="title" required autocomplete="off">
					  <label for="floating-input">标题</label>
					</div>
					<div class="form-floating">
					  <select class="form-select" id="select-tags" v-model="tag_selected" aria-label="选择标签">
						<option v-for="option in tags" :data-custom-properties="option.icons" :value="option.value">
							@{{ option . text }}
						</option>
					  </select>
					  <label for="floatingSelect">选择标签</label>
					</div>
					<div class="btn-group mt-3 mb-1 w-100">
					@include('Topic::create-toolbar')
					</div>
					<div class="mb-3">
						<div id="content-vditor"></div>
					</div>
					<div class="d-flex align-items-center justify-content-between mb-3">
						<button class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-checks" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M7 12l5 5l10 -10"></path><path d="M2 12l5 5m5 -5l5 -5"></path></svg> 提交</button>
						<button type="button" @@click="draft" class="btn btn-outline-danger"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-writing" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path d="M0 0h24v24H0z" stroke="none"/><path d="M20 17V5c0-1.121-.879-2-2-2s-2 .879-2 2v12l2 2 2-2zM16 7h4M18 19H5a2 2 0 1 1 0-4h4a2 2 0 1 0 0-4H6"/></svg> 存为草稿</button>
					</div>
				</div>
				</div>
			</div>
		   <div class="d-none d-lg-block col-lg-3">
			<div class="row row-cards">
				<div class="col-md-12">
				@include('App::common.myinfo')
				@foreach ($right as $value)
					@include($value)
				@endforeach
				</div>
			</div>
		   </div>
		</div>
	</form>
</div>
@endsection
@section('scripts')
    <script type="text/javascript">
        var imageUpUrl = "/user/upload/image?_token={{ csrf_token() }}";
        var topic_id = {{$data->id}};
    </script>
    <script src="{{ mix('plugins/Topic/js/topic.js') }}"></script>
@endsection
@section('headers')
    <link rel="stylesheet" href="{{ mix('plugins/Topic/css/app.css') }}">
@endsection
