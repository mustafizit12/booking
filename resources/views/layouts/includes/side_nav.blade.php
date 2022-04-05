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
<div class="lf-side-nav{{$sideLogoClass}}{{(settings('navigation_type') && settings('side_nav_fixed')) || (isset($fixedSideNav) && $fixedSideNav) ? ' lf-side-nav-open' : ''}}">
    <!-- <div class="lf-side-nav-handler lf-side-nav-controller"><i class="fa fa-arrow-circle-left"></i></div> -->
    <div class="text-center lf-side-nav-logo">
        <a href="{{route('home')}}"
           class="lf-logo{{!empty(settings('logo_inversed_sidenav')) ? ' lf-logo-inversed' : ''}}">
            <!-- lf-logo-inversed -->
            <img src="{{ company_logo() }}" class="img-fluid" alt="">
        </a>
    </div>
    <div class="lf-side-nav-wrapper">
        <nav id="lf-side-nav">
            {{ get_nav('side-nav', 'side_nav') }}
        </nav>
    </div>

</div>
