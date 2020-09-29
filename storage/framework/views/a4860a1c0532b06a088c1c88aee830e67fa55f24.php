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
                            <a href="<?php echo e(url('/')); ?>">Home</a> > <a href="<?php echo e(url('/dashboard')); ?>">Dashboard</a> > My Orders
                        </div>
                    </div>

                    <figcaption class="container">
                        <div class="row">

                            <div class="col-md-12">

                                <div class="col-md-12">

                                    <table class="DataTable table table-striped b-t b-light">
                                        <thead>
                                            <tr>
                                                <th class="text-center">#</th>
                                                <th>Order number</th>
                                                <th>Name</th>
                                                <th class="text-center">Status</th>
                                                <th class="text-center">Order Date</th>
                                                <th class="text-right">Total Price</th>
                                                <th class="text-right">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            // dd($data['detail']);
                                            ?>

                                            <?php if(count($data['detail'])>0): ?>
                                            <?php $i = 1;?>
                                            <?php $__currentLoopData = $data['detail']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td class="text-center"><?php echo e($i++); ?></td>
                                                <td><?php echo e($value->order_number); ?></a></td>
                                                <td><?php echo e($value->first_name.' '.$value->last_name); ?></td>
                                                <td class="text-center">
                                                    <?php if($value->order_status==1): ?>
                                                    <span class="label label-info">Payment</span>
                                                    <?php elseif($value->order_status==2): ?>
                                                    <span class="label label-warning">Wait</span>
                                                    <?php elseif($value->order_status==3): ?>
                                                    <span class="label label-success">Success</span>
                                                    <?php endif; ?>
                                                </td>
                                                <td class="text-center"><?php if($value->order_date!=null): ?><?php echo e($value->order_date); ?><?php else: ?><?php echo e('-'); ?><?php endif; ?></td>

                                                <td class="text-right">
                                                    <?php if($value->order_total!=0): ?>
                                                        <?php echo e(number_format($value->order_total,2)); ?>

                                                    <?php else: ?>
                                                        <span class="text-red">FREE</span>
                                                    <?php endif; ?>
                                                </td>

                                                <td class="text-right">
                                                    <?php
                                                        $type_payment = $value->order_payment_type;
                                                        $order_status = $value->order_status;
                                                        $order_total = $value->order_total;
                                                        $order_number = $value->order_number;
                                                    ?>
                                                    <?php if($type_payment == 1 && $order_status == 2): ?>
                                                        <form method="POST" action="<?php echo e(url('checkout/gbpay_again')); ?>" style="float: right;margin-left: 6px;">
                                                            <?php echo csrf_field(); ?>
                                                            <input type="hidden" name="order_number" value="<?php echo e($order_number); ?>" />
                                                            <input type="hidden" name="order_price" value="<?php echo e($order_total); ?>" />
                                                            <input type="hidden" name="amount" value="<?php echo e($order_total); ?>" />
                                                            <button class="btn btn-sm btn-warning" title="Payment"><i class="fa fa-credit-card"></i></button>
                                                        </form>
                                                    <?php endif; ?>
                                                    <a target="_blank" href="<?php echo e(url('myorder/detail/'.$value->order_id)); ?>" class="btn btn-sm btn-success" title="View Detail">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            
                                            <?php endif; ?>
                                        </tbody>
                                    </table>

                                    

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

<?php echo $__env->make('layouts.member.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/cmcbiote/public_html/resources/views/page/member/myorder.blade.php ENDPATH**/ ?>