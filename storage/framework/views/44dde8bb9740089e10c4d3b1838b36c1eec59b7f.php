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
                            <a href="<?php echo e(url('/')); ?>">Home</a> > <a href="<?php echo e(url('/dashboard')); ?>">Dashboard</a> > Manage Course
                        </div>
                    </div>

                    <div class="container">
                        <?php echo $__env->make('layouts.member.flash-message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>

                    <?php if(count($errors)): ?>
                    <div class="alert alert-danger alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <div style="padding: 10px;">
                            <ul>
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    </div>
                    <?php endif; ?>

                    <figcaption class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="DataTable table table-strip">
                                    <thead>
                                        <th class="text-center">#</th>
                                        <th>My Course</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Create Date</th>
                                        <th class="text-center">Modify Date</th>
                                        <th class="text-right">Price</th>
                                        <th class="text-center">Subcription</th>
                                        <th class="text-center">Action</th>
                                    </thead>
                                    <tbody>
                                        
                                        <?php $i=1; ?>
                                        <?php $__currentLoopData = $data['detail']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php
                                                if($item->course_status==1){
                                                    $status = 'Active';
                                                    $status_color = 'success';
                                                }else{
                                                    $status = 'Draf';
                                                    $status_color = 'warning';
                                                }
                                            ?>
                                            <tr>
                                                <td class="text-center"><?php echo e($i++); ?></td>
                                                <td title="<?php echo e($item->course_name); ?>">
                                                    <a href="<?php echo e(url('/course/detail/'.$item->course_id."/".$item->course_name)); ?>" target="_blank">
                                                        <?php echo e(substr($item->course_name,0,50)); ?><?php if(strlen($item->course_name)>50): ?>...<?php endif; ?>
                                                    </a>
                                                </td>
                                                <td class="text-center"><span class="label label-<?php echo e($status_color); ?>"><?php echo e($status); ?></span></td>
                                                <td class="text-center"><?php echo e(date('Y-m-d', strtotime($item->created_at))); ?></td>
                                                <td class="text-center"><?php echo e(date('Y-m-d', strtotime($item->updated_at))); ?></td>
                                                <td class="text-right">
                                                    <?php if($item->course_price!=0): ?>
                                                        <?php echo e(number_format($item->course_price,2)); ?>

                                                    <?php else: ?>
                                                        <span class="text-red"><b>FREE</b></span>
                                                    <?php endif; ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php $__currentLoopData = $data['wishlist']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $wishlist): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if($wishlist->course_id==$item->course_id): ?>
                                                            <?php echo e($wishlist->counter); ?>

                                                        <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </td>
                                                <td class="text-center">
                                                    <a href="<?php echo e(url('gradebook/'.$item->course_id)); ?>">
                                                        <button class="btn btn-sm btn-info">Grade book</button>
                                                    </a>
                                                </td>
                                            </tr>

                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>

                                
                            </div>
                        </div>
                    </figcaption>



                </div>
            </div>
        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.member.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/cmcbiote/public_html/resources/views/page/member/mymanagecourse.blade.php ENDPATH**/ ?>