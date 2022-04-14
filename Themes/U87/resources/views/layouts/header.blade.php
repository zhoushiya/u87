<header class="navbar navbar-expand-md navbar-light d-print-none sticky-top">
	<div class="container-xl">
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu">
			<span class="navbar-toggler-icon"></span>
		</button>
		<h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
			<a href="/" class="d-flex align-items-center">
				<img src="/themes/U87/image/logo.svg" width="33" height="32" alt="{{ get_options('web_name', 'CodeFec') }}" class="me-2">
			{{ get_options('web_name', 'CodeFec') }}
			</a>
		</h1>
		<div class="navbar-nav flex-row order-md-last">
			@include('App::layouts.header-right')
		</div>
		<div class="collapse navbar-collapse" id="navbar-menu">
			@include('App::layouts.menu')
			@include('App::layouts.search')
		</div>
	</div>
</header>