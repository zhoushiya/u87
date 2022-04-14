@if(count(getFlink()))
<div class="card mt-3">
  <div class="card-header">
	<h4 class="card-title">友情链接</h4>
  </div>
  <div class="list-group list-group-flush">
	<div class="list-group-item"> 
	@foreach(getFlink() as $data)
	<a href="{{$data->link}}">
	<span class="status status-{{randBg()}}">
	  <span class="status-dot"></span>
	  {{$data->name}}
	</span>
	</a>
	@endforeach
	</div>
  </div>
</div>
@endif