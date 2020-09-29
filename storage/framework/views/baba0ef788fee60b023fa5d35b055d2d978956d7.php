
<div class="row">

    <div class="col-lg-12">
        <table class="table table-striped b-t b-light" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th>Name Menu</th>
                    <th>Link</th>
                    <th class="text-center">Icon</th>
                    <th class="text-center">Order By</th>
                    <th class="text-center">Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if(count($data['detail'])>0): ?>
                <?php $item = $data['detail']->firstItem(); ?>
                <?php $__currentLoopData = $data['detail']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td class="text-center"><?php echo e($item++); ?></td>
                    <td>
                        <?php $__currentLoopData = $value->MenuSystemLang; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php echo e($val->menu_system_lang_name); ?></br>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </td>
                    <td><?php echo e($value->menu_system_path); ?></td>
                    <td class="text-center"><?php echo e($value->menu_system_icon); ?></td>
                    <td class="text-center"><?php echo e($value->menu_system_z_index); ?></td>
                    <td class="text-center"> <?php if($value->menu_system_status==1): ?>
                        <span class="label label-success">Activate</span>
                        <?php else: ?>
                        <span class="label label-danger">Inactivate</span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <a href="<?php echo e(url('admin/menusystem/main/edit/'.$value->menu_system_id)); ?>" class="btn btn-success" title="Edit"><i class="fa fa-edit"></i></a>
                        <a href="javascript:;" class="btn btn-info SubMenu" id="<?php echo e($value->menu_system_id); ?>" title="Sub Menu"><i class="fa fa-bars"></i></a>
                        <!-- <a href="<?php echo e(url('admin/menusystem/main/submenu/'.$value->menu_system_id)); ?>" class="btn btn-info" title="Sub Menu"><i class="fa fa-bars"></i></a> -->
                        <a href="#" class="btn btn-danger" onclick="confirm_delete('<?php echo e(url('admin/menusystem/delete/menusystem/')); ?>','<?php echo e($value->menu_system_id); ?>');" title="Delete"><i class="fa fa-trash-o"></i></a>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                <tr>
                    <td colspan="10" class="text-danger">
                        <div align="center"><?php echo e(trans('other.data_not_found')); ?></div>
                    </td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <footer class="panel-footer">
            <div class="row">
                <div class="col-sm-2 text-left">
                    <small class="text-muted inline m-t-sm m-b-sm">
                        <?php echo e('Showing '.$data['detail']->firstItem().' - '.$data['detail']->lastItem()); ?> / Total :
                        <?php echo e($data['detail']->total()); ?> items
                    </small>
                </div>
                <div class="col-sm-8 text-center">
                </div>
                <div class="col-sm-2 text-right">
                    <?php echo e($data['detail']->links()); ?>

                </div>
            </div>
        </footer>
    </div>
</div><?php /**PATH C:\xampp\htdocs\cmc\resources\views/page/admin/include/menusystem/view.blade.php ENDPATH**/ ?>