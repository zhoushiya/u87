@extends("App::app")
@if($title)
    @section('title',$title." - ")
@endif
@section('content')
<div class="row row-cards">
	<div class="col-lg-9">
		@include('App::index.index')
	</div>
	<div class="d-none d-lg-block col-lg-3">
		@include('App::index.right')
	</div>
</div>
<div class="w-100 d-block d-sm-none position-fixed bottom-0 mb-5">
	<div class="d-flex justify-content-center">
	<a href="/topic/create" class="btn btn-primary btn-pill shadow-sm py-1" role="button" rel="noreferrer">
	 <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-pencil" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path d="M0 0h24v24H0z" stroke="none"/><path d="M4 20h4L18.5 9.5a1.5 1.5 0 0 0-4-4L4 16v4M13.5 6.5l4 4"/></svg> 发表</a>
	 </div>
</div>
@endsection
@section('scripts')
    <script src="{{mix('plugins/Topic/js/core.js')}}"></script>
	<script src="{{mix('plugins/U87/js/u87.js')}}"></script>
@endsection