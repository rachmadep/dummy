<div class="timeline-cover-section">
	<div class="timeline-cover">			
		<img src=" <?php if($timeline->cover_id): ?> <?php echo e(url('group/cover/'.$timeline->cover->source)); ?> <?php else: ?> <?php echo e(url('group/cover/default-cover-group.png')); ?> <?php endif; ?>" alt="<?php echo e($timeline->name); ?>" title="<?php echo e($timeline->name); ?>">
		<?php if($timeline->groups->is_admin(Auth::user()->id) == true): ?>
			<a href="#" class="btn btn-camera-cover change-cover"><i class="fa fa-camera" aria-hidden="true"></i><span class="change-cover-text"><?php echo e(trans('common.change_cover')); ?></span></a>
		<?php endif; ?>
		<div class="user-cover-progress hidden">
		</div>
		<div class="user-timeline-name">
			<a href="<?php echo e(url($timeline->username)); ?>"><?php echo e($timeline->name); ?></a>
		</div>
		
	</div>

	<div class="timeline-list">
		<ul class="list-inline pagelike-links">			
			<?php if(Auth::user()->get_group($group->id) != NULL): ?>
				<?php if(($group->member_privacy == "only_admins" && $group->is_admin(Auth::user()->id)) || 
						($group->member_privacy == "members" && Auth::user()->get_group($group->id)->pivot->status == 'approved')): ?>			
				<li class="<?php echo e(Request::segment(2) == 'add-members' ? 'active' : ''); ?>"><a href="<?php echo e(url($timeline->username.'/add-members')); ?>">
				<span class="top-list"><?php echo e(trans('common.addmembers')); ?></span></a></li>	
				<?php endif; ?>
			<?php endif; ?>

			<li class="<?php echo e(Request::segment(2) == 'members' ? 'active' : ''); ?>">
				<a href="<?php echo e(url($timeline->username.'/members/'.$group->id)); ?>">
					<span class="top-list">
						<?php echo e($group->members() != false ? count($group->members()) : 0); ?> <?php echo e(trans('common.members')); ?>

					</span>
				</a>
			</li>
				
			<li class="<?php echo e(Request::segment(2) == 'groupadmin' ? 'active' : ''); ?>">
				<a href="<?php echo e(url($timeline->username.'/groupadmin/'.$group->id)); ?>">
					<span class="top-list"><?php echo e($group->admins() != false ? count($group->admins()) : 0); ?>  <?php echo e(trans('common.admins')); ?>

					</span>
				</a>
			</li>
			<li class="<?php echo e(Request::segment(2) == 'groupposts' ? 'active' : ''); ?>">
				<a href="<?php echo e(url($timeline->username.'/groupposts/'.$group->id)); ?>" >
					<span class="top-list">
						<?php echo e(count($timeline->posts)); ?> <?php echo e(trans('common.posts')); ?>

					</span>
				</a>
			</li>
			
			<?php if($group->type == "closed" && $group->is_admin(Auth::user()->id)): ?>
			<li class="<?php echo e(Request::segment(3) == 'join-requests' ? 'active' : ''); ?>">

				<a href="<?php echo e(url($timeline->username.'/group-settings/join-requests/'.$group->id)); ?>" >
					<span class="top-list">
						<?php echo e($group->pending_members() != false ? count($group->pending_members()) : 0); ?> <?php echo e(trans('common.join_requests')); ?>

					</span>					
				</a>
			</li>
			<?php endif; ?>	
			<?php if(!$group->is_admin(Auth::user()->id)): ?>
			<li class="dropdown largescreen-report"><a href="#" class=" dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="top-list"> <i class="fa fa-ellipsis-h"></i></span></a>
			
				<ul class="dropdown-menu  report-dropdown">
					<?php if(!$timeline->reports->contains(Auth::user()->id)): ?>
					<li><a href="#" class="page-report report" data-timeline-id="<?php echo e($timeline->id); ?>"> <i class="fa fa-flag" aria-hidden="true"></i><?php echo e(trans('common.report')); ?></a></li>
					<li class="hidden"><a href="#" class="page-report reported" data-timeline-id="<?php echo e($timeline->id); ?>"> <i class="fa fa-flag" aria-hidden="true"></i><?php echo e(trans('common.reported')); ?></a></li>
					<?php else: ?>
					<li class="hidden"><a href="#" class="page-report report" data-timeline-id="<?php echo e($timeline->id); ?>"> <i class="fa fa-flag" aria-hidden="true"></i><?php echo e(trans('common.report')); ?></a></li>
					<li><a href="#" class="page-report reported" data-timeline-id="<?php echo e($timeline->id); ?>"> <i class="fa fa-flag" aria-hidden="true"></i><?php echo e(trans('common.reported')); ?></a></li>
					<?php endif; ?>
		        </ul>				
			</li>	
			<?php if(!$timeline->reports->contains(Auth::user()->id)): ?>
					<li class="smallscreen-report"><a href="#" class="page-report report" data-timeline-id="<?php echo e($timeline->id); ?>"><?php echo e(trans('common.report')); ?></a></li>
					<li class="hidden smallscreen-report"><a href="#" class="page-report reported" data-timeline-id="<?php echo e($timeline->id); ?>"><?php echo e(trans('common.reported')); ?></a></li>
					<?php else: ?>
					<li class="hidden smallscreen-report"><a href="#" class="page-report report" data-timeline-id="<?php echo e($timeline->id); ?>"><?php echo e(trans('common.report')); ?></a></li>
					<li class="smallscreen-report"><a href="#" class="page-report reported" data-timeline-id="<?php echo e($timeline->id); ?>"><?php echo e(trans('common.reported')); ?></a></li>
					<?php endif; ?>
			<?php endif; ?>			
		</ul>
		<div class="status-button">
			<a href="#" class="btn btn-status"><?php echo e(trans('common.status')); ?></a>
		</div>
		<div class="timeline-user-avtar">			
			<img src=" <?php if($timeline->avatar_id): ?> <?php echo e(url('group/avatar/'.$timeline->avatar->source)); ?> <?php else: ?> <?php echo e(url('group/avatar/default-group-avatar.png')); ?> <?php endif; ?>" alt="<?php echo e($timeline->name); ?>" title="<?php echo e($timeline->name); ?>">
			<?php if($timeline->groups->is_admin(Auth::user()->id) == true): ?>
				<div class="chang-user-avatar">
					<a href="#" class="btn btn-camera change-avatar"><i class="fa fa-camera" aria-hidden="true"></i><span class="avatar-text"><?php echo e(trans('common.update_profile')); ?><span><?php echo e(trans('common.picture')); ?></span></span></a>
				</div>
			<?php endif; ?>		
			<div class="user-avatar-progress hidden">
			</div>
		</div>
	</div>
</div>
