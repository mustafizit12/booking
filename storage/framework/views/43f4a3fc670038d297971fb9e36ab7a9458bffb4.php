<?php $__env->startSection('title', $title); ?>
<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <?php echo e($list['search']); ?>

                <a href="<?php echo e(route('hotels.create')); ?>" style="float:right;" class="my-2 btn btn-info">Create Hotel</a>
                <div class="my-2">
                <?php $__env->startComponent('components.table',['class'=> 'lf-data-table']); ?>
                    <?php $__env->slot('thead'); ?>
                        <tr class="bg-primary text-white">
                            <th class="all"><?php echo e(__('Vendor')); ?></th>
                            <th class="all"><?php echo e(__('Agent')); ?></th>
                            <th class="all"><?php echo e(__('Area')); ?></th>
                            <th class="all"><?php echo e(__('Name')); ?></th>
                            <th class="min-phone-l"><?php echo e(__('Contact Number')); ?></th>
                            <th class="min-phone-l"><?php echo e(__('Hotel Category')); ?></th>
                            <th class="text-right all no-sort"><?php echo e(__('Action')); ?></th>
                        </tr>
                    <?php $__env->endSlot(); ?>

                    <?php $__currentLoopData = $list['items']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>

                            <td><?php echo e($data->user->profile->full_name); ?></td>
                            <?php if($data->agent_id != null): ?>
                            <td><?php echo e($data->agent_user->profile->full_name); ?></td>
                            <?php else: ?>
                            <td></td>
                            <?php endif; ?>
                            <td><?php echo e($data->area->name); ?></td>
                            <td><?php echo e($data->name); ?></td>
                            <td><?php echo e($data->contact_number); ?></td>
                            <td><?php echo e($data->hotel_category); ?></td>
                            <td class="lf-action text-right">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-info dropdown-toggle"
                                            data-toggle="dropdown" aria-expanded="false">
                                        <i class="fa fa-gear"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right" role="menu">
                                        <a class="dropdown-item" href="<?php echo e(route('hotels.show',$data->id)); ?>"><i
                                                class="fa fa-eye"></i> <?php echo e(__('Show')); ?></a>
                                        <a class="dropdown-item" href="<?php echo e(route('hotels.edit',$data->id)); ?>"><i
                                                class="fa fa-pencil-square-o fa-lg text-info"></i> <?php echo e(__('Edit Info')); ?>

                                        </a>
                                        <a class="dropdown-item confirmation"
                                           data-alert="<?php echo e(__('Do you want to delete this data?')); ?>"
                                           data-form-id="ur-<?php echo e($data->id); ?>"
                                           data-form-method='delete'
                                           href="<?php echo e(route('hotels.destroy',$data->id)); ?>"><i
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
    <script>
        (function ($) {
            $('.lf-filter-toggler').on('click', function () {
                $('.lf-filter-container').slideToggle();
            })
        })(jQuery)
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/booking/resources/views/Hotel/index.blade.php ENDPATH**/ ?>