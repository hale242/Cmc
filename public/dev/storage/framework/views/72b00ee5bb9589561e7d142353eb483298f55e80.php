<?php $__env->startSection('detail'); ?>

<section id="mu-course-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-left mb-1">
                <a href="<?php echo e(url('/')); ?>">Home</a> > <a href="<?php echo e(url('news')); ?>">News & Event</a> >
                <a href="<?php echo e(url('news/detail/'.$data['detail']['main']->news_id.'/'.$data['detail']['main']->news_title)); ?>" class="text text-primary"><?php echo e($data['detail']['main']->news_title); ?></a>
            </div>
            <div class="col-md-12">
                <div class="mu-course-content-area">
                    <div class="row">

                        <?php if(file_exists(public_path().'/upload/member/news/images/'.$data['detail']['main']->news_image)
                        && $data['detail']['main']->news_image != null): ?>
                        <?Php $img = asset('upload/member/news/images/'.$data['detail']['main']->news_image);?>
                        <?php else: ?>
                        <?Php $img = asset('assets/member/images/no-image.png');?>
                        <?php endif; ?>

                        <div class="col-md-12 mb-3">
                            <img src="<?php echo e($img); ?>" class="img-responsive">
                            <span class="news_title"><?php echo e($data['detail']['main']->news_title); ?></span>
                        </div>


                        <div class="col-md-9 br-1">

                            <div class="col-md-4 mb-2">
                                <h6 class="text-darkgray">DATE</h6>
                                <h5><b><?php echo e(date("d M Y",strtotime($data['detail']['main']->created_at))); ?></b></h5>
                            </div>

                            <div class="col-md-4 mb-2 bl-1">
                                <h6 class="text-darkgray">VIEW</h6>
                                <h5><b><?php echo e($data['detail']['main']->news_view); ?></b></h5>
                            </div>

                            <div class="col-md-4 mb-2 bl-1" style="height: 58px;">
                                <h6 class="text-darkgray">SHARE</h6>
                                <!-- AddToAny BEGIN -->
                                <div class="a2a_kit a2a_kit_size_14 a2a_default_style">
                                    <a class="a2a_button_facebook" title="Shared to facebook"></a>
                                    <a class="a2a_button_twitter" title="Shared to twitter"></a>
                                    <a class="a2a_button_line" title="Shared to line"></a>
                                </div>
                                <script async src="https://static.addtoany.com/menu/page.js"></script>
                                <!-- AddToAny END -->
                            </div>

                            <div class="col-md-12 news-content">
                                <?php echo $data['detail']['main']->news_full_content; ?>

                            </div>

                        </div>

                        <div class="col-md-3 mu-single-sidebar">

                            <h4 class="text-blue mb-3"><b style="color:#0072bc;">LATEST</b></h4>

                            <?php if(count($data['detail']['last'])>0): ?>

                            <?php $__currentLoopData = $data['detail']['last']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <?php if(file_exists(public_path().'/upload/member/news/images/'.$value->news_image) &&
                            $value->news_image != null): ?>
                            <?Php $img = asset('upload/member/news/images/'.$value->news_image);?>
                            <?php else: ?>
                            <?Php $img = asset('assets/member/images/no-image.png');?>
                            <?php endif; ?>

                            <div class="media">
                                <div class="media-left">
                                    <a href="<?php echo e(url('news/detail/'.$value->news_id.'/'.$value->news_title)); ?>">
                                        <img class="media-object" src="<?php echo e($img); ?>" alt="img" width="75px">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <h6 class="media-heading"><a
                                            href="<?php echo e(url('news/detail/'.$value->news_id.'/'.$value->news_title)); ?>"><b><?php echo e(iconv_substr($value->news_title,0,30,'UTF-8')); ?></b></a>
                                    </h6>
                                    <p class="small"><i class="fa fa-clock-o"></i>
                                        <?php echo e(date("d",strtotime($value->created_at))); ?>

                                        <?php echo e(date("M",strtotime($value->created_at))); ?>

                                        <?php echo e(date("Y",strtotime($value->created_at))); ?></p>
                                </div>
                            </div>
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
    </div>
    <br>
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.member.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/cmcbiote/public_html/resources/views/page/member/view_news.blade.php ENDPATH**/ ?>