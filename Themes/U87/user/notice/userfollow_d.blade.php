<div class="col-auto"><a href="/users/{{$user_data->username}}.html"><span class="avatar" style="background-image: url({{super_avatar($user)}})"></span></a></div>
<div class="col-auto">
<a href="/users/{{$user->username}}.html" class="text-reset">{{$user->username}}</a>
<div class="d-block text-muted text-truncate mt-n1">对你取消了关注!</div></div>
<div class="col text-truncate">
<a class="badge badge-outline text-blue cursor-pointer" user-click="user_follow" user-id="{{ $user->id }}">
<span>关注</span>
</a></div>