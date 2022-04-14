<div class="card mt-3">
  <div class="card-header">
	<h4 class="card-title">热门标签</h4>
  </div>
  <div class="list-group list-group-flush">
	@foreach(\App\Plugins\Topic\src\Models\TopicTag::query()->orderByDesc('created_at')->take(5)->get() as $data)
	<a href="/tags/{{$data->id}}.html" class="list-group-item">
	<div class="row align-items-center">
	 <div class="col-auto">
	  <span class="avatar avatar-rounded" style="background-image: url({{$data->icon}})">
	  </span> 
	 </div>
	 <div class="col">
	   <div class="fs-4 d-flex align-items-center"><strong class="text-reset text-decoration-none">{{$data->name}}</strong>
	   </div>
	   <div class="fs-5">{{$data->description}}</div>
	 </div>
	</div>
	</a>
	 @endforeach
  </div>
</div>