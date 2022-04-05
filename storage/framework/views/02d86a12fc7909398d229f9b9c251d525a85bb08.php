<?php $__env->startSection('title', $title); ?>
<?php $__env->startSection('content'); ?>

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <?php echo e($list['search']); ?>

                <div class="my-5">
                <table class="table lf-data-table">
                    <thead>
                    <tr class="bg-primary text-white">
                        <th class="all text-center"><?php echo e(__('Role Name')); ?></th>
                        <th class="min-phone-l text-center"><?php echo e(__('Created Date')); ?></th>
                        <th class="min-phone-l text-center"><?php echo e(__('Status')); ?></th>
                        <th class="text-right all no-sort"><?php echo e(__('Action')); ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $list['items']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="text-center"><?php echo e($role->name); ?></td>
                            <td class="text-center"><?php echo e($role->created_at); ?></td>
                            <td class="text-center"><?php echo e(view_html($role->is_active ? '<i class="fa fa-check text-success"></i>' :  '<i class="fa fa-close text-danger"></i>')); ?></td>
                            <td class="lf-action text-right">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-info dropdown-toggle"
                                            data-toggle="dropdown"
                                            aria-expanded="false">
                                        <i class="fa fa-gear"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right" role="menu">
                                        <a class="dropdown-item"
                                           href="<?php echo e(route('roles.edit',$role->id)); ?>"><i
                                                    class="fa fa-pencil"></i> <?php echo e(__('Edit')); ?></a>
                                        <?php if(!in_array($role->id, $defaultRoles)): ?>
                                            <a class="dropdown-item confirmation"
                                               data-alert="<?php echo e(__('Do you want to delete this role?')); ?>"
                                               data-form-id="ur-<?php echo e($role->id); ?>"
                                               data-form-method='delete'
                                               href="<?php echo e(route('roles.destroy',$role->id)); ?>"><i
                                                        class="fa fa-trash-o"></i> <?php echo e(__('Delete')); ?></a>
                                            <?php if($role->is_active == ACTIVE_STATUS_ACTIVE): ?>
                                                <a data-form-id="ur-<?php echo e($role->id); ?>"
                                                   data-form-method="PUT"
                                                   href="<?php echo e(route('roles.status',$role->id)); ?>"
                                                   class="dropdown-item confirmation"
                                                   data-alert="<?php echo e(__('Do you want to disable this role?')); ?>"><i
                                                            class="fa  fa-times-circle-o"></i> <?php echo e(__('Disable')); ?>

                                                </a>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                        <?php if($role->is_active == ACTIVE_STATUS_INACTIVE): ?>
                                            <a data-form-id="ur-<?php echo e($role->id); ?>"
                                               data-form-method="PUT"
                                               href="<?php echo e(route('roles.status',$role->id)); ?>"
                                               class="dropdown-item confirmation"
                                               data-alert="<?php echo e(__('Do you want to active this role?')); ?>"><i
                                                        class="fa fa-check-square-o"></i> <?php echo e(__('Active')); ?></a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
                </div>
                <?php echo e($list['pagination']); ?>

            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
    <?php echo $__env->make('layouts.includes.list-css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <?php echo $__env->make('layouts.includes.list-js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/booking/resources/views/core/roles/index.blade.php ENDPATH**/ ?>