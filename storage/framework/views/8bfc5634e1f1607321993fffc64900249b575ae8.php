<!-- main-section -->
<div class="container">
	<div class="row">
		<div class="col-md-10">
			<?php echo Theme::partial('user-header',compact('timeline','liked_pages','user','joined_groups','followRequests','following_count',
			'followers_count','follow_confirm','user_post','joined_groups_count')); ?>

			
			<div class="row">
				<div class=" timeline">
					<div class="col-md-4">
						
						
						<?php echo Theme::partial('user-leftbar',compact('timeline','user','follow_user_status','own_groups','own_pages')); ?>

					</div>
					<div class="col-md-8">
						<?php if($timeline->type == "user" && $timeline_post == true): ?>
							<?php echo Theme::partial('create-post',compact('timeline')); ?>						
						<?php endif; ?>
						
						<div class="timeline-posts">
							<?php if($posts->count() > 0): ?>
								<?php foreach($posts as $post): ?>
									<?php echo Theme::partial('post',compact('post','timeline','next_page_url')); ?>

								<?php endforeach; ?>
							<?php else: ?>
								<p class="no-posts"><?php echo e(trans('messages.no_posts')); ?></p>
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
