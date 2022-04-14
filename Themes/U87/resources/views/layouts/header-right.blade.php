<div class="nav-item d-none d-lg-flex me-3">
	<a href="/topic/create" class="btn btn-primary btn-pill shadow-sm py-1" role="button" rel="noreferrer">
	 <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-pencil" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path d="M0 0h24v24H0z" stroke="none"/><path d="M4 20h4L18.5 9.5a1.5 1.5 0 0 0-4-4L4 16v4M13.5 6.5l4 4"/></svg> 发表</a>
</div>
<div class="nav-item d-md-flex me-2 theme-switch-btns">
		<a id="theme-light" class="nav-link px-0 theme-btn tips--bottom" data-index="0" href="javascript:void(0);" aria-label="夜间模式" style="display:none">
		<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z"></path></svg>
		</a>
		<a id="theme-dark" class="nav-link px-0 theme-btn tips--bottom" data-index="1" href="javascript:void(0);" aria-label="白天模式" style="display:none">
		<svg class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path d="M0 0h24v24H0z" stroke="none"/><circle cx="12" cy="12" r="4"/><path d="M3 12h1m8-9v1m8 8h1m-9 8v1M5.6 5.6l.7.7m12.1-.7l-.7.7m0 11.4l.7.7m-12.1-.7l-.7.7"/></svg>
		</a>
		<a style="display: none;" id="default_light_theme" data-value="light"></a>
		<a style="display: none;" id="default_dark_theme" data-value="dark"></a>
		<script type="text/javascript">
		!function(){const t=$(".theme-switch-btns .theme-btn").length;let e=[];$(".theme-switch-btns .theme-btn").each(function(){e.push($(this).attr("id"))});let a="theme-"+$("#default_light_theme").data("value");window.matchMedia&&window.matchMedia("(prefers-color-scheme: dark)").matches&&(a="theme-"+$("#default_dark_theme").data("value"));let h=localStorage.getItem("theme")||a;-1==e.indexOf(h)&&(h=$(".theme-switch-btns .theme-btn[data-index=0]").attr("id")),function(e){const a=$("body"),h=$(`.theme-switch-btns a#${e}`);localStorage.setItem("theme",e),$(".theme-switch-btns .theme-btn").click(function(){let e=parseInt($(this).data("index"))+1;e>=t&&(e=0);const h=$(`a.theme-btn[data-index=${e}]`),s=h.attr("id"),n=$(this).attr("id");$(this).hide(),h.show(),a.removeClass(n),a.addClass(s),localStorage.setItem("theme",s)}),function(t,e){const a=t[0].className.replace(e,"");t[0].className=a}(a,/^theme-/),a.addClass(e),h.show()}(h)}();
		</script>
</div>
@if(auth()->check())
    <div class="nav-item dropdown d-none d-md-flex me-3">
        <a href="/user/notice" class="px-0 nav-link tips--bottom"  aria-label="@if(\App\Plugins\User\src\Models\UsersNotice::query()->where(['user_id'=>auth()->id(),'status'=>'publish'])->count()) 有 {{\App\Plugins\User\src\Models\UsersNotice::query()->where(['user_id'=>auth()->id(),'status'=>'publish'])->count()}} 条@else暂无@endif未读消息">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 5a2 2 0 0 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6" /><path d="M9 17v1a3 3 0 0 0 6 0v-1" /></svg>
            <span id="core-notice-red" class="badge bg-red" style="display: none;"></span>
        </a>
    </div>
    <div id="vue-header-right-my" class="nav-item dropdown">
        <a href="javascript:void(0);" class="p-0 nav-link d-flex lh-1 text-reset" data-bs-toggle="dropdown" aria-label="Open user menu">
            {!! avatar(auth()->id(),"avatar-sm") !!}
        </a>
        <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
            <a href="/user" class="dropdown-item"><svg xmlns="http://www.w3.org/2000/svg" class="icon dropdown-item-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path d="M0 0h24v24H0z" stroke="none"/><path d="M19 8.71l-5.333-4.148a2.666 2.666 0 0 0-3.274 0L5.059 8.71a2.665 2.665 0 0 0-1.029 2.105v7.2a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-7.2c0-.823-.38-1.6-1.03-2.105M16 15c-2.21 1.333-5.792 1.333-8 0"/></svg>个人中心</a>
            <a href="/users/fav/{{auth()->data()['username']}}.html" class="dropdown-item"><svg xmlns="http://www.w3.org/2000/svg" class="icon dropdown-item-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path d="M0 0h24v24H0z" stroke="none"/><path d="M12 17.75l-6.172 3.245 1.179-6.873-5-4.867 6.9-1 3.086-6.253 3.086 6.253 6.9 1-5 4.867 1.179 6.873z"/></svg>我的收藏</a>
            <a href="/user/draft" class="dropdown-item"><svg xmlns="http://www.w3.org/2000/svg" class="icon dropdown-item-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path d="M0 0h24v24H0z" stroke="none"/><path d="M14 3v4a1 1 0 0 0 1 1h4"/><path d="M17 21H7a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h7l5 5v11a2 2 0 0 1-2 2zM12 10v4M10 12h4M10 17h4"/></svg>我的草稿</a>
            <a href="/user/setting" class="dropdown-item"><svg xmlns="http://www.w3.org/2000/svg" class="icon dropdown-item-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z"></path><circle cx="12" cy="12" r="3"></circle></svg>个人设置</a>
			 <div class="dropdown-divider"></div>
            <a href="javascript:void(0);" @@click="Logout" class="dropdown-item"><svg xmlns="http://www.w3.org/2000/svg" class="icon dropdown-item-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path d="M0 0h24v24H0z" stroke="none"/><path d="M14 8V6a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2-2v-2"/><path d="M7 12h14l-3-3m0 6l3-3"/></svg>退出登录</a>
        </div>
    </div>
@else
  <div class="nav-item d-md-flex ms-3">
  <div class="btn-list">
    <a href="/login" class="btn" role="button" rel="noreferrer">登录</a>
    <a href="/register" class="btn btn-outline-primary d-none d-lg-flex" role="button" rel="noreferrer">
  	<svg class="icon icon-tabler icon-tabler-chevrons-right" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path d="M0 0h24v24H0z" stroke="none"/><path d="M7 7l5 5-5 5M13 7l5 5-5 5"/></svg>注册</a>
  </div>
  </div>
@endif
