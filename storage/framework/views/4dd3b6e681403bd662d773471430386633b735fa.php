<?php $__env->startSection('title', __('Error 404')); ?>

<?php $__env->startSection('content'); ?>
    <div class="mb-4 text-center" style="padding: 0 15px;">
    <img src="<?php echo e(asset('storage/images/404.png')); ?>" alt="" class="img-fluid">
    </div>
    <div class="lf-no-header-inner">
        <div class="mx-lg-4">
            <h4 class="text-center text-danger mb-4"><?php echo e((isset($exception) && $exception->getMessage()) ? $exception->getMessage() : __('Not Found!')); ?></h4>
            <p class="text-center pb-3"><?php echo e(__('The page you are looking for might be changed, removed or not exists. Go back and try other links')); ?></p>
            <a href="<?php echo e(route('home')); ?>" class="btn btn-success btn-block"><?php echo e(__('Go Home')); ?></a>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master',['headerLess'=>true], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/booking/resources/views/errors/404.blade.php ENDPATH**/ ?>