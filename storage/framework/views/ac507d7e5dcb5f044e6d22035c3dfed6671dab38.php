<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>" class="app">
<head>
<meta charset="utf-8">
<!-- <meta name="expires" content="never" > -->
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<meta property="og:title" content="<?php echo e(SettingWeb::SettingWeb()->title_web); ?>"/>
<meta property="og:image" content="<?php echo e(asset('upload/admin/logo_web/'.SettingWeb::SettingWeb()->logo_web)); ?>"/>
<meta property="og:type" content="website" />
<meta property="og:url" content="<?php echo e(url('')); ?>" />
<meta name="description" content="<?php echo e(SettingWeb::SettingWeb()->seo_description); ?>">
<meta name="keywords" content="<?php echo e(SettingWeb::SettingWeb()->seo_keywords); ?>">


<title><?php echo e(SettingWeb::SettingWeb()->title_web); ?></title>

<link rel="icon" href="<?php echo e(asset('upload/admin/shortcut_icon/favicon.png')); ?>" type="image/x-icon" />


 <?php echo $__env->make('layouts.admin.stylesheet', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
 <?php echo $__env->yieldContent('stylesheet'); ?>

</head>

<body>

 <div class="loader"></div>

<?php echo $__env->make('layouts.admin.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->yieldContent('header'); ?>


<?php echo $__env->make('layouts.admin.menu_left', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->yieldContent('menu_left'); ?>


<?php echo $__env->yieldContent('detail'); ?>


<?php echo $__env->make('layouts.admin.javascripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->yieldContent('javascript'); ?>


<?php echo $__env->make('layouts.admin.plugins', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->yieldContent('plugins'); ?>


<?php echo $__env->make('layouts.admin.modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->yieldContent('modal'); ?>



<?php echo $__env->make('layouts.admin.validation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->yieldContent('validation'); ?>

</body>
</html>
<?php /**PATH C:\xampp\htdocs\cmc\resources\views/layouts/admin/template.blade.php ENDPATH**/ ?>