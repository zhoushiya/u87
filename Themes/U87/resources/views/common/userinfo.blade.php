<div class="col-md-12">
<div class="card p-0">
	<div class="h-5 position-relative">
	<div class="bom"></div>
	<div class="bom"></div>
	<div class="bom"></div>
	<div class="bom"></div>
	<div class="bom"></div>
	<div class="bom"></div>
	</div>
	<div class="card-body">
		<div class="col-md-12 d-flex align-items-end justify-content-between flex-wrap">
			{!! avatar($user->id,"avatar-2xl border border-5 border-white shadow rounded-3 ") !!}
			<div class="col d-flex align-items-center justify-content-between mt-3 mt-sm-0">
				<div class="d-flex align-items-center ps-sm-3">	
					<span class="col d-flex align-items-center">
					<h2 class="m-0">{{$user->username}}</h2>
					<a href="/users/group/{{$user->Class->id}}.html" target="_blank" class="tips--top ms-1" aria-label="{{$user->class->name}}" style="color:{{$user->class->color}}; ">{!! $user->class->icon !!}</a>
					</span>
					<div class="ms-2 tips--top" aria-label="本站第 {{$user->id}} 位会员">
					<span class="badge badge-outline badge-pill text-azure">NO.{{$user->id}}</span>
					</div>
				</div>
				@if($user->id!=auth()->id())
				<a class="btn btn-primary btn-pill py-1 cursor-pointer" user-click="user_follow" user-id="{{ $user->id }}">
				<svg class="icon me-2" width="24" height="24" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg"><circle cx="24" cy="11" r="7" stroke="currentColor" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/><path d="M4 41c0-8.837 8.059-16 18-16M31.85 28C29.724 28 28 30.009 28 32.486c0 4.487 4.55 8.565 7 9.514 2.45-.949 7-5.027 7-9.514C42 30.01 40.276 28 38.15 28c-1.302 0-2.453.753-3.15 1.906C34.303 28.753 33.152 28 31.85 28z" stroke="currentColor" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/></svg><span>关注</span>
				</a>
				@else
				<a href="/user/setting" class="btn btn-outline-primary">
				 <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit-circle" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path d="M0 0h24v24H0z" stroke="none"/><path d="M12 15l8.385-8.415a2.1 2.1 0 0 0-2.97-2.97L9 12v3h3zM16 5l3 3"/><path d="M9 7.07A7.002 7.002 0 0 0 10 21a7.002 7.002 0 0 0 6.929-5.999"/></svg> 编辑
				</a>
				@endif
			</div>
		</div>
	</div>
</div>
</div>