<div class="bg-primary py-3 px-3 mb-5">
<div class="row">
    <div class="col-sm-6">
        <?php if($query->hasPages()): ?>
            <nav class="lf-pagination">
                <ul class="pagination pagination-sm">
                    
                    <?php if($query->onFirstPage()): ?>
                        <li class="page-item disabled"><span class="page-link">&lsaquo;</span></li>
                    <?php else: ?>
                        <li class="page-item"><a class="page-link" href="<?php echo e($query->previousPageUrl()); ?>" rel="prev">&lsaquo;</a></li>
                    <?php endif; ?>

                    <?php if($query->currentPage() > 2): ?>
                        <li class="page-item hidden-xs"><a class="page-link" href="<?php echo e($query->url(1)); ?>">1</a></li>
                    <?php endif; ?>
                    <?php if($query->currentPage() > 3): ?>
                        <li class="page-item"><span class="page-link">..</span></li>
                    <?php endif; ?>
                    <?php $__currentLoopData = range(1, $query->lastPage()); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($i >= $query->currentPage() - 2 && $i <= $query->currentPage() + 2): ?>
                            <?php if($i == $query->currentPage()): ?>
                                <li class="page-item active"><span class="page-link"><?php echo e($i); ?></span></li>
                            <?php else: ?>
                                <li class="page-item"><a class="page-link" href="<?php echo e($query->url($i)); ?>"><?php echo e($i); ?></a></li>
                            <?php endif; ?>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php if($query->currentPage() < $query->lastPage() - 2): ?>
                        <li class="page-item"><span class="page-link">..</span></li>
                    <?php endif; ?>
                    <?php if($query->currentPage() < $query->lastPage() - 1): ?>
                        <li class="page-item hidden-xs"><a class="page-link" href="<?php echo e($query->url($query->lastPage())); ?>"><?php echo e($query->lastPage()); ?></a>
                        </li>
                    <?php endif; ?>

                    
                    <?php if($query->hasMorePages()): ?>
                        <li class="page-item"><a class="page-link" href="<?php echo e($query->nextPageUrl()); ?>" rel="next">&rsaquo;</a></li>
                    <?php else: ?>
                        <li class="page-item disabled"><span class="page-link">&rsaquo;</span></li>
                    <?php endif; ?>
                </ul>
            </nav>
        <?php endif; ?>
    </div>
    <div class="col-sm-6 text-white text-sm-right">
        <?php
        $pagcountst = ($query->currentPage() - 1) * $itemPerPage + 1;
        $pagcountnd = ($query->currentPage() - 1) * $itemPerPage + $query->count();
        $currentItem = '';
        if ($pagcountnd == 0 || $pagcountst > $pagcountnd) {
            $current = '0';
        } elseif ($pagcountst == $pagcountnd) {
            $current = $pagcountnd;
            $currentItem = __('no.') . ' ';
        } else {
            $current = $pagcountst . ' - ' . $pagcountnd;
        }
        ?>
        <span class="pagination-text">
            <?php echo e(view_html( __('showing: :currentItem <span>:current</span> of <span>:total</span> :itemname',['currentItem'=>$currentItem, 'current'=>$current, 'total'=>$query->total(), 'itemname'=>$itemName]))); ?>

        </span>
    </div>
</div>
</div>
<?php /**PATH /Applications/MAMP/htdocs/booking/resources/views/core/renderable_template/pagination.blade.php ENDPATH**/ ?>