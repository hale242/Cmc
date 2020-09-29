<div class="modal fade" id="payment_credit_card" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="confirm_order_credit" name="confirm_order_transfer" method="post" action="<?php echo e(url('/checkout/gbpay')); ?>">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="user_id" value="<?php echo e(session('session_id')); ?>">
                <input type="hidden" name="cart_data" value="<?php echo e(Cart::getContent()); ?>">
                <input type="hidden" name="amount" id="amount" value="">
                <input type="hidden" name="order_price" id="order_price" value="">
                <input type="hidden" name="payment_type_case" value="gbpay">
                <div class="modal-body text-center">
                    <h3 style="margin-bottom:20px;">Please select a payment method.</h3>
                    <div class="form-group">
                        <label for="p1" class="p1 pointer border-payment">
                            <input type="radio" name="payment_type" id="p1" value="qrgbpay" class="hidden" />
                            <i class="fa fa-qrcode fa-4x"></i><br />QR Code
                        </label>
                        <label for="p2" class="p2 pointer border-payment">
                            <input type="radio" name="payment_type" id="p2" value="creditgbpay" class="hidden" />
                            <i class="fa fa-credit-card fa-4x"></i><br />Credit Card
                        </label>
                    </div>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Confirm</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="payment_transfer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">Transfer to payment</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="confirm_order_transfer" name="confirm_order_transfer" method="post">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="user_id" value="<?php echo e(session('session_id')); ?>">
                    <input type="hidden" name="cart_data" value="<?php echo e(Cart::getContent()); ?>">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Date of payment:</label>
                        <input name="payment_date" id="payment_date" type="date" class="form-control"
                            value="<?php echo e(date('Y-m-d')); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Time of payment:</label>
                        <input name="payment_time" type="time" class="form-control" value="<?php echo e(date('H:i:s')); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Amount:</label>
                        <input name="price" id="price" type="text" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Bank transfer:</label>
                        <select name="bank_transfer" class="form-control" required>
                            <option value="">Select</option>
                            <option value="กสิกร (xxx-xxxx-xxx)">กสิกร (xxx-xxxx-xxx)</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Transfer Slip:</label>
                        <input type="file" name="slip_file" class="form-control" required>
                        <small class="text-danger">Only file (jpg,jpeg,png) max size 1 mb.</small>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Confirm</button>
            </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="payment_transfer_free" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header hide">
                <h3 class="modal-title" id="exampleModalLabel">Transfer to payment</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <form id="confirm_order_transfer_free" name="confirm_order_transfer" method="post">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="user_id" value="<?php echo e(session('session_id')); ?>">
                    <input type="hidden" name="cart_data" value="<?php echo e(Cart::getContent()); ?>">
                    
            <h3 class="mb-3">Please confirm to order again.</h3>
            <button type="submit" class="btn btn-success">Confirm</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancle</button>
        </div>
        <div class="modal-footer hide">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Confirm</button>
        </div>
        </form>
    </div>
</div>
</div>
<div class="modal fade bd-example-modal-lg" id="show_lesson_modal" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <span id="lesson_vdo_url"></span>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="form-group text-left">
                    <label for="">Comment this video</label>
                    <textarea name="" id="" rows="3" class="form-control"></textarea>
                    <button type="button" class="btn btn-sm btn-info" style="margin-top:10px;">Commit</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    //confirm order transfer
$('#confirm_order_transfer').on('submit', function(e){
    e.preventDefault();
    var formData = new FormData($(this)[0]);
    var url_api = "<?php echo e(url('checkout/transfer')); ?>";
    var url_after = "<?php echo e(url('myorder')); ?>";
    $.ajax({
        type : 'post',
        url : url_api,
        data : formData,
        dataType: "json",
        async: false,
        cache: false,
        contentType: false,
        processData: false,
        success:function(data)
        {
            if(data.result==true){
                Swal.fire({
                title: data.message,
                type: 'success',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'OK',
                }).then((result) => {
                    if (result.value) {
                        window.location=url_after;
                    }
                });
            } else {
                swal.fire({
                    type: 'error',
                    title: 'Error',
                    text: data.message,
                    showConfirmButton: false,
                    timer: 3500
                });
            }
        }
    });
});

$('#confirm_order_transfer_free').on('submit', function(e){
    e.preventDefault();
    var formData = new FormData($(this)[0]);
    var url_api = "<?php echo e(url('checkout/transfer')); ?>";
    var url_after = "<?php echo e(url('myorder')); ?>";
    $.ajax({
        type : 'post',
        url : url_api,
        data : formData,
        dataType: "json",
        async: false,
        cache: false,
        contentType: false,
        processData: false,
        success:function(data)
        {
            if(data.result==true){
                Swal.fire({
                title: data.message,
                type: 'success',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'OK',
                }).then((result) => {
                    if (result.value) {
                        window.location=url_after;
                    }
                });
            } else {
                swal.fire({
                    type: 'error',
                    title: 'Error',
                    text: data.message,
                    showConfirmButton: false,
                    timer: 3500
                });
            }
        }
    });
});

// $('#confirm_order_credit').on('submit', function(e){
//     e.preventDefault();
//     var formData = new FormData($(this)[0]);
//     var url_api = "<?php echo e(url('checkout/gbpay')); ?>";
//     var url_after = "<?php echo e(url('myorder')); ?>";
//     $.ajax({
//         type : 'post',
//         url : url_api,
//         data : formData,
//         dataType: "json",
//         async: false,
//         cache: false,
//         contentType: false,
//         processData: false,
//         success:function(data)
//         {
//             if(data.result==true){
//                 Swal.fire({
//                 title: data.message,
//                 type: 'success',
//                 showCancelButton: false,
//                 confirmButtonColor: '#3085d6',
//                 cancelButtonColor: '#d33',
//                 confirmButtonText: 'OK',
//                 }).then((result) => {
//                     if (result.value) {
//                         window.location=url_after;
//                     }
//                 });
//             } else {
//                 swal.fire({
//                     type: 'error',
//                     title: 'Error',
//                     text: data.message,
//                     showConfirmButton: false,
//                     timer: 3500
//                 });
//             }
//         }
//     });
// });
</script>
<?php /**PATH /home/admin/domains/intervision.in/public_html/ezlearn/resources/views/layouts/member/modal.blade.php ENDPATH**/ ?>