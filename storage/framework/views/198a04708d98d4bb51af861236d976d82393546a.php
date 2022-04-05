<?php $__env->startSection('title', $title); ?>
<?php $__env->startSection('content'); ?>
    <div class="container my-5">
        <div class="row">
            <div class="col-md-3">
                <!-- Profile Image -->
                <?php echo $__env->make('core.profile.avatar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <div class="col-md-9">
                <div class="nav-tabs-custom">
                    <?php echo $__env->make('core.profile.profile_nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive-sm">
                                <table class="table table-borderless">
                                    <tbody>
                                    <tr>
                                        <th><?php echo e(__('Name')); ?></th>
                                        <td><?php echo e($user->profile->full_name); ?></td>
                                    </tr>
                                    <tr>
                                        <th><?php echo e(__('User Role')); ?></th>
                                        <td><?php echo e($user->role->name); ?></td>
                                    </tr>
                                    <tr>
                                        <th><?php echo e(__('Email')); ?></th>
                                        <td><?php echo e($user->email); ?>

                                            <?php if( settings('require_email_verification') == ACTIVE_STATUS_ACTIVE ): ?>
                                                <span
                                                    class="badge badge-<?php echo e(config('commonconfig.email_status.' . $user->is_email_verified . '.color_class')); ?>"><?php echo e(email_status($user->is_email_verified)); ?></span>
                                                <?php if(!$user->is_email_verified): ?>
                                                    <a class="btn-link pull-right"
                                                       href="<?php echo e(route('verification.form')); ?>"><?php echo e(__('Verify Account')); ?></a>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th><?php echo e(__('Username')); ?></th>
                                        <td><?php echo e($user->username); ?></td>
                                    </tr>
                                    <tr>
                                        <th><?php echo e(__('Address')); ?></th>
                                        <td><?php echo e($user->profile->address); ?></td>
                                    </tr>
                                    <tr>
                                        <th><?php echo e(__('Account Status')); ?></th>
                                        <td>
                                            <span
                                                class="badge badge-<?php echo e(config('commonconfig.account_status.' . $user->is_active . '.color_class')); ?>"><?php echo e(account_status($user->is_active)); ?></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th><?php echo e(__('Financial Status')); ?></th>
                                        <td>
                                            <span
                                                class="badge badge-<?php echo e(config('commonconfig.financial_status.' . $user->is_financial_active . '.color_class')); ?>"><?php echo e(financial_status($user->is_financial_active)); ?></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th><?php echo e(__('Maintenance Access Status')); ?></th>
                                        <td>
                                            <span
                                                class="badge badge-<?php echo e(config('commonconfig.maintenance_accessible_status.' . $user->is_accessible_under_maintenance . '.color_class')); ?>"><?php echo e(maintenance_accessible_status($user->is_accessible_under_maintenance)); ?></span>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="bg-primary text-white mb-3 clearfix py-3 px-3">
                        <a href="<?php echo e(route('profile.edit')); ?>"
                           class="btn btn-sm btn-info btn-sm-block"><?php echo e(__('Edit Profile')); ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/booking/resources/views/core/profile/index.blade.php ENDPATH**/ ?>