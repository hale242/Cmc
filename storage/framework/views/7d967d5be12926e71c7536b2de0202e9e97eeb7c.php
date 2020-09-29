<!-- นำ template มาใช้ -->


<!-- ส่วนของการแสดงข้อมูล -->
<?php $__env->startSection('detail'); ?>


<section id="content">
    <section class="vbox">
        <section class="scrollable padder">

            <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
                <li><a href="<?php echo e(url('admin/home')); ?>"><i class="fa fa-home"></i> Home</a></li>
                <li><a href="<?php echo e(url('admin/setting/website')); ?>">Setting</a></li>
                <li class="active"><a href="<?php echo e(url('admin/setting/'.strtolower($data['page']))); ?>"><?php echo e($data['page']); ?></a>
                </li>
            </ul>

            <div class="m-b-md">
                <h3 class="m-b-none">Setting</h3>
                <small>Manage data website</small>
            </div>

            <div class="row">
                <div class="col-lg-12" style="height: 700px;">

                    <section class="panel panel-default">

                        <div class="table-responsive">

                            <?php if($data['type']=='view'): ?>
                            <?php echo $__env->make('page.admin.include.setting.view', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php else: ?>
                            <?php echo $__env->make('page.admin.include.setting.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php endif; ?>

                        </div>

                    </section>

                </div>
            </div>


        </section>
    </section>
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/admin/domains/intervision.in/public_html/ezlearn/resources/views/page/admin/setting.blade.php ENDPATH**/ ?>