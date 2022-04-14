<ul class="navbar-nav me-xl-5 me-0">
    @foreach (Itf()->get('menu') as $key => $value)
        {{-- 必须是父级菜单 --}}
        @if (!arr_has($value, 'parent_id'))
            @if(arr_has($value,"quanxian") && auth()->check())
                @include('App::layouts.menu.menu-quanxian')
            @else
                @include('App::layouts.menu.menu')
            @endif
        @endif
    @endforeach
</ul>
