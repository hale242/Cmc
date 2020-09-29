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
                                    <a href="mailto:{{SettingWeb::SettingWeb()->email_web}}">
                                        <i class="fa fa-envelope"></i>
                                        {{SettingWeb::SettingWeb()->email_web}}
                                    </a>
                                </div>
                                <div class="mu-top-phone">
                                    <img src="{{url('mockup/phone.png')}}" alt="">
                                    <a href="tel:{{SettingWeb::SettingWeb()->phone_web}}"
                                        style="color:#0072bc;margin-left: 10px;">
                                        {{SettingWeb::SettingWeb()->phone_web}}
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <div class="mu-header-top-right">
                                @if(session('session_id')==null)
                                <a href="{{url('register')}}" class="btn btn-register">
                                    Register
                                </a>
                                <a href="{{url('login')}}" class="btn btn-login btn-primary">
                                    <img src="{{ asset('mockup/ico-login.png') }}" alt=""> Login
                                </a>
                                @else
                                <a href="{{url('dashboard')}}" class="btn btn-dashlogin">
                                    Dashboard
                                </a>
                                <a href="{{url('logout')}}" class="btn btn-danger btn-logout">
                                    Logout <img src="{{ asset('mockup/ico-logout.png') }}" alt="">
                                </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Start header Desktop -->

{{-- Start header Mobile --}}
<header class="hidden-sm hidden-md hidden-lg text-right">
    <div class="col-xs-12" style="padding:20px; background:#0072bc;color:#FFF;">
        @if(session('session_id')==null)
            <a href="{{url('register')}}" style="color:#FFF;margin-right:15px;">Register</a>
            <a href="{{url('login')}}" style="color:#FFF"><img src="{{ asset('mockup/ico-login.png') }}" alt="" style="margin-top: -4px;"> Login</a>
        @else
            <a href="{{url('dashboard')}}" style="color:#FFF;margin-right:15px;">Dashboard</a>
            <a href="{{url('logout')}}" style="color:#FFF;">Logout <img src="{{ asset('mockup/ico-logout.png') }}" alt="" style="margin-top: -4px;"></a>
        @endif
    </div>
</header>
{{-- Start header Mobile --}}


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
                <a class="navbar-brand" href="{{url('/')}}">
                    <img src="{{$image}}" alt="logo" class="img-responsive">
                </a>
            </div>

            <div id="navbar" class="navbar-collapse collapse">
                <ul id="top-menu" class="nav navbar-nav navbar-right main-nav">
                    <li class="@if(Request::segment('1')==null) active @endif">
                        <a href="{{url('/')}}"><b>HOME</b></a>
                    </li>
                    <li class="@if(Request::segment('1')=='about') active @endif">
                        <a href="{{url('about')}}"><b>ABOUT US</b></a>
                    </li>
                    <li class="@if(Request::segment('1')=='product') active @endif">
                        <a href="{{url('product')}}"><b>OUR PRODUCTS</b></a>
                    </li>
                    <li class="@if(Request::segment('1')=='course') active @endif">
                        <a href="{{url('course')}}"><b>TRAINING COURSE</b></a>
                    </li>
                    <li class="@if(Request::segment('1')=='news') active @endif">
                        <a href="{{url('news')}}"><b>NEWS & EVENT</b></a>
                    </li>
                    <li class="@if(Request::segment('1')=='contact') active @endif">
                        <a href="{{url('contact')}}"><b>CONTACT US</b></a>
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
                        <a href="{{url('cart')}}" class="cart_ico">
                            <img src="{{asset('assets/member/images/icon/shopping_bag.png')}}" width="15" height="16">
                            <span class="cart-count">{{SettingWeb::CartCount()}}</span>
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
                    <form action="{{url('search')}}" class="mu-search-form" method="post">
                        @csrf
                        <input name="txt_search" type="search" required
                            placeholder="Search Name , Price , Description of Course" autocomplete="off">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End search box -->
