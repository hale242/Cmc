<!--Start footer -->
  <footer id="mu-footer">
    <!-- start footer top -->
    <div class="mu-footer-top">
      <div class="">
        <div class="mu-footer-top-area">
          <div class="">
            <div class="col-lg-offset-1 col-lg-4 col-md-offset-1 col-md-4 col-sm-4">
              <div class="mu-footer-widget mu-footer-contact">
                <h4>Contact us</h4>
                <ul>
                    <li>Head Quarter (HQ)</li>
                    <li>CMC Biotech Co., Ltd.</li>
                    <li>364 Soi Ladphrao 94 (Panjamitr) Ladphrao Road,</li>
                    <li>Phlabphla, Wang Thong Lnag, Bangkok 10310,</li>
                    <li>Thailand</li>
                    <li><br></li>
                    <li>บริษัท ซี เอ็ม ซี ไบโอเท็ค จำกัด (สำนักงานใหญ่)</li>
                    <li>364 ซอยลาดพร้าว94 (ปัญจมิตร) ถนนลาดพร้าว</li>
                    <li>แขวงพลับพลา เขตวังทองหลาง กรุงเทพมหานคร 10310</li>
                    <li><br></li>
                    <li>Tel. +66 (2) 530-4995-6</li>
                    <li>Fax. +66 (2) 539-6903</li>
                </ul>
              </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-4">
              <div class="mu-footer-widget">
                <h4>QUICK LINKS</h4>
                <ul>
                    <li><a href="<?php echo e(url('/')); ?>">Home</a></li>
                    <li><a href="<?php echo e(url('about')); ?>">About Us</a></li>
                    <li><a href="<?php echo e(url('product')); ?>">Our Products</a></li>
                    <li><a href="<?php echo e(url('course')); ?>">Training Course</a></li>
                    <li><a href="<?php echo e(url('news')); ?>">News & Event</a></li>
                    <li><a href="<?php echo e(url('terms')); ?>">Terms & Condition</a></li>
                    <li><a href="<?php echo e(url('policy')); ?>">Privacy & Policy</a></li>
                    <li><a href="<?php echo e(url('contact')); ?>">Contact Us</a></li>
                </ul>
              </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-4">
              <div class="mu-footer-widget" align="right">
                <h4>CLASS NEWSLETTER</h4>
                <p class="text-new">Subscribe now and receive weekly newsletter<br>
                with educational materials, new courses, interesting posts,<br>
                popular books and much more!</p>
                <form class="form-horizontal" action="<?php echo e(url('subscribe')); ?>" method="post">
                  <?php echo csrf_field(); ?>
                  <div class="mt-4" style="position: relative;">
                    <img class="img_footer" src='<?php echo e(asset('/mockup/icon_letter.png')); ?>' />
                    <input name="email" type="email" class="form-control input-footer" required placeholder="Your email">
                    <button type="submit" class="input-group-addon btn-subscribe">Subscribe!</button>
                  </div>
                </form>


                <div class="alert">

                    

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

              </div>
            </div>


            <!-- <div class="col-lg-3 col-md-3 col-sm-3">
              <div class="mu-footer-widget">
                <h4>Contact</h4>
                <address>
                  <p>Address</p>
                  <p>Phone: xxx </p>
                  <p>Website: xxx</p>
                  <p>Email: xxx</p>
                </address>
              </div>
            </div> -->
          </div>
        </div>
      </div>
    </div>
    <!-- end footer top -->
    <!-- start footer bottom -->
    <div class="mu-footer-bottom">
      <div class="container">
        <div class="mu-footer-bottom-area">
          <p>&copy; 2020 All Right Reserved. <a href="http://ezlearn.marcomexp.com/" rel="nofollow" target="_blank"><?php echo e(SettingWeb::SettingWeb()->footer_web); ?> <img src='<?php echo e(asset('/upload/member/shortcut_icon/favicon_big.png')); ?>' /></a></p>
        </div>
      </div>
    </div>
    <!-- end footer bottom -->
  </footer>
  <!-- End footer
<?php /**PATH /home/cmcbiote/public_html/resources/views/layouts/member/footer.blade.php ENDPATH**/ ?>