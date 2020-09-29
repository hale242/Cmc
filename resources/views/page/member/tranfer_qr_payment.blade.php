@extends('layouts.member.template')
@section('detail')
<div class="loader"></div>
<section id="mu-course-content">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <?php
                        // GF::print_r($req);

                        $order_id = $data['order_number'];
                        if($order_id <= 0 ){exit;}
                    ?>
                        <!-- https://api.gbprimepay.com/gbp/gateway/qrcode/text -->
                        <!--  https://api.gbprimepay.com/gbp/gateway/qrcode -->

                    <?php if($req['resultCode'] != "00"):?>
                    <style type="text/css">
                        #output {
                            background: #f5f5f5;
                            padding: 15px 20px;
                            width: 300px;
                            margin: 0 auto;
                            margin-top: 15px;
                            margin-bottom: 15px;
                        }
                    </style>
                    <div class="col-md-12 text-center">
                        <div class="col-md-8 col-md-offset-2">
                            <em>
                                <h2>Sorry! QR Code Not Generate</h2>
                            </em>
                        </div>
                    </div>
                    <?php endif; ?>

                    <div class="col-md-12 text-center">
                        <div class="col-md-8 col-md-offset-2 m-b-15 text-left">
                            <p>QR Code Payment</p>
                        </div>
                        <div class="text-center">
                            <div id="output"></div>
                        </div>
                        <div class="col-md-8 col-md-offset-2 m-t-15">
                            <h3>จำนวนเงินที่ต้องชำระ <?php echo number_format($req['paramssend']['amount'],2); ?> บาท</h3>
                        </div>

                    </div>
                    <script src="{{asset('/assets/member/js/jquery.qrcode.min.js')}}"></script>
                    <script type="text/javascript">
                        var orderID = "<?=$order_id?>";
                        $(function(){
                            $('#output').qrcode("<?=$req['qrcode']?>");
                            setInterval(function(){
                                $.ajax({
                                    type: "POST",
                                    url: "{{url('/checkout/get_payment_status/')}}",
                                    data:{order_id:orderID},
                                    success: function(resp) {
                                        var res = $.parseJSON(resp);
                                        console.log(res.status);
                                        if(res.status == "done"){
                                            window.location.href = "{{url('/myorder')}}";
                                        }
                                    }
                                });
                            }, 5000);

                        });
                    </script>
                </div>
            </div>
        </div>
    </div>
</section>
@stop
