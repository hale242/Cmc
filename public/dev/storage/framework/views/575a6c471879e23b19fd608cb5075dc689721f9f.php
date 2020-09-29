<?php $__env->startSection('detail'); ?>

<section id="mu-course-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-left">
                <a href="<?php echo e(url('/')); ?>">Home</a> > <a href="<?php echo e(url('terms')); ?>" class="text text-primary">Privacy & Policy</a>
                <hr>
            </div>
            <div class="col-md-12">
                <div class="mu-course-content-area">
                    <div class="row">

                        <?php if(!empty($data['detail']->content)): ?>
                        <div class="col-md-12">
                            <?php echo $data['detail']->content; ?>

                        </div>
                        <?php else: ?>
                        <?php echo $__env->make('page.member.data_not_found', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endif; ?>

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

<?php echo $__env->make('layouts.member.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/cmcbiote/public_html/resources/views/page/member/policy.blade.php ENDPATH**/ ?>