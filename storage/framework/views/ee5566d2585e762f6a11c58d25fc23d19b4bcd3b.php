<?php $__env->startSection('detail'); ?>
<div class="modal fade bd-example-modal-lg" id="modal_SubMenu" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><b><i class="fa fa-edit"></i> Menu Sub</b>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body form-horizontal">
                <div class="col-lg-12 text-right">
                    <button href="" class="btn btn-primary AddSubMenu" title="Add" id='add_sudmenu_id'><i class="fa fa-plus"></i> Create</button>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped b-t b-light" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <td>Name Menu</td>
                                <td>Link</td>
                                <td>Icon</td>
                                <td class="text-center">Order By</td>
                                <td class="text-center">Status</td>
                                <td class="text-center">Action</td>
                            </tr>
                        </thead>
                        <tbody id="Table_Submenu">
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>

<div class="modal fade bd-example-modal-lg" id="modal_CreateSubMenu" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><b><i class="fa fa-edit"></i>Create Sub Menu </b>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form-horizontal" action="<?php echo e(url('admin/menusystem/'.$data['page'].'/action')); ?>" method="post" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="type_action" value="Create">

                <?php echo $__env->make('layouts.admin.flash-message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <section class="panel panel-default">

                    <div class="panel-body">
                        <?php if(!empty($data['Language'])): ?>
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <?php $__currentLoopData = $data['Language']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="nav-item <?php echo e($lag->language_main == '1' ? 'active' : ''); ?>">
                                <a class="nav-link" id="<?php echo e($lag->language_id); ?>" data-toggle="tab" href="#<?php echo e($lag->language_id); ?>-add" role="tab" aria-controls="home"><?php echo e($lag->language_name); ?></a>
                            </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <li class="nav-item">
                                <a class="nav-link" id="Setting" data-toggle="tab" href="#setting" role="tab" aria-controls="home">Setting</a>
                            </li>
                        </ul>

                        <div class="tab-content" id="myTabContent">
                            <?php $__currentLoopData = $data['Language']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

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
                            <div class="tab-pane fade" id="setting" role="tabpanel" aria-labelledby="setting">

                                <div class="form-group pull-in clearfix">
                                    <input name="menu_system[menu_system_main_menu]" type="hidden" id="menu_system_main_menu_id">
                                    <div class="col-sm-6 m-t">
                                        <label>Link</label>
                                        <input name="menu_system[menu_system_path]" type="text" class="form-control" placeholder="Link" value="" required>
                                    </div>
                                    <div class="col-sm-6 m-t">
                                        <label>Icon</label>
                                        <input name="menu_system[menu_system_icon]" type="text" class="form-control" placeholder="Icon" value="" required>
                                    </div>
                                    <div class="col-sm-6 m-t">
                                        <label>Order By</label>
                                        <input name="menu_system[menu_system_z_index]" type="number" class="form-control" placeholder="Order By" value="" required>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="line line-dashed line-lg pull-in"></div>
                                        <div class="form-group">
                                            <label class="col-sm-1 control-label">Status</label>
                                            <div class="col-sm-10">
                                                <label class="switch">
                                                    <input name="menu_system[menu_system_status]" id='menu_system_status' type="checkbox" value="1">
                                                    <span></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <footer class="panel-footer text-right bg-light lter">
                                <button type="submit" class="btn btn-success btn-s-xs">Save</button>
                                <button type="reset" class="btn btn-danger btn-s-xs" data-dismiss="modal" aria-label="Close">Cancel</button>
                            </footer>
                        </div>
                        <?php endif; ?>
                    </div>
                </section>
            </form>
        </div>
    </div>
</div>

<div class="modal fade bd-example-modal-lg" id="modal_EditSubMenu" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><b><i class="fa fa-edit"></i>Edit Sub Menu </b>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form-horizontal" action="<?php echo e(url('admin/menusystem/'.$data['page'].'/action')); ?>" method="post" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="type_action" value="Edit">

                <?php echo $__env->make('layouts.admin.flash-message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <section class="panel panel-default">
                    <input type="hidden" name="id" id="edit_id">
                    <div class="panel-body">
                        <?php if(!empty($data['Language'])): ?>
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <?php $__currentLoopData = $data['Language']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="nav-item <?php echo e($lag->language_main == '1' ? 'active' : ''); ?>">
                                <a class="nav-link" id="<?php echo e($lag->language_id); ?>" data-toggle="tab" href="#<?php echo e($lag->language_id); ?>-edit" role="tab" aria-controls="home"><?php echo e($lag->language_name); ?></a>
                            </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <li class="nav-item">
                                <a class="nav-link" id="Setting" data-toggle="tab" href="#setting-edit" role="tab" aria-controls="home">Setting</a>
                            </li>
                        </ul>

                        <div class="tab-content" id="myTabContent">
                            <?php $__currentLoopData = $data['Language']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <div class="tab-pane fade <?php echo e($val->language_main == '1' ? 'active in' : ''); ?>" id="<?php echo e($val->language_id); ?>-edit" role="tabpanel" aria-labelledby="<?php echo e($val->language_id); ?>">

                                <div class="form-group pull-in clearfix">
                                    <input name="lag['<?php echo e($val->language_id); ?>'][language_id]" type="hidden" value="<?php echo e($val->language_id); ?>">
                                    <input name="lag['<?php echo e($val->language_id); ?>'][menu_system_lang_code]" id="edit_menu_system_lang_code_<?php echo e($val->language_id); ?>" type="hidden" >

                                    <!-- <div class="col-sm-7 m-t">
                                        <label>Menu Code</label>
                                        <input name="lag['<?php echo e($val->language_id); ?>'][menu_system_lang_code]" id="edit_menu_system_lang_code_<?php echo e($val->language_id); ?>" type="text" class="form-control" placeholder="Menu Code" value="" required>
                                    </div> -->
                                    <div class="col-sm-7 m-t">
                                        <label>Menu Name</label>
                                        <input name="lag['<?php echo e($val->language_id); ?>'][menu_system_lang_name]" id="edit_menu_system_lang_name_<?php echo e($val->language_id); ?>" type="text" class="form-control" placeholder="Menu Name" value="" required>
                                    </div>
                                    <div class="col-sm-7 m-t">
                                        <label>Detail</label>
                                        <input name="lag['<?php echo e($val->language_id); ?>'][menu_system_lang_details]" id="edit_menu_system_lang_details_<?php echo e($val->language_id); ?>" type="text" class="form-control" placeholder="Detail" value="" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="line line-dashed line-lg pull-in"></div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Status</label>
                                            <div class="col-sm-10">
                                                <label class="switch">
                                                    <input name="lag['<?php echo e($val->language_id); ?>'][menu_system_lang_status]" id="edit_menu_system_lang_status_<?php echo e($val->language_id); ?>" type="checkbox" value="1">
                                                    <span></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <div class="tab-pane fade" id="setting-edit" role="tabpanel" aria-labelledby="setting-edit">

                                <div class="form-group pull-in clearfix">
                                    <!-- <input name="menu_system[menu_system_main_menu]" type="hidden" id="edit_menu_system_main_menu_id"> -->
                                    <div class="col-sm-6 m-t">
                                        <label>Link</label>
                                        <input name="menu_system[menu_system_path]" type="text" class="form-control" id="edit_menu_system_path" placeholder="Link" value="" required>
                                    </div>
                                    <div class="col-sm-6 m-t">
                                        <label>Icon</label>
                                        <input name="menu_system[menu_system_icon]" type="text" class="form-control" id="edit_menu_system_icon" placeholder="Icon" value="" required>
                                    </div>
                                    <div class="col-sm-6 m-t">
                                        <label>Order By</label>
                                        <input name="menu_system[menu_system_z_index]" type="number" class="form-control" id="edit_menu_system_z_index" placeholder="Order By" value="" required>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="line line-dashed line-lg pull-in"></div>
                                        <div class="form-group">
                                            <label class="col-sm-1 control-label">Status</label>
                                            <div class="col-sm-10">
                                                <label class="switch">
                                                    <input name="menu_system[menu_system_status]" id='edit_menu_system_status' type="checkbox" value="1">
                                                    <span></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <footer class="panel-footer text-right bg-light lter">
                                <button type="submit" class="btn btn-success btn-s-xs">Save</button>
                                <button type="reset" class="btn btn-danger btn-s-xs" data-dismiss="modal" aria-label="Close">Cancel</button>
                            </footer>
                        </div>
                        <?php endif; ?>
                    </div>
                </section>
            </form>
        </div>
    </div>
</div>

<section id="content" style="display: block;">
    <section class="vbox">
        <section class="scrollable padder">

            <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
                <li><a href="<?php echo e(url('admin/home')); ?>"><i class="fa fa-home"></i> Home</a></li>
                <li><a href="<?php echo e(url('admin/menusystem/main')); ?>">Menu System</a></li>
                <li class="active"><a href="<?php echo e(url('admin/menusystem/'.strtolower($data['page']))); ?>"><?php echo e($data['page']); ?></a>
                </li>
            </ul>
            <?php if($data['page']=='Main'): ?><?php $title = 'Menu System'; ?><?php else: ?><?php $title = $data['page']; ?><?php endif; ?>

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
                                    <a href="<?php echo e(url('admin/menusystem/'.strtolower($data['page']).'/add')); ?>" class="btn btn-primary" title="Add"><i class="fa fa-plus"></i> Create</a>
                                </div>

                                <br><br><br>

                                <form action="<?php echo e(url('admin/menusystem/'.$data['page']).'/search'); ?>" method="get" enctype="multipart/form-data">
                                    <?php echo csrf_field(); ?>

                                    <div class="col-sm-6 m-b-xs">
                                        <div class="col-sm-5">
                                            <label for="menu_system_status">Status</label>
                                            <select name="menu_system_status" class="input-sm form-control ">
                                                <option value="1" <?php if($data['session_search']['menu_system_status']==1): ?> selected <?php endif; ?>>Activate</option>
                                                <option value="0" <?php if($data['session_search']['menu_system_status']==0): ?> selected <?php endif; ?>>Inactivate</option>
                                                <option value="" <?php if($data['session_search']['menu_system_status']==='' ): ?> selected <?php endif; ?>></option>
                                            </select>
                                        </div>
                                        <div class="col-sm-7">
                                            <label for="menu_system_name">Manu System Name</label>
                                            <input name="menu_system_name" type="text" class="input-sm form-control" placeholder="Search" value="<?php echo e($data['session_search']['menu_system_name']); ?>">
                                        </div>
                                    </div>

                                    <div class="col-sm-12 m-t">
                                        <div class="col-sm-12">
                                            <button type="submit" class="btn btn-sm btn-info">Apply Filter</button>
                                            <a href="<?php echo e(url('admin/menusystem/'.strtolower($data['page']))); ?>">
                                                <button type="button" class="btn btn-sm btn-warning">Reset Filter</button>
                                            </a>
                                        </div>
                                    </div>

                                </form>

                            </div>

                            <?php endif; ?>

                            <div class="table-responsive">
                                <?php if($data['type']=='view'): ?>
                                <?php echo $__env->make('page.admin.include.menusystem.view', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php elseif($data['type']=='form'): ?>
                                <?php echo $__env->make('page.admin.include.menusystem.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php else: ?>
                                <?php echo $__env->make('page.admin.include.menusystem.show', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php endif; ?>
                            </div>
                        </section>
                </div>

            </div>


        </section>
    </section>
</section>
<script>
    $(document).ready(function() {

        var url = '<?php echo url()->current(); ?>';
        var res = url.split('/');

    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\cmc\resources\views/page/admin/menusystem.blade.php ENDPATH**/ ?>