<input type="hidden" name="minimum_range" id="minimum_range" value="<?php echo e($data['minimum_range']); ?>">
<input type="hidden" name="maximum_range" id="maximum_range" value="<?php echo e($data['maximum_range']); ?>">

<?php
    // dd($useridx);
    // dd($data['detail']);
?>

<?php if(count($data['detail'])>0): ?>
<?php $__currentLoopData = $data['detail']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

    <?php

    $id = $value->course_id;

    $catname = $value->category_name;
    $skillname = $value->skill_name;

    $teacher_name = $value->first_name.' '.$value->last_name;

    $course_name = iconv_substr($value->course_name,0,20,'UTF-8');

    $short_description = iconv_substr($value->course_short_description,0,20,'UTF-8');

    $view = $value->course_view;

    $date = date("d",strtotime($value->created_at)).' '.date("M",strtotime($value->created_at)).' '.date("Y",strtotime($value->created_at));

    if(file_exists(public_path().'/upload/member/course/images/'.$value->course_image) && $value->course_image != null)
    {
        $image = asset('upload/member/course/images/'.$value->course_image);
    }
    else{
        $image = asset('assets/member/images/no-image.png');
    }

    if($value->image!=''){
        $img = $value->image;
    }else{
        $img = "no-image.png";
    }


    $url = url('course/detail/'.$id.'/'.$course_name);

    ?>

    <div class="col-md-4 col-sm-4">
        <div class="mu-latest-course-single hvr-float-shadow">

            <div class="catname">
                <?php echo e($catname); ?>

            </div>

            <figure class="mu-latest-course-img">
                
                <div class="img-teacher-small img-teacher-in" style="background: url(<?php echo e(asset('upload/profile/'.$img)); ?>);background-size: cover;background-position: top center;"></div>
                
                <a href="<?php echo e($url); ?>" style="height: 145px;background: url(<?php echo e($image); ?>);background-size: cover;background-position: center top;"></a>
            </figure>

            <div class="mu-latest-course-single-content box-course" style="padding-top: 35px;">

                <div class="box-skill">
                    <?php echo e($skillname); ?>

                </div>

                <?php
                    $wishlist = DB::table('wishlist')->where('course_id',$id)->where('user_id', $useridx)->count();
                ?>

                <div class="box-heart pointer wishlist" course-id="<?php echo e($id); ?>" title="Click to add wishlist">
                    <i class="fa <?php if($wishlist==0): ?> fa-heart-o text-primary <?php else: ?> fa-heart text-red <?php endif; ?> pointer" style="font-size: 16px;"></i>
                </div>

                <h6 class="course-teacher"><?php echo e($teacher_name); ?></h6>
                <h4 class="course-name">
                    <a href="<?php echo e($url); ?>"><b><?php echo e($course_name); ?></b></a>
                </h4>


                

                <div class="mu-latest-course-single-contbottom line-top">
                    <p> View <?php echo e($view); ?>

                        <?php if($value->course_price==0): ?>
                            <span class="mu-course-price text-red" href="#"><b>FREE</b></span>
                        <?php else: ?>
                            <span class="mu-course-price text-blue" href="#"><b><?php echo e(number_format($value->course_price,2)); ?> THB</b></span>
                        <?php endif; ?>
                    </p>
                </div>

            </div>

        </div>
    </div>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <div class="col-lg-12" align="right"><?php echo e($data['detail']->links()); ?><div>

<?php else: ?>

    <div style="border: 1px dotted #ccc;padding: 10px;margin: 5px;">
        <div class="text-center text-danger">
            <?php echo $__env->make('page.member.data_not_found', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>

    <?php endif; ?>
<?php /**PATH C:\xampp\htdocs\cmc\resources\views/page/member/ajax/course/detail.blade.php ENDPATH**/ ?>