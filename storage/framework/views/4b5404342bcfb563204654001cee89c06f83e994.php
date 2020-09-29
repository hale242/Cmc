<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">

<head>
    <meta charset="utf-8">
    <meta name="expires" content="never">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <?php if($data['seo']['title_seo']!=null): ?>
    <meta property="og:title" content="<?php echo e(SettingWeb::SettingWeb()->title_web.' - '.$data['seo']['title_seo']); ?>" />
    <meta property="og:image" content="<?php echo e($data['seo']['logo_seo']); ?>" />
    <?php else: ?>
    <meta property="og:title" content="<?php echo e(SettingWeb::SettingWeb()->title_web); ?>" />
    <meta property="og:image" content="<?php echo e(asset('upload/admin/logo_web/'.SettingWeb::LogoWeb())); ?>" />
    <?php endif; ?>
    <meta property="og:type" content="website" />
    <meta property="og:url" content="<?php echo e($data['seo']['url_seo']); ?>" />
    <meta name="description" content="<?php echo e($data['seo']['description_seo']); ?>">
    <meta name="keywords" content="<?php echo e($data['seo']['keywords_seo']); ?>">
    <meta name="robots" content="<?php echo e($data['seo']['robots_seo']); ?>">

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <script src="<?php echo e(asset('assets/member/js/jquery.min.js')); ?>"></script>

    <?php if($data['seo']['title_seo']!=null): ?>
    <title><?php echo e(SettingWeb::SettingWeb()->title_web.' - '.$data['seo']['title_seo']); ?></title>
    <?php else: ?>
    <title><?php echo e(SettingWeb::SettingWeb()->title_web); ?></title>
    <?php endif; ?>

    <link rel="icon" href="<?php echo e(asset('upload/member/shortcut_icon/favicon.png')); ?>" type="image/x-icon" />


    <?php echo $__env->make('layouts.member.stylesheet', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldContent('stylesheet'); ?>

</head>

<body>

    <?php echo $__env->make('layouts.member.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldContent('header'); ?>


    <?php echo $__env->yieldContent('detail'); ?>


    <?php echo $__env->make('layouts.member.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldContent('footer'); ?>


    <?php echo $__env->make('layouts.member.javascripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldContent('javascript'); ?>


    <?php echo $__env->make('layouts.member.plugins', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldContent('plugins'); ?>


    <?php echo $__env->make('layouts.member.modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldContent('modal'); ?>


    <!-- validation -->
    <?php echo $__env->make('layouts.member.validation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldContent('validation'); ?>


</body>

</html>
<?php /**PATH /home/admin/domains/intervision.in/public_html/ezlearn/resources/views/layouts/member/template.blade.php ENDPATH**/ ?>