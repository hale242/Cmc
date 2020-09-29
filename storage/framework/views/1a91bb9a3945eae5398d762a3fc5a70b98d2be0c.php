<?php $__env->startSection('detail'); ?>

<section id="content">
    <section class="vbox">
        <section class="scrollable padder">

            <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
                <li><a href="<?php echo e(url('admin/home')); ?>"><i class="fa fa-home"></i> Home</a></li>
                <li><a href="<?php echo e(url('admin/language/main')); ?>">Language</a></li>
                <li class="active"><a href="<?php echo e(url('admin/language/'.strtolower($data['page']))); ?>"><?php echo e($data['page']); ?></a>
                </li>
            </ul>
            <?php if($data['page']=='Main'): ?><?php $title = 'Language'; ?><?php else: ?><?php $title = $data['page']; ?><?php endif; ?>

            <div class="m-b-md">
                <h3 class="m-b-none"><?php echo e($title); ?></h3>
                <small>Manage data <?php echo e($title); ?></small>
            </div>
            <?php if($data['type']!='form' && $data['type']!='show'): ?>

            <div class="row">

                <div class="col-lg-12">
                    <section class="panel panel-default">
                        <header class="panel-heading">
                            Data view
                            <i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i>
                        </header>

                        <section class="panel panel-default">

                            <div class="row wrapper">

                                <div class="col-lg-12 text-right">
                                    <a href="<?php echo e(url('admin/language/'.strtolower($data['page']).'/add')); ?>" class="btn btn-primary" title="Add"><i class="fa fa-plus"></i> Create</a>
                                </div>

                                <br><br><br>

                                <form action="<?php echo e(url('admin/language/'.$data['page']).'/search'); ?>" method="get" enctype="multipart/form-data">
                                    <?php echo csrf_field(); ?>

                                    <div class="col-sm-6 m-b-xs">
                                        <div class="col-sm-5">
                                            <label for="language_status">Status</label>
                                            <select name="language_status" class="input-sm form-control ">
                                                <option value="1" <?php if($data['session_search']['language_status']==1): ?> selected <?php endif; ?>>Activate</option>
                                                <option value="0" <?php if($data['session_search']['language_status']==0): ?> selected <?php endif; ?>>Inactivate</option>
                                                <option value="" <?php if($data['session_search']['language_status']==='' ): ?> selected <?php endif; ?>></option>
                                            </select>
                                        </div>
                                        <div class="col-sm-7">
                                            <label for="language_name">Language</label>
                                            <input name="language_name" type="text" class="input-sm form-control" placeholder="Search" value="<?php echo e($data['session_search']['language_name']); ?>">
                                        </div>
                                    </div>

                                    <div class="col-sm-12 m-t">
                                        <div class="col-sm-12">
                                            <button type="submit" class="btn btn-sm btn-info">Apply Filter</button>
                                            <a href="<?php echo e(url('admin/language/'.strtolower($data['page']))); ?>">
                                                <button type="button" class="btn btn-sm btn-warning">Reset Filter</button>
                                            </a>
                                        </div>
                                    </div>

                                </form>

                            </div>

                            <?php endif; ?>

                            <div class="table-responsive">
                            <?php if($data['type']=='view'): ?>
                                <?php echo $__env->make('page.admin.include.language.view', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php elseif($data['type']=='form'): ?>
                                <?php echo $__env->make('page.admin.include.language.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php else: ?>
                                <?php echo $__env->make('page.admin.include.language.show', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php endif; ?>
                            </div>
                        </section>
                </div>

            </div>

        </section>
    </section>
</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\cmc\resources\views/page/admin/language.blade.php ENDPATH**/ ?>