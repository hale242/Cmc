<?php $__env->startSection('detail'); ?>

<?php
    if($data['page']=='Main'){
        $title = 'Course';
    }else{
        $title = $data['page'];
    }
?>

<section id="content">
    <section class="vbox">
        <section class="scrollable padder">

            <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
                <li><a href="<?php echo e(url('admin/home')); ?>"><i class="fa fa-home"></i> Home</a></li>
                <li><a href="<?php echo e(url('admin/course/main')); ?>">Course</a></li>
                <li class="active"><a href="<?php echo e(url('admin/course/'.strtolower($data['page']))); ?>"><?php echo e($data['page']); ?></a></li>
            </ul>

            <div class="m-b-md">
                <h3 class="m-b-none"><?php echo e($title); ?></h3>
                <small>Manage data <?php echo e($title); ?></small>
            </div>

            <?php if($data['type']!='form' && $data['type']!='show'): ?>

            <div class="row">

                <div class="col-lg-12">

                    <section class="panel panel-default">
                        <header class="panel-heading" style="height: 55px;">
                            Data view <i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i>
                        <a href="<?php echo e(url('admin/course/'.strtolower($data['page']).'/add')); ?>" class="btn btn-primary pull-right" title="Add"><i class="fa fa-plus"></i> Create <?php echo e($title); ?></a>
                        </header>

                        <section class="panel panel-default">

                            <div class="row wrapper">

                                <form action="<?php echo e(url('admin/course/'.$data['page']).'/search'); ?>" method="get" enctype="multipart/form-data">
                                    <?php echo csrf_field(); ?>

                                    <div class="col-sm-6 m-b-xs">
                                        <div class="col-sm-6">
                                            <label for="startdate">Start Date</label>
                                            <div class="input-group">
                                                <input type="text" name="date_start" class="input-sm form-control datepicker-input" placeholder="Start Date" value="<?php echo e($data['session_search']['date_start']); ?>">
                                                <span class="input-group-btn">
                                                    <button class="btn btn-sm btn-default" type="button"><i class="fa fa-calendar"></i></button>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="enddate">End Date</label>
                                            <div class="input-group">
                                                <input type="text" name="date_end" id="date_end" class="input-sm form-control datepicker-input" placeholder="End Date" value="<?php echo e($data['session_search']['date_end']); ?>">
                                                <span class="input-group-btn">
                                                    <button class="btn btn-sm btn-default" type="button"><i class="fa fa-calendar"></i></button>
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6 m-b-xs">
                                        <div class="col-sm-5">
                                        <label for="status">Status</label>
                                            <select name="status" class="input-sm form-control ">
                                                <option value="1" <?php if($data['session_search']['status']==1): ?> selected <?php endif; ?>>Activate</option>
                                                <option value="0" <?php if($data['session_search']['status']==0): ?> selected <?php endif; ?>>Draft</option>
                                                <option value="" <?php if($data['session_search']['status']===''): ?> selected <?php endif; ?>></option>
                                            </select>
                                        </div>
                                        <div class="col-sm-7">
                                            <?php
                                                if($data['page']=='Main'){
                                                    $pagesearch = 'Search Course or Teacher';
                                                }else if($data['page']=='Skill'){
                                                    $pagesearch = 'Skill Name';
                                                }else if($data['page']=='Category'){
                                                    $pagesearch = 'Category name';
                                                }
                                            ?>
                                            <label for="txt_search"><?php echo e($pagesearch); ?></label>
                                            <input name="txt_search" type="text" class="input-sm form-control" placeholder="Search" value="<?php echo e($data['session_search']['txt_search']); ?>">
                                        </div>
                                    </div>

                                    <div class="col-sm-12 m-t">
                                        <div class="col-sm-12">
                                            <button type="submit" class="btn btn-sm btn-info">Apply Filter</button>
                                            <a href="<?php echo e(url('admin/course/'.strtolower($data['page']))); ?>">
                                                <button type="button" class="btn btn-sm btn-warning">Reset Filter</button>
                                            </a>
                                        </div>
                                    </div>

                                </form>

                            </div>

                            <?php endif; ?>

                            <div class="table-responsive">
                                <?php if($data['type']=='view'): ?>
                                <?php echo $__env->make('page.admin.include.course.view', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php elseif($data['type']=='form'): ?>
                                <?php echo $__env->make('page.admin.include.course.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php else: ?>
                                <?php echo $__env->make('page.admin.include.course.show', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php endif; ?>
                            </div>
                        </section>
                </div>

            </div>

        </section>
    </section>
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\cmc\resources\views/page/admin/course.blade.php ENDPATH**/ ?>