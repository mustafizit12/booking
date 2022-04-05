<?php $__env->startSection('title', __('Unauthorized')); ?>

<?php $__env->startSection('content'); ?>
    <div class="mb-4 text-center" style="padding: 0 15px;">
        <img src="<?php echo e(asset('storage/images/unauthorized.png')); ?>" alt="" class="img-fluid" style="max-width: 230px">
    </div>
    <div class="lf-no-header-inner">
        <div class="mx-lg-4">
            <h4 class="text-center text-warning mb-4"><?php echo e((isset($exception) && $exception->getMessage()) ? $exception->getMessage() : __('Unauthorized!')); ?></h4>
            <p class="text-center pb-3"><?php echo e(__('You are not authorized to access this page.')); ?></p>
            <?php if(auth()->guard()->guest()): ?>
                <a href="<?php echo e(route('home')); ?>" class="btn btn-success btn-block"><?php echo e(__('Go Home')); ?></a>
            <?php endif; ?>
            <?php if(auth()->guard()->check()): ?>
                <a href="<?php echo e(route('profile.index')); ?>" class="btn btn-success btn-block"><?php echo e(__('Go Profile')); ?></a>
            <?php endif; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master',['headerLess'=>true], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/booking/resources/views/errors/401.blade.php ENDPATH**/ ?>