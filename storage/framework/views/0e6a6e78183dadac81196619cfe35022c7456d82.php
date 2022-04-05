<?php $__env->startComponent('components.card',['type' => 'info']); ?>
    <img src="<?php echo e(get_avatar($user->avatar)); ?>" alt="<?php echo e(__('Profile Image')); ?>" class="img-rounded img-fluid">
    <h5 class="text-bold mt-3 mb-0 text-lg text-center"><?php echo e($user->profile->full_name); ?></h5>
<?php echo $__env->renderComponent(); ?>
<?php /**PATH /Applications/MAMP/htdocs/booking/resources/views/core/profile/avatar.blade.php ENDPATH**/ ?>