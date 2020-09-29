<?php $__env->startSection('detail'); ?>

<?php
Use App\Course;
?>

<section id="mu-course-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-left">
                <a href="<?php echo e(url('/')); ?>">Home</a> > <a href="<?php echo e(url('cart')); ?>" class="text text-primary">Cart</a>
                <hr>
            </div>
            <div class="col-md-12">
                <div class="mu-course-content-area">
                    <div class="row">

                        <!-- start  -->
                        <div class="col-md-9">

                            <?php echo $__env->make('layouts.member.flash-message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

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

                            <form action="<?php echo e(url('cart/update')); ?>" method="post">

                                <?php echo csrf_field(); ?>

                                <h2><b>Cart</b></h2>

                                <br>

                                <table class="table">

                                    <thead>
                                        <tr class="bg-success" style="background-color: #ebebeb; border-radius: 5px;">
                                            <td width="1%"></td>
                                            <td width="50%">PRODUCT</td>
                                            <td align="center">PRICE</td>
                                            <td align="center">QUANTITY</td>
                                            <td align="center">TOTAL</td>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php if(!Cart::isEmpty()): ?>

                                        <?php $i = 1;?>

                                        <?php $__currentLoopData = Cart::getContent(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                        <?php $detail = Course::find($item->id);?>

                                        <?php if(file_exists(public_path().'/upload/member/course/images/'.$detail->course_image)
                                        && $detail->course_image != null): ?>
                                        <?Php $img = asset('upload/member/course/images/'.$detail->course_image);?>
                                        <?php else: ?>
                                        <?Php $img = asset('assets/member/images/no-image.png');?>
                                        <?php endif; ?>

                                        <input type="hidden" name="course_id[<?php echo $item->id;?>]"
                                            value="<?php echo e($item->id); ?>">

                                        <tr>
                                            <td class="text-center" style="padding-top:18px;">
                                                <a href="<?php echo e(url('cart/delete/'.$item->id)); ?>">
                                                    <i class="fa fa-close" style="color:#777"></i>
                                                </a>
                                            </td>
                                            <td align="left">
                                                <div class="col-md-3">
                                                    <img src="<?php echo e($img); ?>" class="img-responsive">
                                                </div>
                                                <div class="col-md-9">
                                                    <p><b><?php echo e(Str::words($item->name,20)); ?></b>
                                                        <br>
                                                        <?php
                                                            if(strlen($detail->course_short_description)>100)
                                                            {
                                                                $dots = '...';
                                                            }else{
                                                                $dots = '';
                                                            }
                                                        ?>
                                                        <small style="color:#aaaaaa;"><?php echo e(iconv_substr($detail->course_short_description,0,100,'UTF-8').$dots); ?></small>
                                                    </p>
                                                </div>
                                            </td>
                                            <td align="center" style="color:#aaaaaa;">฿
                                                <?php echo e(number_format($item->price,2)); ?></td>
                                            <td class="text-info" align="center">
                                                <?php echo e($item->quantity); ?>

                                                <input type="hidden" autocomplete="off" minlength="1" readonly
                                                    name="qty[<?php echo $item->id;?>]" value="<?php echo e($item->quantity); ?>">
                                            </td>
                                            <td class="text-info" align="center">฿
                                                <?php echo e(number_format($item->price*$item->quantity,2)); ?></td>
                                        </tr>
                                        <?php $i++;?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php else: ?>
                                        <tr>
                                            <td colspan="5">
                                                <?php echo $__env->make('page.member.data_not_found', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                            </td>
                                        </tr>
                                        <?php endif; ?>
                                    </tbody>

                                </table>

                                <hr>

                                <div class="col-md-7">
                                    <div class="input-group">
                                        <input type="text" name="coupon" class="form-control" placeholder="Coupon Code">
                                        <span class="input-group-addon btn btn-info"
                                            style="background-color: #5bc0de; color:#fff;">APPLY COUPON</span>
                                    </div>
                                </div>

                                <div class="col-md-5" align="right">
                                    <!--                 <button type="submit" id="btn_check_coupon" class="btn btn-success" style="background-color: #BBBBBB; border-color: #BBBBBB;"><i class="fa fa-refresh"></i> UPDATE CART</button> -->
                                    <a href="<?php echo e(url('cart/clear')); ?>" class="btn btn-warning"
                                        style="background-color: #BBBBBB; border-color: #BBBBBB;"><i
                                            class="fa fa-trash"></i> CLEAR CART</a>
                                </div>

                            </form>

                        </div>
                        <!-- end  -->

                        <div class="col-md-3">

                            <br><br><br>

                            <div style="background-color: #ebebeb; border-radius: 6px; padding:10px; height: 280px;">

                                <h4 style="padding-left: 12px;"><b>Order Summary</b></h4>
                                <br>
                                <div class="col-md-6" align="left">
                                    <p>Subtotal:</p>
                                </div>
                                <div class="col-md-6" align="right">
                                    <p>฿ <?php echo e(number_format(\Cart::getSubTotal(),0)); ?></p>
                                </div>
                                <div class="col-md-6" align="left">
                                    <p>
                                        <h4><b>Total:</b></h4>
                                    </p>
                                </div>
                                <div class="col-md-6" align="right">
                                    <p>
                                        <h4><b>฿ <?php echo e(number_format(\Cart::getSubTotal(),0)); ?></b></h4>
                                    </p>
                                </div>
                                <div class="col-md-12 alert" align="left">
                                    <a href="<?php echo e(url('checkout')); ?>" class="btn btn-danger btn-lg"
                                        style="padding:5px 10px; background-color:#FF0000; width: 210px;"><small>CHECKOUT</small></a>
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>
    </div>
    </div>
    <br>
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.member.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/cmcbiote/public_html/resources/views/page/member/cart.blade.php ENDPATH**/ ?>