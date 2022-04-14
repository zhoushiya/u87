<div class="card mt-3">
  <div class="card-header p-2">
	<span class="status status-azure">
	<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path d="M0 0h24v24H0z" stroke="none"/><path d="M14 3v4a1 1 0 0 0 1 1h4"/><path d="M17 21H7a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h7l5 5v11a2 2 0 0 1-2 2zM12 10v4M10 12h4M10 17h4"/></svg> 上下主题
	</span>
  </div>
  <div class="list-group list-group-flush">
	@if ($get_topic['shang'])
		<a href="/{{$get_topic['shang']['id']}}.html" class="list-group-item tips--top" aria-label="上一篇主题">
		<div class="row align-items-center">
		 <div class="col-auto">
		  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><polyline points="15 6 9 12 15 18"></polyline></svg>
		 </div>
		<div class="col text-truncate">
		  {{ \Hyperf\Utils\Str::limit($get_topic['shang']['title'], 50, '...') }}
		 </div>
		</div>
		</a>
	@else
		<a class="list-group-item tips--top" aria-label="上一篇主题">
		<div class="row align-items-center">
		 <div class="col-auto">
		  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><polyline points="15 6 9 12 15 18"></polyline></svg>
		 </div>
		 <div class="col">
		 暂无
		 </div>
		</div>
		</a>	
	@endif
	@if ($get_topic['xia'])
	<a href="/{{$get_topic['xia']['id']}}.html" class="list-group-item tips--top" aria-label="下一篇主题">
	<div class="row align-items-center">
	 <div class="col-auto">
	 <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><polyline points="9 6 15 12 9 18"></polyline></svg>
	 </div>
	 <div class="col text-truncate">
	  {{ \Hyperf\Utils\Str::limit($get_topic['xia']['title'], 50, '...') }}
	 </div>
	</div>
	</a>	
	@else
	<a class="list-group-item tips--top" aria-label="下一篇主题">
	<div class="row align-items-center">
	 <div class="col-auto">
	 <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><polyline points="9 6 15 12 9 18"></polyline></svg>
	 </div>
	 <div class="col">
	  暂无
	 </div>
	</div>
	</a>	
	@endif
  </div>
</div>