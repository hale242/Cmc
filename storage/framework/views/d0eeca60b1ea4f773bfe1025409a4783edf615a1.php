<?php $__env->startSection('detail'); ?> 

<img src="<?php echo e(asset('assets/member/images/banner_about.png')); ?>" class="img-responsive">
<section id="mu-course-content">
   <div class="container">
     <div class="row">
      <div class="col-md-12 text-left">
        <br>
      <a href="<?php echo e(url('/')); ?>">Home</a> > <a href="<?php echo e(url('about')); ?>" class="text text-primary">About us</a>
      <br><hr>
      </div>
       <div class="col-md-12">
         <div class="mu-course-content-area">
            <div class="row">

              <?php if($data['detail']->about_id>0): ?>
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


<?php echo $__env->make('layouts.member.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/admin/domains/intervision.in/public_html/ezlearn/resources/views/page/member/about.blade.php ENDPATH**/ ?>