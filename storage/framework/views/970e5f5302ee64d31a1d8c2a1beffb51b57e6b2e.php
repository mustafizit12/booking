</div>
<?php if(!isset($headerLess) || !$headerLess): ?>
    <?php if(in_array(settings('navigation_type'), [1,2])): ?>
        <?php echo $__env->make('layouts.includes.side_nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
<?php endif; ?>
<!-- Flash Message -->
<?php echo $__env->make('errors.flash_message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!-- REQUIRED SCRIPTS -->
<?php echo $__env->yieldContent('script-top'); ?>
<!-- jQuery -->
<script src="<?php echo e(asset('js/app.js')); ?>"></script>
<?php if(!isset($headerLess) || !$headerLess): ?>
<script src="<?php echo e(asset('plugins/jQueryUI/jquery-ui.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/mcustomscrollbar/jquery.mCustomScrollbar.concat.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/slicknav/slicknav.min.js')); ?>"></script>
<!-- Select2 JavaScript -->
<script src="<?php echo e(asset('plugins/select2/js/select2.js')); ?>"></script>
<!-- Summernote -->
<script src="<?php echo e(asset('plugins/summernote/summernote-bs4.min.js')); ?>"></script>
<?php endif; ?>
<?php echo $__env->yieldContent('extra-script'); ?>
<script src="<?php echo e(asset('js/custom.js')); ?>"></script>

<?php echo $__env->yieldContent('script'); ?>

</body>
</html>
<?php /**PATH /Applications/MAMP/htdocs/booking/resources/views/layouts/includes/script.blade.php ENDPATH**/ ?>