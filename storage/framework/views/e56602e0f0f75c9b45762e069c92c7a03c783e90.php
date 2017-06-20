<!-- main-section -->
<div class="container">
	<div class="row">
		<div class="col-md-10">

			<?php echo Theme::partial('group-header',compact('timeline','group')); ?>


			<div class="row">
				<div class=" timeline">
					<div class="col-md-4">

						<?php echo Theme::partial('group-leftbar',compact('timeline','group','group_members')); ?>

					</div>

					<div class="col-md-8">
						<?php if($timeline->type == "group"): ?>						
							<?php if(($group->post_privacy == "only_admins" && $group->is_admin(Auth::user()->id)) || ($group->post_privacy == "members" && Auth::user()->get_group($group->id)->pivot->status == 'approved')): ?>
								<?php echo Theme::partial('create-post',compact('timeline')); ?>			
							<?php endif; ?>
						<?php endif; ?>	

						<div class="timeline-posts">
							
							<?php if($posts->count() > 0): ?>
								<?php foreach($posts as $post): ?>
									<?php echo Theme::partial('post',compact('post','timeline','next_page_url')); ?>

								<?php endforeach; ?>
							<?php else: ?>
								<div class="panel panel-default">
									<div class="panel-heading no-bg panel-settings">
										<h3 class="panel-title">
											<?php echo e(trans('common.posts')); ?>

										</h3>
									</div>
									<div class="panel-body">
										<div class="alert alert-warning"><?php echo e(trans('messages.no_posts')); ?></div>
									</div>
								</div><!-- /panel -->
							<?php endif; ?>

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

