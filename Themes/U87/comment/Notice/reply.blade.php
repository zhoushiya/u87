<div class="col-auto"><a href="/users/{{$user_data->username}}.html"><span class="avatar" style="background-image: url({{super_avatar($user_data)}})"></span></a></div>
<div class="col text-truncate">
<div class="d-flex align-items-center">
<a href="/users/{{$user_data->username}}.html" class="text-reset">{{$user_data->username}}</a>
<span class="d-flex align-items-center opacity-50 ms-1">
<svg xmlns="http://www.w3.org/2000/svg" class="icon w-3 h-3 me-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><circle cx="12" cy="12" r="9"></circle><polyline points="12 7 12 12 15 15"></polyline></svg>{{format_date($data->created_at)}}
</span></div>
<div class="d-block text-muted text-truncate mt-n1">回复了 : {{\Hyperf\Utils\Str::limit(remove_bbCode(strip_tags($data->content)),100)}}</div>
</div>