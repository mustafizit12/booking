<?php $__env->startSection('title', $title); ?>
<?php $__env->startSection('content'); ?>
    <?php $title_name = ucwords(Str::replaceLast('_', ' ', $type)); ?>
    <div class="container">
        <div class="row mt-5 mb-4">
            <div class="col-md-12">
                <div class="card-tools float-right">
                    <a href="<?php echo e(route('application-settings.edit',['type'=>$type])); ?>"
                       class="btn btn-info btn-sm back-button"><?php echo e(__('Edit :settingName Setting',['settingName' =>$title_name])); ?></a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-4 col-md-3">
                <ul class="nav nav-pills flex-column">
                    <?php $default = true; ?>
                    <?php $__currentLoopData = $settings['settingSections']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $settingSection): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                        $current_route = is_current_route('application-settings.index', 'active bg-info', ['type' => $settingSection]);
                        if ($default) {
                            $current_route = is_current_route('application-settings.index', 'active bg-info', null, ['type' => $settingSection]);
                        }
                        ?>
                        <li class="nav-item">
                            <a class="nav-link <?php echo e($current_route); ?>" href="<?php echo e(route('application-settings.index',['type'=>$settingSection])); ?>"><?php echo e(ucwords(Str::replaceLast('_',' ',$settingSection))); ?></a>
                        </li>
                        <?php $default = false; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
            <div class="col-sm-8 col-md-9">
                <table class="table table-bordered lf-setting-table">
                    <?php echo e($settings['html']); ?>

                </table>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/booking/resources/views/core/application_settings/index.blade.php ENDPATH**/ ?>