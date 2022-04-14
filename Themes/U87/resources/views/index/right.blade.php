<div class="row row-cards">
    <div class="col-md-12">
	@include('App::common.myinfo')
	@include('App::common.tags')
	@include('App::common.user')
    @foreach(Itf()->get("index_right") as $value)
        @include($value)
    @endforeach
	</div>
</div>
