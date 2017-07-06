<div class="right-side-section">

	<div class="panel panel-default">
		<div class="panel-body nopadding">
			<div class="mini-profile socialite">
				<div class="background">
					<div class="widget-bg">
						<img src=" @if(Auth::user()->cover) {{ url('user/cover/'.Auth::user()->cover) }} @else {{ url('user/cover/default-cover-user.png') }} @endif" alt="{{ Auth::user()->name }}" title="{{ Auth::user()->name }}">
					</div>
					<div class="avatar-img">
						<img src="{{ Auth::user()->avatar }}" alt="{{ Auth::user()->name }}" title="{{ Auth::user()->name }}">
					</div>
				</div>
				<div class="avatar-profile">
					<div class="avatar-details">
						<h2 class="avatar-name">
							<a href="{{ url(Auth::user()->username) }}">
								{{ '@'.Auth::user()->username }}
							</a>
						</h2>
					</div>
				</div>
				<ul class="activity-list list-inline">
					<li>
						<a href="{{ url(Auth::user()->username.'/posts') }}">
							<div class="activity-name">
								{{ trans('common.posts') }}
							</div>
							<div class="activity-count">
								{{ Auth::user()->posts->count() }}
							</div>
						</a>
					</li>
					<li>
						<a href="{{ url(Auth::user()->username.'/followers') }}">
							<div class="activity-name">
								{{ trans('common.followers') }}
							</div>
							<div class="activity-count">
								{{ Auth::user()->followers->count() }}
							</div>
						</a>
					</li>
					<li>
						<a href="{{ url(Auth::user()->username.'/following') }}">
							<div class="activity-name">
								{{ trans('common.following') }}
							</div>
							<div class="activity-count">
								{{ Auth::user()->following->count() }}
							</div>
						</a>
					</li>
				</ul>
			</div><!-- /mini-profile -->
		</div>
	</div><!-- /panel -->

	<div class="panel panel-default">
		<div class="panel-heading no-bg">
			<h3 class="panel-title">
				Involved Support Groups
			</h3>
		</div>
		<div class="panel-body">
			<div class="user-follow socialite">
				<!-- Each user is represented with media block -->
				@if($suggested_groups != "")

				@foreach($suggested_groups as $suggested_group)

				<div class="media">
					<div class="media-left badge-verification">
						<a href="{{ url($suggested_group->username) }}">
							@if($suggested_group->avatar != NULL)
							<img src="{{ url('group/avatar/'.$suggested_group->avatar) }}" class="img-icon" alt="{{ $suggested_group->name }}" title="{{ $suggested_group->name }}">
							@else
							<img src="{{ url('group/avatar/default-group-avatar.png') }}" class="img-icon" alt="{{ $suggested_group->name }}" title="{{ $suggested_group->name }}">
							@endif
						</a>
					</div>
					<div class="media-body socialte-timeline join-links">
						<h4 class="media-heading"><a href="{{ url($suggested_group->username) }}">{{ $suggested_group->name }} </a>
							<span class="text-muted">{{ '@'.$suggested_group->username }}</span></h4>

						</div>
					</div>
					@endforeach
					@else
					<div class="alert alert-warning">
						{{ trans('messages.no_suggested_groups') }}
					</div>
					@endif

				</div><!-- Suggested groups widget -->
			</div>
		</div><!-- /panel -->

  <div class="panel panel-default">
		<div class="panel-heading no-bg">
			<h3 class="panel-title">
				All Support Groups
			</h3>
		</div>
		<div class="panel-body">
			<div class="user-follow socialite">
				<!-- Each user is represented with media block -->

				@foreach($groups as $group)

				<div class="media">
					<div class="media-left badge-verification">
						<a href="{{ url($group->username) }}">
							@if($group->avatar != NULL)
							<img src="{{ url('group/avatar/'.$group->avatar) }}" class="img-icon" alt="{{ $group->name }}" title="{{ $group->name }}">
							@else
							<img src="{{ url('group/avatar/default-group-avatar.png') }}" class="img-icon" alt="{{ $group->name }}" title="{{ $group->name }}">
							@endif
						</a>
					</div>
					<div class="media-body socialte-timeline join-links">
						<h4 class="media-heading"><a href="{{ url($group->username) }}">{{ $group->name }} </a>
							<span class="text-muted">{{ '@'.$group->username }}</span></h4>

							@if(!$group->users->contains(Auth::user()->id))
									<div class="btn-follow">
										<a href="#" class="btn btn-options btn-block join-user btn-default join" data-timeline-id="{{ $group->timeline_id }}">
											<i class="fa fa-plus"></i> {{ trans('common.join') }}
										</a>
									</div>

									<div class="btn-follow hidden">
										<a href="#" class="btn btn-options btn-block btn-success join-user joined" data-timeline-id="{{ $group->timeline_id }}">
											<i class="fa fa-check"></i>  {{ trans('common.joined') }}
										</a>
									</div>
								@else
									<div class="btn-follow hidden">
										<a href="#" class="btn btn-options btn-block join-user btn-default join " data-timeline-id="{{ $group->timeline_id }}">
											<i class="fa fa-plus"></i>  {{ trans('common.join') }}
										</a>
									</div>

									<div class="btn-follow">
										<a href="#" class="btn btn-options btn-block btn-success join-user joined @if(count($group->admins()) == 1 && $group->is_admin(Auth::user()->id)) disabled @endif ">
											<i class="fa fa-check"></i>  {{ trans('common.joined') }}
										</a>
									</div>
								@endif

						</div>
					</div>
					@endforeach


				</div><!-- Suggested groups widget -->
			</div>
		</div><!-- /panel -->

	<div class="panel panel-default">
		<div class="panel-heading no-bg">
			<h3 class="panel-title">
				{{ trans('common.suggested_people') }}
			</h3>
		</div>
		<div class="panel-body">
			<!-- widget holder starts here -->
			<div class="user-follow socialite">
				<!-- Each user is represented with media block -->
				@if($suggested_users != "")

				@foreach($suggested_users as $suggested_user)

				<div class="media">
					<div class="media-left badge-verification">
						<a href="{{ url($suggested_user->username) }}">
							<img src="{{ $suggested_user->avatar }}" class="img-icon" alt="{{ $suggested_user->name }}" title="{{ $suggested_user->name }}">
							@if($suggested_user->verified)
							<span class="verified-badge bg-success verified-medium">
								<i class="fa fa-check"></i>
							</span>
							@endif
						</a>
					</div>
					<div class="media-body socialte-timeline follow-links">
						<h4 class="media-heading suggested-p"><a href="{{ url($suggested_user->username) }}">{{ '@'.$suggested_user->username }} </a>
						</h4>
							<div class="btn-follow">
								<a href="#" class="btn btn-default follow-user follow" data-timeline-id="{{ $suggested_user->timeline->id }}"> <i class="fa fa-heart"></i> {{ trans('common.follow') }}</a>
							</div>
							<div class="btn-follow hidden">
								<a href="#" class="btn btn-success follow-user unfollow" data-timeline-id="{{ $suggested_user->timeline->id }}"><i class="fa fa-check"></i> {{ trans('common.following') }}</a>
							</div>
						</div>
					</div>
					@endforeach
					@else
					<div class="alert alert-warning">
						{{ trans('messages.no_suggested_users') }}
					</div>
					@endif

				</div>
				<!-- widget holder ends here -->
			</div>
		</div>



			@if(Setting::get('home_ad') != NULL)
			<div id="link_other" class="post-filters">
				{!! htmlspecialchars_decode(Setting::get('home_ad')) !!}
			</div>
			@endif
		</div>


<div class="widget-events widget-left-panel">
	<div class="menu-heading">
		{{ trans('common.most_trending') }}
	</div>
	<div class="categotry-list">
		<ul class="list-unstyled">
			@if($trending_tags != "")
				@foreach($trending_tags as $trending_tag)
				<li><span class="hash-icon"><i class="fa fa-hashtag"></i></span> <a href="{{ url('?hashtag='.$trending_tag->tag) }}">{{ $trending_tag->tag }}</a></li>
				@endforeach
			@else
				<span class="text-warning">{{ trans('messages.no_tags') }}</span>

			@endif
		</ul>
	</div>
</div><!-- /widget-events -->
