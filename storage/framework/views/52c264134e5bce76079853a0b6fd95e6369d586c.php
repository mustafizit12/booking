<?php $__env->startSection('title', $title); ?>
<?php $__env->startSection('style'); ?>
    <link rel="stylesheet" href="<?php echo e(mix('css/menu-builder.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="container my-5">
        <div class="row">
            <div class="col-md-3">
                <div class="card card-outline card-info mb-4" style="box-shadow: 0 0 5px rgba(0,0,0,0.1)">
                    <div class="card-header bg-primary">
                        <h5 class="text-white"><?php echo e(__('Select Nav')); ?></h5>
                    </div>
                    <div class="card-body">
                    <nav class="nav nav-pills flex-column">
                        <?php $__currentLoopData = $navigationPlaces; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $navigationPlace): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a class="nav-link <?php echo e($slug == $navigationPlace ? 'active bg-info' : ''); ?>"
                               href="<?php echo e(route('menu-manager.index',$navigationPlace)); ?>"><?php echo e(ucfirst(str_replace('-',' ',$navigationPlace))); ?></a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </nav>
                    </div>
                </div>


                <div class="card card-outline card-info mb-4" style="box-shadow: 0 0 5px rgba(0,0,0,0.1)">
                    <div class="card-header bg-primary">
                        <h5 class="text-white"><?php echo e(__('Add Routes')); ?></h5>
                    </div>
                    <div class="card-body" style="overflow: hidden">
                    <div style="margin:-12px -10px 12px; border-bottom: 1px solid #ced4da;padding:10px;">
                        <input id="search-route" type="text" class="form-control" placeholder="search"
                               style="box-shadow: none !important; padding: 5px 8px;border-radius: 0; font-size: 14px;">
                    </div>
                    <?php $count=1; ?>
                    <div id="all-routes" style="overflow-y: scroll; overflow-x:hidden; max-height: 150px; margin: -11px -21px -11px -9px;"
                         data-name="Unnamed">
                        <?php $__currentLoopData = $allRoutes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $routeName => $routeData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if(is_null($routeData->getName())): ?>
                                <?php continue; ?>
                            <?php endif; ?>
                            <?php
                                $middleware = $routeData->middleware();
                                $parameters = $routeData->signatureParameters();
                                $isMenuable = true;
                            ?>
                            <?php if(is_array($middleware) && count(array_intersect($middleware,['permission','guest.permission','verification.permission','menuable']))>0): ?>
                                <?php $__currentLoopData = $parameters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $parameter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if(!$parameter->isOptional()): ?>
                                        <?php ($isMenuable = false); ?>
                                        <?php break; ?>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                                <?php ($isMenuable = false); ?>
                            <?php endif; ?>
                            <?php if($isMenuable): ?>
                                <?php
                                $route = explode('/{', $routeName)[0];
                                if ($route == '/' || $route == '' || strlen($route) == 2) {
                                    $route = 'home';
                                } else {
                                    if (strpos($route, '/') == 2) {
                                        $route = substr($route, 3);
                                    }
                                    $route = strtolower(str_replace('/', ' - ', str_replace('-', ' ', $route)));
                                }
                                ?>
                                <div class="checkbox lf-checkbox">
                                    <input id="checkbox-route-<?php echo e($count); ?>" type="checkbox" class="flat-red route-check-box" value="<?php echo e($routeData->getName()); ?>">
                                    <label for="checkbox-route-<?php echo e($count); ?>" style="margin-bottom: 0"><?php echo e($route); ?></label>
                                </div>
                                <?php $count++; ?>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-block btn-sm btn-info" id="add-route"><?php echo e(__('Add Route')); ?></button>
                    </div>
                </div>

                <div class="card card-outline card-info" style="box-shadow: 0 0 5px rgba(0,0,0,0.1)">
                    <div class="card-header bg-primary">
                        <h5 class="text-white"><?php echo e(__('Add LINK')); ?></h5>
                    </div>
                    <div class="card-body">
                    <div class="form-group">
                        <input type="text" id="link-data" placeholder="Enter url" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="text" data-name="Unnamed" id="link-name" placeholder="Enter Menu Item Name"
                               class="form-control">
                    </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-block btn-sm btn-info" id="add-link"><?php echo e(__('Add A custom Link')); ?></button>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="card card-outline card-info">
                    <div class="card-header bg-primary">
                        <h5 class="text-white"><?php echo e(__('Menu Items')); ?></h5>
                    </div>
                    <div class="card-body">
                    <?php echo e(Form::open(['route'=>['menu-manager.save', $slug], 'method'=>'post','id'=>'menu-form'])); ?>

                    <div style="overflow:hidden; width:100%;">
                        <?php echo e($menu); ?>

                    </div>
                    <button id="form-submit-button" type="submit" style="display:none"><?php echo e(__('Save Menu')); ?></button>
                    <?php echo e(Form::close()); ?>

                    </div>
                    <div class="card-footer">
                        <button class="btn btn-sm btn-info menu-submit"><?php echo e(__('Save Menu')); ?></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(asset('plugins/jQueryUI/jquery-ui.min.js')); ?>"></script>
    <script src="<?php echo e(asset('plugins/menu_manager/jquery.mjs.nestedSortable.js')); ?>"></script>
    <script src="<?php echo e(asset('plugins/menu_manager/adminmenuhandler.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/booking/resources/views/core/navigation/index.blade.php ENDPATH**/ ?>