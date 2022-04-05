<?php $__env->startSection('title', $title); ?>
<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <?php echo e($list['search']); ?>

                <?php echo e($list['filters']); ?>

                <div class="my-5">
                <?php $__env->startComponent('components.table',['class'=> 'lf-data-table']); ?>
                    <?php $__env->slot('thead'); ?>
                        <tr class="bg-primary text-white">
                            <th class="all"><?php echo e(__('Phone')); ?></th>
                            <th class="min-phone-l"><?php echo e(__('First Name')); ?></th>
                            <th class="min-phone-l"><?php echo e(__('Last Name')); ?></th>
                            <th class="min-phone-l"><?php echo e(__('User Group')); ?></th>
                            <th class="min-phone-l"><?php echo e(__('Username')); ?></th>
                            <th class="none"><?php echo e(__('Registered Date')); ?></th>
                            <th class="text-center min-phone-l"><?php echo e(__('Status')); ?></th>
                            <th class="text-right all no-sort"><?php echo e(__('Action')); ?></th>
                        </tr>
                    <?php $__env->endSlot(); ?>

                    <?php $__currentLoopData = $list['items']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td>
                                <?php if(has_permission('users.show')): ?>
                                    <a href="<?php echo e(route('users.show', $user->id)); ?>"><?php echo e($user->profile->phone); ?></a>
                                <?php else: ?>
                                    <?php echo e($user->profile->phone); ?>

                                <?php endif; ?>
                            </td>
                            <td><?php echo e($user->first_name); ?></td>
                            <td><?php echo e($user->last_name); ?></td>
                            <td><?php echo e($user->name); ?></td>
                            <td><?php echo e($user->username); ?></td>
                            <td><?php echo e($user->created_at->format('Y-m-d')); ?></td>
                            <td class="text-center"><?php echo e(view_html($user->is_active ? '<i class="fa fa-check text-success"></i>' : '<i class="fa fa-times text-danger"></i>')); ?></td>
                            <td class="lf-action text-right">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-info dropdown-toggle"
                                            data-toggle="dropdown" aria-expanded="false">
                                        <i class="fa fa-gear"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right" role="menu">
                                        <a class="dropdown-item" href="<?php echo e(route('users.show',$user->id)); ?>"><i
                                                class="fa fa-eye"></i> <?php echo e(__('Show')); ?></a>
                                        <a class="dropdown-item" href="<?php echo e(route('users.edit',$user->id)); ?>"><i
                                                class="fa fa-pencil-square-o fa-lg text-info"></i> <?php echo e(__('Edit Info')); ?>

                                        </a>
                                        <a class="dropdown-item" href="<?php echo e(route('users.edit.status',$user->id)); ?>"><i
                                                class="fa fa-pencil-square fa-lg text-info"></i> <?php echo e(__('Edit Status')); ?>

                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php echo $__env->renderComponent(); ?>
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
    <script>
        (function ($) {
            $('.lf-filter-toggler').on('click', function () {
                $('.lf-filter-container').slideToggle();
            })
        })(jQuery)
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/booking/resources/views/core/users/index.blade.php ENDPATH**/ ?>