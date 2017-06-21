<div class="panel panel-default">
	<div class="panel-heading no-bg panel-settings">
		<h3 class="panel-title">
			<?php echo e(trans('common.manage_groups')); ?>

		</h3>
	</div>
	<div class="panel-body timeline">
		<?php echo $__env->make('flash::message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		<?php if(count($groups) > 0): ?>
			<div class="table-responsive manage-table">
				<table class="table existing-products-table socialite">
					<thead>
						<tr>
							<th>&nbsp;</th>
							<th><?php echo e(trans('admin.id')); ?></th> 
							<th><?php echo e(trans('auth.name')); ?></th>
							<th><?php echo e(trans('common.type')); ?></th>
							<th><?php echo e(trans('common.members')); ?></th> 
							<th><?php echo e(trans('admin.options')); ?></th>
							<th>&nbsp;</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($groups as $group): ?>
						<tr>
							<td>&nbsp;</td>	
							<td><?php echo e($group->id); ?></td>
							<td><a href="#"><img src="<?php if($group->avatar): ?> <?php echo e(url('group/avatar/'.$group->avatar)); ?> <?php else: ?> <?php echo e(url('group/avatar/default-group-avatar.png')); ?> <?php endif; ?>" alt="<?php echo e($group->timeline->name); ?>" title="<?php echo e($group->timeline->name); ?>"></a><a href="<?php echo e(url($group->timeline->username)); ?>"> <?php echo e($group->timeline->name); ?></a></td> 
							<td><span class="label label-default"><?php echo e($group->type); ?></span></td>
							<td><?php echo e($group->users->count()); ?></td> 
							<td>
								<ul class="list-inline">
									<li><a href="<?php echo e(url('admin/groups/'.$group->timeline->username.'/edit')); ?>"><span class="pencil-icon bg-success"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></span></a></li>
									<li><a href="<?php echo e(url('admin/groups/'.$group->id.'/delete')); ?>" onclick="return confirm('<?php echo e(trans("messages.are_you_sure")); ?>')"><span class="trash-icon bg-danger"><i class="fa fa-trash text-danger" aria-hidden="true"></i></span></a></li>
								</ul>

							</td>
							<td>&nbsp;</td> 
						</tr>
						<?php endforeach; ?>
						</tbody>
					</table>
				</div>
				<div class="pagination-holder">
					<?php echo e($groups->render()); ?>

				</div>	
			<?php else: ?>
				<div class="alert alert-warning"><?php echo e(trans('messages.no_groups')); ?></div>
			<?php endif; ?>
		</div>
	</div>
