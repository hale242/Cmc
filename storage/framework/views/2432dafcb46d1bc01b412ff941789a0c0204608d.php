<?php $__env->startSection('detail'); ?>

<section id="mu-course-content">
   <div class="container">
     <div class="row">
      <div class="col-md-12 text-left">
      <a href="<?php echo e(url('/')); ?>">Home</a> > <a href="<?php echo e(url('news')); ?>" class="text text-primary">News & Event</a>
      <br>
      </div>
       <div class="col-md-12">
         <div class="mu-course-content-area">
            <div class="row">

              <div class="col-md-12">
              <br>
              <img src="<?php echo e(asset('assets/member/images/bg_testimonial.jpg')); ?>" class="img-responsive">
              </div>

              <?php
              $showing = (count($data['detail'])>0) ? '1-16' : '0';
              ?>

              <div class="col-md-12">
              <br>
              <div class="col-md-6">
              <small><span style="color:#aaaaaa;">Showing <?php echo e($showing); ?> of</span> <span class="text-info"><?php echo e(count($data['detail'])); ?> results</span></small>
              </div>
              <div class="col-md-6" align="right">
              <select name="" onchange="window.location='<?php echo e(url('news?search=')); ?>'+this.value" style="width: 170px;padding: 6px;font-size: 13px;color:#aaa;">
              <option value="">Newly Published</option>
              <option value="1" <?php if(isset($_GET['search']) && $_GET['search']==1): ?><?php echo e('selected'); ?><?php endif; ?>>Date</option>
              <option value="2" <?php if(isset($_GET['search']) && $_GET['search']==2): ?><?php echo e('selected'); ?><?php endif; ?>>Title</option>
              </select>
              </div>
              <br>

            <?php if(count($data['detail'])>0): ?>

            <?php $__currentLoopData = $data['detail']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <?php if(file_exists(public_path().'/upload/member/news/images/'.$value->news_image) && $value->news_image != null): ?>
            <?Php $img = asset('upload/member/news/images/'.$value->news_image);?>
            <?php else: ?>
            <?Php $img = asset('assets/member/images/no-image.png');?>
            <?php endif; ?>

              <div class="col-lg-4 col-md-4 col-xs-12 alert">
                <div class="mu-latest-course-single">
                  <figure class="mu-latest-course-img">
                    <a href="<?php echo e(url('news/detail/'.$value->news_id.'/'.$value->news_title)); ?>" style="height: 240px;background: url(<?php echo e($img); ?>);background-size: cover;background-position: center;">
                        
                    </a>
                    <figcaption class="mu-latest-course-imgcaption" style="color: #0072bc; font-size: 12px;">
                      <?php echo e(date("d M Y",strtotime($value->updated_at))); ?>

                    </figcaption>
                  </figure>
                  <div class="mu-latest-course-single-content">
                    <h4><a href="<?php echo e(url('news/detail/'.$value->news_id.'/'.$value->news_title)); ?>"><b><?php echo e(iconv_substr($value->news_title,0,20,'utf-8')); ?></b></a></h4>
                    <small style="color:#949494;"><?php echo e(iconv_substr($value->news_short_content,0,30,'utf-8')); ?></small>
                    <div class="mu-latest-course-single-contbottom">
                      <p class="small">
                      <i class="fa fa-clock-o"></i> <?php echo e(date("H:i:s",strtotime($value->updated_at))); ?>

                      </p>
                      <p>> <a href="<?php echo e(url('news/detail/'.$value->news_id.'/'.$value->news_title)); ?>">Readmore</a></p>
                    </div>
                  </div>
                </div>
              </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <?php else: ?>
              <?php echo $__env->make('page.member.data_not_found', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>;
              <?php endif; ?>

              <div class="col-md-12" align="right">
              <br>
              <?php echo e($data['detail']->links()); ?>

              </div>

              </div>

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


<?php echo $__env->make('layouts.member.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/cmcbiote/public_html/resources/views/page/member/news.blade.php ENDPATH**/ ?>