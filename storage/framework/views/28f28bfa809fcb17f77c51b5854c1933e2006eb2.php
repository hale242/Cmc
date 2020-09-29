<?php if($data['page']=='Main'): ?>
    <div class="row">
        <div class="col-lg-12">
            <table class="table table-striped b-t b-light" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th style="width:1%" class="text-center">#</th>
                        <th style="width:14%">Course name</th>
                        <th style="width:13%">Category Name</th>
                        <th style="width:13%">Teacher name</th>
                        <th style="width:9%" class="text-center">Status</th>
                        <th style="width:10%" class="text-center">Create Date</th>
                        <th style="width:10%" class="text-center">Modify Date</th>
                        <th style="width:5%" class="text-center">Price</th>
                        <th style="width:5%" class="text-center">Subscription</th>
                        <th style="width:10%" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(count($data['detail'])>0): ?>
                    <?php $item = $data['detail']->firstItem(); ?>
                    <?php $__currentLoopData = $data['detail']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td class="text-center"><?php echo e($item++); ?></td>
                        <td><?php echo e($value->course_name); ?></a></td>
                        <td><?php echo e($value->category_name); ?></td>
                        <td><?php echo e($value->first_name.' '.$value->last_name); ?></td>
                        <td class="text-center">
                            <?php if($value->course_status==1): ?>
                            <span class="label label-success">Activate</span>
                            <?php else: ?>
                            <span class="label label-warning">Draft</span>
                            <?php endif; ?>
                        </td>
                        <td class="text-center"><?php echo e(date("d-m-Y",strtotime($value->date_create))); ?></td>
                        <td class="text-center"><?php echo e(date("d-m-Y",strtotime($value->date_update))); ?></td>
                        <td class="text-center"><?php echo e(number_format($value->course_price,0)); ?></td>
                        <td class="text-center"><?php echo e($data['total_sub'][$key]); ?></td>
                        <td class="text-center">
                            <a href="<?php echo e(url('admin/course/course/edit/'.$value->course_id)); ?>" class="btn btn-sm btn-success" title="Edit"><i class="fa fa-edit"></i></a>
                            <a href="#" onclick="confirm_delete('<?php echo e(url('admin/course/delete/Main/')); ?>','<?php echo e($value->course_id); ?>');" class="btn btn-sm btn-danger" title="Delete"><i class="fa fa-trash-o"></i></a>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                    <tr>
                        <td colspan="10" class="text-danger">
                            <div class="text-center"><?php echo e(trans('other.data_not_found')); ?></div>
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
<?php endif; ?>


<?php if($data['page']=='Category'): ?>
    <div class="row">
        <div class="col-lg-12">
            <table class="table table-striped b-t b-light" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th>Category</th>
                        <th>Status</th>
                        <th>Create Date</th>
                        <th>Modify Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(count($data['detail'])>0): ?>
                    <?php $item = $data['detail']->firstItem(); ?>
                    <?php $__currentLoopData = $data['detail']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td class="text-center"><?php echo e($item++); ?></td>
                        <td><?php echo e($value->category_name); ?></a></td>
                        <td>
                            <?php if($value->category_status==1): ?>
                            <span class="label label-success">Activate</span>
                            <?php else: ?>
                            <span class="label label-warning">Draft</span>
                            <?php endif; ?>
                        </td>
                        <td><?php echo e(date("d-m-Y",strtotime($value->created_at))); ?></td>
                        <td><?php echo e(date("d-m-Y",strtotime($value->updated_at))); ?></td>
                        <td>
                            <a href="<?php echo e(url('admin/course/category/edit/'.$value->category_id)); ?>" class="btn btn-success" title="Edit"><i class="fa fa-edit"></i></a>
                            <a href="#" class="btn btn-danger" onclick="confirm_delete('<?php echo e(url('admin/course/delete/Category/')); ?>','<?php echo e($value->category_id); ?>');" title="Delete"><i class="fa fa-trash-o"></i></a>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                    <tr>
                        <td colspan="6" class="text-danger">
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
<?php endif; ?>

<?php if($data['page']=='Skill'): ?>
    <div class="row">
        <div class="col-lg-12">
            <table class="table table-striped b-t b-light" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th>Skill Name</th>
                        <th>Status</th>
                        <th>Create Date</th>
                        <th>Modify Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(count($data['detail'])>0): ?>
                    <?php $item = $data['detail']->firstItem(); ?>
                    <?php $__currentLoopData = $data['detail']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td class="text-center"><?php echo e($item++); ?></td>
                        <td><?php echo e($value->skill_name); ?></a></td>
                        <td>
                            <?php if($value->status==1): ?>
                            <span class="label label-success">Activate</span>
                            <?php else: ?>
                            <span class="label label-warning">Draft</span>
                            <?php endif; ?>
                        </td>
                        <td><?php echo e(date("d-m-Y",strtotime($value->created_at))); ?></td>
                        <td><?php echo e(date("d-m-Y",strtotime($value->updated_at))); ?></td>
                        <td>
                            <a href="<?php echo e(url('admin/course/skill/edit/'.$value->id)); ?>" class="btn btn-success" title="Edit"><i class="fa fa-edit"></i></a>
                            <a href="#" class="btn btn-danger" onclick="confirm_delete('<?php echo e(url('admin/course/skill/delete/')); ?>','<?php echo e($value->id); ?>');" title="Delete"><i class="fa fa-trash-o"></i></a>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                    <tr>
                        <td colspan="6" class="text-danger">
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
<?php endif; ?>
<?php /**PATH /home/admin/domains/intervision.in/public_html/ezlearn/resources/views/page/admin/include/course/view.blade.php ENDPATH**/ ?>