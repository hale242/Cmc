<?php $__env->startSection('detail'); ?>

<section id="mu-course-content">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-lg-12">
                        <h2><b>Contact Us</b></h2>

                        <hr>

                        <div class="col-md-7 mt-5">
                            <div class="col-md-8 col-md-offset-2">
                                <h2 class="text-blue">How can we help?</h2>

                                <?php echo $__env->make('layouts.member.flash-message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                <form action="<?php echo e(url('contact/sendmail')); ?>" method="POST" class="mt-2">
                                    <?php echo csrf_field(); ?>

                                    <div class="formtxt mb-2">
                                        <input type="text" name="fullname" id="fullname" class="inputText form-control" placeholder=" " required>
                                        <label class="form-control-placeholder" for="fullname">Full name</label>
                                    </div>

                                    <div class="formtxt mb-2">
                                        <input type="email" name="email" id="email" class="inputText form-control" placeholder=" " required>
                                        <label class="form-control-placeholder" for="email">Email</label>
                                    </div>

                                    <div class="formtxt mb-2">
                                        <input type="text" name="phone" id="phone" class="inputText form-control" placeholder=" " required>
                                        <label class="form-control-placeholder" for="phone">Phone</label>
                                    </div>

                                    <div class="formtxt mb-2">
                                        <input type="text" name="detail" id="detail" class="inputText form-control" placeholder=" " required>
                                        <label class="form-control-placeholder" for="detail">Message</label>
                                    </div>

                                    <div class="formtxt mb-2">
                                        <div class="g-recaptcha" data-sitekey="6Lfpm-IUAAAAAPEWf8F_VX9ItK-2f8h6akzfsW_4"></div>
                                    </div>

                                    <div class="form-group text-center">
                                        <button type="submit" class="btn btn-send-message">Send Message</button>
                                        <p class="mt-2 text-darkgray" style="font-size: 12px;">Your email address will not be published</p>
                                    </div>

                                </form>
                            </div>
                        </div>


                        <div class="col-md-5 mu-single-sidebar bl-1 mt-5 pl-3">

                            <?php if($data['detail']->address!=''): ?>

                                <b>Address:</b> <?php echo $data['detail']->address; ?>


                            <?php endif; ?>

                            <?php if($data['detail']->email!=''): ?>

                                <b>Email:</b> <?php echo $data['detail']->email; ?>


                            <?php endif; ?>

                        </div>

                        <div class="col-md-12 mt-5">

                            <?php if($data['detail']->map_google!=''): ?>

                                <?php echo $data['detail']->map_google; ?>


                            <?php else: ?>

                                <?php echo $__env->make('page.member.data_not_found', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                            <?php endif; ?>

                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>

<!-- ckeditor -->
<script type="text/javascript">
    $(document).ready(function(){

        var onloadCallback = function() {
            alert("grecaptcha is ready!");
        };
    });
</script>


<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.member.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/admin/domains/intervision.in/public_html/ezlearn/resources/views/page/member/contact.blade.php ENDPATH**/ ?>