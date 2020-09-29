@extends('layouts.member.template')


@section('detail')

@php
    // dd($data['detail']->course_image);
    // dd(session()->all());
@endphp

<section id="mu-course-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-left">
                <a href="{{url('/')}}">Home</a> > <a href="{{url('course')}}">Course</a> > <a
                    href="{{url('course/detail/'.$data['detail']->course_id.'/'.$data['detail']->course_name)}}"
                    class="text-primary">{{$data['detail']->course_name}}</a>
                <hr>
            </div>
            <div class="col-md-12">
                <div class="mu-course-content-area">
                    <div class="row">

                        <div class="col-md-9">

                            <!-- start course content container -->
                            <div class="mu-course-container mu-course-details">
                                <div class="row">
                                    <div class="col-md-12">

                                        @include('layouts.member.flash-message')

                                        @if(count($errors))
                                        <div class="alert alert-danger alert-block">
                                            <button type="button" class="close" data-dismiss="alert">×</button>
                                            <div style="padding: 10px;">
                                                <ul>
                                                    @foreach($errors->all() as $error)
                                                    <li>{{$error}}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                        @endif

                                        <div class="mu-latest-course-single">

                                            <div class="col-md-12">
                                                {{-- {{dd($data)}} --}}
                                            </div>

                                            <div class="col-md-9">
                                                <h2 style="margin-bottom: 20px;"><b>{{$data['detail']->course_name}}</b></h2>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="text-right">
                                                    @for($i=0;$i<5;$i++)
                                                        @if($i<$data['course']['rating'])
                                                            <i class="fa fa-star" style="color:#ffb626"></i>
                                                        @else
                                                            <i class="fa fa-star-o" style="color:#cccccc"></i>
                                                        @endif
                                                    @endfor
                                                </div>
                                                <div class="text-right">
                                                    <span style="color:#ffb626">{{$data['course']['rating']}}</span> <small style="color:#ccc">Rating</small>
                                                </div>
                                            </div>


                                            {{-- Start Header Detail --}}
                                            <div class="col-md-4" style="margin-bottom: 20px">
                                                <div class="row">
                                                    <div class="col-md-3 text-center" style="padding-top: 5px;">
                                                        {{-- url(http://ezlearn.cmcbiotech.co.th/upload/profile/280220_094649.png) --}}
                                                        {{-- pol --}}
                                                        <img src="{{asset('/upload/profile/'.$data['detail']['course_image'])}}" class="img-teacher">
                                                    </div>
                                                    <div class="col-md-9 text-left">
                                                        <h5 style="color:gray">TEACHER</h5>
                                                        <h6><b>{{$data['detail']->first_name.' '.$data['detail']->last_name}}</b></h6>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-2" style="border-left:1px solid #ccc;padding-left: 30px;">
                                                <div class="row">
                                                    <h5 style="color:gray">CATEGORY</h5>
                                                    <h6><b>{{$data['detail']->category_name}}</b></h6>
                                                </div>
                                            </div>

                                            <div class="col-md-2" style="border-left:1px solid #ccc;padding-left: 30px;">
                                                <div class="row">
                                                    <h5 style="color:gray">VIEW</h5>
                                                    <h6><b>{{$data['detail']->course_view}}</b></h6>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="row">
                                                    <div class="col-md-3" style="padding-top: 14px;">
                                                        @php
                                                            $course_price = $data['detail']->course_price;
                                                        @endphp

                                                        @if($course_price == 0)
                                                            <span class="text-red font-14">FREE</span>
                                                        @else
                                                            <span class="text-blue font-14 mr-2">{{number_format($course_price, 2)}}</span>
                                                        @endif

                                                    </div>

                                                    <div class="col-md-9 text-right">
                                                        @php

                                                            if($data['course']['has']=='Y'){
                                                                $txt_add = 'You have already.';
                                                                $url_link = url('mycourse/');
                                                            }else{
                                                                $txt_add = 'ADD TO CART';
                                                                $url_link = url('addtocart/'.$data['detail']->course_id);
                                                            }

                                                        @endphp
                                                        <button type="button" class="btn btn-add-cart hvr-float-shadow" onclick="window.location='{{$url_link}}';">
                                                            {{$txt_add}}
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- End Header Detail --}}


                                            @if($data['detail']->course_vdo_url!='')
                                                <div class="col-md-12">
                                                    <div class="embed-responsive embed-responsive-16by9">
                                                        <iframe class="embed-responsive-item" src="{{$data['detail']->course_vdo_url}}"></iframe>
                                                    </div>

                                                    {{-- <div class="embed-responsive embed-responsive-16by9">
                                                        <iframe class="embed-responsive-item" src="{{asset('upload/member/course/video/dvt_lower.mp4')}}"></iframe>
                                                    </div> --}}
                                                </div>
                                            @else
                                                @php $imm = asset('upload/member/course/images/'.$data['detail']->course_image); @endphp
                                                <div class="col-md-12">
                                                    <div class="text-center">
                                                        <img src="{{$imm}}" class="img-responsive">
                                                    </div>
                                                </div>
                                            @endif

                                            <div class="col-md-12" style="margin-top: 30px;">

                                                <ul class="nav nav-tabs" style="width:100%">
                                                    <li class="active"><a data-toggle="tab" href="#overview">OVERVIEW</a></li>
                                                    <li><a data-toggle="tab" href="#curriculum">CURRICULUM</a></li>
                                                    <li><a data-toggle="tab" href="#instructor">INSTRUCTOR</a></li>
                                                    <li><a data-toggle="tab" href="#reviews">REVIEWS</a></li>
                                                </ul>

                                            </div>

                                            <div class="tab-content">
                                                {{-- Tab Overview --}}
                                                <div id="overview" class="tab-pane fade in active">
                                                    <div class="col-xs-12 col-sm-12 col-md-8 box-tab">
                                                        {!! $data['detail']->course_full_description !!}
                                                    </div>
                                                    <div class="col-xs-12 col-sm-12 col-md-4 box-tab text-center">
                                                        <h4 class="overview-head">Course Feature</h4>
                                                        <table class="table table-bordered">
                                                            <tbody>
                                                                <tr>
                                                                    <td class="text-center overview-box">
                                                                        <img src="{{asset('mockup/overview_1.png')}}" alt="overview-1">
                                                                        <p class="overview-text-small">Lectures</p>
                                                                        <p class="overview-score-small">{{$data['lesson']}}</p>
                                                                    </td>
                                                                    <td class="text-center overview-box">
                                                                        <img src="{{asset('mockup/overview_2.png')}}" alt="overview-2">
                                                                        <p class="overview-text-small">Quizzes</p>
                                                                        <p class="overview-score-small">{{$data['quizzes']}}</p>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-center overview-box">
                                                                        <img src="{{asset('mockup/overview_3.png')}}" alt="overview-1">
                                                                        <p class="overview-text-small">Duration</p>
                                                                        <p class="overview-score-small">{{$data['detail']->duration}} hours</p>
                                                                    </td>
                                                                    <td class="text-center overview-box">
                                                                        <img src="{{asset('mockup/overview_4.png')}}" alt="overview-2">
                                                                        <p class="overview-text-small">Skill level</p>
                                                                        <p class="overview-score-small">{{$data['detail']->skill_name}}</p>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-center overview-box">
                                                                        <img src="{{asset('mockup/overview_5.png')}}" alt="overview-1">
                                                                        <p class="overview-text-small">Language</p>
                                                                        <p class="overview-score-small">{{$data['detail']->language}}</p>
                                                                    </td>
                                                                    <td class="text-center overview-box">
                                                                        <img src="{{asset('mockup/overview_6.png')}}" alt="overview-2">
                                                                        <p class="overview-text-small">Students</p>
                                                                        <p class="overview-score-small">{{$data['student']}}</p>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                {{-- Tab Curriculum --}}
                                                <div id="curriculum" class="tab-pane fade">
                                                    <div class="col-md-12  box-tab">
                                                        {!! $data['detail']->course_curriculum !!}
                                                    </div>
                                                </div>
                                                {{-- Tab Instructor --}}
                                                <div id="instructor" class="tab-pane fade">
                                                    <div class="col-md-12 box-tab">

                                                        @php
                                                            if($data['detail']->image!='' || $data['detail']->image != null){
                                                                $image = '/upload/profile/'.$data['detail']->image;
                                                            }else{
                                                                $image = asset('upload/profile/no-image.png');
                                                            }
                                                        @endphp

                                                        <style>
                                                            .teacher-img {
                                                                background: url('{{url($image)}}');
                                                                width: 150px;
                                                                height: 150px;
                                                                background-size: cover;
                                                                background-position: top center;
                                                                border: 1px solid #ccc;
                                                                border-radius: 50%;
                                                            }
                                                        </style>

                                                        <div class="text-center border-profile teacher-img mb-3"></div>
                                                        {!! $data['detail']->course_instructor !!}
                                                    </div>
                                                </div>
                                                {{-- Tab Reviews --}}
                                                <div id="reviews" class="tab-pane fade">
                                                    <div class="col-md-12 box-tab">
                                                        <div class="box-review">
                                                            {{-- {{dd($data['course']['review'])}} --}}
                                                            <div><h5><b>Review</b></h5></div>
                                                            @if(($data['course']['count']!=0))
                                                                <div>
                                                                    @foreach ($data['course']['review'] as $item)
                                                                        @php
                                                                            if($item['image']==''){
                                                                                $img = 'no-image.png';
                                                                            }else{
                                                                                $img = $item['image'];
                                                                            }
                                                                        @endphp
                                                                        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 mb-1 bt-1 pt-1">
                                                                            <img src="{{url('upload/profile/'.$img)}}" class="img-circle img-responsive">
                                                                        </div>
                                                                        <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 mb-1 bt-1 pt-1">
                                                                            <div class="pull-left">
                                                                                <span style="font-size:12px;">Rating ::</span>
                                                                                @for($i=0;$i<5;$i++)
                                                                                    @if($i<$item['rating'])
                                                                                        <i class="fa fa-star" style="color:#ffb626"></i>
                                                                                    @else
                                                                                        <i class="fa fa-star-o" style="color:#cccccc"></i>
                                                                                    @endif
                                                                                @endfor
                                                                            </div>
                                                                            <div class="pull-right" style="font-size:12px;">
                                                                                {{-- {{dd(session())}} --}}
                                                                                {{$item['created_at']}}
                                                                                @if($item['user_id']==session('session_id') || session('session_user_type')==1)
                                                                                    <span title="Edit Comment" data-toggle="modal" data-target="#modalEdit" data-id="{{$item['review_id']}}" data-rating="{{$item['rating']}}" data-message="{{$item['review']}}">
                                                                                        <i class="fa fa-pencil text-warning pointer"></i>
                                                                                    </span> |

                                                                                    <a href="{{url('course/comment_delete/'.$item['review_id']."/".$data['detail']->course_id.'/'.$data['detail']->course_name)}}" title="Delete Comment"><i class="fa fa-times text-red pointer"></i></a>
                                                                                @endif
                                                                            </div>

                                                                            <div class="clearfix"></div>
                                                                            <div class="review-comment mt-1 border-top">
                                                                                {{$item['review']}}
                                                                                <div>
                                                                                <small class="badgex">{{$item['first_name']." ".$item['last_name']}}</small>
                                                                                    @if($item['created_at']!=$item['updated_at'])
                                                                                        <small style="font-size:10px;float:right"><i>// Edit {{$item['updated_at']}}</i></small>
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach

                                                                    <div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="modalEdit">
                                                                        <div class="modal-dialog" role="document">
                                                                          <div class="modal-content">
                                                                            <div class="modal-body">
                                                                                <form action="{{url('course/review')}}" method="POST">
                                                                                    @csrf
                                                                                    <div class="form-group">
                                                                                        <label class="pull-left">Rating </label>
                                                                                        <span class='rating-stars ml-1 pull-left rating-stars'>
                                                                                            <ul id='stars'>
                                                                                                <li class='s1 star_edit star' data-toggle="tooltip" title='Poor' data-value='1'><i class='fa fa-star fa-fw'></i></li>
                                                                                                <li class='s2 star_edit star' data-toggle="tooltip" title='Fair' data-value='2'><i class='fa fa-star fa-fw'></i></li>
                                                                                                <li class='s3 star_edit star' data-toggle="tooltip" title='Good' data-value='3'><i class='fa fa-star fa-fw'></i></li>
                                                                                                <li class='s4 star_edit star' data-toggle="tooltip" title='Excellent' data-value='4'><i class='fa fa-star fa-fw'></i></li>
                                                                                                <li class='s5 star_edit star' data-toggle="tooltip" title='WOW!!!' data-value='5'><i class='fa fa-star fa-fw'></i></li>
                                                                                            </ul>
                                                                                        </span>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <input type="hidden" id="course_id_edit" name="course_id_edit" value="{{$data['detail']['course_id']}}">
                                                                                        <input type="hidden" id="course_name" name="course_name_edit" value="{{$data['detail']['course_name']}}">
                                                                                        <input type="hidden" id="user_id" name="user_id_edit" value="{{session('session_id')}}">
                                                                                        <input type="hidden" id="action" name="action" value="edit">
                                                                                        <input type="hidden" id="rating_edit" name="rating_edit">
                                                                                        <textarea id="comment_edit" name="comment_edit" class="form-control" cols="30" rows="5" maxlength="1000" required></textarea>
                                                                                        <input type="hidden" id="comment_id_edit" name="comment_id_edit">
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <button type="submit" class="btn btn-success"> <i class="fa fa-send"></i> Review</button>
                                                                                    </div>
                                                                                </form>
                                                                            </div>
                                                                          </div>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            @else
                                                                <div class="col-md-12 text-center" style="border: 1px dotted #ccc;padding: 0 5px 10px 5px;">
                                                                    <h3>This course is not comment from customer.</h3>
                                                                </div>
                                                            @endif
                                                        </div>

                                                        <div class="clearfix"></div>

                                                        @php
                                                            // dd($data['course']['review'][0]['user_id']);
                                                            $all = array();
                                                            if(($data['course']['count']!=0)){
                                                                foreach($data['course']['review'] as $itemx){
                                                                    $all[] = $itemx['user_id'];
                                                                }
                                                            }

                                                        @endphp

                                                        @if(session('session_id')!='')
                                                            @if(!in_array(session('session_id'),$all))
                                                                @php

                                                                    $orderuse = DB::table('orders')->where('user_id',session('session_id'))->get();
                                                                    $counter = count($orderuse);
                                                                    $checkorder = array();
                                                                    for($x=0;$x<$counter;$x++){
                                                                        $coursecheck = DB::table('order_detail')->select('course_id')->where('order_id',$orderuse[$x]->order_id)->first();
                                                                        $checkorder[] = $coursecheck->course_id;
                                                                    }

                                                                @endphp

                                                                @if(in_array($data['detail']['course_id'],$checkorder))
                                                                    <div class="form-review mt-3 bt-1">
                                                                        <h3>Your review</h3>
                                                                        <form action="{{url('course/review/')}}" method="POST">
                                                                            @csrf
                                                                            <div class="form-group">
                                                                                <label class="pull-left">Rating </label>
                                                                                <span class='rating-stars ml-1 pull-left rating-stars'>
                                                                                    <ul id='stars'>
                                                                                        <li class='star' data-toggle="tooltip" title='Poor' data-value='1'><i class='fa fa-star fa-fw'></i></li>
                                                                                        <li class='star' data-toggle="tooltip" title='Fair' data-value='2'><i class='fa fa-star fa-fw'></i></li>
                                                                                        <li class='star' data-toggle="tooltip" title='Good' data-value='3'><i class='fa fa-star fa-fw'></i></li>
                                                                                        <li class='star' data-toggle="tooltip" title='Excellent' data-value='4'><i class='fa fa-star fa-fw'></i></li>
                                                                                        <li class='star' data-toggle="tooltip" title='WOW!!!' data-value='5'><i class='fa fa-star fa-fw'></i></li>
                                                                                    </ul>
                                                                                </span>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <input type="hidden" id="course_id" name="course_id" value="{{$data['detail']['course_id']}}">
                                                                                <input type="hidden" id="course_name" name="course_name" value="{{$data['detail']['course_name']}}">
                                                                                <input type="hidden" id="user_id" name="user_id" value="{{session('session_id')}}">
                                                                                <input type="hidden" id="action" name="action" value="add">
                                                                                <input type="hidden" id="rating_create" name="rating_create">
                                                                                <textarea name="comment" id="comment" class="form-control" cols="30" rows="5" maxlength="1000" required></textarea>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <button type="submit" class="btn btn-success"> <i class="fa fa-send"></i> Review</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                @else
                                                                    <div class="col-md-12 text-center" style="border: 1px dotted #ccc;padding: 0 5px 10px 5px;">
                                                                        <h3>Please order this course for comment.</h3>
                                                                    </div>
                                                                @endif
                                                            @else
                                                                <div class="col-md-12 text-center" style="border: 1px dotted #ccc;padding: 0 5px 10px 5px;">
                                                                    <h3>Your comment is already.</h3>
                                                                </div>
                                                            @endif
                                                        @else
                                                            <div class="col-md-12 text-center mt-3" style="border: 1px dotted #ccc;padding: 0 5px 10px 5px;">
                                                                <h3>Login for comment</h3>
                                                            </div>
                                                        @endif


                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end course content container -->
                        </div>


                        {{-- Column Right Side --}}
                        <div class="col-md-3">
                            <!-- start sidebar -->
                            <aside class="mu-sidebar">

                                {{-- <form name="form_search" id="form_search" method="post"
                                    action="{{url('course/search')}}">
                                    @csrf
                                    <input type="text" name="txt_search" class="form-control"
                                        placeholder="Search our course" required>
                                </form> --}}


                                <!-- start single sidebar -->
                                <div class="mu-single-sidebar">
                                    <h4 class="side-course-header"><b>ALL COURSE</b></h4>
                                    <ul class="mu-sidebar-catg">
                                        @if(isset($data['category']))
                                            @foreach ($data['category'] as $value)
                                                <li>
                                                    {{-- <a href="{{url('course/category/'.$value->category_id.'/'.$value->category_name)}}">{{$value->category_name}}</a> --}}
                                                    <a href="{{url('course/'.$value->category_id)}}">{{$value->category_name}}</a>
                                                </li>
                                            @endforeach
                                        @endif
                                    </ul>

                                </div>
                                <!-- end single sidebar -->


                                <!-- start single sidebar -->
                                <div class="mu-single-sidebar">
                                    <h4 class="side-course-header"><b>LATEST COURSE</b></h4>
                                    <div class="mu-sidebar-popular-courses">

                                        @if(count($data['course']['last'])>0)
                                        @foreach($data['course']['last'] as $value)

                                        @if(file_exists(public_path().'/upload/member/course/images/'.$value->course_image) && $value->course_image != null)

                                            <?Php $img = asset('upload/member/course/images/'.$value->course_image);?>

                                        @else

                                            <?Php $img = asset('assets/member/images/no-image.png');?>

                                        @endif

                                        <div class="media">
                                            <div class="media-left">
                                                <a href="#">
                                                    <img class="media-object" src="{{$img}}" alt="img">
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <h4 class="media-heading"><a
                                                        href="{{url('course/detail/'.$value->course_id.'/'.$value->course_name)}}"><b>{{iconv_substr($value->course_name,0,15,'UTF-8')}}</b></a>
                                                </h4>
                                                <span
                                                    class="popular-course-price text-primary">{{number_format($value->course_price,0)}} THB</span>
                                                <p class="small">
                                                    <i class="fa fa-clock-o"></i>
                                                    {{date("d",strtotime($value->created_at))}}
                                                    {{date("M",strtotime($value->created_at))}}
                                                    {{date("Y",strtotime($value->created_at))}}
                                                </p>
                                            </div>
                                        </div>

                                        @endforeach
                                        @else

                                            {{-- @include('page.member.data_not_found') --}}
                                            <div>
                                                @for($i=1;$i<5;$i++)
                                                    <div class="col-md-12" style="margin-bottom: 20px;">
                                                        <div class="col-md-6 row">
                                                            <a href="#">
                                                                <img src="{{asset('mockup/wishlist-0'.$i.'.jpg')}}" alt="" class="img-responsive">
                                                            </a>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <a href="#">
                                                                <h6 style="margin: 0 0 0 0;">Introduction LMS plugin {{$i}}</h6>
                                                                <h6 style="color:#0072bc"><b>$ 1700</b></h6>
                                                            </a>
                                                        </div>
                                                    </div>
                                                @endfor
                                            </div>

                                        @endif

                                    </div>
                                </div>
                                <!-- end single sidebar -->

                            </aside>
                            <!-- / end sidebar -->
                        </div>
                        {{-- Column Right Side --}}



                        {{-- Start You May Link --}}
                        <div class="col-md-12 hide">
                            <div class="clear"></div>
                            <hr>

                            <!-- start related course item -->
                            <div class="row">
                                <div class="col-md-12">

                                    <div class="mu-related-item" style="margin-bottom:40px;">
                                        <h4 class="profile-head-wishlist" style="margin:0px;">YOU MAY LIKE</h4>

                                        <div class="mu-related-item-area">
                                            <div id="mu-course-container">

                                                @if(count($data['course']['reccommend'])>0)
                                                @foreach($data['course']['reccommend'] as $value)

                                                    @if(file_exists(public_path().'/upload/member/course/images/'.$value->course_image)
                                                    && $value->course_image != null)
                                                        <?Php $img = asset('upload/member/course/images/'.$value->course_image);?>
                                                    @else
                                                        <?Php $img = asset('assets/member/images/no-image.png');?>
                                                    @endif

                                                    <div class="col-lg-4 col-md-4 col-xs-12 alert">
                                                        <div class="mu-latest-course-single">
                                                            <figure class="mu-latest-course-img">
                                                                <a href="{{url('course/detail/'.$value->course_id.'/'.$value->course_name)}}">
                                                                    <img src="{{$img}}" alt="img" class="img-responsive">
                                                                </a>
                                                            </figure>
                                                            <div class="mu-latest-course-single-content">
                                                                <small><b style="color:#949494;">{{$value->first_name.' '.$value->last_name}}</b></small>
                                                                <h4><a
                                                                        href="{{url('course/detail/'.$value->course_id.'/'.$value->course_name)}}"><b>{{iconv_substr($value->course_name,0,20,'utf-8')}}</b></a>
                                                                </h4>
                                                                <div class="mu-latest-course-single-contbottom">
                                                                    <p> View {{$value->course_view}}
                                                                        <span class="mu-course-price text-primary" href="#"><b>{{number_format($value->course_price,0)}} THB</b></span>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                @endforeach
                                                @else

                                                    {{-- <div style="border: 1px dotted #ccc;padding: 10px;margin: 5px;">
                                                        @include('page.member.data_not_found')
                                                    </div> --}}

                                                    <div style="margin-bottom:20px;">
                                                        @for($i=1;$i<5;$i++)

                                                            <div class="col-md-3">
                                                                <div class="panel hvr-float-shadow">
                                                                    <div class="">
                                                                        <a href="#"><img src="{{asset('mockup/teacher.jpg')}}" alt="" class="img-teacher-small"></a>
                                                                        <a href="#"><img src="{{asset('mockup/wishlist-0'.$i.'.jpg')}}" alt="" class="img-responsive"></a>
                                                                    </div>
                                                                    <div class="panel-body">
                                                                        <a href="#"><h6 style="margin-top:20px;color:#999">KENNY WHITE</h6></a>
                                                                        <a href="#"><h5>Introduction Learn Press – LMS plugin</h5></a>
                                                                    </div>
                                                                    <div class="panel-footer col-md-12">
                                                                        <h6 class="pull-left text-muted">View 99</h6>
                                                                        <h6 class="pull-right text-danger">
                                                                            @php
                                                                                if($i==1) {
                                                                                    echo "<b style='color:red;'>FREE</b>";
                                                                                }else{
                                                                                    echo "<b style='color:#0072bc;'>1999 THB</b>";
                                                                                }
                                                                            @endphp
                                                                        </h6>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        @endfor
                                                    </div>

                                                @endif

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end start related course item -->
                        </div>
                        {{-- End You May Link --}}

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@stop


@section('javascript')

<script>
    $(document).on('click','.star',function(){
        $('#rating_create').val($(this).data('value'));
    });

    $(document).on('click','.star_edit',function(){
        $('#rating_edit').val($(this).data('value'));
    });

    $('#modalEdit').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var id = button.data('id');
        var message = button.data('message');
        var ratinged = button.data('rating');
        var modal = $(this)
        modal.find('#comment_edit').val(message);
        modal.find('#comment_id_edit').val(id);
        modal.find('#rating_edit').val(ratinged);
        for(var i=1;i<=ratinged;i++){
            modal.find('.s'+i).addClass('selected');
        }
    });
</script>

@stop
