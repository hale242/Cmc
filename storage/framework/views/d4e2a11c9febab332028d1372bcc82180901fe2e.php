<?php
    $datax = str_replace("{#Email#}",$data['input']['email'],$data['content']->content);
?>

<?php echo str_replace("{#Password#}",$data['input']['password'],$datax); ?>

<?php /**PATH /home/cmcbiote/public_html/resources/views/page/member/mail/register.blade.php ENDPATH**/ ?>