<?php $__env->startSection('detail'); ?>

<section id="mu-course-content">
   <div class="container">
     <div class="row">
      <div class="col-md-12 text-left breadcrumb">
      <a href="<?php echo e(url('/')); ?>">Home</a> > <a href="<?php echo e(url('course')); ?>" class="text-primary">Course</a>
      <hr>
      </div>
       <div class="col-md-12">
         <div class="mu-course-content-area">
            <div class="row">

              <div class="col-md-3">


                <!-- start sidebar -->
                <aside class="mu-sidebar">

                  <form name="form_search" id="form_search" method="post" action="<?php echo e(url('course/search')); ?>" style="margin-bottom:20px; position:relative;">
                    <?php echo csrf_field(); ?>
                    <input type="text" name="txt_search" class="form-control" placeholder="our course" required style="padding-left:98px;">
                    <img src="<?php echo e(asset('mockup/search_bar.png')); ?>" style="position:absolute;top: 5px;left: 10px;">
                  </form>

                  <!-- start single sidebar -->
                  <div class="col-md-12" style="padding: 20px;background-color: #f4f4f4; margin-bottom:30px;">
                    <h4><b>Course Categories</b></h4>

                      <?php if(isset($data['category'])): ?>
                      <?php $__currentLoopData = $data['category']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <div class="boxchoice">
                            <label for="cbx<?php echo e($value->category_id); ?>" class="label-cbx">
                                <input id="cbx<?php echo e($value->category_id); ?>" name="choice_pretest[<?php echo e($value->category_id); ?>]" type="checkbox" class="check_cat invisible" value="<?php echo e($value->category_id); ?>">
                                <div class="checkbox">
                                    <svg width="20px" height="20px" viewBox="0 0 25 25">
                                        <polyline points="4 11 8 15 16 6"></polyline>
                                    </svg>
                                </div>
                                <span style="font-weight:300"><?php echo e($value->category_name); ?> <small style="color:#0072bc">(<?php echo e(DB::table('course')->where('course_cat_id', $value->category_id)->count()); ?>)</small></span>
                            </label>
                        </div>

                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      <?php endif; ?>



                    <h4 class="mt-2"><b>Skill Level</b></h4>
                        <?php if(isset($data['skill'])): ?>
                        <?php $__currentLoopData = $data['skill']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $valuex): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <div class="boxchoice">
                            <label for="skill<?php echo e($valuex->id); ?>" class="label-cbx">
                                <input id="skill<?php echo e($valuex->id); ?>" name="skill[<?php echo e($valuex->id); ?>]" type="checkbox" class="check_skill invisible" value="<?php echo e($valuex->id); ?>">
                                <div class="checkbox">
                                    <svg width="20px" height="20px" viewBox="0 0 25 25">
                                        <polyline points="4 11 8 15 16 6"></polyline>
                                    </svg>
                                </div>
                                <span style="font-weight:300"><?php echo e($valuex->skill_name); ?> <small style="color:#0072bc">(<?php echo e(DB::table('course')->where('skilllevel', $valuex->id)->count()); ?>)</small></span>
                            </label>
                        </div>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>


                    <h4 class="mt-2"><b>Price</b></h4>
                    <div class="col-md-12">
                        <div id="showamount" class="text-center" style="margin-bottom:10px;color: #0072c9;font-size: 16px;"></div>
                        <input type="hidden" id="amount">
                        <input type="hidden" id="min_price" value="<?php echo e($data['min_price']); ?>">
                        <input type="hidden" id="max_price" value="<?php echo e($data['max_price']); ?>">
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

                    <div class="loader"></div>

                    <div class="col-md-3 pull-right">
                        <select name="sort_order" id="sort_order" class="form-control">
                            <option value="desc">Newly Published</option>
                            <option value="asc">Older Published</option>
                        </select>
                    </div>
                    <div style="clear: both;margin-bottom:20px;"></div>

                    <div id="tag_container">
                        <div id="show_course"></div>
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

 <style>

    .box{
        padding: 40px 60px 40px 60px;
        border: 1px solid #ddd;
        margin-top: 20px;
    }

    .txtques{
        font-weight: bold;
        font-size: 16px;
        color: #0072bc;
        margin-bottom: 30px;
    }

    .boxchoice{
        margin-top: 10px;
        margin-bottom: 10px;
    }

    .label-cbx {
        user-select: none;
        cursor: pointer;
        margin-bottom: 0;
    }

    .label-cbx input:checked+.checkbox {
        border-color: #737a7d;
    }

    .label-cbx input:checked+.checkbox svg path {
        fill: #20C2E0;
    }

    .label-cbx input:checked+.checkbox svg polyline {
        stroke-dashoffset: 0;
    }

    .label-cbx:hover .checkbox svg path {
        stroke-dashoffset: 0;
    }

    .label-cbx .checkbox {
        position: relative;
        top: 2px;
        float: left;
        margin-right: 8px;
        margin-top: 0px;
        margin-bottom: 0px;
        width: 20px;
        height: 20px;
        border: 1px solid #a2acb1;
        border-radius: 3px;
        /* box-shadow: 2px 2px 1px #d4d4d3; */
    }

    .label-cbx .checkbox svg {
        position: absolute;
        top: 1px;
        left: 1px;
    }

    .label-cbx .checkbox svg path {
        fill: none;
        stroke: #20C2E0;
        stroke-width: 2;
        stroke-linecap: round;
        stroke-linejoin: round;
        stroke-dasharray: 71px;
        stroke-dashoffset: 71px;
        transition: all 0.6s ease;
    }

    .label-cbx .checkbox svg polyline {
        fill: none;
        stroke: #333;
        stroke-width: 2;
        stroke-linecap: round;
        stroke-linejoin: round;
        stroke-dasharray: 20px;
        stroke-dashoffset: 20px;
        transition: all 0.3s ease;
    }

    .label-cbx>span {
        pointer-events: none;
        vertical-align: middle;
    }

    .cntr {
        position: absolute;
        top: 45%;
        left: 0;
        width: 100%;
        text-align: center;
    }

    .invisible {
        position: absolute;
        z-index: -1;
        width: 0;
        height: 0;
        opacity: 0;
    }

</style>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.member.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/cmcbiote/public_html/resources/views/page/member/course.blade.php ENDPATH**/ ?>