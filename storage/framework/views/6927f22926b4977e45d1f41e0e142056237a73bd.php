<form action="<?php echo e(url('ajax/update-post')); ?>" method="post">
<div class="panel panel-default panel-post animated" id="post<?php echo e($post->id); ?>">
    <div class="panel-heading no-bg">
      <div class="post-author">
        <div class="user-avatar">
            <a href="<?php echo e(url($post->user->username)); ?>"><img src="<?php echo e($post->user->avatar); ?>" alt="<?php echo e($post->user->name); ?>" title="<?php echo e($post->user->name); ?>"></a>
        </div>
        <div class="user-post-details">
            <ul class="list-unstyled no-margin">
                <li>
                  <a href="<?php echo e(url($post->user->username)); ?>" class="user-name user"><?php echo e($post->user->name); ?></a>
                    <?php if($post->users_tagged->count() > 0): ?>
                      <?php echo e(trans('common.with')); ?>

                      <?php /**/ $post_tags = $post->users_tagged->pluck('name')->toArray() /**/ ?>
                      <?php /**/ $post_tags_ids = $post->users_tagged->pluck('id')->toArray() /**/ ?>
                      <?php foreach($post->users_tagged as $key => $user): ?>
                        <?php if($key==1): ?>
                            <?php echo e(trans('common.and')); ?>

                            <?php if(count($post_tags)==1): ?>
                                <a href="<?php echo e(url($user->username)); ?>"> <?php echo e($user->name); ?></a>
                            <?php else: ?>
                                <a href="#" data-toggle="tooltip" title="" data-placement="bottom" class="show-users-modal" data-html="true" data-heading="<?php echo e(trans('common.with_people')); ?>"  data-users="<?php echo e(implode(',', $post_tags_ids)); ?>" data-original-title="<?php echo e(implode('<br />', $post_tags)); ?>"> <?php echo e(count($post_tags).' '.trans('common.others')); ?></a>
                            <?php endif; ?>
                            <?php break; ?>
                        <?php endif; ?>
                        <a href="<?php echo e(url($user->username)); ?>" class="user"> <?php echo e(array_shift($post_tags)); ?> </a>
                      <?php endforeach; ?>
                      
                      
                    <?php endif; ?>
                </li>
                <li>
                  <time class="post-time timeago" datetime="<?php echo e($post->created_at); ?>" title="<?php echo e($post->created_at); ?>">
                    <?php echo e($post->created_at); ?>

                  </time>
            </ul>
        </div>
      </div>
      </div>
  <div class="panel-body">
      <div class="text-wrapper">
        
            <textarea name="description" id="" rows="10"  class="form-control"><?php echo e($post->description); ?></textarea>
            <input type="hidden"  name="post_id" value="<?php echo e($post->id); ?>">
      </div>
  </div>
  <div class="panel-footer">
            <ul class="list-inline pull-right">
                <li><button type="submit" class="btn btn-submit btn-success"><?php echo e(trans('common.post')); ?></button></li>
            </ul>

            <div class="clearfix"></div>
        </div>
</div>
 </form>