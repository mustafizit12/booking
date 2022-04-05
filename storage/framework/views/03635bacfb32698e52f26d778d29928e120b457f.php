<header class="lf-template-header py-lg-3<?php echo e(isset($transparentHeader) && $transparentHeader ? ' header-transparent' : (settings('top_nav')==1 ? " header-light" : '')); ?>">  <!--header-transparent header-light-->
    <div class="container-fluid">
        <div class="row align-items-center<?php echo e(in_array(settings('navigation_type'), [0,2]) ? '' : ' justify-content-center'); ?>">
            <!-- menu -->
            <div class="col-lg-<?php echo e(in_array(settings('navigation_type'), [0,2]) ? 9 : 9); ?> col-md-12 order-lg-0 order-2 py-lg-0 py-3">
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1 flex-lg-grow-0">
                        <!-- <a href="<?php echo e(route('home')); ?>" class="lf-logo<?php echo e(isset($inversedLogo) ? ($inversedLogo  ? ' lf-logo-inversed' : '') : (!empty(settings('logo_inversed_primary')) ? ' lf-logo-inversed' : '')); ?>">
                            <img src="<?php echo e(company_logo()); ?>" class="img-fluid" alt="">
                        </a> -->
                        <?php if(auth()->user()): ?>
                            <a href="javascript:;" class="lf-side-nav-controller lf-side-nav-toggler"><i class="fa fa-bars"></i></a>
                        <?php endif; ?>
                        <!-- <?php if(auth()->user() && auth()->id() == 1): ?>
                            <?php if(in_array(settings('navigation_type'), [1,2])): ?>
                                <a href="javascript:;" class="lf-side-nav-controller lf-side-nav-toggler"><i class="fa fa-bars"></i></a>
                            <?php endif; ?>
                        <?php endif; ?> -->
                    </div>
                    <?php if(in_array(settings('navigation_type'), [0,2])): ?>
                    <div class="flex-lg-grow-1">
                        <nav class="d-lg-block d-none">
                            <?php echo e(get_nav('top-nav')); ?>

                        </nav>
                        <div class="lf-responsive-menu-wrapper d-lg-none d-block"></div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
            <!-- user option -->
            <div class="col-lg-3 order-lg-0 order-0 px-lg-2">
                <ul class="d-flex justify-content-center align-items-center lf-user-menu">
                    <?php if(auth()->guard()->guest()): ?>
                    <li>
                        <a href="#" data-toggle="modal" data-target="#login"><?php echo e(__('Login')); ?></a>
                    </li>
                    <li>
                        <a href="#" data-toggle="modal" data-target="#registration"><?php echo e(__('Signup')); ?></a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('teacherRegistration')); ?>" ><?php echo e(__('Become an Instructor')); ?></a>
                    </li>
                    <?php endif; ?>
                    <?php if(auth()->guard()->check()): ?>
                    <?php
                        $userNotifications = get_user_specific_notice();
                    ?>
                    <li>
                        <div class="btn-group lf-user-notification">
                            <button type="button" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                <i class="fa fa-bell-o notification-icon"></i>
                                <div class="lf-notification-count"><?php echo e($userNotifications['count_unread']); ?></div>
                            </button>
                            <?php if(!empty($userNotifications['list']->count())): ?>
                            <div class="dropdown-menu dropdown-menu-right">
                                <span class="dropdown-header"><?php echo e(__('You have :count notifications',['count' => $userNotifications['count_unread']])); ?></span>

                                <?php $__currentLoopData = $userNotifications['list']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <a class="dropdown-item">
                                        <i class="fa fa-bell text-warning"></i>
                                        <?php echo e($notification->data); ?>

                                    </a>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <a class="btn btn-info text-center all-notification" href="<?php echo e(route('notices.index')); ?>"><?php echo e(__('See All Notifications')); ?></a>
                            </div>
                            <?php endif; ?>
                        </div>
                    </li>
                    <li>
                        <div class="btn-group lf-user-dropdown">
                            <button type="button" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                <i class="fa fa-user"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <div class="dropdown-header">
                                    <div class="d-flex pb-2">
                                        <div class="avatar">
                                            <img src="<?php echo e(get_avatar(auth()->user()->avatar)); ?>" alt="" class="img-fluid">
                                        </div>
                                        <div class="user-info">
                                            <h6><?php echo e(auth()->user()->profile->full_name); ?></h6>
                                            <div><?php echo e(auth()->user()->username); ?></div>
                                        </div>
                                    </div>
                                    <a class="btn btn-info btn-sm" href="<?php echo e(route('logout')); ?>"><i class="fa fa-sign-out"></i> Log out</a>
                                </div>
                                <?php echo e(get_nav('profile-nav', 'profile_dropdown')); ?>

                            </div>
                        </div>
                    </li>
                    <?php endif; ?>
                    <?php if(settings('lang_switcher')): ?>
                        <li>
                            <div class="btn-group lf-language">
                                <button type="button" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <div class="shadow"><?php echo e(display_language(App::getLocale())); ?></div>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <?php $__currentLoopData = language(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language => $parameter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <a class="dropdown-item"
                                           href="<?php echo e(generate_language_url($language)); ?>">
                                            <?php echo e(display_language($language, $parameter)); ?>

                                        </a>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
</header>
<?php /**PATH /Applications/MAMP/htdocs/booking/resources/views/layouts/includes/top_header.blade.php ENDPATH**/ ?>