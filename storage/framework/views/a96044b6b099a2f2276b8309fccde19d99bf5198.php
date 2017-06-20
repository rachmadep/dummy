
<div class="right-side-section">
	<div class="user-profile-buttons">
		<div class="row join-links pagelike-links">
			<!-- Start Open Group -->
			<?php if($group->is_admin(Auth::user()->id) && $group->type == "open"): ?>
				<?php if(!$group->users->contains(Auth::user()->id)): ?>
				<div class="col-md-6 col-xs-6 col-sm-6 left-col">
					<a href="#" class="btn btn-options btn-block join-user btn-default join" data-timeline-id="<?php echo e($timeline->id); ?>">
						<i class="fa fa-plus"></i> <?php echo e(trans('common.join')); ?>

					</a>
				</div>

				<div class="col-md-6 col-xs-6 col-sm-6 left-col hidden">
					<a href="#" class="btn btn-options btn-block btn-success join-user joined" data-timeline-id="<?php echo e($timeline->id); ?>">
						<i class="fa fa-check"></i>  <?php echo e(trans('common.joined')); ?>

					</a>
				</div>
				<?php else: ?>
				<div class="col-md-6 col-xs-6 col-sm-6 left-col hidden">
					<a href="#" class="btn btn-options btn-block join-user btn-default join " data-timeline-id="<?php echo e($timeline->id); ?>">
						<i class="fa fa-plus"></i>  <?php echo e(trans('common.join')); ?>

					</a>
				</div>
				
				<div class="col-md-6 col-xs-6 col-sm-6 left-col">
					<a href="#" class="btn btn-options btn-block btn-success join-user joined <?php if(count($group->admins()) == 1 && $group->is_admin(Auth::user()->id)): ?> disabled <?php endif; ?> ">
						<i class="fa fa-check"></i>  <?php echo e(trans('common.joined')); ?>

					</a>
				</div>
				<?php endif; ?>	
				<div class="col-md-6 col-xs-6 col-sm-6 right-col">

					<a href="<?php echo e(url('/'.$timeline->username.'/group-settings/general')); ?>" class="btn btn-options btn-block btn-default">

						<i class="fa fa-gear"></i>  <?php echo e(trans('common.settings')); ?>

					</a>
				</div>
			<?php else: ?>
			<?php if(!$group->is_admin(Auth::user()->id) && $group->type == "open"): ?>
			<?php if(!$group->users->contains(Auth::user()->id)): ?>
				<div class="col-md-12 page">
					<a href="#" class="btn btn-options btn-block join-user btn-default join" data-timeline-id="<?php echo e($timeline->id); ?>">
						<i class="fa fa-plus"></i> <?php echo e(trans('common.join')); ?>

					</a>
				</div>
				<div class="col-md-12 col-xs-12 col-sm-12 page  hidden">
					<a href="#" class="btn btn-options btn-block btn-success join-user joined" data-timeline-id="<?php echo e($timeline->id); ?>">
						<i class="fa fa-check"></i> <?php echo e(trans('common.joined')); ?>

					</a>
				</div>
			<?php else: ?>
				<div class="col-md-12 col-xs-12 col-sm-12 page hidden">
					<a href="#" class="btn btn-options btn-block join-user btn-default join" data-timeline-id="<?php echo e($timeline->id); ?>">
						<i class="fa fa-plus"></i> <?php echo e(trans('common.join')); ?>

					</a>
				</div>
				<div class="col-md-12 col-xs-12 col-sm-12 page">
					<a href="#" class="btn btn-options btn-block btn-success join-user joined <?php if(count($group->admins()) == 1 && $group->is_admin(Auth::user()->id)): ?> disabled <?php endif; ?> " data-timeline-id="<?php echo e($timeline->id); ?>">
						<i class="fa fa-check"></i> <?php echo e(trans('common.joined')); ?>

					</a>
				</div>
			<?php endif; ?>			
			<?php endif; ?>					
			<?php endif; ?>
			<!-- End open group -->

			<!-- Start closed group -->
			<?php if($group->is_admin(Auth::user()->id) && $group->type == "closed"): ?>
			<?php if(!$group->users->contains(Auth::user()->id)): ?>


			<div class="col-md-12 col-xs-12 col-sm-12 ">
				<a href="#" class="btn btn-options btn-block join-close-group btn-default join" data-timeline-id="<?php echo e($timeline->id); ?>">
					<i class="fa fa-plus"></i> <?php echo e(trans('common.join')); ?>

				</a>
			</div>

			<div class="col-md-12 col-xs-12 col-sm-12 hidden">
				<a href="#" class="btn btn-options btn-block btn-warning join-close-group joinrequest" data-timeline-id="<?php echo e($timeline->id); ?>">
					<i class="fa fa-check"></i> <?php echo e(trans('common.join_requested')); ?>

				</a>
			</div>

			<?php else: ?>
			<div class="col-md-12 col-xs-12 col-sm-12 hidden">
				<a href="#" class="btn btn-options btn-block join-close-group btn-default join" data-timeline-id="<?php echo e($timeline->id); ?>">
					<i class="fa fa-plus"></i> <?php echo e(trans('common.join')); ?>

				</a>
			</div>

			<?php if(Auth::user()->get_group($group->id)->pivot->status == "pending"): ?>
			<div class="col-md-12 col-xs-12 col-sm-12">
				<a href="#" class="btn btn-options btn-block btn-warning join-close-group joinrequest" data-timeline-id="<?php echo e($timeline->id); ?>">
					<i class="fa fa-check"></i> <?php echo e(trans('common.join_requested')); ?>

				</a>
			</div>							
			<?php endif; ?>
			
			<?php if(Auth::user()->get_group($group->id)->pivot->status == "approved"): ?>
			<div class="col-md-6 col-xs-6 col-sm-6 left-col">
				<a href="#" class="btn btn-options btn-block btn-success join-close-group joined <?php if(count($group->admins()) == 1 && $group->is_admin(Auth::user()->id)): ?> disabled <?php endif; ?> " data-timeline-id="<?php echo e($timeline->id); ?>">
					<i class="fa fa-check"></i> <?php echo e(trans('common.joined')); ?>

				</a>
			</div>
			<?php endif; ?>

			<?php endif; ?>

			<div class="col-md-6 col-xs-6 col-sm-6 right-col">

				<a href="<?php echo e(url('/'.$timeline->username.'/group-settings/closegroup')); ?>" class="btn btn-options btn-block btn-default">

					<i class="fa fa-gear"></i> <?php echo e(trans('common.settings')); ?>

				</a>
			</div>

			<?php else: ?>
			<?php if(!$group->is_admin(Auth::user()->id) && $group->type == "closed"): ?>

			<?php if(!$group->users->contains(Auth::user()->id)): ?>
			<div class="col-md-12 col-xs-12 col-sm-12 page">
				<a href="#" class="btn btn-options btn-block join-close-group btn-default join" data-timeline-id="<?php echo e($timeline->id); ?>">
					<i class="fa fa-plus"></i>   <?php echo e(trans('common.join')); ?>

				</a>
			</div>

			<div class="col-md-12 col-xs-12 col-sm-12 page hidden">
				<a href="#" class="btn btn-options btn-block btn-success join-close-group joinrequest" data-timeline-id="<?php echo e($timeline->id); ?>">
					<i class="fa fa-check"></i>   <?php echo e(trans('common.join_requested')); ?>

				</a>
			</div>

			<?php else: ?>
			<div class="col-md-12 col-xs-12 col-sm-12 page hidden">
				<a href="#" class="btn btn-options btn-block join-close-group btn-default join" data-timeline-id="<?php echo e($timeline->id); ?>">
					<i class="fa fa-plus"></i>  <?php echo e(trans('common.join')); ?>

				</a>
			</div>
			<?php if(Auth::user()->get_group($group->id)->pivot->status == "pending"): ?>
			<div class="col-md-12 col-xs-12 col-sm-12 page">
				<a href="#" class="btn btn-options btn-block btn-success join-close-group joinrequest" data-timeline-id="<?php echo e($timeline->id); ?>">
					<i class="fa fa-check"></i> <?php echo e(trans('common.join_requested')); ?>

				</a>
			</div>
			<?php endif; ?>

			<?php if(Auth::user()->get_group($group->id)->pivot->status == "approved"): ?>								
				<div class="col-md-12 col-xs-12 col-sm-12 page">
					<a href="#" class="btn btn-options btn-block btn-success join-close-group joined <?php if(count($group->admins()) == 1 && $group->is_admin(Auth::user()->id)): ?> disabled <?php endif; ?> " data-timeline-id="<?php echo e($timeline->id); ?>">
						<i class="fa fa-check"></i> <?php echo e(trans('common.joined')); ?>

					</a>
				</div>
			<?php endif; ?>
		<?php endif; ?>			
	<?php endif; ?>	
