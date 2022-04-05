<?php echo $__env->make('layouts.includes.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php if(isset($headerLess) && $headerLess): ?>
    <div class="centralize-wrapper">
        <div class="centralize-inner">
            <div class="centralize-content lf-no-header-wrapper">
                <?php echo $__env->yieldContent('content'); ?>
            </div>
        </div>
    </div>
<?php else: ?>
    <?php echo $__env->make('layouts.includes.top_header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->renderWhen((!isset($hideBreadcrumb) || !$hideBreadcrumb), 'layouts.includes.breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>

    <?php echo $__env->yieldContent('content'); ?>

    <?php echo $__env->yieldContent('extended-content'); ?>

    <?php echo $__env->make('layouts.includes.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>
<?php echo $__env->make('layouts.includes.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH /Applications/MAMP/htdocs/booking/resources/views/layouts/master.blade.php ENDPATH**/ ?>