<div class="col-auto"><a href="/users/{{$user_data->username}}.html"><span class="avatar" style="background-image: url({{super_avatar($user_data)}})"></span></a></div><div class="col text-truncate"><div class="d-flex align-items-center"><a href="/users/{{$user_data->username}}.html" class="text-reset">{{$user_data->username}}</a></div><div class="d-block text-muted text-truncate mt-n1">在 <a href="/{{$data->id}}.html">{{\Hyperf\Utils\Str::limit(remove_bbCode(strip_tags($data->title)),50)}}</a> 中{{$caina}}了你的评论</div></div>