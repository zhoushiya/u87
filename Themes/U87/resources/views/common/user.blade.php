<div class="card mt-3">
  <div class="card-header">
	<h4 class="card-title">推荐会员</h4>
  </div>
  <div class="list-group list-group-flush">
	@foreach(\App\Plugins\User\src\Models\User::query()->orderByDesc('fans')->take(5)->get() as $data)
	<a href="/users/{{$data->username}}.html" class="list-group-item" target="_blank">
	<div class="row align-items-center">
	 <div class="col-auto">
	  <span class="avatar avatar-rounded" style="background-image: url({{super_avatar($data)}})">
	  </span> 
	 </div>
	 <div class="col">
	   <div class="fs-4 d-flex align-items-center"><strong class="text-reset text-decoration-none">{{$data->username}}</strong>
		<span href="/users/group/{{$data->Class->id}}.html" class="d-flex align-items-center tips--top" aria-label="{{$data->class->name}}" style="color:{{$data->class->color}}; ">{!! $data->class->icon !!}</span>
	   </div>
	   <div class="fs-5">{{$data->options->qianming}}</div>
	 </div>
	</div>
	</a>
	@endforeach
  </div>
</div>