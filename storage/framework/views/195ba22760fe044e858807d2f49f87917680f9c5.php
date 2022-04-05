<?php $__env->startSection('title', $title); ?>
<?php $__env->startSection('content'); ?>
    <?php $title_name = ucwords(Str::replaceLast('_', ' ', $type)); ?>

    <div class="container">
        <div class="row mt-5 mb-4">
            <div class="col-md-12">
                <div class="card-tools float-right">
                    <a href="<?php echo e(route('application-settings.index',['type'=>$type])); ?>"
                       class="btn btn-info btn-sm back-button"><?php echo e(__('View :settingName Setting',['settingName' =>$title_name])); ?></a>
                </div>
            </div>
        </div>
        <div class="row mb-5">
            <div class="col-sm-4 col-md-3">
                <ul class="nav nav-pills flex-column">
                    <?php $__currentLoopData = $settings['settingSections']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $settingSection): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="nav-item">
                            <a class="nav-link <?php echo e(is_current_route('application-settings.edit', 'active bg-info', ['type'=>$settingSection])); ?>"
                               href="<?php echo e(route('application-settings.edit',['type'=>$settingSection])); ?>"><?php echo e(ucwords(Str::replaceLast('_',' ',$settingSection))); ?></a>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
            <div class="col-sm-8 col-md-9">
                <?php echo e(Form::open(['route'=>['application-settings.update','type'=> $type], 'method'=>'PUT','files'=>true])); ?>

                <?php $__env->startComponent('components.table', ['type' => 'bordered', 'class'=> 'lf-setting-table']); ?>
                    <?php echo e($settings['html']); ?>

                    <tr>
                        <td colspan="2" class="text-right">
                            <?php echo e(Form::submit(__('Update :settingName Setting',['settingName' =>$title_name]),['class'=>'btn btn-info btn-sm'])); ?>

                        </td>
                    </tr>
                <?php echo $__env->renderComponent(); ?>
                <?php echo e(Form::close()); ?>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('plugins/jasny-bootstrap/css/jasny-bootstrap.min.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(asset('plugins/jasny-bootstrap/js/jasny-bootstrap.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/booking/resources/views/core/application_settings/edit.blade.php ENDPATH**/ ?>