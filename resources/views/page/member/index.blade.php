@extends('layouts.member.template')

@section('detail')

@include('layouts.member.slide')

    <!-- Start service  -->
    <section id="mu-service" >
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="mu-service-area">
                        <!-- Start single service -->

                        <div class="mu-service-single">
                            <img src="{{url('upload/admin/banner/images/logo_news.png')}}" alt="" class="img-responsive hidden-xs">
                            <img src="{{url('mockup/course_mo.jpg')}}" alt="" class="img-responsive hidden-sm hidden-md hidden-lg">
                        </div>

                        @if(isset($data['course']['course_new']))
                        @foreach($data['course']['course_new'] as $value)
                        <div class="mu-service-single">
                            <h5 class="text-left" style="position:absolute;line-height: 1.2;">
                                <b>
                                    {{iconv_substr($value->course_name,0,40,'UTF-8')}}
                                    @php
                                    if(strlen($value->course_name)>40){
                                        echo "...";
                                    }
                                    @endphp
                                </b>
                            </h5>
                            <div style="margin-top: 40px;">
                                <div class="col-lg-3 text-left">
                                    <h4>
                                        <span>{{date("d",strtotime($value->date_create))}}</span>
                                        <span class="text-month">{{date("M",strtotime($value->date_create))}}</span>
                                    </h4>
                                </div>
                                <div class="col-lg-9 small text-left text-course">
                                    <p>
                                        {{iconv_substr($value->course_short_description,0,80,'UTF-8')}}
                                        @php
                                        if(strlen($value->course_short_description)>80){
                                        echo "...";
                                        }
                                        @endphp
                                    </p>
                                </div>
                                <div class="col-lg-9 col-lg-offset-3 text-left">
                                    <a href="{{url('course/detail/'.$value->course_id.'/'.$value->course_name)}}" class="text-buy">Buy Now!</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @else
                        @include('page.member.data_not_found');
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End service  -->



    <!-- Start poppular course -->
    <section id="mu-about-us">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="mu-about-us-area">
                        <div class="row">

                            <div class="mu-title">
                                <h2><b><span class="text-primary">POPULAR</span> COURSE</b></h2>
                            </div>

                            {{-- Desktop --}}
                            <div class="hidden-xs">
                                @foreach ($data['course']['course_poppular'] as $item)
                                    <div class="col-lg-3 col-md-3 col-xs-12 alert">
                                        <div class="mu-latest-course-single hvr-float-shadow">

                                            <div class="catname">
                                                @php
                                                    $data_cat = DB::table('course_category')->where('category_id',$item->course_cat_id)->get();
                                                @endphp
                                                {{$data_cat[0]->category_name}}
                                            </div>

                                            <div class="box-skill">
                                                {{$item->skill_name}}
                                            </div>

                                            @php
                                                $checkwishlist = DB::table('wishlist')->where('course_id',$item->course_id)->where('user_id',session('session_id'))->count();
                                            @endphp

                                            <div class="box-heart pointer wishlist" course-id="{{$item->course_id}}" title="Click to add wishlist">
                                                <i class="fa @if($checkwishlist==0) fa-heart-o text-primary @else fa-heart text-red @endif " style="font-size: 16px;"></i>
                                            </div>

                                            <figure class="mu-latest-course-img">
                                                @php
                                                    if((file_exists(public_path().'/upload/member/course/images/'.$item->course_image) && $item->course_image != null)){
                                                        $img = asset('upload/member/course/images/'.$item->course_image);
                                                    }else{
                                                        $img = asset('assets/member/images/no-image.png');
                                                    }

                                                    $link = url('course/detail/'.$item->course_id.'/'.$item->course_name);

                                                    if($item->image!=''){
                                                        $teacherimg = $item->image;
                                                    }else{
                                                        $teacherimg = "no-image.png";
                                                    }

                                                @endphp
                                                {{-- <img src="{{asset('/upload/teacher/profile/images/070120_111213.jpg')}}" alt="" class="img-teacher-small" style="margin-top: 45%;max-width: 55px;"> --}}
                                                {{-- <a href="{{$link}}"><img src="{{$img}}" alt="img"></a> --}}

                                                {{-- <img src="{{asset('upload/teacher/profile/images/070120_111213.jpg')}}" alt="" class="img-teacher-small" style="margin-top: 115px;width: 55px;height: 55px;"> --}}
                                                <div class="img-teacher-small img-teacher-in" style="background: url({{asset('upload/profile/'.$teacherimg)}});background-size: cover;background-position: top center;"></div>
                                                <a href="{{$link}}" style="height: 145px;background: url({{$img}});background-size: cover;background-position: center top;"></a>

                                            </figure>
                                            <div class="mu-latest-course-single-content">

                                                <small style="color:#949494;">
                                                    @php
                                                        $nameteacher = $item->first_name." ".$item->last_name;
                                                    @endphp
                                                    {{iconv_substr($nameteacher,0,50,'utf-8')}}
                                                    @php
                                                        if(strlen($item->course_short_description)>50){
                                                            echo "...";
                                                        }
                                                    @endphp
                                                </small>
                                                <h5 style="height: 40px;">
                                                    <a href="{{$link}}">
                                                        <b>
                                                            {{iconv_substr($item->course_name,0,30,'utf-8')}}
                                                            @php
                                                                if(strlen($item->course_name)>30){
                                                                    echo "...";
                                                                }
                                                            @endphp
                                                        </b>
                                                    </a>
                                                </h5>

                                                <div class="mu-latest-course-single-contbottom">
                                                    <p>
                                                        View {{$item->course_view}}
                                                        @if($item->course_price==0)
                                                            <span class="mu-course-price text-red" href="#"><b>FREE</b></span>
                                                        @else
                                                            <span class="mu-course-price text-blue" href="#"><b>{{number_format($item->course_price,2)}} THB</b></span>
                                                        @endif
                                                    </p>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            {{-- Mobile --}}
                            <div class="col-xs-12 hidden-sm hidden-md hidden-lg" id="mu-popular">
                                @foreach ($data['course']['course_poppular'] as $item)
                                    <div class="col-lg-3 col-md-3 col-xs-12 alert">
                                        <div class="mu-latest-course-single hvr-float-shadow">

                                            <div class="catname">
                                                @php
                                                    $data_cat = DB::table('course_category')->where('category_id',$item->course_cat_id)->get();
                                                @endphp
                                                {{$data_cat[0]->category_name}}
                                            </div>

                                            <div class="box-skill">
                                                {{$item->skill_name}}
                                            </div>

                                            @php
                                                $checkwishlist = DB::table('wishlist')->where('course_id',$item->course_id)->where('user_id',session('session_id'))->count();
                                            @endphp

                                            <div class="box-heart pointer wishlist" course-id="{{$item->course_id}}" title="Click to add wishlist">
                                                <i class="fa @if($checkwishlist==0) fa-heart-o text-primary @else fa-heart text-red @endif " style="font-size: 16px;"></i>
                                            </div>

                                            <figure class="mu-latest-course-img">
                                                @php
                                                    if((file_exists(public_path().'/upload/member/course/images/'.$item->course_image) && $item->course_image != null)){
                                                        $img = asset('upload/member/course/images/'.$item->course_image);
                                                    }else{
                                                        $img = asset('assets/member/images/no-image.png');
                                                    }

                                                    $link = url('course/detail/'.$item->course_id.'/'.$item->course_name);

                                                    if($item->image!=''){
                                                        $teacherimg = $item->image;
                                                    }else{
                                                        $teacherimg = "no-image.png";
                                                    }

                                                @endphp
                                                {{-- <img src="{{asset('/upload/teacher/profile/images/070120_111213.jpg')}}" alt="" class="img-teacher-small" style="margin-top: 45%;max-width: 55px;"> --}}
                                                {{-- <a href="{{$link}}"><img src="{{$img}}" alt="img"></a> --}}

                                                {{-- <img src="{{asset('upload/teacher/profile/images/070120_111213.jpg')}}" alt="" class="img-teacher-small" style="margin-top: 115px;width: 55px;height: 55px;"> --}}
                                                <div class="img-teacher-small img-teacher-in" style="background: url({{asset('upload/profile/'.$teacherimg)}});background-size: cover;background-position: top center;"></div>
                                                <a href="{{$link}}" style="height: 145px;background: url({{$img}});background-size: cover;background-position: center top;"></a>

                                            </figure>

                                            <div class="mu-latest-course-single-content">

                                                <small style="color:#949494;">
                                                    @php
                                                        $nameteacher = $item->first_name." ".$item->last_name;
                                                    @endphp
                                                    {{iconv_substr($nameteacher,0,50,'utf-8')}}
                                                    @php
                                                        if(strlen($item->course_short_description)>50){
                                                            echo "...";
                                                        }
                                                    @endphp
                                                </small>
                                                <h5 style="height: 40px;">
                                                    <a href="{{$link}}">
                                                        <b>
                                                            {{iconv_substr($item->course_name,0,30,'utf-8')}}
                                                            @php
                                                                if(strlen($item->course_name)>30){
                                                                    echo "...";
                                                                }
                                                            @endphp
                                                        </b>
                                                    </a>
                                                </h5>

                                                <div class="mu-latest-course-single-contbottom line-top" >
                                                    <p>
                                                        <span style="font-size: 14px;">View {{$item->course_view}}</span>
                                                        @if($item->course_price==0)
                                                            <span class="mu-course-price text-red price_mobile"><b>FREE</b></span>
                                                        @else
                                                            <span class="mu-course-price text-blue price_mobile"><b>{{number_format($item->course_price,2)}} THB</b></span>
                                                        @endif
                                                    </p>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <div class="clearfix"></div>
                            <div class="text-center">
                                <a href="{{url('/course')}}">
                                    <button type="button" class="viewall-btn">View All Course</button>
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End course -->




    <!-- Start news -->
    <section id="mu-course-content">
        <div class="homepage container">
            <div class="row">
                <div class="col-md-12">
                    <div class="linebreak"></div>
                    <div class="mu-course-content-area">
                        <div class="row">

                            {{-- Desktop --}}
                            <div class="col-lg-3 col-md-3 col-sm-4 col-sm-12 hidden-xs">
                                <div class="mu-title">
                                    <div class="text-left">
                                        <img src="{{asset('/mockup/news_logo.png')}}" alt="" class="img-responsive">
                                    </div>
                                    <link href="https://fonts.googleapis.com/css?family=Poppins:200,400&display=swap" rel="stylesheet">
                                    <div class="text-left" style="color:#949494;margin: 20px 0 20px 0;font-family: 'Poppins', sans-serif;">
                                        Upcoming Education Events to feed your brain.
                                    </div>
                                    <div class="text-center" style="margin: 192px 0 0 0">
                                        <a href="{{url('news')}}" class="btn btn-viewall">View All</a>
                                    </div>
                                </div>
                            </div>

                            {{-- Mobile --}}
                            <div class="col-xs-12 hidden-sm hidden-md hidden-lg">
                                <div class="text-center">
                                    <img src="{{asset('/mockup/news_logo_s.png')}}" style="width:280px;">
                                </div>
                                <div class="text-center" style="color:#949494;margin: 20px 0 20px 0;font-family: 'Poppins', sans-serif;">
                                    Upcoming Education Events<br>to feed your brain.
                                </div>
                            </div>

                            <!-- Start latest course content -->
                            <div class="col-lg-9 col-md-9 col-sm-8 col-sm-12">
                                <div id="mu-news-slide" class="mu-course-container">


                                    @if(count($data['news'])>0)

                                    @foreach($data['news'] as $value)

                                    @php
                                        if(file_exists(public_path().'/upload/member/news/images/'.$value->news_image) && $value->news_image != null)   {
                                            $img = asset('upload/member/news/images/'.$value->news_image);
                                        }else{
                                            $img = asset('assets/member/images/no-image.png');
                                        }

                                        if(strlen($value->news_title)>15){ $d_title = "..."; }else{ $d_title = ""; }
                                        if(strlen($value->news_short_content)>120){ $d_contents = "..."; }else{ $d_contents = ""; }

                                    @endphp

                                    <div class="col-lg-4 col-md-4 col-xs-12 alert">
                                        <div class="mu-latest-course-single hvr-float-shadow">
                                            <figure class="mu-latest-course-img">
                                                <a href="{{url('news/detail/'.$value->news_id.'/'.$value->news_title)}}" style="height: 175px;background: url({{$img}});background-size: cover;background-position: center;">
                                                    {{-- <img src="{{$img}}" alt="img" class="img-responsive"> --}}
                                                </a>
                                            </figure>
                                            <div class="mu-latest-course-single-content">
                                                <a href="{{url('news/detail/'.$value->news_id.'/'.$value->news_title)}}" class="text-blue">
                                                    {{date("d M Y",strtotime($value->created_at))}}
                                                </a>
                                                <h4 class="mt-1">
                                                    <a href="{{url('news/detail/'.$value->news_id.'/'.$value->news_title)}}" title="{{$value->news_title}}">
                                                        <b>{{iconv_substr($value->news_title,0,15,'utf-8').$d_title}}</b>
                                                    </a>
                                                </h4>
                                                <div style="height: 80px;">
                                                    <small style="color:#949494;">{{iconv_substr($value->news_short_content,0,120,'utf-8').$d_contents}}</small>
                                                </div>
                                                <div class="mu-latest-course-single-contbottom">
                                                    <p class="small">
                                                        <a href="{{url('news/detail/'.$value->news_id.'/'.$value->news_title)}}" class="text-blue">Readmore ></a>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    @else
                                    @include('page.member.data_not_found');
                                    @endif


                                </div>
                            </div>
                            <!-- End latest course content -->

                            {{-- Mobile --}}
                            <div class="col-xs-12 hidden-sm hidden-md hidden-lg text-center" style="z-index:1;margin-top:-30px;">
                                <div class="col-xs-12 text-center" style="margin: 0px 0 30px 0;">
                                    <a href="{{url('news')}}" class="btn btn-viewall" style="width:200px">View All News</a>
                                </div>
                            </div>


                        </div>

                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <!-- End news -->



    <!-- Start latest course section -->
    <section id="mu-latest-courses" class="hide">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="mu-latest-courses-area">
                    <!-- Start Title -->
                    <div class="mu-title">
                        <h2 class="text-black" style="letter-spacing: 5px;">WHAT PEOPLE <span class="text-blue">SAY</span></h2>
                        <p class="text-darkgray">How real people said about Education</p>
                    </div>
                    <!-- End Title -->
                    <!-- Start latest course content -->
                    <div id="mu-latest-course-slide" class="mu-latest-courses-content">


                        @for($i=1;$i<11;$i++)

                            <div class="col-lg-4 col-md-4 col-xs-12">

                                    <div class="mu-latest-course-single" style="border-radius:5px;border:none;">

                                        <div class="col-lg-3 alert" style="padding-top:20px;">
                                            <img src="{{asset('mockup/avatar.jpg')}}" class="img-responsive img-circle" alt="img">
                                        </div>

                                        <div class="col-lg-9">
                                            <div class="mu-latest-course-single-content">
                                                <div class="text-test">{{$i}}. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi non quis exercitationem culpa nesciunt nihil.</div>
                                                <div class="mu-latest-course-single-contbottom small" style="margin-top: 0px;">
                                                    <h4>Brett Patton</h4>
                                                    <h6>CMC Biotech Co., Ltd.</h6>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                            </div>

                        @endfor

                    </div>
                    <!-- End latest course content -->
                </div>
            </div>
        </div>
    </section>
    <!-- End latest course section -->



@stop
