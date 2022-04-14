<div class="row row-cards">
    <div class="col-md-12">
		<div class="card mb-3">
		  <div class="card-body p-4 text-center">
			<span class="avatar avatar-xl mb-3 avatar-rounded" style="background-image: url({{ $data->icon }})"></span>
			<h3 class="m-0 mb-1">{{$data->name}}</h3>
			<div class="mt-3">{{core_default($data->description,get_options("description","无描述"))}}</div>
			<span class="status status-green position-absolute top-0 start-0 ms-2 mt-2">
			  <svg xmlns="http://www.w3.org/2000/svg" class="icon  w-3 h-3" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M11 3l9 9a1.5 1.5 0 0 1 0 2l-6 6a1.5 1.5 0 0 1 -2 0l-9 -9v-4a4 4 0 0 1 4 -4h4"></path><circle cx="9" cy="9" r="2"></circle></svg> 当前标签
			</span>
		  </div>
		</div>
	@include('App::index.right')
	</div>
</div>