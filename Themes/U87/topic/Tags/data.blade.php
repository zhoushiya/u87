@extends("App::app")
@section('title', $data->name.' - '.get_options('web_name', 'CodeFec') )
@section('description',get_options('web_name', 'CodeFec').'是'.get_options('title', config('app_name', 'CodeFec')).','.$data->name.'是其中一个标签.' )
@section('keywords', $data->name.','.get_options('title', config('app_name', 'CodeFec')).','.get_options('web_name', 'CodeFec') )
@section('content')
<div class="row row-cards">
	<div class="col-lg-9">
		@include('Topic::Tags.data.index')
	</div>
	<div class="d-none d-lg-block col-lg-3">
		@include('Topic::Tags.data.right')
	</div>
</div>
@endsection
@section('scripts')
	<script src="{{mix('plugins/U87/js/u87.js')}}"></script>
@endsection