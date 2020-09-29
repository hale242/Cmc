@extends('layouts.member.template')

@section('detail')

<div class="loader"></div>

<section id="mu-course-content">
    <div>
        <div>
            <div class="col-12">
                <div>

                    <div class="bar_mydashboard">
                        <div class="container">
                            @include('layouts.member.menu_dashboard')
                        </div>
                    </div>

                    <div class="container">
                        <div class="col-md-12 text-left breadcrumb pt-2 pl-1">
                            <a href="{{url('/')}}">Home</a> > <a href="{{url('/dashboard')}}">Dashboard</a>
                        </div>
                    </div>

                    @php
                        if(isset($data['detail']['user']['image'])){
                            $img = $data['detail']['user']['image'];
                        }else{
                            $img = 'no-image.png';
                        }
                    @endphp

                    <figcaption>
                        <div>

                            {{-- header profile --}}
                            <div class="container mt-1">
                                <div class="col-xs-12 col-md-2 text-center">
                                    {{-- <img src="{{ asset('mockup/avatar.jpg') }}" class="profile-img"> --}}
                                    <img src="{{asset('upload/profile/'.$img)}}" class="profile-img">
                                </div>

                                <div class="col-xs-12 col-md-5 text-left">
                                    <p style="color:#bbbcbd;font-size:12px;">WELCOME TO DASHBOARD</p>
                                    <h4 style="font-size: 30px;font-weight: bolder;">
                                        {{$data['detail']['user']['first_name'].' '.$data['detail']['user']['last_name']}}
                                    </h4>
                                    <p style="margin-bottom: 20px;">
                                        <span class="profile-type">
                                            @if($data['detail']['user']['user_type']==2)
                                            I am <span class="profile-text" style="font-weight:bold">Student</span>
                                            @elseif($data['detail']['user']['user_type']==3)
                                            I am <span class="profile-text" style="font-weight:bold">Teacher</span>
                                            @elseif($data['detail']['user']['user_type']==1)
                                            I am <span class="profile-text" style="font-weight:bold">Admin</span>
                                            @endif
                                        </span>
                                        <br><br><br>
                                        <span class="text-darkgray">SKILL LEVEL</span>
                                    </p>
                                </div>

                                <div class="col-xs-12 col-md-5 text-center">
                                    <div class="ezpanel">
                                        <div class="ezpanel-header">EZCOIN</div>
                                        <div class="ezpanel-body">
                                            <img src="{{url('mockup/ico-credit.png')}}" /> 00.00
                                        </div>
                                    </div>
                                </div>

                                <div class="clearfix"></div>

                                {{-- Section Star --}}
                                @php
                                    $yourpoint = $data['detail']['user']['user_rank'];
                                    $starblue = 'star_blue.png';
                                    $staryellow = 'star_yellow.png';
                                    $starred = 'star_red.png';
                                    $starhere = 'star_here.png';
                                    $starlost = 'star_lost.png';
                                    $youarehere = 'youarehere.png';
                                    $starbig = 'star_big.png';
                                @endphp
                                <style>
                                    .box_rate {
                                        width: 10%;
                                        position:relative;
                                    }
                                    .youarehere {
                                        position: absolute;
                                        top: 25px;
                                        left: -14px;
                                    }
                                    .youareherelast {
                                        position: absolute;
                                        top: 47px;
                                        left: 0px;
                                    }
                                </style>

                                <div class="hidden-xs col-xs-12 col-md-2 text-center">
                                    <a href="{{url('profile')}}" class="btn btn-default btn-sm" style="color: #bbbcbd;">Edit Profile</a>
                                </div>

                                <div class="hidden-xs col-xs-12 col-md-10" style="margin-top: -20px;">
                                    <div class="col-xs-12 col-md-4 br-1">
                                        <h5 class="row text-blue"><b>Begin</b></h5>
                                        <p>
                                            @for($i=1;$i<11;$i++)
                                                <p class="pull-left text-center box_rate">
                                                    @if($i<$yourpoint && $yourpoint<11 || $yourpoint>=11 )
                                                        <img src="{{url('mockup/'.$starblue)}}" />
                                                    @elseif($i==$yourpoint)
                                                        <img src="{{url('mockup/'.$starhere)}}" />
                                                    @else
                                                        <img src="{{url('mockup/'.$starlost)}}" />
                                                    @endif
                                                    @if($i==$yourpoint)
                                                        <img src="{{url('mockup/'.$youarehere)}}" class="youarehere" />
                                                    @endif
                                                </p>
                                            @endfor
                                        </p>
                                    </div>

                                    <div class="col-xs-12 col-md-4 br-1">
                                        <h5 class="text-yellow"><b>Imtermediate</b></h5>
                                        <p>
                                            @for($i=11;$i<21;$i++)
                                                <p class="pull-left text-center box_rate">
                                                    @if($i<$yourpoint && $yourpoint<21 || $yourpoint>=21 )
                                                        <img src="{{url('mockup/'.$staryellow)}}" />
                                                    @elseif($i==$yourpoint)
                                                        <img src="{{url('mockup/'.$starhere)}}" />
                                                    @else
                                                        <img src="{{url('mockup/'.$starlost)}}" />
                                                    @endif
                                                    @if($i==$yourpoint)
                                                        <img src="{{url('mockup/'.$youarehere)}}" class="youarehere" />
                                                    @endif
                                                </p>
                                            @endfor
                                        </p>
                                    </div>

                                    <div class="col-xs-12 col-md-4">
                                        <h5 class="text-red"><b>Advance</b></h5>
                                        <p>
                                            @if($yourpoint>=30)
                                                @for($i=21;$i<29;$i++)
                                                    <p class="pull-left text-centerbox_rate">
                                                        @if($i<$yourpoint && $yourpoint<29 || $yourpoint>=29)
                                                            <img src="{{url('mockup/'.$starred)}}" />
                                                        @elseif($i==$yourpoint)
                                                            <img src="{{url('mockup/'.$starhere)}}" />
                                                        @else
                                                            <img src="{{url('mockup/'.$starlost)}}" />
                                                        @endif
                                                    </p>
                                                @endfor
                                                <p class="pull-left text-center" style="width: 20%;margin-top: -17px;position:relative;">
                                                    <img src="{{url('mockup/'.$starbig)}}" />
                                                    <img src="{{url('mockup/'.$youarehere)}}" class="youareherelast" />
                                                </p>
                                            @else
                                                @for($i=21;$i<31;$i++)
                                                    <p class="pull-left text-center" style="width: 10%;position:relative;">
                                                        @if($i<$yourpoint && $yourpoint<30 || $yourpoint>=30)
                                                            <img src="{{url('mockup/'.$starred)}}" />
                                                        @elseif($i==$yourpoint)
                                                            <img src="{{url('mockup/'.$starhere)}}" />
                                                        @else
                                                            <img src="{{url('mockup/'.$starlost)}}" />
                                                        @endif
                                                        @if($i==$yourpoint)
                                                            <img src="{{url('mockup/'.$youarehere)}}" class="youarehere" />
                                                        @endif
                                                    </p>
                                                @endfor
                                            @endif
                                        </p>
                                    </div>
                                </div>
                                {{-- Section Star --}}

                            </div>
                            {{-- header profile --}}


                            {{-- Chart your infomation --}}
                            <div class="mt-5 hidden-xs">

                                <div class="profile-box-infomation">

                                    <div class="container">
                                        <div class="col-md-3" style="padding: 15px 15px 0 40px;">

                                            <h4 class="text-primary profile-infomation"><b>Your Information</b></h4>

                                            <div class="col-md-12 pl-0 pr-0 profile-linebt">
                                                <div class="pull-left">
                                                    <h4 class="fz-15">Your Certificate</h4>
                                                </div>
                                                <div class="pull-right">
                                                    <img src="{{ asset('mockup/profile_cer.png') }}" alt="">
                                                </div>
                                            </div>

                                            <div class="col-md-12 pl-0 pr-0 profile-linebt">
                                                <div class="pull-left">
                                                    <h4 class="fz-15">Chapter Collection</h4>
                                                </div>
                                                <div class="pull-right">
                                                    <img src="{{ asset('mockup/profile_chap.png') }}" alt="">
                                                </div>
                                            </div>

                                            <div class="col-md-12 pl-0 pr-0 profile-linebt">
                                                <div class="pull-left">
                                                    <h4 class="fz-15">Pre & Post Test</h4>
                                                </div>
                                                <div class="pull-right">
                                                    <img src="{{ asset('mockup/profile_pre.png') }}" alt="">
                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-md-9" style="margin-top: 55px;">

                                            @php

                                                $course_complete            = $data['chart']['course_complete'];
                                                $course_complete_chapter    = $data['chart']['course_complete_count'];

                                                $course_done                = $data['chart']['course_done'];
                                                $course_done_chapter        = $data['chart']['course_done_count'];

                                                $course_togo                = "XX";
                                                $course_togo_chapter        = "xx";

                                            @endphp

                                            {{-- Animate Graph --}}
                                            <style>
                                                .c100.p{{$course_complete}} .bar{
                                                    animation-name: course_complete;
                                                    animation-duration: 0.5s;
                                                }
                                                @keyframes course_complete {
                                                    <?php
                                                        if($course_complete>50){
                                                            echo "from {transform: rotate(180deg);}";
                                                        }else{
                                                            echo "from {transform: rotate(0deg);}";
                                                        }
                                                    ?>
                                                    to {transform: rotate(calc({{$course_complete}}*3.6)deg);}
                                                }

                                                .c100.p{{$course_done}} .bar{
                                                    animation-name: course_done;
                                                    animation-duration: 0.5s;
                                                }

                                                @keyframes course_done {
                                                    <?php
                                                        if($course_done>50){
                                                            echo "from {transform: rotate(180deg);}";
                                                        }else{
                                                            echo "from {transform: rotate(0deg);}";
                                                        }
                                                    ?>
                                                    to {transform: rotate(calc({{$course_done}}*3.6)deg);}
                                                }
                                            </style>

                                            <div class="col-md-4">
                                                <div class="c100 light p{{$course_complete}} big green">
                                                    <p>COURSE<br>COMPLETE</p>
                                                    <span>{{$course_complete}}<sup style="font-size:26px;margin-left: 2px;">%</sup></span>
                                                    <div class="slice">
                                                        <div class="bar"></div>
                                                        <div class="fill"></div>
                                                    </div>
                                                </div>
                                                <div class="text-center">
                                                    <a href="{{url('/mycourse')}}">
                                                        <span class="chapsgreen">{{$course_complete_chapter}}</span> Chapters
                                                    </a>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="c100 light p{{$course_done}} big red">
                                                    <p>COURSE<br>TO BE DONE</p>
                                                    <span>{{$course_done}}<sup style="font-size:26px;margin-left: 2px;">%</sup></span>
                                                    <div class="slice">
                                                        <div class="bar"></div>
                                                        <div class="fill"></div>
                                                    </div>
                                                </div>
                                                <div class="text-center">
                                                    <a href="{{url('/mycourse')}}">
                                                        <span class="chapsred">{{$course_done_chapter}}</span> Chapters
                                                    </a>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="c100 light p{{$course_togo}} big orange">
                                                    <p>COURSE<br>TO GO</p>
                                                    <span>{{$course_togo}}<sup style="font-size:26px;margin-left: 2px;">%</sup></span>
                                                    <div class="slice">
                                                        <div class="bar"></div>
                                                        <div class="fill"></div>
                                                    </div>
                                                </div>
                                                <div class="text-center"><span class="chapsorange">{{$course_togo_chapter}}</span> Chapters</div>
                                            </div>


                                            {{-- <div class="col-md-4">
                                                {!! $data['chart']['course_complete']->html() !!}
                                            </div>
                                            <div class="col-md-4">
                                                {!! $data['chart']['course_done']->html() !!}
                                            </div>
                                            <div class="col-md-4">
                                                {!! $data['chart']['course_go']->html() !!}
                                            </div> --}}

                                        </div>

                                        {{-- {!! Charts::scripts() !!}
                                        {!! $data['chart']['course_complete']->script() !!}
                                        {!! $data['chart']['course_done']->script() !!}
                                        {!! $data['chart']['course_go']->script() !!} --}}
                                    </div>
                                </div>

                            </div>
                            {{-- Chart your infomation --}}

                            {{-- Mycourse --}}
                            <div class="container mt-3">
                                <h3 class="text-center">Your Course</h3>
                                <div class="col-xs-12 col-md-12" style="margin-top:20px;padding:20px;">
                                    <div class="table-responsive">
                                        <table class="table table-striped b-t b-light" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th style="width:5%">#</th>
                                                    <th style="width:20%">Course Name</th>
                                                    <th style="width:5%" class="text-center">Status</th>
                                                    <th style="width:5%" class="text-center">View</th>
                                                    <th style="width:10%" class="text-center">Category</th>
                                                    <th style="width:15%" class="text-center">Pre test</th>
                                                    <th style="width:15%" class="text-center">Post test</th>
                                                    <th style="width:15%">Teacher Name</th>
                                                    <th style="width:10%" class="text-center"></th>
                                                </tr>
                                            </thead>
                                            <tbody style="font-size:12px;">

                                            @if(sizeof($data['detail']['mycourse'])!=0)

                                                <?php $i = 1;?>
                                                @foreach($data['detail']['mycourse'] as $key => $value)

                                                    @php

                                                        if($data['preposttest_result']!==null){

                                                            if($data['preposttest_result'][$key]->course_id == $value->course_id){
                                                                $status = $data['preposttest_result'][$key]->pretest_status;
                                                            }else{
                                                                $status = 0;
                                                            }

                                                        }else{
                                                            $status = 0;
                                                        }

                                                    @endphp

                                                    <tr>
                                                        <td>{{$i++}}</td>

                                                        <td title="{{$value->course_name}}">{{substr($value->course_name,0,20)}}@if(strlen($value->course_name)>20)...@endif</a></td>

                                                        <td class="text-center">
                                                            @if($status==0)
                                                            <span class="label label-warning">Wait</span>
                                                            @elseif($status==1)
                                                            <span class="label label-danger">Fail</span>
                                                            @elseif($status==2)
                                                            <span class="label label-success">Pass</span>
                                                            @endif
                                                        </td>

                                                        <td class="text-center">{{$value->course_view}}</td>
                                                        <td class="text-center">
                                                            {{$value->category_name}}
                                                        </td>

                                                        <td class="text-center">
                                                            @if($data['preposttest_result'][$key]->pretest_score!==null)
                                                                {{date("d-m-Y",strtotime($data['preposttest_result'][$key]->date_create))}}
                                                            @else
                                                                {{'-'}}
                                                            @endif
                                                        </td>

                                                        <td class="text-center">
                                                            @if($data['preposttest_result'][$key]->posttest_score!==null)
                                                                {{date("d-m-Y",strtotime($data['preposttest_result'][$key]->date_end))}}
                                                            @else
                                                                {{'-'}}
                                                            @endif
                                                        </td>

                                                        @foreach($data['teacher'] as $value3)
                                                            @if($value->course_teacher_id == $value3->user_id)
                                                                @php $teacher = $value3->first_name.' '.$value3->last_name @endphp
                                                            @endif
                                                        @endforeach

                                                        <td title="{{$teacher}}">
                                                            {{substr($teacher,0,20)}}@if(strlen($teacher)>20)...@endif
                                                        </td>

                                                        <td class="text-right">
                                                            <?php
                                                                $steplink = 1;
                                                                if($value->order_status==3 || $value->order_status==1){
                                                            ?>
                                                                    @php
                                                                        if($data['preposttest_result'][$key]->pretest_score!=null){
                                                                            $stylebtn = 'danger';
                                                                            $textbtn = 'Learn & Post test';
                                                                        }elseif($data['preposttest_result'][$key]->posttest_score!=null){
                                                                            $stylebtn = 'info';
                                                                            $textbtn = 'Pre test agin';
                                                                        }else{
                                                                            $stylebtn = 'warning';
                                                                            $textbtn = 'Pre test';
                                                                        }
                                                                    @endphp

                                                                    <a href="{{url('mycourse/testing/'.$value->course_id.'/'.$value->course_name.'/'.$steplink) }}" class="btn btn-sm btn-{{$stylebtn}} btn-sm" title="View">
                                                                        <i class="fa fa-book"></i> {{$textbtn}}
                                                                    </a>

                                                            <?php
                                                                }else{
                                                                    echo "wait for payment";
                                                                }
                                                            ?>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                @if($i>5)
                                                    <tr>
                                                        <td colspan="9" class="text-center">
                                                            <a href="{{url('mycourse')}}" class="btn btn-sm btn-info" style="width:150px;">
                                                                See more...
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endif

                                            @else

                                                <tr>
                                                    <td colspan="9">
                                                        <div class="text-center">@include('page.member.data_not_found')</div>
                                                    </td>
                                                </tr>

                                            @endif

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            {{-- Mycourse --}}


                            {{-- Last watch --}}
                            <div class="lineend">
                                <div class="container">
                                    <div class="col-md-12">

                                        <h4 class="profile-head-lastwatch">LAST WATCH</h4>

                                        @php
                                            // dd($data['detail']['last_watch']);
                                        @endphp

                                        <div id="lastwatch">
                                            @if(count($data['detail']['last_watch'])>0)

                                                @foreach ($data['detail']['last_watch'] as $item)
                                                    <div class="col-lg-3 col-md-3 col-xs-6 alert">
                                                        <div class="mu-latest-course-single hvr-float-shadow">

                                                            <div class="catname">
                                                                @php
                                                                    $data_cat = DB::table('course_category')->where('category_id',$item->course_cat_id)->get();
                                                                    $teacher = DB::table('user')->where('user_id',$item->course_teacher_id)->first();
                                                                @endphp
                                                                {{$data_cat[0]->category_name}}
                                                            </div>

                                                            <div class="box-skill">
                                                                {{$item->skill_name}}
                                                            </div>

                                                            @php
                                                                $checkwishlist = DB::table('wishlist')->where('course_id',$item->course_id)->where('user_id',session('session_id'))->count();
                                                            @endphp

                                                            <div class="box-heart pointer wishlist" course-id="{{$item->course_id}}">
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

                                                                    if($teacher->image!=''){
                                                                        $image = $teacher->image;
                                                                    }else{
                                                                        $image = 'no-image.png';
                                                                    }
                                                                @endphp


                                                                <div class="img-teacher-small img-teacher-in" style="background: url({{asset('upload/profile/'.$image)}});background-size: cover;background-position: top center;"></div>
                                                                <a href="{{$link}}" style="height: 145px;background: url({{$img}});background-size: cover;background-position: center top;"></a>
                                                            </figure>
                                                            <div class="mu-latest-course-single-content">

                                                                <small style="color:#949494;">
                                                                    @php
                                                                        $nameteacher = $teacher->first_name." ".$teacher->last_name;
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

                                            @else
                                                <div style="border: 1px dotted #ccc;padding: 10px;margin: 5px;">
                                                    @include('page.member.data_not_found')
                                                </div>
                                            @endif
                                        </div>

                                    </div>
                                </div>
                            </div>
                            {{-- Last watch --}}


                            {{-- my wishlist --}}
                            <div class="container">
                                <div class="col-md-12">

                                    <h4 class="profile-head-wishlist">MY WISHLIST</h4>

                                    <div id="wishlist">
                                        @if(count($data['detail']['wishlist'])>0)

                                            @foreach ($data['detail']['wishlist'] as $item)
                                                <div class="col-lg-3 col-md-3 col-xs-6 alert">
                                                    <div class="mu-latest-course-single hvr-float-shadow">

                                                        <div class="catname">
                                                            @php
                                                                $data_cat = DB::table('course_category')->where('category_id',$item->course_cat_id)->get();
                                                                $teacher1 = DB::table('user')->where('user_id',$item->course_teacher_id)->first();
                                                            @endphp
                                                            {{$data_cat[0]->category_name}}
                                                        </div>

                                                        <div class="box-skill">
                                                            {{$item->skill_name}}
                                                        </div>

                                                        <div class="delete-box">
                                                            <a href="#" class="btn btn-sm" style="border-radius:0px;color: #fff;background-color: rgba(243, 83, 83, 0.78);" onclick="confirm_delete('{{url('mywishlist/delete/')}}','{{$item->wishlist_id}}');" title="Delete">
                                                                <i class="fa fa-times"></i>
                                                            </a>
                                                        </div>

                                                        @php
                                                            $checkwishlist = DB::table('wishlist')->where('course_id',$item->course_id)->where('user_id',session('session_id'))->count();
                                                        @endphp

                                                        <div class="box-heart pointer wishlist" course-id="{{$item->course_id}}">
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

                                                                if($teacher1->image!=''){
                                                                    $image = $teacher1->image;
                                                                }else{
                                                                    $image = 'no-image.png';
                                                                }
                                                            @endphp
                                                            {{-- <img src="{{asset('/upload/teacher/profile/images/070120_111213.jpg')}}" alt="" class="img-teacher-small" style="margin-top: 45%;max-width: 55px;"> --}}
                                                            {{-- <a href="{{$link}}"><img src="{{$img}}" alt="img"></a> --}}

                                                            {{-- <img src="{{asset('upload/teacher/profile/images/070120_111213.jpg')}}" alt="" class="img-teacher-small" style="margin-top: 115px;width: 55px;height: 55px;"> --}}
                                                            <div class="img-teacher-small img-teacher-in" style="background: url({{asset('upload/profile/'.$image)}});background-size: cover;background-position: top center;"></div>
                                                            <a href="{{$link}}" style="height: 145px;background: url({{$img}});background-size: cover;background-position: center top;"></a>

                                                        </figure>
                                                        <div class="mu-latest-course-single-content">

                                                            <small style="color:#949494;">
                                                                @php
                                                                    $nameteacher = $teacher1->first_name." ".$teacher1->last_name;
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

                                        @else

                                            <div style="border: 1px dotted #ccc;padding: 10px;margin: 5px;">
                                                @include('page.member.data_not_found')
                                            </div>

                                        @endif
                                    </div>

                                </div>
                            </div>
                            {{-- my wishlist --}}

                        </div>
                    </figcaption>

                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .table > thead > tr > th, .table > tbody > tr > th, .table > tfoot > tr > th, .table > thead > tr > td, .table > tbody > tr > td, .table > tfoot > tr > td {
        vertical-align: middle;
    }
</style>


@stop

