<div class="card mb-3 d-none d-lg-block ">
  <div class="card-header p-2">
	<span class="status status-green">
	<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M11 3l9 9a1.5 1.5 0 0 1 0 2l-6 6a1.5 1.5 0 0 1 -2 0l-9 -9v-4a4 4 0 0 1 4 -4h4"></path><circle cx="9" cy="9" r="2"></circle></svg> 当前标签
	</span>
  </div>
  <div class="list-group list-group-flush">
	<a href="/tags/{{$data->tag->id}}.html" class="list-group-item">
	<div class="row align-items-center">
	 <div class="col-auto">
	  <span class="avatar avatar-rounded" style="background-image: url({{$data->tag->icon}})">
	  </span> 
	 </div>
	 <div class="col">
	   <div class="fs-4 d-flex align-items-center"><strong>{{$data->tag->name}}</strong>
	   </div>
	   <div class="fs-5">{{ \Hyperf\Utils\Str::limit(core_default($data->tag->description, '暂无描述'), 32) }}</div>
	 </div>
	</div>
	</a>
</div>
</div>