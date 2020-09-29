<?php $__env->startSection('detail'); ?>

<img src="<?php echo e(asset('assets/member/images/banner_product.png')); ?>" class="img-responsive">
<section id="mu-course-content">
   <div class="container">
     <div class="row">
      <div class="col-md-12 text-left">
        <br>
      <a href="<?php echo e(url('/')); ?>">Home</a> > <a href="<?php echo e(url('product')); ?>" class="text text-primary">Our Products</a>
      <br><hr>
      </div>
       <div class="col-md-12">
         <div class="mu-course-content-area">
            <div class="row">

              <?php if(count($data['detail'])>0): ?>

              <?php
                $col = 1;
                $j = 3;
              ?>

              <?php $__currentLoopData = $data['detail']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <div class="col-md-12 alert mb-5" align="center">

                    <?php if($j%2===0): ?>

                        <div class="col-md-6 text-left" style="padding-left: 50px;">
                            <h3 class="text-primary">
                                <div class="mb-2"><h2 class="text-blue"><b><?php echo e($value->product_name); ?></b></h2></div>
                                <div class="mb-3" style="font-size:14px;color:#666;line-height: 1.8;"><?php echo e($value->product_short_desc); ?></div>
                            </h3>
                            <a href="<?php echo e(url('product/detail/'.$value->product_id.'/'.$value->product_name)); ?>" class="btn btn-danger btn-lg btn-find-out-more" ><small>Find out more</small></a>
                        </div>

                        <div class="col-md-6 text-center">
                            <img src="<?php echo e(asset('upload/member/product/images/'.$value->product_image)); ?>" class="img-responsive">
                        </div>

                    <?php else: ?>

                        <div class="col-md-6 text-center">
                            <img src="<?php echo e(asset('upload/member/product/images/'.$value->product_image)); ?>" class="img-responsive">
                        </div>

                        <div class="col-md-6 text-left" style="padding-left: 50px;">
                            <h3 class="text-primary">
                                <div class="mb-2"><h2 class="text-blue"><b><?php echo e($value->product_name); ?></b></h2></div>
                                <div class="mb-3" style="font-size:14px;color:#666;line-height: 1.8;"><?php echo e($value->product_short_desc); ?></div>
                            </h3>
                            <a href="<?php echo e(url('product/detail/'.$value->product_id.'/'.$value->product_name)); ?>" class="btn btn-danger btn-lg btn-find-out-more" ><small>Find out more</small></a>
                        </div>

                    <?php endif; ?>


                </div>

                <?php
                    $j++;
                ?>

              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

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

 <style>
     .btn-find-out-more {
        padding: 10px;
        background-color: #FF0000;
        width: 200px;
        height: 45px;
        border-radius: 5px;
        border-bottom: 3px solid #ce2828;
        font-size: 16px;
        font-style: italic;
     }

 </style>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.member.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/admin/domains/intervision.in/public_html/ezlearn/resources/views/page/member/product.blade.php ENDPATH**/ ?>