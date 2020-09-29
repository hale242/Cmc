<?php $__env->startSection('detail'); ?>

<div class="loader"></div>

<section id="mu-course-content">
    <div class="container">
     <div class="row">
        <div class="col-12">
          <div class="row">

            <br><br>

            <div style="border-radius: 5px;border: 1px solid #bbb;">

              <div class="row">

                <div class="col-md-12">

                <div class="col-md-4" align="left">
                <h4 class="text-success"><b>#<?php echo e($data['detail']['order']->order_number); ?></b></h4>
                </div>

                <div class="col-md-4" align="center">
                <h4 class="text-primary"><b><?php echo e($data['detail']['order']->first_name.' '.$data['detail']['order']->last_name); ?></b></h4></div>

                <div class="col-md-4" align="right">
                <h4><b><?php echo e(date("d-m-Y",strtotime($data['detail']['order']->order_date))); ?></b></h4>
                </div>

                <div class="clearfix"></div>

                <hr>

                <div class="col-md-12"><h4><b>Order detail:</b></h4></div>

                <?php
                    // dd($data['detail']['course']);
                ?>

                <?php if(count($data['detail']['course'])>0): ?>
                  <?php $i = 1;?>
                  <?php $__currentLoopData = $data['detail']['course']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                  <?php if(file_exists(public_path().'/upload/member/course/images/'.$value->course_image) && $value->course_image != null): ?>
                  <?Php $img = asset('upload/member/course/images/'.$value->course_image);?>
                  <?php else: ?>
                  <?Php $img = asset('assets/member/images/no-image.png');?>
                  <?php endif; ?>

                  <?php $__currentLoopData = $data['teacher']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php if($value->course_teacher_id == $value2->user_id): ?>
                  <?php $teacher = $value2->first_name.' '.$value2->last_name;?>
                  <?php else: ?>
                  <?php $teacher = '-';?>
                  <?php endif; ?>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                  <div class="col-lg-12 alert">


                  <div class="col-lg-2" align="right">
                    <img class="media-object img-responsive" src="<?php echo e($img); ?>" alt="img">
                  </div>

                  <div class="col-lg-10">
                  <h4><b><a target="_blank" href="<?php echo e(url('course/detail/'.$value->course_id.'/'.$value->course_name)); ?>"><?php echo e($value->course_name); ?></a></b></h4>
                  <small><?php echo e($value->course_short_description); ?></small>
                  <br><br>
                  <b style="color:#0072bc;"><?php echo e(number_format($value->course_price,2)); ?> THB</b>
                  </div>

                </div>

                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <?php else: ?>
                  <?php echo $__env->make('page.member.data_not_found', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                  <?php endif; ?>

              </div>

              </div>

            </div>

            <br>

          </div>
        </div>
      </div>
    </div>
  </section>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.member.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/cmcbiote/public_html/resources/views/page/member/order_detail.blade.php ENDPATH**/ ?>