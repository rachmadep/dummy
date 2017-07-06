<!-- main-section -->
	<!-- <div class="main-content"> -->
		<div class="container">
			<div class="row">
				<div id="mySidenav" class="sidenav">
				  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
					<div class="col-md-5 col-lg-4">
						{!! Theme::partial('home-leftbar',compact('trending_tags', 'groups', 'suggested_users', 'suggested_groups', 'suggested_pages')) !!}
					</div>
				</div>

				<!-- Use any element to open the sidenav -->

				<!-- Add all page content inside this div if you want the side nav to push page content to the right (not used if you only want the sidenav to sit on top of the page -->
<div id="main">


				<div class="hidden-small col-md-5 col-lg-4">
					{!! Theme::partial('home-leftbar',compact('trending_tags', 'groups', 'suggested_users', 'suggested_groups', 'suggested_pages')) !!}
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
								{!! Theme::partial('post',compact('post_group', 'post','timeline','next_page_url')) !!}
							@endforeach
						@else
							<div class="no-posts alert alert-warning">{{ trans('common.no_posts') }}</div>
						@endif
					</div>
				</div><!-- /col-md-6 -->

			</div>
</div>
		</div>
	<!-- </div> -->
<!-- /main-section -->

<script type="text/javascript">
/* Set the width of the side navigation to 250px */
function openNav() {
	document.getElementById("mySidenav").style.width = "100%";
}

/* Set the width of the side navigation to 0 */
function closeNav() {
	document.getElementById("mySidenav").style.width = "0";
}
</script>
