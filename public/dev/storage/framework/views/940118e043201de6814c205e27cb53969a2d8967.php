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
                            <a href="<?php echo e(url('/')); ?>">Home</a> > <a href="<?php echo e(url('/dashboard')); ?>">Dashboard</a> > <a href="<?php echo e(url('managecourse')); ?>"> Manage Course </a> > Gradebook
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
                                        <th>Student Name</th>
                                        <th class="text-center">Start Date</th>
                                        <th class="text-center">Update Date</th>
                                        <th class="text-center">Pretest Score</th>
                                        <th class="text-center">Posttest Score</th>
                                        <th class="text-center">Grade Status</th>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php $__currentLoopData = $data['detail']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td class="text-center"><?php echo e($i++); ?></td>
                                                <td><?php echo e($item->first_name." ".$item->last_name); ?></td>
                                                <td class="text-center"><?php echo e(date('Y-m-d',strtotime($item->created_at))); ?></td>
                                                <td class="text-center"><?php echo e(date('Y-m-d',strtotime($item->updated_at))); ?></td>
                                                <td class="text-center"><?php echo e($item->pretest_score); ?></td>
                                                <td class="text-center"><?php echo e($item->posttest_score); ?></td>
                                                <td class="text-center">
                                                   <?php if($item->pretest_status==2): ?>
                                                    <span class="label label-success">Pass</span>
                                                   <?php elseif($item->pretest_status==1): ?>
                                                    <span class="label label-danger">False</span>
                                                   <?php elseif($item->pretest_status==0): ?>
                                                    <span class="label label-warning">Wait</span>
                                                   <?php endif; ?>
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

<?php echo $__env->make('layouts.member.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/cmcbiote/public_html/resources/views/page/member/mygradebook.blade.php ENDPATH**/ ?>