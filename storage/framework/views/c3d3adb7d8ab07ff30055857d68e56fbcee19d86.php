<?php $__env->startSection('detail'); ?>

<?php if($data['step']=='step1'): ?>
<?php $title_url = 'ForgotPassword';?>
<?php else: ?>
<?php $title_url = 'Change New Password';?>
<?php endif; ?>

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

                                <?php if($data['step']=='step1'): ?>

                                <form class="form-signin" method="post" action="<?php echo e(url('forgotpassword/sendmail')); ?>">
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

                                    <div class="text-center">
                                        <h2 class="text"><b><i class="fa fa-unlock"></i> Forgot Password</b>
                                        </h2>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <input name="email" type="text" id="inputEmail" class="form-control" placeholder="Email" required autocomplete="off">
                                    </div>

                                    <button class="btn btn-new-regis" type="submit">Confirm</button>

                                </form>

                                <?php else: ?>

                                <form class="form-signin" method="post" action="<?php echo e(url('forgotpassword/verify')); ?>">
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

                                    <input type="hidden" name="token_email" value="<?php echo e($data['token_email']); ?>">

                                    <div class="text-center">
                                        <h2 class="text text-success"><b><i class="fa fa-unlock"></i> Change New Password</b></h2>
                                    </div>


                                    <div class="form-group">
                                        <input name="password" type="password" class="form-control" placeholder="New Password" required autocomplete="off">
                                    </div>

                                    <div class="form-group">
                                        <input name="password_confirmation" type="password" class="form-control" placeholder="Confirm Password" required autocomplete="off">
                                    </div>

                                    <button class="btn btn-new-regis" type="submit">Confirm</button>

                                </form>

                                <?php endif; ?>

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

<?php echo $__env->make('layouts.member.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/cmcbiote/public_html/resources/views/page/member/forgotpassword.blade.php ENDPATH**/ ?>