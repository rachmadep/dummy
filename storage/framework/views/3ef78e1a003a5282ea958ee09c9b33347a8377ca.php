<!-- main-section -->

<div class="container">
	<div class="row">
		<div class="col-md-10">
			<?php echo Theme::partial('user-header',compact('timeline','user','followRequests','following_count',
			'followers_count','follow_confirm','user_post','joined_groups_count')); ?>

			

			<div class="row">
				<div class=" timeline">
					<div class="col-md-4">
						
						<?php echo Theme::partial('user-leftbar',compact('timeline','user','follow_user_status','own_pages','own_groups')); ?>

					</div>
					<div class="col-md-8">
						
						<div class="panel panel-default">
							<div class="panel-heading no-bg panel-settings">
								<h3 class="panel-title">
									<?php echo e(trans('common.groups_joined')); ?>

								</h3>
							</div>
							<div class="panel-body">

								<?php if(count($joined_groups) > 0): ?>
								<ul class="list-group page-likes">
									<?php foreach($joined_groups as $join_group): ?>
									<li class="list-group-item">
										<div class="connect-list">
											<div class="connect-link pull-left">
												<a href="<?php echo e(url($join_group->username)); ?>">
													<?php if($join_group->avatar != NULL): ?>
													<img src="<?php echo e(url('group/avatar/'.$join_group->avatar)); ?>" alt="<?php echo e($join_group->name); ?>" title="<?php echo e($join_group->name); ?>">
													<?php else: ?>
													<img src="<?php echo e(url('group/avatar/default-group-avatar.png')); ?>" alt="<?php echo e($join_group->name); ?>" title="<?php echo e($join_group->name); ?>">
													<?php endif; ?>
													<?php echo e($join_group->name); ?>

												</a>
											</div>

											<?php if($timeline->id == Auth::user()->timeline_id): ?>
												<div class="pull-right page-links">
													<?php if(($join_group->users->contains(Auth::user()->id)) && $join_group->is_admin(Auth::user()->id) != true): ?>
													<div class="left-col">
														<a href="#" class="btn btn-success group-join joined" data-timeline-id="<?php echo e($join_group->timeline_id); ?>">
															<i class="fa fa-check"></i> <?php echo e(trans('common.joined')); ?>

														</a>
													</div>

													<div class="left-col hidden">
														<a href="#" class="btn btn-default group-join join" data-timeline-id="<?php echo e($join_group->timeline_id); ?>"><i class="fa fa-plus"></i> <?php echo e(trans('common.join')); ?>

														</a>
													</div>
													<?php endif; ?>
												</div>
											<?php endif; ?>
											<div class="clearfix"></div>
										</div>
									</li>
									<?php endforeach; ?>
								</ul>

								<?php else: ?>
								<div class="alert alert-warning"><?php echo e(trans('messages.no-joined-goups')); ?></div>
								<?php endif; ?>
							</div><!-- /panel-body -->
						</div>
					</div><!-- /col-md-8 -->
				</div><!-- /main-content -->
			</div><!-- /row -->
		</div><!-- /col-md-10 -->

		<div class="col-md-2">
			<?php echo Theme::partial('timeline-rightbar'); ?>

		</div>

	</div>
</div><!-- /container -->

