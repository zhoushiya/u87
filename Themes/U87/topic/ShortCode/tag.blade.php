<div class="row row-cards justify-content-center">
	<div class="col-md-6">
		<div class="card" style="border-color:{{ $value->color }}">
			<div class="card-body p-1 p-md-3">
				<div class="row">
					<div class="col-auto">
						<span class="avatar avatar-md avatar-rounded" style="background-image: url({{ $value->icon }})"></span>
					</div>
					<div class="col">
						<a href="/tags/{{ $value->id }}.html"
							class="card-title text-h2 m-0">{{ $value->name }}</a>
						{{ \Hyperf\Utils\Str::limit(core_default($value->description, '暂无描述'), 32) }}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>