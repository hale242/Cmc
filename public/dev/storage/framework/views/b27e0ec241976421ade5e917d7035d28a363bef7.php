<?php echo $data['content']->content; ?>

<br>
<?php echo $data['email']; ?>


<hr>
<h2>Order Detail</h2>
<table border="1" width="600" cellspacing="0" cellpadding="0">
    <thead>
        <th align="left" style="padding:10px;">Course name</th>
        <th align="center" style="padding:10px;">Qty</th>
        <th align="right" style="padding:10px;">Price</th>
    </thead>
    <tbody>
        <?php
            $total = 0;
        ?>
        <?php $__currentLoopData = $data['input']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
                if($item['price']!=0){
                    $price = number_format($item['price'],2);
                    $total += $item['price'];
                }else{
                    $price = "<span style='color:#ff0000'>FREE</span>";
                    $total += 0;
                }
            ?>
            <tr>
                <td align="left" style="padding:10px;"><?php echo e($item['name']); ?></td>
                <td align="center" style="padding:10px;"><?php echo e($item['quantity']); ?></td>
                <td align="right" style="padding:10px;"><?php echo $price; ?></td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="2" align="right" style="padding:10px;">Total</td>
            <td align="right" style="padding:10px;"><?php echo e(number_format($total,2)); ?></td>
        </tr>
    </tfoot>
</table>




<?php /**PATH /home/cmcbiote/public_html/resources/views/page/member/mail/order.blade.php ENDPATH**/ ?>