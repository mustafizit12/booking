<?php $__env->startSection('title', __('Logs')); ?>
<?php $__env->startSection('content'); ?>
    <div class="container my-5">
    <div class="row">
        <div class="col-lg-12">
            <div class="row mb-4">
                <div class="col-sm-4">
                    <select name="file" class="file form-control">
                        <?php $__currentLoopData = $files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option
                                <?php echo e(($current_file == $file) ? 'selected' : ''); ?>

                                value="?l=<?php echo e(\Illuminate\Support\Facades\Crypt::encrypt($file)); ?>"> <?php echo e($file); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="col-sm-8">
                    <?php if($current_file): ?>
                        <div class="float-right">
                            <a class="btn btn-sm btn-primary" href="?dl=<?php echo e(\Illuminate\Support\Facades\Crypt::encrypt($current_file)); ?>"><span
                                    class="fa fa-download"></span>
                                <?php echo e(__('Download')); ?></a>
                            <a class="btn btn-sm btn-danger" id="delete-log" data-alert="<?php echo e(__('Are you sure?')); ?>" class="confirmation"
                               href="?del=<?php echo e(\Illuminate\Support\Facades\Crypt::encrypt($current_file)); ?>"><span
                                    class="fa fa-trash"></span>
                                <?php echo e(__('Delete Current File')); ?></a>
                            <?php if(count($files) > 1): ?>
                                <a class="btn btn-sm btn-danger" id="delete-all-log" data-alert="<?php echo e(__('Are you sure?')); ?>" class="confirmation"
                                   href="?delall=true"><span class="fa fa-trash"></span>
                                    <?php echo e(__('Delete All Files')); ?></a>
                            <?php endif; ?>
                        </div>
                        <br>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-3 mb-3">
        <div class="col-lg-12">
            <div class="box box-primary box-borderless">
                <div class="box-body">
                    <?php if($logs === null): ?>
                        <div>
                            <?php echo e(__('Log file > 50M, please download it.')); ?>

                        </div>
                    <?php else: ?>
                        <?php $__env->startComponent('components.table',['class' => 'lv-data-table data-table mb-4']); ?>
                            <?php $__env->slot('thead'); ?>
                                <tr class="bg-primary text-white">
                                    <th class="all"><?php echo e(__('Level')); ?></th>
                                    <th class="min-phone-l"><?php echo e(__('Date')); ?></th>
                                    <th class="min-phone-l"><?php echo e(__('Content')); ?></th>
                                    <th class="none"><?php echo e(__('Details')); ?></th>
                                    <th class="none"><?php echo e(__('Stacktrace')); ?></th>
                                </tr>
                            <?php $__env->endSlot(); ?>

                            <?php $__currentLoopData = $logs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $log): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr data-display="stack<?php echo e($key); ?>">
                                    <td class="text-<?php echo e($log['level_class']); ?>"><i
                                            class="fa fa-<?php echo e($log['level_img']); ?>"
                                            aria-hidden="true"></i> <?php echo e($log['level']); ?></td>
                                    <td class="date"><?php echo e($log['date']); ?></td>
                                    <td class="text">
                                        <code style="display:block;">
                                            <?php echo e(substr($log['text'],0,80)); ?> ...
                                        </code>
                                    </td>
                                    <td>
                                        <code style="display:block;">
                                            <?php echo e($log['text']); ?>

                                            <?php if(isset($log['in_file'])): ?>
                                                <br/><?php echo e($log['in_file']); ?>

                                            <?php endif; ?>
                                        </code>
                                    </td>
                                    <td>
                                        <?php if($log['stack']): ?>
                                            <div class="stack" id="stack<?php echo e($key); ?>"
                                                 style="display: block; white-space: pre-wrap;"><?php echo e(trim($log['stack'])); ?>

                                            </div>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php echo $__env->renderComponent(); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
    <?php echo $__env->make('layouts.includes.list-css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <link rel="stylesheet" href="<?php echo e(asset('plugins/select2/css/select2.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('plugins/select2/css/select2-bootstrap4.min.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <?php echo $__env->make('layouts.includes.list-js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <script src="<?php echo e(asset('plugins/select2/js/select2.js')); ?>"></script>

    <script>
        $(document).ready(function () {
            $('.file').select2({
                theme: 'bootstrap4'
            });

            $(document).on('change', '.file', function () {
                window.location = $(this).val();
            });

            $('.data-table').dataTable({
                'paging': true,
                'searching': true,
                'bInfo': false,
                "dom": 'rtp',
                "language": {
                    "aria": {
                        "sortAscending": ": <?php echo e(__('activate to sort column ascending')); ?>",
                        "sortDescending": ": <?php echo e(__('activate to sort column descending')); ?>"
                    },
                    "emptyTable": "<?php echo e(__('No data available in table')); ?>",
                    "info": "<?php echo e(__('Showing :start to :end of _TOTAL_ entries',['start'=>'_START_','end'=>'_END_'])); ?>",
                    "infoEmpty": "<?php echo e(__('No entries found')); ?>",
                    "infoFiltered": "<?php echo e(__('(filtered1 from :max total entries)',['max'=>'_MAX_'])); ?>",
                    "lengthMenu": "<?php echo e(__(':menu entries',['menu'=>'_MENU_'])); ?>",
                    "search": "<?php echo e(__('Search')); ?>:",
                    "zeroRecords": "<?php echo e(__('No matching records found')); ?>"
                },
                buttons: [],

                responsive: {
                    details: {}
                }
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', ['title'=>__('Logs')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/booking/resources/views/vendor/laravel-log-viewer/log.blade.php ENDPATH**/ ?>