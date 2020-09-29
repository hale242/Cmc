<?php
  if(!empty($order_info) && !empty($gateway)){
    $gateway_publicKey = $gateway['paypublic_k'];
    $order_id = (int)$order_info['order_id'];
    $order_number = $order_info['order_number'];
    $replace_order_number = str_replace('EC-', '', $order_info['order_number']);
    $order_price = $order_info['order_price'];
    $amount = (double)$order_price;
  }
 if($order_id <= 0 ){exit;}
?>
 <form id="checkout-form" name="checkout-form" method="post" action="<?=$BASEURL?>/order/paynowcredit_gbpay/">
    <input type="hidden" name="referenceNo" value="<?=$order_number?>">
    <div id="gb-form" style="height: 500px;"></div>
  </form>
  <script src="<?=$BASEURL?>/assets/js/GBPrimePay.js"></script>
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
  <script src="<?=$BASEURL?>/assets/js/jquery-1.12.4.min.js"></script>
<script type="text/javascript">
  $(function(){
    setTimeout(function(){
        $('<iframe id="gbprimepay-iframe">').find('form#payment-form').append('xxx');
    },50);
});
</script>
