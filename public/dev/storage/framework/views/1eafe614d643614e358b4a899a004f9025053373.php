<?php $__env->startSection('detail'); ?>

<div class="loader"></div>

<section id="mu-course-content">
    <div>
        <div>
            <div class="col-12">
                <div>

                    <div class="bar_mydashboard">
                        <div class="container">
                            <?php echo $__env->make('layouts.member.menu_dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    </div>

                    <div class="container">
                        <div class="col-md-12 text-left breadcrumb pt-2 pl-1">
                            <a href="<?php echo e(url('/')); ?>">Home</a> > <a href="<?php echo e(url('/dashboard')); ?>">Dashboard</a> > My Wishlist
                        </div>
                    </div>


                    <figcaption class="container">
                        <div class="row">

                            <div class="col-md-12">

                                <div class="col-md-12">

                                    <table class="DataTable table table-striped b-t b-light">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Course Name</th>
                                                <th class="text-right">Course Price</th>
                                                <th>View</th>
                                                <th class="text-center">Date</th>
                                                <th>Teacher Name</th>
                                                <th class="text-right">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if(count($data['detail'])>0): ?>
                                            <?php $i = 1;?>
                                            <?php $__currentLoopData = $data['detail']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($i++); ?></td>
                                                <td>
                                                    <a target="_blank" href="<?php echo e(url('course/detail/'.$value->course_id.'/'.$value->course_name)); ?>" title="View">
                                                        <?php echo e(substr($value->course_name,0,50)); ?><?php if(strlen($value->course_name)>50): ?>...<?php endif; ?>
                                                    </a>
                                                </td>
                                                <td class="text-right">
                                                    <?php if($value->course_price!=0): ?>
                                                        <?php echo e(number_format($value->course_price,2)); ?>

                                                    <?php else: ?>
                                                        <span class="text-red">FREE</span>
                                                    <?php endif; ?>
                                                </td>
                                                <td class="text-center"><?php echo e($value->course_view); ?></td>
                                                <td class="text-center"><?php echo e(date("Y-m-d",strtotime($value->date_create))); ?></td>
                                                <?php $__currentLoopData = $data['teacher']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value3): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if($value->course_teacher_id == $value3->user_id): ?>
                                                        <?php $teacher = $value3->first_name.' '.$value3->last_name ?>
                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                <td title="<?php echo e($teacher); ?>">
                                                    <?php echo e(substr($teacher,0,20)); ?><?php if(strlen($teacher)>20): ?>...<?php endif; ?>
                                                </td>
                                                <td class="text-right">
                                                    <a target="_blank" href="<?php echo e(url('course/detail/'.$value->course_id.'/'.$value->course_name)); ?>" class="btn btn-sm btn-success" title="View Detail">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                    <a href="#" class="btn btn-sm btn-danger" onclick="confirm_delete('<?php echo e(url('mywishlist/delete/')); ?>','<?php echo e($value->wishlist_id); ?>');" title="Delete form wishlist">
                                                        <i class="fa fa-times"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            
                                            <?php endif; ?>
                                        </tbody>
                                    </table>

                                    

                                </div>

                            </div>

                        </div>
                    </figcaption>

                </div>
            </div>
        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.member.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/cmcbiote/public_html/resources/views/page/member/wishlist.blade.php ENDPATH**/ ?>