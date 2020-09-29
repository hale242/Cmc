<?php
    if($data['page']=='All'){
        $page = 'all';
    }else if($data['page']=='Admin'){
        $page = 'admin';
    }else if($data['page']=='User'){
        $page = 'user';
    }else if($data['page']=='Teacher'){
        $page = 'teacher';
    }
?>


                        <div class="row">
                            <div class="col-lg-12">
                            <table class="table table-striped b-t b-light"  cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Status</th>
                                        <th>Create Date</th>
                                        <th>Modify Date</th>
                                        <th>Type</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php if(count($data['detail'])>0): ?>
                                <?php $i = 1;?>
                                <?php $__currentLoopData = $data['detail']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($i++); ?></td>
                                    <td><?php echo e($value->first_name); ?></a></td>
                                    <td><?php echo e($value->last_name); ?></td>
                                    <td>
                                    <?php if($value->user_status==1): ?>
                                    <span class="label label-success">Activate</span>
                                    <?php else: ?>
                                    <span class="label label-warning">Draft</span>
                                    <?php endif; ?>
                                    </td>
                                    <td><?php echo e(date("d-m-Y",strtotime($value->created_at))); ?></td>
                                    <td><?php echo e(date("d-m-Y",strtotime($value->updated_at))); ?></td>
                                    <td><?php if($value->user_type==1): ?><?php echo e('Admin'); ?><?php elseif($value->user_type==2): ?><?php echo e('User'); ?><?php elseif($value->user_type==3): ?><?php echo e('Teacher'); ?> <?php endif; ?></td>
                                    <td>
                                    <a href="<?php echo e(url('admin/users/'.$page.'/edit/'.$value->user_id)); ?>" class="btn btn-success" title="Edit"><i class="fa fa-edit"></i></a>
                                    <a href="#" class="btn btn-danger" onclick="confirm_delete('<?php echo e(url('admin/users/delete/'.$data['page'])); ?>','<?php echo e($value->user_id); ?>');" title="Delete"><i class="fa fa-trash-o"></i></a>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                <tr>
                                <td colspan="10" class="text-danger"><div align="center"><?php echo e(trans('other.data_not_found')); ?></div></td>
                                </tr>
                                <?php endif; ?>
                            </tbody>
                            </table>

                             <footer class="panel-footer">
                          <div class="row">
                            <div class="col-sm-2 text-left">
                              <small class="text-muted inline m-t-sm m-b-sm"><?php if(count($data['detail'])>25): ?><?php echo e('Showing 1-10 of'.count($data['detail']).'items'); ?><?php else: ?><?php echo e('Showing '.count($data['detail']).' items'); ?><?php endif; ?></small>
                            </div>
                            <div class="col-sm-12 text-center">
                              <?php echo e($data['detail']->links()); ?>

                            </div>
                          </div>
                        </footer>
                        </div>
                        </div>

<?php /**PATH /home/cmcbiote/public_html/resources/views/page/admin/include/users/view.blade.php ENDPATH**/ ?>