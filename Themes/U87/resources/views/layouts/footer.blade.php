<footer class="footer footer-transparent d-print-none">
  <div class="container-xl">
	<div class="row text-center align-items-center flex-row-reverse">
	  <div class="col-lg-auto ms-lg-auto">
		<ul class="list-inline mb-0">
		  <li class="list-inline-item">
			<a href="https://portal.qiniu.com/signup?code=3lqtwq7wanb6a" target="_blank" class="link-secondary tips--top" rel="noopener" aria-label="推荐使用七牛云存储">
			 <svg class="icon" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg" width="200" height="200"><path d="M102 238.8c60.7 46.9 130.8 97.4 191.5 144.4 4.1-3.1 7-86.1 10.6-88.6 11.5 15.1 31.2 29.3 32.9 45.4 6.5 59.4 45 73.8 94.9 79.7 173.3 20.6 322.9-27.3 446.7-151.8 11.4-11.5 24.6-21.2 43.3-37.2-32.2 191.7-249 306-533.7 286.3 16.9 59.7 31.2 117.5 50.6 173.6 4.2 12.1 26.1 21.9 41.5 25.3 19.9 4.4 41.5-.1 62.2 1.6 40.8 3.3 61-14.5 70.3-54.6 10.6-46.2 19.6-96.6 77.8-110.5 6-1.4 12.4-1.4 29.3-3.1-9.9 64.5-15.3 126.2-29.9 185.6-9.5 38.5-43.1 58.2-84.7 58.4-52.9.2-105.8.5-158.6 0-63.2-.6-97.4-30.7-106-94-7.8-57.1-14.7-114.3-20.6-171.7-3-28.9-13.2-48.5-40.5-64.4-86.4-50.9-148.5-123.7-177.6-224.4z"/></svg>
			</a>
		  </li>
		</ul>
	  </div>
	  <div class="col-12 col-lg-auto mt-3 mt-lg-0">
		<ul class="list-inline mb-0">
		 <li class="list-inline-item">
		     Copyright &copy; {{ date('Y') }}
		     <a href="/" class="link-secondary">{{ get_options('web_name', 'CodeFec') }}</a> 
		 </li>
		  @if(get_options("icp",null))
		     <li class="list-inline-item">
		         <a href="https://beian.miit.gov.cn" class="link-secondary" rel="noopener">{{get_options("icp")}}</a>
		     </li>
		 @endif
		 @if(get_options("ga_icp",null))
		     <li class="list-inline-item">
		         <img src="/themes/U87/image/beian.png"  alt="公安备案"/>
		         <a href="http://www.beian.gov.cn/portal/registerSystemInfo?recordcode={{get_num(get_options("ga_icp"))}}" class="link-secondary" rel="noopener">{{get_options("ga_icp")}}</a>
		     </li>
		 @endif
		</ul>
	  </div>
	</div>
  </div>
</footer>