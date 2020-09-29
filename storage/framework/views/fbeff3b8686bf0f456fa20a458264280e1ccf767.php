<?php $__env->startSection('detail'); ?>

<section id="mu-course-content">
   <div class="container">
     <div class="row">
      <div class="col-md-12 text-left">
      <a href="<?php echo e(url('/')); ?>">Home</a> > <a href="<?php echo e(url('course')); ?>" class="text-primary">Course</a>
      <hr>
      </div>
       <div class="col-md-12">
         <div class="mu-course-content-area">
            <div class="row">

              <div class="col-md-3">
                <!-- start sidebar -->
                <aside class="mu-sidebar">

                  <form name="form_search" id="form_search" method="post" action="<?php echo e(url('course/search')); ?>">
                  <?php echo csrf_field(); ?>
                  <input type="text" name="txt_search" class="form-control" placeholder="Search our course" required>
                  </form>

                 <br>

                  <!-- start single sidebar -->
                  <div class="mu-single-sidebar">
                    <h4><b>Course Categories</b></h4>
                    <ul class="mu-sidebar-catg">
                      <?php if(isset($data['category'])): ?>
                      <?php $__currentLoopData = $data['category']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <li><a href="<?php echo e(url('course/category/'.$value->category_id.'/'.$value->category_name)); ?>"><?php echo e($value->category_name); ?></a></li>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      <?php endif; ?>
                    </ul>

                    <h4><b>Price</b></h4>
                    <div class="col-md-12">
                    <p>
                    <input type="text" id="amount" readonly style="border:0; color:#337ab7; font-weight:bold;">
                    </p>
                    <div id="price_range"></div>
                    </div>

                  </div>
                  <!-- end single sidebar -->



                </aside>
                <!-- / end sidebar -->
             </div>

              <div class="col-md-9">
                <!-- start course content container -->
                <div class="mu-course-container">
                  <div class="row">

                    <input type="hidden" name="category_id" id="category_id" value="<?php echo e($data['category_id']); ?>">

                    <div class="loader"></div>
                    <div id="tag_container">
                    <div id="show_course_category"></div>
                    </div>

                  </div>
                </div>
                <!-- end course content container -->


              </div>

           </div>
         </div>
       </div>
     </div>
   </div>
 </section>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.member.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/cmcbiote/public_html/resources/views/page/member/category.blade.php ENDPATH**/ ?>