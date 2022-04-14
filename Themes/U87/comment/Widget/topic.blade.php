<div class="card w-100" id="comment">
	<div class="card-header">
		<div class="card-title">发表评论</div>
	</div>
	<div class="card-body">
		@if(!auth()->check())
			<div class="btn-list">
			<a href="/login" class="btn" role="button" rel="noreferrer">登录</a>
			<a href="/register" class="btn btn-outline-primary" role="button" rel="noreferrer">
			<svg class="icon icon-tabler icon-tabler-chevrons-right" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path d="M0 0h24v24H0z" stroke="none"/><path d="M7 7l5 5-5 5M13 7l5 5-5 5"/></svg>注册</a>
			</div>
		@else
			<div class="alert alert-important alert-info alert-dismissible" role="alert">
				<div class="d-flex">
					<div>
						<svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><circle cx="12" cy="12" r="9"></circle><line x1="12" y1="8" x2="12.01" y2="8"></line><polyline points="11 12 12 12 12 16 13 16"></polyline></svg>
					</div>
					<div>
						讨论应以学习和精进为目的。请勿发布不友善或者负能量的内容，与人为善，比聪明更重要！
					</div>
				</div>
				<a class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="close"></a>
			</div>
			<div id="topic-comment-model">
				<form action="" method="post" @@submit.prevent="submit">
					<div class="mb-3">
						<div id="topic-comment"></div>
					</div>
					<button class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-checks" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M7 12l5 5l10 -10"></path><path d="M2 12l5 5m5 -5l5 -5"></path></svg> 提交</button>
				</form>
			</div>
		@endif
	</div>
</div>