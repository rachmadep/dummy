<!-- main-section -->

	<div class="container">
		<div class="row">
			<div class="col-md-11">
				@if($timeline->type == "user")
				{!! Theme::partial('user-header',compact('user','timeline','liked_pages','joined_groups','followRequests','following_count','followers_count',
						'follow_confirm','user_post','joined_groups_count')) !!}
				@elseif($timeline->type == "page")
				{!! Theme::partial('page-header',compact('page','timeline')) !!}
				@else
				{!! Theme::partial('group-header',compact('timeline','group')) !!}
				@endif

				<div class="row">
					<div class="timeline">
						<div class="col-md-4">
							@if($timeline->type == "user")
							{!! Theme::partial('user-leftbar',compact('timeline','user','post_group','follow_user_status','own_pages','own_groups')) !!}
							@elseif($timeline->type == "page")
							{!! Theme::partial('page-leftbar',compact('timeline','page','page_members')) !!}
							@else
							{!! Theme::partial('group-leftbar',compact('timeline','group','post_group','group_members')) !!}
							@endif
						</div>

						<!-- Post box on timeline,page,group -->
						<div class="col-md-8">

							@if($timeline->type == "user" && $timeline_post == true)
								{!! Theme::partial('create-post',compact('timeline')) !!}

							@elseif($timeline->type == "page")
								@if(($page->timeline_post_privacy == "only_admins" && $page->is_admin(Auth::user()->id)) || ($page->timeline_post_privacy == "everyone"))
									{!! Theme::partial('create-post',compact('timeline')) !!}
								@elseif($page->timeline_post_privacy == "everyone")
									{!! Theme::partial('create-post',compact('timeline')) !!}
								@endif

							@elseif($timeline->type == "group")
								@if(($group->post_privacy == "only_admins" && $group->is_admin(Auth::user()->id)))
								{!! Theme::partial('create-post',compact('timeline')) !!}
								@elseif(($group->post_privacy == "members" && Auth::user()->get_group($group->id)->pivot->status == 'approved'))
								{!! Theme::partial('create-post',compact('timeline')) !!}
								@else
								{!! Theme::partial('create-post',compact('timeline')) !!}
								@endif
							@endif

							<div class="timeline-posts">
								@if(count($posts) > 0)
									@if($user_post == true || $user_post == "page" || $user_post == "group")
	 									@foreach($posts as $post)
	 										{!! Theme::partial('post',compact('post','timeline','next_page_url','user')) !!}
	 									@endforeach
	 								@endif
								@else
								<div class="no-posts alert alert-warning">{{ trans('messages.no_posts') }}</div>
								@endif
							</div>
						</div>
					</div>
				</div><!-- /row -->
			</div><!-- /col-md-10 -->


		</div><!-- /row -->
	</div>
