<div class="right-side-section">

	<div class="panel panel-default">
		<div class="panel-body nopadding">
			<div class="mini-profile socialite">
				<div class="background">
					<div class="widget-bg">
						<img src=" <?php if(Auth::user()->cover): ?> <?php echo e(url('user/cover/'.Auth::user()->cover)); ?> <?php else: ?> <?php echo e(url('user/cover/default-cover-user.png')); ?> <?php endif; ?>" alt="<?php echo e(Auth::user()->name); ?>" title="<?php echo e(Auth::user()->name); ?>">
					</div>
					<div class="avatar-img">
						<img src="<?php echo e(Auth::user()->avatar); ?>" alt="<?php echo e(Auth::user()->name); ?>" title="<?php echo e(Auth::user()->name); ?>">
					</div>
				</div>
				<div class="avatar-profile">
					<div class="avatar-details">
						<h2 class="avatar-name">
							<a href="<?php echo e(url(Auth::user()->username)); ?>">
								<?php echo e('@'.Auth::user()->username); ?>

							</a>
						</h2>
					</div>
				</div>
				<ul class="activity-list list-inline">
					<li>
						<a href="<?php echo e(url(Auth::user()->username.'/posts')); ?>">
							<div class="activity-name">
								<?php echo e(trans('common.posts')); ?>

							</div>
							<div class="activity-count">
								<?php echo e(Auth::user()->posts->count()); ?>

							</div>
						</a>
					</li>
					<li>
						<a href="<?php echo e(url(Auth::user()->username.'/followers')); ?>">
							<div class="activity-name">
								<?php echo e(trans('common.followers')); ?>

							</div>
							<div class="activity-count">
								<?php echo e(Auth::user()->followers->count()); ?>

							</div>
						</a>
					</li>
					<li>
						<a href="<?php echo e(url(Auth::user()->username.'/following')); ?>">
							<div class="activity-name">
								<?php echo e(trans('common.following')); ?>

							</div>
							<div class="activity-count">
								<?php echo e(Auth::user()->following->count()); ?>

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
				Support Groups
			</h3>
		</div>
		<div class="panel-body">
			<div class="user-follow socialite">
				<!-- Each user is represented with media block -->

				<?php foreach($groups as $group): ?>

				<div class="media">
					<div class="media-left badge-verification">
						<a href="<?php echo e(url($group->username)); ?>">
							<?php if($group->avatar != NULL): ?>
							<img src="<?php echo e(url('group/avatar/'.$group->avatar)); ?>" class="img-icon" alt="<?php echo e($group->name); ?>" title="<?php echo e($group->name); ?>">
							<?php else: ?>
							<img src="<?php echo e(url('group/avatar/default-group-avatar.png')); ?>" class="img-icon" alt="<?php echo e($group->name); ?>" title="<?php echo e($group->name); ?>">
							<?php endif; ?>
						</a>
					</div>
					<div class="media-body socialte-timeline join-links">
						<h4 class="media-heading"><a href="<?php echo e(url($group->username)); ?>"><?php echo e($group->name); ?> </a>
							<span class="text-muted"><?php echo e('@'.$group->username); ?></span></h4>


						</div>
					</div>
					<?php endforeach; ?>


				</div><!-- Suggested groups widget -->
			</div>
		</div><!-- /panel -->

	<div class="panel panel-default">
		<div class="panel-heading no-bg">
			<h3 class="panel-title">
				<?php echo e(trans('common.suggested_people')); ?>

			</h3>
		</div>
		<div class="panel-body">
			<!-- widget holder starts here -->
			<div class="user-follow socialite">
				<!-- Each user is represented with media block -->
				<?php if($suggested_users != ""): ?>

				<?php foreach($suggested_users as $suggested_user): ?>

				<div class="media">
					<div class="media-left badge-verification">
						<a href="<?php echo e(url($suggested_user->username)); ?>">
							<img src="<?php echo e($suggested_user->avatar); ?>" class="img-icon" alt="<?php echo e($suggested_user->name); ?>" title="<?php echo e($suggested_user->name); ?>">
							<?php if($suggested_user->verified): ?>
							<span class="verified-badge bg-success verified-medium">
								<i class="fa fa-check"></i>
							</span>
							<?php endif; ?>
						</a>
					</div>
					<div class="media-body socialte-timeline follow-links">
						<h4 class="media-heading suggested-p"><a href="<?php echo e(url($suggested_user->username)); ?>"><?php echo e('@'.$suggested_user->username); ?> </a>
						</h4>
							<div class="btn-follow">
								<a href="#" class="btn btn-default follow-user follow" data-timeline-id="<?php echo e($suggested_user->timeline->id); ?>"> <i class="fa fa-heart"></i> <?php echo e(trans('common.follow')); ?></a>
							</div>
							<div class="btn-follow hidden">
								<a href="#" class="btn btn-success follow-user unfollow" data-timeline-id="<?php echo e($suggested_user->timeline->id); ?>"><i class="fa fa-check"></i> <?php echo e(trans('common.following')); ?></a>
							</div>
						</div>
					</div>
					<?php endforeach; ?>
					<?php else: ?>
					<div class="alert alert-warning">
						<?php echo e(trans('messages.no_suggested_users')); ?>

					</div>
					<?php endif; ?>

				</div>
				<!-- widget holder ends here -->
			</div>
		</div>

		<div class="panel panel-default">
			<div class="panel-heading no-bg">
				<h3 class="panel-title">
					<?php echo e(trans('common.suggested_groups')); ?>

				</h3>
			</div>
			<div class="panel-body">
				<div class="user-follow socialite">
					<!-- Each user is represented with media block -->
					<?php if($suggested_groups != ""): ?>

					<?php foreach($suggested_groups as $suggested_group): ?>

					<div class="media">
						<div class="media-left badge-verification">
							<a href="<?php echo e(url($suggested_group->username)); ?>">
								<?php if($suggested_group->avatar != NULL): ?>
								<img src="<?php echo e(url('group/avatar/'.$suggested_group->avatar)); ?>" class="img-icon" alt="<?php echo e($suggested_group->name); ?>" title="<?php echo e($suggested_group->name); ?>">
								<?php else: ?>
								<img src="<?php echo e(url('group/avatar/default-group-avatar.png')); ?>" class="img-icon" alt="<?php echo e($suggested_group->name); ?>" title="<?php echo e($suggested_group->name); ?>">
								<?php endif; ?>
							</a>
						</div>
						<div class="media-body socialte-timeline join-links">
							<h4 class="media-heading"><a href="<?php echo e(url($suggested_group->username)); ?>"><?php echo e($suggested_group->name); ?> </a>
								<span class="text-muted"><?php echo e('@'.$suggested_group->username); ?></span></h4>

								<?php if(!$suggested_group->users->contains(Auth::user()->id)): ?>
									<div class="btn-follow">
										<a href="#" class="btn btn-options btn-block join-user btn-default join" data-timeline-id="<?php echo e($suggested_group->timeline_id); ?>">
											<i class="fa fa-plus"></i> <?php echo e(trans('common.join')); ?>

										</a>
									</div>

									<div class="btn-follow hidden">
										<a href="#" class="btn btn-options btn-block btn-success join-user joined" data-timeline-id="<?php echo e($suggested_group->timeline_id); ?>">
											<i class="fa fa-check"></i>  <?php echo e(trans('common.joined')); ?>

										</a>
									</div>
								<?php else: ?>
									<div class="btn-follow hidden">
										<a href="#" class="btn btn-options btn-block join-user btn-default join " data-timeline-id="<?php echo e($suggested_group->timeline_id); ?>">
											<i class="fa fa-plus"></i>  <?php echo e(trans('common.join')); ?>

										</a>
									</div>

									<div class="btn-follow">
										<a href="#" class="btn btn-options btn-block btn-success join-user joined <?php if(count($suggested_group->admins()) == 1 && $suggested_group->is_admin(Auth::user()->id)): ?> disabled <?php endif; ?> ">
											<i class="fa fa-check"></i>  <?php echo e(trans('common.joined')); ?>

										</a>
									</div>
								<?php endif; ?>

							</div>
						</div>
						<?php endforeach; ?>
						<?php else: ?>
						<div class="alert alert-warning">
							<?php echo e(trans('messages.no_suggested_groups')); ?>

						</div>
						<?php endif; ?>

					</div><!-- Suggested groups widget -->
				</div>
			</div><!-- /panel -->

			<?php if(Setting::get('home_ad') != NULL): ?>
			<div id="link_other" class="post-filters">
				<?php echo htmlspecialchars_decode(Setting::get('home_ad')); ?>

			</div>
			<?php endif; ?>
		</div>


<div class="widget-events widget-left-panel">
	<div class="menu-heading">
		<?php echo e(trans('common.most_trending')); ?>

	</div>
	<div class="categotry-list">
		<ul class="list-unstyled">
			<?php if($trending_tags != ""): ?>
				<?php foreach($trending_tags as $trending_tag): ?>
				<li><span class="hash-icon"><i class="fa fa-hashtag"></i></span> <a href="<?php echo e(url('?hashtag='.$trending_tag->tag)); ?>"><?php echo e($trending_tag->tag); ?></a></li>
				<?php endforeach; ?>
			<?php else: ?>
				<span class="text-warning"><?php echo e(trans('messages.no_tags')); ?></span>

			<?php endif; ?>
		</ul>
	</div>
</div><!-- /widget-events -->
