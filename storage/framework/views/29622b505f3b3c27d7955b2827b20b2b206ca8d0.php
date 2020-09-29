<div class="row">
    <div class="col-lg-12">
        <table class="table table-striped b-t b-light" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th>Name</th>
                    <th >Code</th>
                    <th class="text-center">Main Status</th>
                    <th class="text-center">Status</th>
                    <th>Create Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if(count($data['detail'])>0): ?>
                <?php $item = $data['detail']->firstItem(); ?>
                <?php $__currentLoopData = $data['detail']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td class="text-center"><?php echo e($item++); ?></td>
                    <td><?php echo e($value->language_name); ?></td>
                    <td>
                    <?php echo e($value->language_code); ?>

                    </td>
                    <td class="text-center">  <?php if($value->language_main==1): ?>
                        <span class="label label-success">Main</span>
                        <?php else: ?>
                        <span class="label label-warning">Default</span>
                        <?php endif; ?>
                    </td>
                    <td class="text-center">  <?php if($value->language_status==1): ?>
                        <span class="label label-success">Activate</span>
                        <?php else: ?>
                        <span class="label label-danger">Inactivate</span>
                        <?php endif; ?>
                    </td>
                    <td><?php echo e(date("d-m-Y",strtotime($value->created_at))); ?></td>
                    
                    <td>
                        <a href="<?php echo e(url('admin/language/main/edit/'.$value->language_id)); ?>" class="btn btn-success"
                            title="Edit"><i class="fa fa-edit"></i></a>
                        <a href="#" class="btn btn-danger"
                            onclick="confirm_delete('<?php echo e(url('admin/language/delete/language/')); ?>','<?php echo e($value->language_id); ?>');"
                            title="Delete"><i class="fa fa-trash-o"></i></a>
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
</div>
<?php /**PATH C:\xampp\htdocs\cmc\resources\views/page/admin/include/language/view.blade.php ENDPATH**/ ?>