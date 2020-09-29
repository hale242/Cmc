<!-- header -->
<!--START SCROLL TOP BUTTON -->
<a class="scrollToTop" href="#">
    <i class="fa fa-angle-up"></i>
</a>
<!-- END SCROLL TOP BUTTON -->

<!-- Start header Desktop -->
<header id="mu-header" class="hidden-xs">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="mu-header-area">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <div class="mu-header-top-left" style="padding-top: 10px;">
                                <div class="mu-top-email">
                                    <a href="mailto:<?php echo e(SettingWeb::SettingWeb()->email_web); ?>">
                                        <i class="fa fa-envelope"></i>
                                        <?php echo e(SettingWeb::SettingWeb()->email_web); ?>

                                    </a>
                                </div>
                                <div class="mu-top-phone">
                                    <img src="<?php echo e(url('mockup/phone.png')); ?>" alt="">
                                    <a href="tel:<?php echo e(SettingWeb::SettingWeb()->phone_web); ?>"
                                        style="color:#0072bc;margin-left: 10px;">
                                        <?php echo e(SettingWeb::SettingWeb()->phone_web); ?>

                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <div class="mu-header-top-right">
                                <?php if(session('session_id')==null): ?>
                                <a href="<?php echo e(url('register')); ?>" class="btn btn-register">
                                    Register
                                </a>
                                <a href="<?php echo e(url('login')); ?>" class="btn btn-login btn-primary">
                                    <img src="<?php echo e(asset('mockup/ico-login.png')); ?>" alt=""> Login
                                </a>
                                <?php else: ?>
                                <a href="<?php echo e(url('dashboard')); ?>" class="btn btn-dashlogin">
                                    Dashboard
                                </a>
                                <a href="<?php echo e(url('logout')); ?>" class="btn btn-danger btn-logout">
                                    Logout <img src="<?php echo e(asset('mockup/ico-logout.png')); ?>" alt="">
                                </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Start header Desktop -->


<header class="hidden-sm hidden-md hidden-lg text-right">
    <div class="col-xs-12" style="padding:20px; background:#0072bc;color:#FFF;">
        <?php if(session('session_id')==null): ?>
            <a href="<?php echo e(url('register')); ?>" style="color:#FFF;margin-right:15px;">Register</a>
            <a href="<?php echo e(url('login')); ?>" style="color:#FFF"><img src="<?php echo e(asset('mockup/ico-login.png')); ?>" alt="" style="margin-top: -4px;"> Login</a>
        <?php else: ?>
            <a href="<?php echo e(url('dashboard')); ?>" style="color:#FFF;margin-right:15px;">Dashboard</a>
            <a href="<?php echo e(url('logout')); ?>" style="color:#FFF;">Logout <img src="<?php echo e(asset('mockup/ico-logout.png')); ?>" alt="" style="margin-top: -4px;"></a>
        <?php endif; ?>
    </div>
</header>



<!-- Start menu -->
<section id="mu-menu">
    <nav class="navbar navbar-default" role="navigation" style="z-index:1;">
        <div class="container" style="background-color:#FFFFFF;">
            <div class="navbar-header">
                <!-- FOR MOBILE VIEW COLLAPSED BUTTON -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- LOGO -->
                <?php
                    if(file_exists(public_path().'/upload/admin/logo_web/images/'.SettingWeb::LogoWeb()) && SettingWeb::LogoWeb() != null)
                    {
                        $image = asset('upload/admin/logo_web/images/'.SettingWeb::LogoWeb());
                    }
                    else{
                        $image = asset('assets/member/images/no-image.png');
                    }

                    // $image = asset('upload/admin/logo_web/images/logo_web.png');
                ?>
                <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
                    <img src="<?php echo e($image); ?>" alt="logo" class="img-responsive">
                </a>
            </div>

            <div id="navbar" class="navbar-collapse collapse">
                <ul id="top-menu" class="nav navbar-nav navbar-right main-nav">
                    <li class="<?php if(Request::segment('1')==null): ?> active <?php endif; ?>">
                        <a href="<?php echo e(url('/')); ?>"><b>HOME</b></a>
                    </li>
                    <li class="<?php if(Request::segment('1')=='about'): ?> active <?php endif; ?>">
                        <a href="<?php echo e(url('about')); ?>"><b>ABOUT US</b></a>
                    </li>
                    <li class="<?php if(Request::segment('1')=='product'): ?> active <?php endif; ?>">
                        <a href="<?php echo e(url('product')); ?>"><b>OUR PRODUCTS</b></a>
                    </li>
                    <li class="<?php if(Request::segment('1')=='course'): ?> active <?php endif; ?>">
                        <a href="<?php echo e(url('course')); ?>"><b>TRAINING COURSE</b></a>
                    </li>
                    <li class="<?php if(Request::segment('1')=='news'): ?> active <?php endif; ?>">
                        <a href="<?php echo e(url('news')); ?>"><b>NEWS & EVENT</b></a>
                    </li>
                    <li class="<?php if(Request::segment('1')=='contact'): ?> active <?php endif; ?>">
                        <a href="<?php echo e(url('contact')); ?>"><b>CONTACT US</b></a>
                    </li>
                    <!-- <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Course <span class="fa fa-angle-down"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="course.html">Course Archive</a></li>
                <li><a href="course-detail.html">Course Detail</a></li>
              </ul>
            </li>    -->
                    <li>
                        <a href="#" id="mu-search-icon"><i class="fa fa-search"></i></a>
                    </li>
                    <li>
                        <a href="<?php echo e(url('cart')); ?>" class="cart_ico">
                            <img src="<?php echo e(asset('assets/member/images/icon/shopping_bag.png')); ?>" width="15" height="16">
                            <span class="cart-count"><?php echo e(SettingWeb::CartCount()); ?></span>
                        </a>
                    </li>
                </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
    </nav>
</section>
<!-- End menu -->
<!-- Start search box -->
<div id="mu-search">
    <div class="mu-search-area">
        <button class="mu-search-close"><span class="fa fa-close"></span></button>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <form action="<?php echo e(url('search')); ?>" class="mu-search-form" method="post">
                        <?php echo csrf_field(); ?>
                        <input name="txt_search" type="search" required
                            placeholder="Search Name , Price , Description of Course" autocomplete="off">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End search box -->
<?php /**PATH C:\xampp\htdocs\cmc\resources\views/layouts/member/header.blade.php ENDPATH**/ ?>