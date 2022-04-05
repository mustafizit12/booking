<!doctype html>
<html lang="en" class="<?php echo e(isset($headerLess) && $headerLess && settings('no_header_layout') ? ' no-header-light' : ''); ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <link rel="icon" href="<?php echo e(asset('storage/images/favicon.png')); ?>">
    <?php echo $__env->yieldContent('meta'); ?>

    <title>
        <?php if (! empty(trim($__env->yieldContent('title')))): ?>
            <?php echo $__env->yieldContent('title', config('app.name')); ?> | <?php echo e(config('app.name')); ?>

        <?php else: ?>
            <?php echo e(config('app.name')); ?>

        <?php endif; ?>
    </title>

    <?php echo $__env->yieldContent('style-top'); ?>

    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <?php if(!isset($headerLess) || !$headerLess): ?>
        <link rel="stylesheet" href="<?php echo e(asset('plugins/slicknav/slicknav.min.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.css')); ?>">
        <!-- summernote -->
        <link rel="stylesheet" href="<?php echo e(asset('plugins/summernote/summernote-bs4.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('plugins/select2/css/select2.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('plugins/bs4-datetimepicker/css/bootstrap-datetimepicker.min.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('plugins/datatables/dataTables.bootstrap4.min.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('css/login_style.css')); ?>">
    <?php endif; ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">
    <?php echo $__env->yieldContent('style'); ?>
</head>
<body>
  <body class="<?php echo e((settings('navigation_type') && settings('side_nav_fixed')) || (isset($fixedSideNav) && $fixedSideNav) ? 'lf-fixed-sidenav' : ''); ?><?php echo e(isset($headerLess) && $headerLess ? ' lf-headerless-body' : ''); ?>">
  <div id="app" class="wrapper<?php echo e((settings('navigation_type') && settings('side_nav_fixed')) || (isset($fixedSideNav) && $fixedSideNav) ? ' lf-fixed-sidenav-wrapper' : ''); ?>" style="margin-left:280px;">
<?php /**PATH /Applications/MAMP/htdocs/booking/resources/views/layouts/includes/header.blade.php ENDPATH**/ ?>