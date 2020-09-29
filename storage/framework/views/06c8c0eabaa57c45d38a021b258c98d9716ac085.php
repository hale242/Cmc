<!-- นำ template มาใช้ -->


<!-- ส่วนของการแสดงข้อมูล -->
<?php $__env->startSection('detail'); ?>

<section id="content">
          <section class="vbox">
            <section class="scrollable padder">

              <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
                <li><a href="<?php echo e(url('admin/home')); ?>"><i class="fa fa-home"></i> Home</a></li>
                <li><a href="#">Content</a></li>
                <li class="active"><a href="<?php echo e(url('admin/content/'.strtolower($data['page']))); ?>"><?php echo e($data['page']); ?></a></li>
              </ul>
              <div class="m-b-md">
                <h3 class="m-b-none"><?php echo e($data['page']); ?></h3>
                <small>Manage data <?php echo e($data['page']); ?></small>
              </div>


              <div class="row">

            <div class="col-lg-12">
              <section>
                <div class="table-responsive">
                  <?php echo $__env->make('page.admin.include.content.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                </div>

              </div>

      </section>
    </section>
  </section>
<?php $__env->stopSection(); ?>





<?php echo $__env->make('layouts.admin.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/cmcbiote/public_html/resources/views/page/admin/content.blade.php ENDPATH**/ ?>