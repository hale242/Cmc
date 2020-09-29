<?php $__env->startSection('detail'); ?>

<section id="mu-course-content">
    <div class="container">
        <div class="row">

            <div class="col-md-12" style="margin-bottom:80px;">
                <div class="mu-course-content-area">
                    <div class="row">

                        <div class="col-md-6 col-md-offset-3">

                            <div class="text-center" style="margin-top:50px;margin-bottom:50px;">
                                <img src="<?php echo e(asset('mockup/logo_top.jpg')); ?>" alt="">
                            </div>

                            <!-- start login -->
                            <div id="logreg-forms">

                                <form class="form-signin" method="post" action="<?php echo e(url('login/auth')); ?>">
                                    <?php echo csrf_field(); ?>

                                    <?php echo $__env->make('layouts.member.flash-message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

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

                                    <div class="text-center" style="margin-bottom:20px;">
                                        <h2 class="text text-dark"><b>Login</b></h2>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Email Address</label>
                                        <input name="email" type="text" id="inputEmail" class="form-control" value="<?php if(isset($_COOKIE['remember_email_user'])): ?><?php echo e($_COOKIE['remember_email_user']); ?><?php endif; ?>" required autocomplete="off">
                                    </div>
                                    <div class="form-group" style="margin-bottom: 0 !important;">
                                        <label for="">Password</label>
                                        <input name="password" type="password" id="inputPassword" class="form-control" value="<?php if(isset($_COOKIE['remember_password_user'])): ?><?php echo e($_COOKIE['remember_password_user']); ?><?php endif; ?>" required autocomplete="off">
                                    </div>

                                    <div class="text-left pull-left" style="margin-bottom: 20px;">
                                        

                                        <div class="boxchoice">
                                            <label for="remem_chk" class="label-cbx">
                                                <input id="remem_chk" name="remem_chk" type="checkbox" class="check_cat invisible" data-st="n" value="" autofocus="" <?php if(isset($_COOKIE['remember_login_user'])): ?><?php echo e('checked'); ?><?php endif; ?>>
                                                <div class="checkbox">
                                                    <svg width="20px" height="20px" viewBox="0 0 25 25">
                                                        <polyline points="4 11 8 15 16 6"></polyline>
                                                    </svg>
                                                </div>
                                                <span style="font-weight:300">Remember me</span>
                                            </label>
                                        </div>

                                    </div>

                                    <a href="<?php echo e(url('forgotpassword')); ?>" class="pull-right" style="margin-top: 12px;margin-bottom: 20px;color: #848a90;">Forgot Password?</a>

                                    <button class="btn btn-new-regis" type="submit">Login</button>

                                    <div class="clearfix"></div>

                                    <div class="text-center" style="margin-top: 40px;">
                                        <span>Don't have an account? </span> <a href="<?php echo e(url('register')); ?>" style="color:red">Register now</a>
                                    </div>


                                </form>

                            </div>

                            <!-- end login -->
                        </div>


                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>
    <br>
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.member.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/admin/domains/intervision.in/public_html/ezlearn/resources/views/page/member/login.blade.php ENDPATH**/ ?>