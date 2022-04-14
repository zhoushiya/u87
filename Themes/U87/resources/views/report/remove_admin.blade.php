<div class="col-auto"><a href="/users/{{$user->username}}.html"><span class="avatar" style="background-image: url({{super_avatar($user)}})"></span></a></div>
<div class="col text-truncate">
<div class="d-flex align-items-center">
<a href="/users/{{$user->username}}.html" class="text-reset">{{$user->username}}</a>
<span class="d-flex align-items-center opacity-50 ms-1">
<svg xmlns="http://www.w3.org/2000/svg" class="icon w-3 h-3 me-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><circle cx="12" cy="12" r="9"></circle><polyline points="12 7 12 12 15 15"></polyline></svg>{{format_date($data->created_at)}}
</span></div>
<div class="d-block text-muted text-truncate mt-n1"><a href="javascript:void(0);" data-bs-toggle="dropdown" aria-label="Open user menu">查看被删除的举报快照</a>
<div class="dropdown-menu dropdown-menu-arrow">
<div class="row align-items-center p-2">
<div class="d-flex align-items-center">
<a href="/users/{{$data->user->username}}.html" class="d-flex align-items-center text-reset">{!! avatar($data->user->id,"avatar-xs avatar-rounded me-1") !!}{{$data->user->username}}</a>
<span class="d-flex align-items-center opacity-50 ms-1">
<svg xmlns="http://www.w3.org/2000/svg" class="icon w-3 h-3 me-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><circle cx="12" cy="12" r="9"></circle><polyline points="12 7 12 12 15 15"></polyline></svg>{{format_date($data->created_at)}}
</span></div>
<div class="text-muted text-truncate mt-2 border-top">{!! $data->content !!}</div>
</div>
</div>
</div>	
</div>