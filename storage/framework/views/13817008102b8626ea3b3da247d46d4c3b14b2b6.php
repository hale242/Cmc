<!-- Start Slider -->
<section id="mu-slider">


    <!-- Start single slider item -->
    <?php $__currentLoopData = SettingWeb::SlideBanner(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php
        if(file_exists(public_path().'/upload/admin/banner/images/'.$value->banner_image) && $value->banner_image != null)
        {
            $image = asset('upload/admin/banner/images/'.$value->banner_image);
        }else{
            $image = asset('assets/member/images/no-image.png');
        }
    ?>
    <a href="<?php echo e($value->banner_url); ?>">
        <div class="mu-slider-single">
            <div class="mu-slider-img">
                <img src="<?php echo e($image); ?>" class="img-responsive">
                <span class="banner_title"><?php echo e($value->banner_title); ?></span>
            </div>
        </div>
    </a>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <!-- Start single slider item -->


</section>
<!-- End Slider -->
<?php /**PATH /home/admin/domains/intervision.in/public_html/ezlearn/resources/views/layouts/member/slide.blade.php ENDPATH**/ ?>