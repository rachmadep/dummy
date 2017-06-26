<div class="panel panel-default">
	<div class="panel-heading no-bg panel-settings">
			<h3 class="panel-title">
				<?php echo e(trans('admin.edit_group')); ?> (<?php echo e($timeline->name); ?>)
			</h3>
		</div>
	<div class="panel-body">
		<?php echo $__env->make('flash::message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

		<form class="socialite-form" method="POST" action="<?php echo e(url('admin/groups/'.$username.'/edit')); ?>">
			<?php echo e(csrf_field()); ?>

			<fieldset class="form-group required <?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
				<?php echo e(Form::label('name', trans('auth.name'), ['class' => 'control-label'])); ?>

				<input type="text" class="form-control" placeholder="<?php echo e(trans('admin.group_name_placeholder')); ?>" name="name" value="<?php echo e($timeline->name); ?>">
				<small class="text-muted"><?php echo e(trans('admin.edit_group_text')); ?></small>
				<?php if($errors->has('name')): ?>
				<span class="help-block">
					<strong><?php echo e($errors->first('name')); ?></strong>
				</span>
				<?php endif; ?>
			</fieldset>

			<fieldset class="form-group">
				<?php echo e(Form::label('username', trans('common.username'), ['class' => 'control-label'])); ?>

				<input type="text" name="username" class="form-control content-form" placeholder="<?php echo e(trans('admin.username_placeholder')); ?>"  value="<?php echo e($timeline->username); ?>">
				<small class="text-muted"><?php echo e(trans('admin.group_username_text')); ?></small>
			</fieldset>

			<fieldset class="form-group">
				<?php echo e(Form::label('about', trans('common.about'), ['class' => 'control-label'])); ?>

				<textarea class="form-control about-form" name="about" placeholder="<?php echo e(trans('common.about')); ?>" rows="3"><?php echo e($timeline->about); ?></textarea>
				<small class="text-muted"><?php echo e(trans('admin.group_about_text')); ?></small>
			</fieldset>

			<fieldset class="form-group required <?php echo e($errors->has('type') ? ' has-error' : ''); ?>">
				<?php echo e(Form::label('type', trans('admin.group_privacy'), ['class' => 'control-label'])); ?>

				<?php echo e(Form::select('type', array('open' => 'open group','closed' => 'closed group','secret' => 'secret group') , $groups->type , ['class' => 'form-control','placeholder' => 'Please Select'])); ?>

				<small class="text-muted"><?php echo e(trans('admin.group_privacy_text')); ?></small>
				<?php if($errors->has('type')): ?>
				<span class="help-block">
					<strong><?php echo e($errors->first('type')); ?></strong>
				</span>
				<?php endif; ?>
			</fieldset>

			<fieldset class="form-group">
				<?php echo e(Form::label('member_privacy', trans('admin.add_privacy'), ['class' => 'control-label'])); ?>

				<?php echo e(Form::select('member_privacy', array('members' => 'Members','only_admins' => 'Only admins') , $groups->member_privacy , ['class' => 'form-control'])); ?>

				<small class="text-muted"><?php echo e(trans('admin.add_privacy_text')); ?></small>
			</fieldset>

			<fieldset class="form-group">
				<?php echo e(Form::label('post_privacy', trans('admin.timeline_post_privacy'), ['class' => 'control-label'])); ?>

				<?php echo e(Form::select('post_privacy', array('members' => 'Members', 'only_admins' => 'Only admins') , $groups->post_privacy , ['class' => 'form-control'])); ?>

				<small class="text-muted"><?php echo e(trans('admin.timeline_post_privacy_text')); ?></small>
			</fieldset>

			<div class="pull-right">
				<button type="submit" class="btn btn-primary btn-sm"><?php echo e(trans('common.save_changes')); ?></button>
			</div>
		</form>
	</div>
</div>
