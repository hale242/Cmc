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
                            <a href="<?php echo e(url('/')); ?>">Home</a> > <a href="<?php echo e(url('/dashboard')); ?>">Dashboard</a> > My Course
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

                                <div class="col-md-12">

                            <table class="DataTable table table-striped b-t b-light">
                                <thead>
                                    <tr>
                                        <th style="width:5%">#</th>
                                        <th style="width:20%">Course Name</th>
                                        <th style="width:5%" class="text-center">Status</th>
                                        <th style="width:5%" class="text-center">View</th>
                                        <th style="width:5%" class="text-center">Category</th>
                                        <th style="width:10%" class="text-center">Pre test</th>
                                        <th style="width:10%" class="text-center">Post test</th>
                                        <th style="width:15%">Teacher Name</th>
                                        <th style="width:10%" class="text-right">Action</th>
                                        <th style="width:15%" class="text-center">Get certificate</th>
                                    </tr>
                                </thead>
                                <tbody style="font-size:12px;">

                                    <?php
                                    // dd($data);
                                    ?>

                                    <?php if($data['detail']): ?>

                                        <?php $i = 1;?>

                                        <?php $__currentLoopData = $data['detail']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                        <?php
                                        // dd($data['preposttest_result']);

                                        if($data['preposttest_result']!==null){

                                        if($data['preposttest_result'][$key]->course_id == $value->course_id){
                                        $status = $data['preposttest_result'][$key]->pretest_status;
                                        }else{
                                        $status = 0;
                                        }

                                        }else{

                                        $status = 0;

                                        }


                                        // dd($data['teacher']);
                                        ?>

                                    <tr>
                                        <td class="text-center"><?php echo e($i++); ?></td>

                                        <td title="<?php echo e($value->course_name); ?>"><?php echo e(substr($value->course_name,0,20)); ?><?php if(strlen($value->course_name)>20): ?>...<?php endif; ?></a></td>

                                        <td class="text-center">
                                            <?php if($status==0): ?>
                                            <span class="label label-warning">Wait</span>
                                            <?php elseif($status==1): ?>
                                            <span class="label label-danger">Fail</span>
                                            <?php elseif($status==2): ?>
                                            <span class="label label-success">Pass</span>
                                            <?php endif; ?>
                                        </td>

                                        <td class="text-center"><?php echo e($value->course_view); ?></td>
                                        <td class="text-center">
                                            <?php echo e($value->category_name); ?>

                                        </td>

                                        <td class="text-center">
                                            <?php if($data['preposttest_result'][$key]->pretest_score!==null): ?>
                                                <?php echo e(date("d-m-Y",strtotime($data['preposttest_result'][$key]->date_create))); ?>

                                            <?php else: ?>
                                                <?php echo e('-'); ?>

                                            <?php endif; ?>
                                        </td>

                                        <td class="text-center">
                                            <?php if($data['preposttest_result'][$key]->posttest_score!==null): ?>
                                                <?php echo e(date("d-m-Y",strtotime($data['preposttest_result'][$key]->date_end))); ?>

                                            <?php else: ?>
                                                <?php echo e('-'); ?>

                                            <?php endif; ?>
                                        </td>

                                        <?php $__currentLoopData = $data['teacher']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value3): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($value->course_teacher_id == $value3->user_id): ?>
                                                <?php $teacher = $value3->first_name.' '.$value3->last_name ?>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        <td title="<?php echo e($teacher); ?>">
                                            <?php echo e(substr($teacher,0,20)); ?><?php if(strlen($teacher)>20): ?>...<?php endif; ?>
                                        </td>

                                        <td class="text-right">
                                            <?php

                                                // if($data['preposttest_result'][$key]->pretest_score!=null && $data['preposttest_result'][$key]->posttest_score==null){
                                                //     $steplink = 2;
                                                // }else if($data['preposttest_result'][$key]->posttest_score!=null){
                                                //     $steplink = 1;
                                                // }else{
                                                //     $steplink = 1;
                                                // }

                                                $steplink = 1;

                                                if($value->order_status==3 || $value->order_status==1){
                                            ?>
                                                    <?php
                                                        if($data['preposttest_result'][$key]->pretest_score!=null){
                                                            $stylebtn = 'danger';
                                                            $textbtn = 'Learn & Post test';
                                                        }elseif($data['preposttest_result'][$key]->posttest_score!=null){
                                                            $stylebtn = 'info';
                                                            $textbtn = 'Pre test agin';
                                                        }else{
                                                            $stylebtn = 'warning';
                                                            $textbtn = 'Pre test';
                                                        }
                                                    ?>

                                                    <a href="<?php echo e(url('mycourse/testing/'.$value->course_id.'/'.$value->course_name.'/'.$steplink)); ?>" class="btn btn-<?php echo e($stylebtn); ?> btn-sm" title="View">
                                                        <i class="fa fa-book"></i> <?php echo e($textbtn); ?>

                                                    </a>

                                            <?php
                                                }else{
                                                    echo "wait for payment";
                                                }
                                            ?>
                                        </td>

                                        <td class="text-center">
                                            <?php if($status==2): ?>
                                                <span class="btn btn-sm btn-info" style="width: 100%;" data-toggle="modal" data-target="#certificate">View</span>
                                            <?php else: ?>
                                                <span>-</span>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    
                                    <?php endif; ?>

                                </tbody>
                            </table>

                            


                            <div id="certificate" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                                <div class="modal-dialog" role="document"> <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                        <h4 class="modal-title" id="mySmallModalLabel">How to get certificate.</h4>
                                    </div>
                                    <div class="modal-body row">
                                        <div class="col-md-6">
                                            <img src="<?php echo e(url('mockup/certificate.jpg')); ?>" alt="" class="img-responsive">
                                        </div>
                                        <div class="col-md-6">
                                            <span><u>Please contact</u></span>
                                            <ul>
                                                <li>Name :: xxxxxx xxxxxxx</li>
                                                <li>Address :: 9999 ssss bbbb xxxx</li>
                                                <li>Phone :: 888-777-6666</li>
                                                <li>Email :: cert.cmcbiotexh.co.th</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>



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

<?php echo $__env->make('layouts.member.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/cmcbiote/public_html/resources/views/page/member/mycourse.blade.php ENDPATH**/ ?>