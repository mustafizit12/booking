<?php $__env->startSection('title', $title); ?>

<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <?php echo e($list['search']); ?>

                <div class="my-5">
                    <?php $__env->startComponent('components.table',['class' => 'lf-data-table']); ?>
                        <?php $__env->slot('thead'); ?>
                            <tr class="bg-primary text-white">
                                <th class="all"><?php echo e(__('Title')); ?></th>
                                <th class="min-phone-l"><?php echo e(__('Start Time')); ?></th>
                                <th class="min-phone-l"><?php echo e(__('End Time')); ?></th>
                                <th class="min-phone-l"><?php echo e(__('Type')); ?></th>
                                <th class="min-phone-l"><?php echo e(__('Status')); ?></th>
                                <th class="none"><?php echo e(__('Description')); ?></th>
                                <th class="all no-sort text-right"><?php echo e(__('Action')); ?></th>
                            </tr>
                        <?php $__env->endSlot(); ?>

                        <?php $__currentLoopData = $list['items']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($notice->title); ?></td>
                                <td><?php echo e($notice->start_at); ?></td>
                                <td><?php echo e($notice->end_at); ?></td>
                                <td><span class="badge badge-<?php echo e($notice->type); ?>"><?php echo e(ucfirst($notice->type)); ?></span>
                                </td>
                                <td><?php echo e(active_status($notice->is_active)); ?></td>
                                <td><?php echo e($notice->description); ?></td>
                                <td class="lf-action text-right">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-info dropdown-toggle"
                                                data-toggle="dropdown"
                                                aria-expanded="false">
                                            <i class="fa fa-gear"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right" role="menu">
                                            <a class="dropdown-item"
                                               href="<?php echo e(route('system-notices.edit',['id' => $notice->id, 'return-url' => request()->getUri()])); ?>"><i
                                                    class="fa fa-pencil"></i> <?php echo e(__('Edit')); ?></a>
                                            <a class="dropdown-item confirmation" data-alert="<?php echo e(__('Are you sure?')); ?>"
                                               data-form-id="urm-<?php echo e($notice->id); ?>" data-form-method='delete'
                                               href="<?php echo e(route('system-notices.destroy',$notice->id)); ?>"><i
                                                    class="fa fa-trash-o"></i> <?php echo e(__('Delete')); ?></a>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/booking/resources/views/core/system_notice/index.blade.php ENDPATH**/ ?>