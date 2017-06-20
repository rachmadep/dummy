<!-- main-section -->
	<!-- <div class="main-content"> -->
		<div class="container">
			<div class="row">
				<div class="col-md-5 col-lg-4">
					{!! Theme::partial('home-leftbar',compact('trending_tags', 'suggested_users', 'suggested_groups', 'suggested_pages')) !!}
				</div>

                <div class="col-md-7 col-lg-7">
			   		@if (Session::has('message'))
				        <div class="alert alert-{{ Session::get('status') }}" role="alert">
				            {!! Session::get('message') !!}
				        </div>
				    @endif


					@if(isset($active_announcement))
						<div class="announcement alert alert-info">
							<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
							<h3>{{ $active_announcement->title }}</h3>
							<p>{{ $active_announcement->description }}</p>
						</div>
					@endif
					{!! Theme::partial('create-post',compact('timeline')) !!}

					<div class="timeline-posts">
						@if($posts->count() > 0)
							@foreach($posts as $post)
								{!! Theme::partial('post',compact('post','timeline','next_page_url')) !!}
							@endforeach
						@else
							<div class="no-posts alert alert-warning">{{ trans('common.no_posts') }}</div>
						@endif
					</div>
				</div><!-- /col-md-6 -->

			</div>
		</div>
	<!-- </div> -->
<!-- /main-section -->
