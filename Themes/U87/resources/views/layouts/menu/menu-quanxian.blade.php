@if (!core_menu_pd($key))
    @if(@auth()->Class()['permission-value']>=$value['quanxian'])
        @include('App::layouts.menu.single')
    @endif
@else
    @if(auth()->Class()['permission-value']>=$value['quanxian'])
        @include('App::layouts.menu.multiple')
    @endif
@endif
