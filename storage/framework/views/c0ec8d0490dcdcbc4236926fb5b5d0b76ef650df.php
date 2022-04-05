<div class="lf-nav-tab">
    <a class="nav-link <?php echo e(is_current_route(['profile.index','profile.edit'],'active')); ?>"
       href="<?php echo e(route('profile.index')); ?>"><?php echo e(__('Profile')); ?></a>
    <a class="nav-link <?php echo e(is_current_route('profile.change-password','active')); ?>"
       href="<?php echo e(route('profile.change-password')); ?>"><?php echo e(__('Change Password')); ?></a>
    <a class="nav-link <?php echo e(is_current_route('profile.avatar.edit','active')); ?>"
       href="<?php echo e(route('profile.avatar.edit')); ?>"><?php echo e(__('Change Avatar')); ?></a>
</div>
<?php /**PATH /Applications/MAMP/htdocs/booking/resources/views/core/profile/profile_nav.blade.php ENDPATH**/ ?>