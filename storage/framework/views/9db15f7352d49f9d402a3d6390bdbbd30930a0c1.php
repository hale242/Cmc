<div align="center">
    <img src="<?php echo e(asset('upload/admin/logo_web/images/'.SettingWeb::LogoWeb())); ?>">
    <h2>Forgot Password - แจ้งลืมรหัสผ่าน</h2>
</div>
<hr>
<h4>เรียนคุณ <?php echo e($data['input']['username']); ?></h4>
<h4>ท่านได้ทำการร้องขอรหัสผ่านใหม่เข้ามา กรุณาทำการคลิกที่ Link ด้านล่าง เพื่อทำการเปลี่ยนรหัสผ่านใหม่ของท่าน</h4>
<h4><a href="<?php echo e($data['forgotpassword_link']); ?>"><?php echo e($data['forgotpassword_link']); ?></a></h4>
<hr>
<p style="color:red;">This is an automatically generated e-mail. Please do not reply.</p>
<?php /**PATH /home/cmcbiote/public_html/resources/views/page/member/mail/forgotpassword.blade.php ENDPATH**/ ?>