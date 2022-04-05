<?php
$sideLogoClass = '';
if(settings('side_nav')==1){
    $sideLogoClass =' lf-white-side-nav';
}
elseif(settings('side_nav')==2){
    $sideLogoClass =' lf-dark-transparent-side-nav';
}
elseif(settings('side_nav')==3){
    $sideLogoClass =' lf-white-transparent-side-nav';
}
?>
<div class="lf-side-nav<?php echo e($sideLogoClass); ?><?php echo e((settings('navigation_type') && settings('side_nav_fixed')) || (isset($fixedSideNav) && $fixedSideNav) ? ' lf-side-nav-open' : ''); ?>">
    <!-- <div class="lf-side-nav-handler lf-side-nav-controller"><i class="fa fa-arrow-circle-left"></i></div> -->
    <div class="text-center lf-side-nav-logo">
        <a href="<?php echo e(route('home')); ?>"
           class="lf-logo<?php echo e(!empty(settings('logo_inversed_sidenav')) ? ' lf-logo-inversed' : ''); ?>">
            <!-- lf-logo-inversed -->
            <img src="<?php echo e(company_logo()); ?>" class="img-fluid" alt="">
        </a>
    </div>
    <div class="lf-side-nav-wrapper">
        <nav id="lf-side-nav">
            <?php echo e(get_nav('side-nav', 'side_nav')); ?>

        </nav>
    </div>

</div>
<?php /**PATH /Applications/MAMP/htdocs/booking/resources/views/layouts/includes/side_nav.blade.php ENDPATH**/ ?>