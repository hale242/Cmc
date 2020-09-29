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

                            <!-- start register -->
                            <div id="logreg-forms">

                                <form class="form-signin" method="post" action="<?php echo e(url('register/create')); ?>"  >
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
                                        
                                        <h2 class="text text-dark"><b>Register</b></h2>
                                    </div>

                                    <div class="form-group">
                                        <label for="">First Name</label>
                                        <input name="first_name" type="text" class="form-control" required autofocus="" autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Last Name</label>
                                        <input name="last_name" type="text" class="form-control" required autofocus="" autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Email Address</label>
                                        <input name="email" type="email" class="form-control" required autofocus="" autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Password</label>
                                        <input name="password" type="password" class="form-control" minlength="8" required autofocus="" autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Confirm password</label>
                                        <input name="password_confirmation" type="password" class="form-control" minlength="8" required autofocus="" autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Company / Hospital / University</label>
                                        <input name="company" type="text" class="form-control" required autofocus="" autocomplete="off">
                                        <input name="event" type="hidden" class="form-control" value="<?php echo e($data['evcode']); ?>" autocomplete="off">
                                    </div>

                                    <div class="form-group">

                                        <div class="boxchoice">
                                            <label for="term_chk" class="label-cbx">
                                                <input id="term_chk" name="term_chk" type="checkbox" class="check_cat invisible" data-st="n" value="" autofocus="">
                                                <div class="checkbox">
                                                    <svg width="20px" height="20px" viewBox="0 0 25 25">
                                                        <polyline points="4 11 8 15 16 6"></polyline>
                                                    </svg>
                                                </div>
                                                <span style="font-weight:300">I accept the </span>
                                            </label>
                                            <div class="terms pointer" data-toggle="modal" data-target=".bd-example-modal-lgx">Terms and Conditions.</div>
                                        </div>

                                    </div>

                                    <button class="btn btn-new-regis" type="submit">New Registration</button>

                                    <div class="clearfix"></div>

                                    <div class="text-center" style="margin-top: 40px;">
                                        <span>Already have an account?</span> <a href="<?php echo e(url('login')); ?>" style="color:red">Log in</a>
                                    </div>


                                </form>

                            </div>

                            <!-- end register -->
                        </div>


                    </div>

                </div>

            </div>
        </div>
    </div>
    </div>
    </div>

    <div class="modal fade bd-example-modal-lgx" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content" style="padding: 20px;">
                <div class="modal-header">
                    <h3><?php echo e($data['terms']['name_page']); ?></h3>
                </div>
                <div class="modal-body" style="overflow:auto;max-height: 500px;">
                    <?php echo $data['terms']['content']; ?>

                </div>
            </div>
        </div>

    </div>


</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.member.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/admin/domains/intervision.in/public_html/ezlearn/resources/views/page/member/register.blade.php ENDPATH**/ ?>