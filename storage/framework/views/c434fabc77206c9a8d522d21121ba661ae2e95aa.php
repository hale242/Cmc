<div class="row">

    <div class="col-lg-12">

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

    </div>

    <div class="col-lg-12">
        <table class="table table-striped b-t b-light" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Order number</th>
                    <th>Name</th>
                    <th>Status</th>
                    <th>Order Date</th>
                    <!--<th>Course name</th>
                        <th>Teacher name</th> -->
                    <th class="text-right">Total</th>
                    <th class="text-right">Action</th>
                </tr>
            </thead>
            <tbody>

                <?php if(count($data['detail'])>0): ?>
                    <?php $item = $data['detail']->firstItem(); ?>
                <?php $__currentLoopData = $data['detail']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php $__currentLoopData = $data['teacher']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($value->course_teacher_id == $value2->user_id): ?>
                            <?php $teacher = $value2->first_name.' '.$value2->last_name;?>
                        <?php else: ?>
                            <?php $teacher = '-';?>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <tr>
                        <td><?php echo e($item++); ?></td>
                        <td><?php echo e($value->order_number); ?></a></td>
                        <td><?php echo e($value->first_name.' '.$value->last_name); ?></td>
                        <td>
                            <?php if($value->order_status==1): ?>
                            <span class="label label-info">Payment</span>
                            <?php elseif($value->order_status==2): ?>
                            <span class="label label-warning">Wait</span>
                            <?php else: ?>
                            <span class="label label-success">Success</span>
                            <?php endif; ?>
                        </td>
                        <td><?php if($value->created_at!=null): ?><?php echo e($value->created_at); ?><?php else: ?> <?php echo e('-'); ?><?php endif; ?></td>
                        <td class="text-black text-right"><b><?php if($value->order_total==0): ?> <span class="text-danger">Free</span> <?php else: ?> ฿ <?php echo e(number_format($value->order_total,2)); ?> <?php endif; ?></b></td>
                        <td class="text-right">
                            <?php if($value->order_slip_file!='-'): ?>
                                <button data-target="#slip_<?php echo e($value->order_number); ?>"class="btn btn-sm btn-success" data-toggle="modal">
                                    <i class="fa fa-money"></i>
                                </button>

                                <div class="modal fade" id="slip_<?php echo e($value->order_number); ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-body row">
                                                <div class="col-md-12 text-left">
                                                    <p><b>Order number :</b> <?php echo e($value->order_number); ?></p>
                                                    <p><b>Order Price :</b> <?php echo e(number_format($value->order_total,2)); ?> ฿</p>
                                                    <p><b>Payment Date :</b> <?php echo e($value->order_payment_date); ?></p>
                                                    <p><b>Payment Time :</b> <?php echo e($value->order_payment_time); ?></p>
                                                    <p><b>Bank Transfer :</b> <?php echo e($value->order_bank_transfer); ?></p>
                                                    <?php if($value->order_status==3): ?>
                                                        <p><b>Order Note :</b> <?php echo e(($value->order_note=='') ? "-" : $value->order_note); ?></p>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="col-md-12">
                                                    <img src="<?php echo e(url('upload/payment/'.$value->order_slip_file)); ?>" alt="" class="img-responsive" style="margin: auto;">
                                                </div>
                                                <?php if($value->order_status!=3): ?>
                                                    <div class="col-md-6 m-t">
                                                        <input type="text" id="ordernote_<?php echo e($value->order_id); ?>" name="ordernote" placeholder="Order Note" class="form-control input-sm">
                                                    </div>
                                                <?php endif; ?>
                                                <div class="<?php if($value->order_status!=3){ echo "col-md-6"; }else{ echo "col-md-12"; } ?> m-t">
                                                    <p class="text-right">
                                                        <?php if($value->order_status!=3): ?>
                                                            <button class="btn btn-sm btn-success payment_id" data-id="<?php echo e($value->order_id); ?>">Payment</button>
                                                        <?php endif; ?>
                                                        <button class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>
                                                    </p>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <a target="_self" href="<?php echo e(url('admin/orders/view/'.$value->order_id)); ?>" class="btn btn-sm btn-warning" title="View"><i class="fa fa-pencil"></i></a>
                            <a href="#" class="btn btn-sm btn-danger" onclick="confirm_delete('<?php echo e(url('admin/orders/delete/')); ?>','<?php echo e($value->order_id); ?>');" title="Delete"><i class="fa fa-trash-o"></i></a>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                <tr>
                    <td colspan="9" class="text-danger">
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
                        <?php echo e('Showing '.$data['detail']->firstItem().' - '.$data['detail']->lastItem()); ?> / Total : <?php echo e($data['detail']->total()); ?> items
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
<?php /**PATH /home/admin/domains/intervision.in/public_html/ezlearn/resources/views/page/admin/include/orders/view.blade.php ENDPATH**/ ?>