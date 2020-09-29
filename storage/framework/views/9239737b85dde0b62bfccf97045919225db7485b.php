<!DOCTYPE html>
<html lang="en" class="bg-dark">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" /> 

  <title><?php echo e(SettingWeb::SettingWeb()->title_web); ?></title>

  <link rel="icon" href="<?php echo e(asset('upload/admin/shortcut_icon/icon.ico')); ?>" type="image/x-icon" />

<!-- css style sheet ทั้งหมด -->
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/admin/css/bootstrap.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/admin/css/animate.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/admin/css/font-awesome.min.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/admin/css/font.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/admin/css/app.css')); ?>">

</head>

<body>
    <section id="content" class="m-t-lg wrapper-md animated fadeInUp">    
    <div class="container aside-xxl">
      <a class="navbar-brand block" href="#"><?php echo e(SettingWeb::SettingWeb()->title_web); ?></a>
      <p align="center">System management <?php echo e(SettingWeb::SettingWeb()->title_web); ?></p>
      <section class="panel panel-default bg-white m-t-lg">
        <header class="panel-heading text-center">
          <strong>Login System</strong>
        </header>

        <br>

        <div class="col-lg-12">

         <?php echo $__env->make('layouts.admin.flash-message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

          <?php if(count($errors)): ?>
              <div class="alert alert-danger alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <div style="padding: 10px;">
                  <ul>
                      <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <li><?php echo e($error); ?></li>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </ul>
                </div>
              </div>
         <?php endif; ?>

       </div>

        <form action="<?php echo e(url('admin/login/auth')); ?>" method="post">
        <?php echo csrf_field(); ?>

          <div class="form-group col-lg-12">
            <label class="control-label">Email</label>
            <input name="email" type="email" id="email" placeholder="Email" class="form-control input-lg" value="<?php if(isset($_COOKIE['remember_email'])): ?><?php echo e($_COOKIE['remember_email']); ?><?php endif; ?>" required>
          </div>
          <div class="form-group col-lg-12">
            <label class="control-label">Password</label>
            <input name="password" type="password" id="password" placeholder="Password" class="form-control input-lg" value="<?php if(isset($_COOKIE['remember_password'])): ?><?php echo e($_COOKIE['remember_password']); ?><?php endif; ?>" required>
          </div>

          <div class="form-group col-lg-12">
          <div class="checkbox">
            <label>
              <input name="remember_login" type="checkbox" <?php if(isset($_COOKIE['remember_login'])): ?><?php echo e('checked'); ?><?php endif; ?>> Remember Me
            </label>
          </div>

        </div>

        <div class="alert">
          <a href="<?php echo e(url('admin/forgotpassword')); ?>" class="pull-right">Forgot password?</a>
          <button type="submit" class="btn btn-primary">Login</button>
        </div>

        </form>

      </section>
    </div>
  </section>

<!-- js -->
<script src="<?php echo e(asset('assets/admin/js/jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/admin/js/bootstrap.js')); ?>"></script>
<script src="<?php echo e(asset('assets/admin/js/app.js')); ?>"></script>
<script src="<?php echo e(asset('assets/admin/js/app.plugin.js')); ?>"></script>
<script src="<?php echo e(asset('assets/admin/js/slimscroll/jquery.slimscroll.min.js')); ?>"></script>

</body>
</html>
<?php /**PATH /home/cmcbiote/public_html/resources/views/page/admin/login.blade.php ENDPATH**/ ?>