<div class="col-auto"><a href="/users/{{$user_data->username}}.html"><span class="avatar" style="background-image: url({{super_avatar($user_data)}})"></span></a></div>
<div class="col text-truncate">
<a href="/users/{{$user_data->username}}.html" class="text-reset">{{$user_data->username}}</a>		
<div class="d-block text-muted text-truncate mt-n1">收藏了你的主题 : <a href="/{{$data->id}}.html">{{$data->title}}</a></div>
</div>