<div class="lf-title">
    <div class="container">
        <div class="row">
            <div class="col">
                <?php if(isset($title)): ?>
                <h3><?php echo e($title); ?></h3>
                <?php endif; ?>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="text-info" href="<?php echo e(route('home')); ?>"><i class="fa fa-home"></i> <?php echo e(__('Home')); ?></a></li>
                        <?php $__currentLoopData = get_breadcrumbs(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $breadcrumb): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($loop->last || empty($breadcrumb['display_url'])): ?>
                                <li class="breadcrumb-item active" aria-current="page"><?php echo e($breadcrumb['name']); ?></li>
                            <?php else: ?>
                                <li class="breadcrumb-item"><a class="text-info" href="<?php echo e($breadcrumb['url']); ?>"><?php echo e($breadcrumb['name']); ?></a>
                                </li>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /Applications/MAMP/htdocs/booking/resources/views/layouts/includes/breadcrumb.blade.php ENDPATH**/ ?>