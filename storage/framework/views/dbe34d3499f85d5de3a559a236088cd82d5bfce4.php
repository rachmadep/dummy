<!-- <div class="main-content"> -->
	<div class="container">
		<div class="row">

			<!-- List of user pages-->

			<div class="col-md-6">
				<div class="post-filters pages-groups">
					
					<div class="panel panel-default">
						<div class="panel-heading no-bg panel-settings">
							<div class="pull-right">
								<a href="<?php echo e(url(Auth::user()->username.'/create-page')); ?>" class="btn btn-success"><?php echo e(trans('common.create_page')); ?></a>
							</div>
							<h3 class="panel-title">
								<?php echo e(trans('messages.pages-manage')); ?>

							</h3>
							
						</div>
						<div class="panel-body">
							<?php if(count($userPages)): ?>
								
							<ul class="list-group page-likes">
								<?php foreach($userPages as $userpage): ?>
								<li class="list-group-item deletepage">
									<div class="connect-list">
										<div class="connect-link pull-left">
											<a href="<?php echo e(url($userpage->username)); ?>">
												<img src=" <?php if($userpage->timeline_id && $userpage->avatar): ?> <?php echo e(url('page/avatar/'.$userpage->avatar)); ?> <?php else: ?> <?php echo e(url('page/avatar/default-page-avatar.png')); ?> <?php endif; ?>" alt="<?php echo e($userpage->name); ?>" title="<?php echo e($userpage->name); ?>"><?php echo e($userpage->name); ?>

											</a>
										</div>
										<div class="pull-right">
											<a href="" class="pull-right delete-page delete_page" data-pagedelete-id="<?php echo e($userpage->id); ?>"><i class="fa fa-close text-danger"></i></a>
										</div>
										<div class="clearfix"></div>
									</div>
								</li>
								<?php endforeach; ?>
							</ul>
							<?php else: ?>
								<div class="alert alert-warning">
									<?php echo e(trans('messages.no_pages')); ?>

								</div>
							<?php endif; ?>
						</div>
					</div><!-- /panel -->
				</div>
			</div><!-- /col-md-6 -->
			
			<!-- List of user groups-->
			
			<div class="col-md-6">
				<div class="post-filters pages-groups">
					
					<div class="panel panel-default">
						<div class="panel-heading no-bg panel-settings">
							<div class="pull-right">
								<a href="<?php echo e(url(Auth::user()->username.'/create-group')); ?>" class="btn btn-success"><?php echo e(trans('common.create_group')); ?></a>
							</div>
							<h3 class="panel-title">
								<?php echo e(trans('messages.groups-manage')); ?>

							</h3>
						</div>
						<div class="panel-body">
							<?php if(count($groupPages)): ?>
								
							<ul class="list-group page-likes">
								<?php foreach($groupPages as $grouppage): ?>
								<li class="list-group-item">
									<div class="pull-right">
										<span class="label label-default"><?php echo e($grouppage->type); ?></span>
									</div>
									<div class="connect-list">
										<div class="connect-link pull-left">
											
											<a href="<?php echo e(url($grouppage->username)); ?>">
												<img src=" <?php if($grouppage->timeline_id && $grouppage->avatar): ?> <?php echo e(url('group/avatar/'.$grouppage->avatar)); ?> <?php else: ?> <?php echo e(url('group/avatar/default-group-avatar.png')); ?> <?php endif; ?>" alt="<?php echo e($grouppage->name); ?>" title="<?php echo e($grouppage->name); ?>"><?php echo e($grouppage->name); ?>

											</a>
										</div>
										<div class="clearfix"></div>
									</div><!-- /connect-list -->
								</li>
								<?php endforeach; ?>
							</ul>
							<?php else: ?>
								<div class="alert alert-warning">
									<?php echo e(trans('messages.no_groups')); ?>

								</div>
							<?php endif; ?>
						</div>
					</div>

				</div><!-- /panel -->
			</div>
		</div><!-- /row -->
	</div>
<!-- </div> --><!-- /main-content -->