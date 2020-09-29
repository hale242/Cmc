<div align="center">
    <img src="<?php echo e(asset('upload/admin/logo_web/images/'.SettingWeb::LogoWeb())); ?>">
    <h2>How can we help?</h2>
</div>
<hr>
<h3>รายละเอียด:</h3>
<h4>
    ชื่อ-นามสกุล: <?php echo e($data['input']['fullname']); ?>

    <br>
    Email: <?php echo e($data['input']['email']); ?>

    
    
    <br>
    โทรศัพท์: <?php echo e($data['input']['phone']); ?>

    <br>
    รายละเอียด: <?php echo e($data['input']['detail']); ?>

</h4>
<hr>
<p style="color:red;">This is an automatically generated e-mail. Please do not reply.</p>
<?php /**PATH /home/cmcbiote/public_html/resources/views/page/member/mail/contact.blade.php ENDPATH**/ ?>