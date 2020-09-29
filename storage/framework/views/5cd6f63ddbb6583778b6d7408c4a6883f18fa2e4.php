<div class="row wrapper">

    <form action="<?php echo e(url('admin/orders/Status/action')); ?>" method="post" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>

        <input type="hidden" name="id" value="<?php echo e($data['detail']['order']->order_id); ?>">

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

        <div class="col-sm-1 text-left">
            <div class="col-sm-12">
                <button href="#" class="btn btn-sm btn-warning pull-in" onClick="window.print();"><i class="fa fa-print"></i> Print</button>
            </div>
        </div>

        <div class="col-sm-8">
        </div>

        <div class="col-sm-3 text-right">
            <select name="status" class="input-sm form-control input-s-sm inline v-middle">
                <option value="">===Status===</option>
                
                <option value="2" <?php if($data['detail']['order']->order_status==2): ?><?php echo e('selected'); ?><?php endif; ?>>Wait</option>
                <option value="3" <?php if($data['detail']['order']->order_status==3): ?><?php echo e('selected'); ?><?php endif; ?>>Success</option>
            </select>
            <button type="submit" class="btn btn-sm btn-info">Save</button>
        </div>

    </form>

</div>

<div class="bg-white alert">

    <div class="row">
        <div class="col-xs-6">
            <h4><?php echo e($data['detail']['order']->first_name.' '.$data['detail']['order']->last_name); ?></h4>
            <p><?php echo e($data['detail']['order']->address); ?></p>
            <p>
                Telephone: <?php echo e($data['detail']['order']->phone_number); ?>

            </p>
            <h5>Order status:
                <?php if($data['detail']['order']->order_status==1): ?>
                <b class="text-danger"><?php echo e('Payment'); ?></b>
                <?php elseif($data['detail']['order']->order_status==2): ?>
                <b class="text-warning"><?php echo e('Wait'); ?></b>
                <?php else: ?>
                <b class="text-info"><?php echo e('Success'); ?></b>
                <?php endif; ?>
            </h5>
        </div>
        <div class="col-xs-6 text-right">
            <p class="h4">#<?php echo e($data['detail']['order']->order_number); ?></p>
            <h5><?php echo e(date("d-M-Y",strtotime($data['detail']['order']->order_date))); ?></h5>
        </div>
    </div>
    <div class="line"></div>
    <table class="table">
        <thead>
            <tr>
                <th style="width:10%">#</th>
                <th style="width:60%">DESCRIPTION</th>
                <th style="width:10%" class="text-center">QTY</th>
                <th style="width:10%" class="text-right">UNIT PRICE</th>
                <th style="width:10%" class="text-right">TOTAL</th>
            </tr>
        </thead>
        <tbody>
            <?php if(count($data['detail']['order_detail'])>0): ?>

                <?php
                  $total_price = 0;
                  $i = 1;
                ?>

                <?php $__currentLoopData = $data['detail']['order_detail']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $total_price += $value->course_price;
                        if(strlen($value->course_short_description)>150){
                            $dots = "...";
                        }else{
                            $dots = "";
                        }

                        if($value->course_price=="0"){
                            $courseprice = "Free";
                            $sumtotal = "Free";
                        }else{
                            $courseprice = number_format($value->course_price,2)." ฿";
                            $sumtotal = $courseprice." ฿";
                        }

                    ?>
                    <tr>
                        <td><?php echo e($i++); ?></td>
                        <td>
                            <b><?php echo e($value->course_name); ?></b>
                            <p><?php echo e(substr($value->course_short_description,0,150).$dots); ?></p>
                        </td>
                        <td class="text-center"><?php echo e($value->qty); ?></td>
                        <td class="text-right"><?php echo e($courseprice); ?></td>
                        <td class="text-right"><?php echo e($sumtotal); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <?php else: ?>
                <tr>
                    <td colspan="4"></td>
                </tr>
            <?php endif; ?>
            <tr>
                <td colspan="4" class="text-right"><strong>Total</strong></td>
                <td class="text-right"><b class="text-info"><?php echo e(number_format($total_price,0)); ?> ฿</b></td>
            </tr>
        </tbody>
    </table>

</div>
<?php /**PATH /home/cmcbiote/public_html/resources/views/page/admin/include/orders/show.blade.php ENDPATH**/ ?>