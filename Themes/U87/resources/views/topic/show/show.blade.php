@extends("App::app")
@section('title',$data->title)
@section('description',\Hyperf\Utils\Str::limit(core_default(deOptions($data->options)["summary"],"暂无摘要"),300))
@section('keywords',$data->title.','.$data->user->username.','.\Hyperf\Utils\Str::limit(core_default(deOptions($data->options)["summary"],"暂无摘要"),300))
@section('content')
<div class="row row-cards">
	<div class="col-lg-9">
		@include('App::topic.show.content')
	</div>
	<div class="col-lg-3">
		@include('App::topic.show.right')
	</div>
</div>
@endsection
@section('headers')
    <link rel="stylesheet" href="{{ mix('plugins/Topic/css/app.css') }}">
@endsection
@section('scripts')
    <script>var topic_id={{$data->id}}</script>
    @if($comment_page)
        <script>var comment_id={{$comment_page}}</script>
    @endif
    <script src="{{mix('plugins/Topic/js/topic.js')}}"></script>
    <script src="{{mix('plugins/Topic/js/core.js')}}"></script>
    <script src="{{mix('plugins/Comment/js/topic.js')}}"></script>
	<script src="{{mix('plugins/U87/js/u87.js')}}"></script>
@endsection
