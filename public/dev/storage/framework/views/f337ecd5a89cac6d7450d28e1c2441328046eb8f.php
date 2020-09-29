<?php $__env->startSection('detail'); ?>

<section id="content">
    <section class="vbox">
        <section class="scrollable padder">

            <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
                <li><a href="<?php echo e(url('admin/home')); ?>"><i class="fa fa-home"></i> Home</a></li>
                <li><a href="#">News</a></li>
                <li class="active"><a href="<?php echo e(url('admin/profile/'.strtolower($data['page']))); ?>"><?php echo e($data['page']); ?></a>
                </li>
            </ul>

            <?php if($data['page']=='Main'): ?><?php $title = 'Profile';?><?php else: ?><?php $title = $data['page'];?><?php endif; ?>

            <div class="m-b-md">
                <h3 class="m-b-none"><?php echo e($title); ?></h3>
                <small>Manage data <?php echo e($title); ?></small>
            </div>

            <div class="row">

                <div class="col-lg-12">

                    <section class="panel panel-default">

                        <div class="table-responsive">
                            <?php echo $__env->make('page.admin.include.profile.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    </section>
                </div>

            </div>

        </section>
    </section>

    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/cmcbiote/public_html/resources/views/page/admin/profile.blade.php ENDPATH**/ ?>