<?php endif; ?>
			<!-- End closed group -->

	<!-- Start secret Group -->
	<?php if($group->is_admin(Auth::user()->id) && $group->type == "secret"): ?>			
		<div class="col-md-12 col-xs-12 col-sm-12">

			<a href="<?php echo e(url('/'.$timeline->username.'/group-settings/general')); ?>" class="btn btn-options btn-block btn-default">

				<i class="fa fa-gear"></i>  <?php echo e(trans('common.settings')); ?>

			</a>
		</div>					
	<?php endif; ?>
	<!-- End secret group -->
		

		</div>
	</div>

	<!-- Change avatar form -->
	<form class="change-avatar-form hidden" action="<?php echo e(url('ajax/change-avatar')); ?>" method="post" enctype="multipart/form-data">
		<input name="timeline_id" value="<?php echo e($timeline->id); ?>" type="hidden">
		<input name="timeline_type" value="<?php echo e($timeline->type); ?>" type="hidden">
		<input class="change-avatar-input hidden" accept="image/jpeg,image/png" type="file" name="change_avatar" >
	</form>

	<!-- Change cover form -->
	<form class="change-cover-form hidden" action="<?php echo e(url('ajax/change-cover')); ?>" method="post" enctype="multipart/form-data">
		<input name="timeline_id" value="<?php echo e($timeline->id); ?>" type="hidden">
		<input name="timeline_type" value="<?php echo e($timeline->type); ?>" type="hidden">
		<input class="change-cover-input hidden" accept="image/jpeg,image/png" type="file" name="change_cover" >
	</form>

	<div class="user-bio-block">
		<div class="bio-header"><?php echo e(trans('common.about')); ?></div>
		<div class="bio-description">
			<?php echo e(($timeline['about'] != NULL) ? $timeline['about'] : trans('messages.no_description')); ?>

		</div>
		<ul class="bio-list list-unstyled">
			<li>
				<?php if($group->type == 'open'): ?>
				<i class="fa fa-unlock" aria-hidden="true"></i>
				<?php else: ?>
				<i class="fa fa-lock" aria-hidden="true"></i>
				<?php endif; ?>
				<span><?php echo e($group->type.' '.trans('common.group')); ?></span>
			</li>
		</ul>
	</div>
	<div class="widget-pictures widget-best-pictures"><!-- /pages-liked -->
	<div class="picture pull-left">
		<?php echo e(trans('common.members')); ?>

	</div>
	<?php if(count($group_members) > 0): ?>
		<div class="pull-right show-all">
			<a href="<?php echo e(url($timeline->username.'/members/'.$group->id)); ?>"><?php echo e(trans('common.show_all')); ?></a>
		</div>
	<?php endif; ?>
	<div class="clearfix"></div>
	<div class="best-pictures my-best-pictures">
		<div class="row">
			<?php if(count($group_members) > 0): ?>
				<?php foreach($group_members->take(12) as $group_member): ?>
				<div class="col-md-2 col-sm-2 col-xs-2 best-pics">
					<a href="<?php echo e(url($group_member->username)); ?>" class="image-hover" data-toggle="tooltip" data-placement="top" title="<?php echo e($group_member->name); ?>" >
						<img src="<?php echo e($group_member->avatar); ?>" alt="<?php echo e($group_member->name); ?>" title="<?php echo e($group_member->name); ?>">
					</a>
				</div>
				<?php endforeach; ?>
			<?php else: ?>
				<div class="alert alert-warning"><?php echo e(trans('messages.no_members')); ?></div>
			<?php endif; ?>
		</div>
	</div>
</div> <!-- /pages-liked -->
</div>

