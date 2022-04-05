<form action="<?php echo e($route); ?>" class="lf-filter-container" method="get" style="<?php echo e(!empty(request()->get($paginationKey.'_fltr')) ? '' : 'display:none;'); ?>">
    <div class="lf-filter-wrapper row">
        <?php $__currentLoopData = $dataFilter; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $filterKey => $filterValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="my-3 col-md-3">
                <h6><?php echo e($filterValue[1]); ?></h6>
                <?php $__currentLoopData = $filterValue[2]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $optionKey => $optionValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div>
                        <input id="<?php echo e($paginationKey); ?>_fltr-<?php echo e($filterKey); ?>-<?php echo e($optionKey); ?>"
                               name="<?php echo e($paginationKey); ?>_fltr[<?php echo e($filterKey); ?>][]" type="checkbox" value="<?php echo e($optionKey); ?>"
                               <?php echo e(is_array(request()->input($paginationKey.'_fltr.'.$filterKey)) && in_array($optionKey,request()->input($paginationKey.'_fltr.'.$filterKey)) ? ' checked' : ''); ?> class="lf-filter-checkbox">
                        <label class="lf-filter-checkbox-label"
                               for="<?php echo e($paginationKey); ?>_fltr-<?php echo e($filterKey); ?>-<?php echo e($optionKey); ?>"><?php echo e($optionValue); ?></label>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <button type="submit" class="btn btn-info"><i class="fa fa-filter"></i> Filter</button>

    <?php if(!empty(return_get($paginationKey.'_srch')) && !is_array(return_get($paginationKey.'_srch'))): ?>
        <input type="hidden" name="<?php echo e($paginationKey); ?>_srch" value="<?php echo e(request()->input($paginationKey.'_srch')); ?>">
    <?php endif; ?>
    <?php if(!empty(return_get($paginationKey.'_comp')) && !is_array(return_get($paginationKey.'_comp'))): ?>
        <input type="hidden" name="<?php echo e($paginationKey); ?>_comp" value="<?php echo e(request()->input($paginationKey.'_comp')); ?>">
    <?php endif; ?>
    <?php if(!empty(return_get($paginationKey.'_ssf')) && !is_array(return_get($paginationKey.'_ssf'))): ?>
        <input type="hidden" name="<?php echo e($paginationKey); ?>_ssf" value="<?php echo e(request()->input($paginationKey.'_ssf')); ?>">
    <?php endif; ?>
    <?php if(!empty(return_get($paginationKey.'_frm')) && !is_array(return_get($paginationKey.'_frm'))): ?>
        <input type="hidden" name="<?php echo e($paginationKey); ?>_frm" value="<?php echo e(request()->input($paginationKey.'_frm')); ?>">
    <?php endif; ?>
    <?php if(!empty(return_get($paginationKey.'_to')) && !is_array(return_get($paginationKey.'_to'))): ?>
        <input type="hidden" name="<?php echo e($paginationKey); ?>_to" value="<?php echo e(request()->input($paginationKey.'_to')); ?>">
    <?php endif; ?>
    <?php if(!empty(return_get($paginationKey.'_sort')) && !is_array(return_get($paginationKey.'_sort'))): ?>
        <input type="hidden" name="<?php echo e($paginationKey); ?>_sort" value="<?php echo e(request()->input($paginationKey.'_sort')); ?>">
    <?php endif; ?>
    <?php if(!empty(return_get($paginationKey.'_ord')) && !is_array(return_get($paginationKey.'_ord'))): ?>
        <input type="hidden" name="<?php echo e($paginationKey); ?>_ord" value="<?php echo e(request()->input($paginationKey.'_ord')); ?>">
    <?php endif; ?>
</form>
<?php /**PATH /Applications/MAMP/htdocs/booking/resources/views/core/renderable_template/filters.blade.php ENDPATH**/ ?>