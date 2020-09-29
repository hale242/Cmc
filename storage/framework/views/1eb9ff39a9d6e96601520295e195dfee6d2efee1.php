<div class="row">
    <div class="col-sm-12">

        <form class="form-horizontal" action="<?php echo e(url('admin/menusystem/'.$data['page'].'/action')); ?>" method="post" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>

            <input type="hidden" name="type_action" value="<?php echo e($data['action']); ?>">

            <input type="hidden" name="id" value="<?php if(isset($data['id'])): ?><?php echo e($data['id']); ?><?php else: ?><?php echo e(''); ?><?php endif; ?>">

            <?php echo $__env->make('layouts.admin.flash-message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

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


            <?php if($data['page']=='Main'): ?>
            <?php if(isset($data['data_detail']['menu_system_path'])): ?>
            <?php $menu_system_path = $data['data_detail']['menu_system_path']; ?>
            <?php else: ?>
            <?php $menu_system_path = null; ?>
            <?php endif; ?>

            <?php if(isset($data['data_detail']['menu_system_icon'])): ?>
            <?php $menu_system_icon = $data['data_detail']['menu_system_icon']; ?>
            <?php else: ?>
            <?php $menu_system_icon = null; ?>
            <?php endif; ?>

            <?php if(isset($data['data_detail']['menu_system_main_menu '])): ?>
            <?php $menu_system_main_menu  = $data['data_detail']['menu_system_main_menu ']; ?>
            <?php else: ?>
            <?php $menu_system_main_menu  = null; ?>
            <?php endif; ?>

            <?php if(isset($data['data_detail']['menu_system_z_index'])): ?>
            <?php $menu_system_z_index = $data['data_detail']['menu_system_z_index']; ?>
            <?php else: ?>
            <?php $menu_system_z_index = null; ?>
            <?php endif; ?>

            <?php if(isset($data['data_detail']['menu_system_status'])): ?>
            <?php $menu_system_status = $data['data_detail']['menu_system_status']; ?>
            <?php else: ?>
            <?php $menu_system_status = null; ?>
            <?php endif; ?>


            <section class="panel panel-default">

                <header class="panel-heading">
                    <span class="h4"><?php echo e($data['action']); ?> Menu System</span>
                </header>
                <div class="panel-body">

                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <?php $__currentLoopData = $data['detail']['Language']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="nav-item <?php echo e($val->language_main == '1' ? 'active' : ''); ?>">
                            <a class="nav-link" id="<?php echo e($val->language_id); ?>" data-toggle="tab" href="#<?php echo e($val->language_id); ?>-add" role="tab" aria-controls="home"><?php echo e($val->language_name); ?></a>
                        </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <li class="nav-item">
                            <a class="nav-link" id="Setting" data-toggle="tab" href="#setting" role="tab" aria-controls="home">Setting</a>
                        </li>
                    </ul>

                    <div class="tab-content" id="myTabContent">
                        <?php if(isset($data['data_detail']['MenuSystemLang'])): ?>

                        <?php $__currentLoopData = $data['data_detail']['MenuSystemLang']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <?php if(isset($data['data_detail']['menu_system_lang_code'])): ?>
                        <?php $menu_system_lang_code = $data['data_detail']['menu_system_lang_code']; ?>
                        <?php else: ?>
                        <?php $menu_system_lang_code = null; ?>
                        <?php endif; ?>

                        <?php if(isset($data['data_detail']['menu_system_lang_name'])): ?>
                        <?php $menu_system_lang_name = $data['data_detail']['menu_system_lang_name']; ?>
                        <?php else: ?>
                        <?php $menu_system_lang_name = null; ?>
                        <?php endif; ?>

                        <?php if(isset($data['data_detail']['menu_system_lang_details'])): ?>
                        <?php $menu_system_lang_details = $data['data_detail']['menu_system_lang_details']; ?>
                        <?php else: ?>
                        <?php $menu_system_lang_details = null; ?>
                        <?php endif; ?>

                        <?php if(isset($data['data_detail']['menu_system_lang_status'])): ?>
                        <?php $menu_system_lang_status = $data['data_detail']['menu_system_lang_status']; ?>
                        <?php else: ?>
                        <?php $menu_system_lang_status = null; ?>
                        <?php endif; ?>

                        <div class="tab-pane fade <?php echo e($val->language_id == '1' ? 'active in' : ''); ?>" id="<?php echo e($val->language_id); ?>-add" role="tabpanel" aria-labelledby="<?php echo e($val->language_id); ?>">

                            <div class="form-group pull-in clearfix">
                                <input name="lag['<?php echo e($val->language_id); ?>'][language_id]" type="hidden" value="<?php echo e($val->language_id); ?>">
                                <input name="lag['<?php echo e($val->language_id); ?>'][menu_system_lang_code]" type="hidden" value="<?php echo e($val->menu_system_lang_code); ?>">

                                <!-- <div class="col-sm-7 m-t">
                                    <label>Menu Code</label>
                                    <input name="lag['<?php echo e($val->language_id); ?>'][menu_system_lang_code]" type="text" class="form-control" placeholder="Menu Code" value="<?php echo e($val->menu_system_lang_code); ?>" required>
                                </div> -->
                                <div class="col-sm-7 m-t">
                                    <label>Menu Name</label>
                                    <input name="lag['<?php echo e($val->language_id); ?>'][menu_system_lang_name]" type="text" class="form-control" placeholder="Menu Name" value="<?php echo e($val->menu_system_lang_name); ?>" required>
                                </div>
                                <div class="col-sm-7 m-t">
                                    <label>Detail</label>
                                    <input name="lag['<?php echo e($val->language_id); ?>'][menu_system_lang_details]" type="text" class="form-control" placeholder="Detail" value="<?php echo e($val->menu_system_lang_details); ?>" required>
                                </div>
                                <div class="col-sm-6">
                                    <div class="line line-dashed line-lg pull-in"></div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Status</label>
                                        <div class="col-sm-10">
                                            <label class="switch">
                                                <input name="lag['<?php echo e($val->language_id); ?>'][menu_system_lang_status]" type="checkbox" <?php if($menu_system_lang_status==1): ?><?php echo e('checked'); ?><?php endif; ?> value="1">
                                                <span></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                        <?php $__currentLoopData = $data['detail']['Language']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <div class="tab-pane fade <?php echo e($val->language_main == '1' ? 'active in' : ''); ?>" id="<?php echo e($val->language_id); ?>-add" role="tabpanel" aria-labelledby="<?php echo e($val->language_id); ?>">

                            <div class="form-group pull-in clearfix">
                                <input name="lag['<?php echo e($val->language_id); ?>'][language_id]" type="hidden" value="<?php echo e($val->language_id); ?>">
                                <input name="lag['<?php echo e($val->language_id); ?>'][menu_system_lang_code]" type="hidden" value="<?php echo e($val->language_code); ?>">

                                <!-- <div class="col-sm-7 m-t">
                                    <label>Menu Code</label>
                                    <input name="lag['<?php echo e($val->language_id); ?>'][menu_system_lang_code]" type="text" class="form-control" placeholder="Menu Code" value="" required>
                                </div> -->
                                <div class="col-sm-7 m-t">
                                    <label>Menu Name</label>
                                    <input name="lag['<?php echo e($val->language_id); ?>'][menu_system_lang_name]" type="text" class="form-control" placeholder="Menu Name" value="" required>
                                </div>
                                <div class="col-sm-7 m-t">
                                    <label>Detail</label>
                                    <input name="lag['<?php echo e($val->language_id); ?>'][menu_system_lang_details]" type="text" class="form-control" placeholder="Detail" value="" required>
                                </div>
                                <div class="col-sm-6">
                                    <div class="line line-dashed line-lg pull-in"></div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Status</label>
                                        <div class="col-sm-10">
                                            <label class="switch">
                                                <input name="lag['<?php echo e($val->language_id); ?>'][menu_system_lang_status]" type="checkbox" value="1">
                                                <span></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>

                        <div class="tab-pane fade" id="setting" role="tabpanel" aria-labelledby="setting">

                            <div class="form-group pull-in clearfix">
                                <input name="menu_system[menu_system_main_menu]" type="hidden" value="0">
                                <div class="col-sm-6 m-t">
                                    <label>Link</label>
                                    <input name="menu_system[menu_system_path]" type="text" class="form-control" placeholder="Link" value="<?php echo e($menu_system_path); ?>" required>
                                </div>
                                <div class="col-sm-6 m-t">
                                    <label>Icon</label>
                                    <input name="menu_system[menu_system_icon]" type="text" class="form-control" placeholder="Icon" value="<?php echo e($menu_system_icon); ?>" required>
                                </div>
                                <div class="col-sm-6 m-t">
                                    <label>Order By</label>
                                    <input name="menu_system[menu_system_z_index]" type="number" class="form-control" placeholder="Order By" value="<?php echo e($menu_system_z_index); ?>" required>
                                </div>
                                <div class="col-sm-12">
                                    <div class="line line-dashed line-lg pull-in"></div>
                                    <div class="form-group">
                                        <label class="col-sm-1 control-label">Status</label>
                                        <div class="col-sm-10">
                                            <label class="switch">
                                                <input name="menu_system[menu_system_status]" id='menu_system_status' type="checkbox" <?php if($menu_system_status==1): ?><?php echo e('checked'); ?><?php endif; ?> value="1">
                                                <span></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <footer class="panel-footer text-right bg-light lter">
                            <button type="submit" class="btn btn-success btn-s-xs">Save</button>
                            <button type="reset" class="btn btn-danger btn-s-xs">Cancel</button>
                        </footer>
                    </div>
                </div>
            </section>
            <?php endif; ?>
        </form>

    </div>
</div>

<?php $__env->startSection('javascript'); ?>

<!-- ckeditor -->
<script>
    $(document).ready(function() {

        var url = '<?php echo url()->current(); ?>';
        var res = url.split('/');

        var editor = CKEDITOR.replace('full_content', {
            filebrowserUploadUrl: "<?php echo e(route('upload', ['_token' => csrf_token() ])); ?>",
            filebrowserUploadMethod: 'form'
        });
        editor.on('change', function(evt) {
            $('#full_content').val(evt.editor.getData());
        });


    });
</script>
<?php $__env->stopSection(); ?><?php /**PATH C:\xampp\htdocs\cmc\resources\views/page/admin/include/menusystem/form.blade.php ENDPATH**/ ?>