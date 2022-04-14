<div class="row row-cards justify-content-center">
<div class="col-md-6 col-xl-4">
	<div class="card">
	  <div class="card-body p-4 text-center">
		{!! avatar($data->id,"avatar-xl mb-3 avatar-rounded") !!}
		<h3 class="m-0 mb-1"><a href="/users/{{$data->username}}.html">{{ $data->username }}</a></h3>
		<div class="d-flex align-items-center justify-content-center">
		 <div class="tips--top" aria-label="权限值 : {{$data['class']['permission-value']}}">{!! $data->class->icon !!}</div>
		 <div class="badge badge-outline ms-1" style="color:{{$data->class->color}}; ">{{$data->class->name}}</div>
		</div>
		<div class="mt-3"> <span class="status status-azure"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-users" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path d="M0 0h24v24H0z" stroke="none"/><circle cx="9" cy="7" r="4"/><path d="M3 21v-2a4 4 0 0 1 4-4h4a4 4 0 0 1 4 4v2M16 3.13a4 4 0 0 1 0 7.75M21 21v-2a4 4 0 0 0-3-3.85"/></svg>{{$data->fans}} 位粉丝</span></div>
		<div class="position-absolute top-0 end-0 me-2 mt-2 tips--bottom" aria-label="加入时间:{{$data->created_at}}">
		<span class="status status-lime opacity-50">
		<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><circle cx="12" cy="12" r="9"></circle><polyline points="12 7 12 12 15 15"></polyline></svg>{{format_date($data->created_at)}}
		</span>
		</div>
		<div class="position-absolute top-0 start-0 ms-2 mt-2 tips--bottom" aria-label="本站第 {{$data->id}} 位会员">
		<span class="status status-indigo opacity-50">
		 <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path d="M0 0h24v24H0z" stroke="none"/><circle cx="12" cy="7" r="4"/><path d="M6 21v-2a4 4 0 0 1 4-4h4a4 4 0 0 1 4 4v2"/></svg> NO.{{$data->id}}
		</span>
		</div>
	  </div>
	  <div class="d-flex">
		<a  class="card-btn cursor-pointer" user-click="user_follow" user-id="{{$data->id}}"><svg class="icon me-2" width="24" height="24" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg"><circle cx="24" cy="11" r="7" stroke="currentColor" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/><path d="M4 41c0-8.837 8.059-16 18-16M31.85 28C29.724 28 28 30.009 28 32.486c0 4.487 4.55 8.565 7 9.514 2.45-.949 7-5.027 7-9.514C42 30.01 40.276 28 38.15 28c-1.302 0-2.453.753-3.15 1.906C34.303 28.753 33.152 28 31.85 28z" stroke="currentColor" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/></svg> 关注</a>
		<a href="/users/{{$data->username}}.html" class="card-btn"><svg class="icon me-2" width="24" height="24" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg"><rect x="4" y="8" width="40" height="32" rx="2" stroke="currentColor" stroke-width="4" stroke-linejoin="round"/><path d="M17 25a4 4 0 1 0 0-8 4 4 0 0 0 0 8z" stroke="currentColor" stroke-width="4" stroke-linejoin="round"/><path d="M23 31a6 6 0 0 0-12 0M28 20h8M30 28h6" stroke="currentColor" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/></svg> 资料</a>
	  </div>
	</div>
</div>
</div>