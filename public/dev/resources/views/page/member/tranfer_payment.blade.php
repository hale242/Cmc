@extends('layouts.member.template')

@section('detail')

<div class="loader"></div>

<section id="mu-course-content">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="row">


                    <?php
                        if(!empty($data['order_number'])){
                            $gateway_publicKey = $data['paypublic_k'];
                            $order_number = $data['order_number'];
                            $order_price = $data['order_price'];
                            $amount = $data['amount'];
                        }
                    ?>
                        <form id="checkout-form" name="checkout-form" method="post" action="{{url('/checkout/paynowcredit_gbpay')}}">
                            @csrf
                            <input type="hidden" name="referenceNo" value="<?=$order_number?>">
                            <div id="gb-form" style="height: 400px;"></div>
                        </form>
                        <script src="{{asset('/assets/member/js/GBPrimePay.js')}}"></script>
                        <script>
                            var _publicKey = "<?=$gateway_publicKey?>";
                            var _amount = "<?=$amount?>";
                            new GBPrimePay({
                            publicKey: _publicKey,
                            gbForm: '#gb-form',
                            merchantForm: '#checkout-form',
                            amount: _amount,
                            customStyle: {
                                backgroundColor: '#ffffff'
                            },
                            env: 'prd' // default prd | optional: test, prd
                            });
                        </script>
                        {{-- <script src="{{asset('/assets/member/js/jquery.min.js')}}"></script> --}}
                        <script type="text/javascript">
                            $(function(){
                            setTimeout(function(){
                                $('<iframe id="gbprimepay-iframe">').find('form#payment-form').append('xxx');
                            },50);
                        });
                    </script>

                </div>
            </div>
        </div>
    </div>
</section>

@stop
