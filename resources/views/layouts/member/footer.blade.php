<!--Start footer -->
  <footer id="mu-footer">
    <!-- start footer top -->
    <div class="mu-footer-top">
      <div class="">

        {{-- Desktop --}}
        <div class="mu-footer-top-area hidden-xs">
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
                    <li><a href="{{url('/')}}">Home</a></li>
                    <li><a href="{{url('about')}}">About Us</a></li>
                    <li><a href="{{url('product')}}">Our Products</a></li>
                    <li><a href="{{url('course')}}">Training Course</a></li>
                    <li><a href="{{url('news')}}">News & Event</a></li>
                    <li><a href="{{url('terms')}}">Terms & Condition</a></li>
                    <li><a href="{{url('policy')}}">Privacy & Policy</a></li>
                    <li><a href="{{url('contact')}}">Contact Us</a></li>
                </ul>
              </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-4">
              <div class="mu-footer-widget" align="right">
                <h4>CLASS NEWSLETTER</h4>
                <p class="text-new">Subscribe now and receive weekly newsletter<br>
                with educational materials, new courses, interesting posts,<br>
                popular books and much more!</p>
                <form id="subscribe_frm" class="form-horizontal" action="#" method="post">
                  @csrf
                  <div class="mt-4" style="position: relative;">
                    <img class="img_footer" src='{{asset('/mockup/icon_letter.png')}}' />
                    <input name="email" id="email_sub" type="email" class="form-control input-footer" required placeholder="Your email">
                    <button type="submit" class="input-group-addon btn-subscribe">Subscribe!</button>
                  </div>
                </form>

                <div class="alert_sub mt-2"></div>

              </div>
            </div>

          </div>
        </div>

        {{-- Mobile --}}
        <div class="mu-footer-top-area hidden-sm hidden-md hidden-lg">
            <div class="col-xs-12 mu-footer-widget mu-footer-contact">
                <h3 class="text-center text-white"><b>NEWSLETTER</b></h3>
                <p style="color: #ebebeb;">Get lastest update, news & academic offers</p>
            </div>
            <div class="col-xs-12 text-center">
                <form id="subscribe_frm_mobile" class="form-horizontal" action="#" method="post">
                    @csrf
                    <div class="form-subscribe-mobile">
                        <img class="img-subscribe-mobile" src='{{asset('/mockup/icon_letter.png')}}' />
                        <input class="input-sucscribe-mobile" type="email" name="email" id="email_sub_mobile" placeholder="your e-mail" required>
                        <button class="button-submit-mobile" type="submit">SUBSCRIBE</button>
                    </div>
                </form>
                <div class="alert_sub_mobile mt-2 col-xs-12"></div>
            </div>
            @if(isset($data['category']))
            <div class="col-xs-12">
                <h4 class="text-left text-white"><b>BROWSE TRAINING COURSE</b></h4>
                <ul class="category_mobile">
                    @foreach ($data['category'] as $item)
                    <li><a href="{{url('course/'.$item['category_id'])}}">{{$item['category_name']}}</a></li>
                    @endforeach
                </ul>
            </div>
            @endif
            <div class="col-xs-12" style="margin-top:30px;">
                <h4 class="text-left text-white"><b>QUICK LINKS</b></b></h4>
                <ul class="category_mobile">
                    <li><a href="{{url('')}}">HOME</a></li>
                    <li><a href="{{url('about')}}">ABOUT US</a></li>
                    <li><a href="{{url('product')}}">OUR PRODUCTS</a></li>
                    <li><a href="{{url('course')}}">TRAINING COURSE</a></li>
                    <li><a href="{{url('news')}}">NEWS & EVENT</a></li>
                    <li><a href="{{url('contact')}}">CONTACT US</a></li>
                </ul>
            </div>

        </div>

      </div>
    </div>
    <!-- end footer top -->
    <!-- start footer bottom -->
    <div class="mu-footer-bottom">
      <div class="container">
        <div class="mu-footer-bottom-area">
          <p>&copy; 2020 All Right Reserved. <a href="http://ezlearn.marcomexp.com/" rel="nofollow" target="_blank">{{SettingWeb::SettingWeb()->footer_web}} <img src='{{asset('/upload/member/shortcut_icon/favicon_big.png')}}' /></a></p>
        </div>
      </div>
    </div>
    <!-- end footer bottom -->
  </footer>
  <!-- End footer -->

  <style>
      .category_mobile{
        color:#a1a2a6;
      }
      .category_mobile li{
        line-height: 2;
        font-size: 18px;
      }
      .category_mobile li a{
        color: #8a8a8a;
      }

      .form-subscribe-mobile {
        position: relative;
      }
      .button-submit-mobile {
        position: absolute;
        right: 2px;
        height: 41px;
        top: 2px;
        background: #0072bb;
        color: #FFF;
        width: 120px;
        border: none;
      }
      .input-sucscribe-mobile {
        height: 45px;
        border: none;
        width: 100%;
        padding-left: 40px;
      }
      .img-subscribe-mobile {
        position: absolute;
        top: 12px;
        left: 10px;
      }
  </style>

