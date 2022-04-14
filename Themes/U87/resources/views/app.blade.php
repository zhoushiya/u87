<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="referrer" content="same-origin">
    <title>@if(request()->path()==="/")@if(get_options('home_title')) @yield("title") {{get_options('home_title')}} @else @yield("title","标题") - {{ get_options('title', config('app_name', 'CodeFec')) }}@endif @else @yield("title","标题") - {{ get_options('title', config('app_name', 'CodeFec')) }} @endif</title>
    <link rel="shortcut icon" href="/themes/U87/favicon.svg" type="image/x-icon" />
    <link href="{{ '/tabler/css/tabler.min.css' }}" rel="stylesheet" />

	@yield('headers')
	@foreach((new \App\CodeFec\Plugins())->getEnPlugins() as $value)
	@if(file_exists(public_path("plugins/".$value."/".$value.".css")))
	<link href="{{ file_hash("plugins/".$value."/".$value.".css") }}" rel="stylesheet" />
	@endif
	@endforeach
	
	<link href="{{ file_hash('themes/U87/css/u87.css') }}" rel="stylesheet" />
	<script src='/js/jquery-3.6.0.min.js'></script>
    <script>
        var csrf_token = "{{ recsrf_token() }}";
        var ws_url = "{{ws_url()}}";
        var login_token = "{{auth()->token()}}";
    </script>
    <meta name="description" content="@yield('description',get_options('description'))">
    <meta name="keywords" content="@yield('keywords',get_options('keywords'))">
</head>
<body class="antialiased">
<div class="page">
@include("App::layouts.header")
@include("App::layouts.errors")
@include("App::layouts._msg")
@yield('header')
<div id="{{ path_class() }}-page" class="page-body">
    <div class="container-xl">
        @yield('content')
    </div>
</div>	
@include("App::layouts.footer")
</div>
<script src="{{ mix('js/vue.js') }}"></script>
<script src="{{ '/tabler/js/tabler.min.js' }}"></script>
@if (get_options('theme_common_require_mithril', 'yes') !== 'no')
<script src="{{ mix('plugins/Core/js/mithril.js') }}"></script>
@endif
<script src="{{ mix('plugins/Core/js/app.js') }}"></script>
@yield('scripts')
@foreach((new \App\CodeFec\Plugins())->getEnPlugins() as $value)
@if(file_exists(public_path("plugins/".$value."/".$value.".js")))
<script src="{{ file_hash('plugins/'.$value.'/'.$value.'.js') }}"></script>
@endif
@endforeach

</body>
</html>
