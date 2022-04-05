<div class="bg-primary py-3 px-3 mt-5">
    <div class="row">
        <form action="<?php echo e($route); ?>" class="lf-filter-form form-inline" method="get">
            <?php if(is_array($orderFields)): ?>
                <div class="col-md-<?php echo e($isDateFilterable ? '3' : '6'); ?>">
                    <div class="form-group clearfix">
                        <div class="lf-select">
                            <select class="form-control lf-filter-sort-by" name="<?php echo e($paginationKey); ?>_sort">
                                <option value=""><?php echo e(__('Sort by')); ?></option>
                                <?php $__currentLoopData = $orderFields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ofKey => $ofVal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option
                                        value="<?php echo e($ofKey); ?>" <?php echo e(return_get($paginationKey.'_sort',$ofKey)); ?>><?php echo e($ofVal[1]); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="lf-select">
                            <select class="form-control lf-filter-order-by" name="<?php echo e($paginationKey); ?>_ord">
                                <option value="d"<?php echo e(return_get($paginationKey.'_ord','d')); ?>><?php echo e(__('Desc')); ?></option>
                                <option value="a"<?php echo e(return_get($paginationKey.'_ord','a')); ?>><?php echo e(__('Asc')); ?></option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-danger"><i class="fa fa-arrow-right"></i></button>
                    </div>
                </div>
            <?php endif; ?>

            <?php if($isDateFilterable): ?>
                <div class="col-md-3">
                    <div class="form-group clearfix">
                        <input type="text" class="form-control lf-filter-from-date datepicker"
                               name="<?php echo e($paginationKey); ?>_frm"
                               placeholder="From date"
                               value="<?php echo e(return_get($paginationKey.'_frm')); ?>">
                        <input type="text" class="form-control lf-filter-to-date datepicker"
                               name="<?php echo e($paginationKey); ?>_to"
                               placeholder="To date"
                               value="<?php echo e(return_get($paginationKey.'_to')); ?>">
                        <button type="submit" class="btn btn-danger"><i class="fa fa-arrow-right"></i></button>
                    </div>
                </div>
            <?php endif; ?>
            <div
                class="col-md-<?php echo e((!is_array($orderFields) && $isDateFilterable) || (!is_array($orderFields) && !$isDateFilterable) ? '9' : '6'); ?> <?php echo e((!is_array($orderFields) && $isDateFilterable) || (is_array($orderFields) && !$isDateFilterable) || (is_array($orderFields) && $isDateFilterable) ? '' : 'offset-md-3'); ?>">
                <div class="d-flex lf-filter-search-group" style="<?php echo e($dataFilter ? 'margin-right:36px;' : ''); ?>">
                    <?php if(isset($searchFields)): ?>
                        <div class="lf-select" style="flex:3">
                            <select class="form-control" name="<?php echo e($paginationKey); ?>_ssf">
                                <option value=""><?php echo e(__('All Fields')); ?></option>
                                <?php $__currentLoopData = $searchFields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ssfKey => $ssfVal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option
                                        value="<?php echo e($ssfKey); ?>" <?php echo e(return_get($paginationKey.'_ssf',$ssfKey)); ?>><?php echo e($ssfVal[1]); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="lf-select" style="flex:3">
                            <select class="form-control lf-filter-comparison-operator select-compact"
                                    name="<?php echo e($paginationKey); ?>_comp">
                                <option
                                    value="lk"<?php echo e(return_get($paginationKey.'_comp','lk')); ?>><?php echo e(__('Similar to')); ?></option>
                                <option value="e"<?php echo e(return_get($paginationKey.'_comp','e')); ?>><?php echo e(__('Exact to')); ?></option>
                                <option
                                    value="l"<?php echo e(return_get($paginationKey.'_comp','l')); ?>><?php echo e(__('Smaller than')); ?></option>
                                <option
                                    value="le"<?php echo e(return_get($paginationKey.'_comp','le')); ?>><?php echo e(__('Less or equal to')); ?></option>
                                <option
                                    value="m"<?php echo e(return_get($paginationKey.'_comp','m')); ?>><?php echo e(__('Bigger Than')); ?></option>
                                <option
                                    value="me"<?php echo e(return_get($paginationKey.'_comp','me')); ?>><?php echo e(__('Bigger or Equal to')); ?></option>
                                <option
                                    value="ne"<?php echo e(return_get($paginationKey.'_comp','ne')); ?>><?php echo e(__('Not Equal')); ?></option>
                            </select>
                        </div>
                    <?php endif; ?>
                    <div style="flex: 5; margin-right: 1%">
                        <input type="text" class="form-control lf-filter-search" name="<?php echo e($paginationKey); ?>_srch"
                               placeholder="search"
                               value="<?php echo e(return_get($paginationKey.'_srch')); ?>" style="margin-right: 0 !important">
                    </div>
                    <button type="submit" class="btn btn-danger"><i class="fa fa-search"></i></button>
                    <a href="javascript:" class="lf-filter-toggler btn btn-warning"
                       style="<?php echo e($dataFilter ? '' : 'display:none'); ?>"><i class="fa fa-filter"></i></a>
                </div>
            </div>
            <?php if(is_array(request()->input($paginationKey.'_fltr'))): ?>
                <?php $__currentLoopData = request()->input($paginationKey.'_fltr'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if(is_array($value)): ?>
                        <?php $__currentLoopData = $value; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $optionKey=>$optionValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if(!empty($optionValue) && !is_array($optionValue)): ?>
                                <input type="hidden" name="<?php echo e($paginationKey); ?>_fltr[<?php echo e($key); ?>][]"
                                       value="<?php echo e(request()->input($paginationKey.'_fltr.'.$key.'.'.$optionKey)); ?>">
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </form>
    </div>
</div>
<?php /**PATH /Applications/MAMP/htdocs/booking/resources/views/core/renderable_template/search.blade.php ENDPATH**/ ?>