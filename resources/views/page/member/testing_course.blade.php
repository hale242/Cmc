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
                            <a href="{{url('/')}}">Home</a> >
                            <a href="{{url('mycourse')}}">My Courses</a> >
                            <a href="#">Testing Course</a> >
                            <a href="#" class="text-primary" title="{{$data['title']}}">
                                {{substr($data['title'],0,25)}}
                                @if(strlen($data['title'])>25)...@endif
                            </a>
                        </div>
                    </div>

                    <div class="container">
                        @include('layouts.member.flash-message')
                    </div>

                    <figcaption class="container">
                        <div class="row">

                            <div class="col-md-12">

                                {{-- <div class="container">
                                    <div align="center">
                                        <h3><b>Testing Course</b></h3>
                                        <p><a href="{{url('course/detail/'.$data['id'].'/'.$data['title'])}}"
                                target="_blank" class="text-primary">{{$data['title']}}</a></p>
                            </div> --}}
                            {{-- <hr> --}}

                            @if($data['detail']['pretest_posttest_header'])

                            <form id="testing_course_save" name="testing_course_save">

                                <input type="hidden" name="step" value="{{$data['step']}}">
                                <input type="hidden" name="course_id" value="{{$data['id']}}">
                                <input type="hidden" name="title" value="{{$data['title']}}">
                                <input type="hidden" name="test_id" value="{{$data['detail']['pretest_posttest_header']->test_id}}">
                                <input type="hidden" name="test_save_id" value="{{$data['detail']['preposttest_save']->test_save_id}}">
                                <input type="hidden" name="question_amount" value="{{count($data['detail']['question'])}}">

                                @php

                                // dd($data['id']."/".$data['title']);
                                // dd($data['detail']['preposttest_save']['pretest_score']);

                                /*
                                if($data['detail']['preposttest_save']['pretest_score']!=null){
                                $data['step'] = 2;
                                }
                                */

                                $pretestscore = $data['detail']['preposttest_save']['pretest_score'];

                                if($data['step']==1){
                                    $imagestatus = 'bat1.jpg';
                                    $textstep = 'PRE TEST';
                                }else if($data['step']==2){
                                    $imagestatus = 'bat2.jpg';
                                    $textstep = 'LESSON';
                                }else if($data['step']==3){
                                    $imagestatus = 'bat3.jpg';
                                    $textstep = 'POST TEST';
                                }else if($data['step']==9){
                                    $imagestatus = 'bat2.jpg';
                                    $textstep = 'LESSON';
                                }


                                /*echo $data['step'];*/

                                @endphp

                                <h3 class="text-center">
                                    <b>{{$data['detail']['pretest_posttest_header']->pretest_header}}</b>
                                </h3>

                                <div class="text-center">
                                    <img src="{{ asset('/mockup/'.$imagestatus) }}" alt="" style="margin: auto;"  class="img-responsive">
                                </div>


                                <h4 class="text-center mt-2" style="color:#3c429b;font-weight:bold;margin-top:20px;">
                                    {{ $textstep }}
                                    <br>
                                    <img src="{{asset('mockup/underline.png')}}" alt="">
                                </h4>



                                {{-- STEP::1 Pretest --}}
                                @if($data['step']==1)
                                <div id="step-1">
                                    <p class="text-center" style="color:#8f989c">
                                        {{$data['detail']['pretest_posttest_header']->pretest_header}}
                                    </p>

                                    @if($pretestscore!==null)
                                    <div class="text-center">
                                        <div class="alert alert-info" style="width: 250px;margin: auto;margin-bottom: 10px;">Last pretest score <span class="badge" style="background-color: #20b7f0;">{{$pretestscore}}</span></div>
                                        <a href="{{url('/mycourse/testing'."/".$data['id']."/".$data['title']."/2")}}">
                                            Skip <i class="fa fa-forward"></i>
                                        </a>
                                    </div>
                                    @endif


                                    @if((count($data['detail']['question'])>0))
                                    <?php $i = 1;$n = 0; ?>
                                    @foreach($data['detail']['question'] as $key => $value)

                                    <div class="box">

                                        <p class="txtques">
                                            {{$i.'. '.$value->question}}
                                            @if($value->question_img!='')
                                                <a href="{{asset('upload/member/question/'.$value->question_img)}}" class="fancy-box" data-fancybox="question">
                                                    <img src="{{asset('upload/member/question/'.$value->question_img)}}" alt="{{$value->question_img}}" class="img-responsive" style="margin-left: 20px;">
                                                </a>
                                            @endif
                                        </p>

                                        @if(count($data['detail']['choice'][$key])>0)
                                        <?php $y = 1; ?>
                                        @foreach($data['detail']['choice'][$key] as $choice)
                                        <div class="boxchoice">
                                            <label for="cbx{{$i.$y}}" class="label-cbx">
                                                <input id="cbx{{$i.$y}}" name="choice_pretest[{{$n}}]" type="radio"
                                                    class="invisible" value="{{$choice->choice_id}}">
                                                <div class="checkbox">
                                                    <svg width="25px" height="25px" viewBox="0 0 25 25">
                                                        <polyline points="4 11 8 15 16 6"></polyline>
                                                    </svg>
                                                </div>
                                                <span>{{$choice->choice}}</span>
                                                @if($choice->choice_img!='')
                                                    {{-- <a href="{{asset('upload/member/choice/'.$choice->choice_img)}}" class="fancy-box" data-fancybox="ans"> --}}
                                                        <img src="{{asset('upload/member/choice/'.$choice->choice_img)}}" alt="{{$choice->choice_img}}" class="img-responsive" style="margin-left: 34px;">
                                                    {{-- </a> --}}
                                                @endif
                                            </label>
                                        </div>
                                        <?php $y++; ?>
                                        @endforeach
                                        @endif

                                    </div>

                                    <?php $i++;$n++; ?>
                                    @endforeach

                                    @endif

                                    <div class="text-center">
                                        <button class="btn text-center"
                                            style="background-color:#19cc95;margin-top:20px;margin-bottom:20px;color:#FFF;width:340px;height:54px;"
                                            type="submit">Submit</button>
                                    </div>
                                </div>
                                @endif

                                {{-- STEP::2 Learning --}}
                                @if($data['step']==2)
                                <div id="step-2">

                                        <div class="col-md-12">

                                            <div style="border: 1px solid #ccc;padding:15px;border-radius: 5px;">
                                                <table class="table">
                                                    <thead>
                                                        <th class="text-blue" style="width:20%;padding: 10px 0 20px 0;">Lesson Name</th>
                                                        <th class="text-blue" style="width:50%;padding: 10px 0 20px 0;">Lesson Description</th>
                                                        <th class="text-blue" style="width:20%;padding: 10px 0 20px 0;">Document</th>
                                                        <th style="width:10%"></th>
                                                    </thead>
                                                    <tbody>

                                                        @if(!$data['detail']['lesson']->isEmpty())
                                                            @foreach($data['detail']['lesson'] as $key => $value)
                                                                <tr>
                                                                    <td style="font-weight: 600;">{{$value->lesson_name}}</td>
                                                                    <td>
                                                                        <div class="lesson_desc">
                                                                            {!!$value->lesson_content!!}
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        @if(!$data['detail']['file_lesson'][$key]->isEmpty())
                                                                            @foreach($data['detail']['file_lesson'][$key] as $value2)

                                                                                @php

                                                                                    $lesson_file[] = $value2->lesson_file;
                                                                                    $extension = explode('.',$value2->lesson_file);

                                                                                    if($extension[1]=='jpg'||$extension[1]=='jpeg'||$extension[1]=='gif'||$extension[1]=='png'||$extension[1]=='bmp'){
                                                                                        $datafile = 'ico_img.png';
                                                                                    }else if($extension[1]=='doc'||$extension[1]=='docx'){
                                                                                        $datafile = 'ico_doc.png';
                                                                                    }else if($extension[1]=='xls'||$extension[1]=='xlsx'){
                                                                                        $datafile = 'ico_xls.png';
                                                                                    }else if($extension[1]=='ppt'||$extension[1]=='pptx'){
                                                                                        $datafile = 'ico_ppt.png';
                                                                                    }else if($extension[1]=='pdf'){
                                                                                        $datafile = 'ico_pdf.png';
                                                                                    }else{
                                                                                        $datafile = 'ico_zip.png';
                                                                                    }

                                                                                @endphp

                                                                                @if(file_exists(public_path().'/upload/member/lesson/file/'.$value2->lesson_file) && $value2->lesson_file!=null)
                                                                                    <a target="_blank" href="{{url('upload/member/lesson/file/'.$value2->lesson_file)}}" <?php if($extension[1]=='jpg'||$extension[1]=='jpeg'||$extension[1]=='gif'||$extension[1]=='png'||$extension[1]=='bmp'){ echo 'data-fancybox="Download"'; } ?> title="{{$extension[0]}}">
                                                                                        <img src="{{asset('mockup/'.$datafile)}}" alt="" style="margin-bottom: 5px;">
                                                                                    </a>
                                                                                @endif

                                                                            @endforeach
                                                                        @endif
                                                                    </td>
                                                                    <td class="text-right">
                                                                        <a href="{{url('/mycourse/testing'."/".$data['id']."/".$data['title']."/9"."/".$value->lesson_id)}}" class="btn btn-primary">
                                                                            Open <i class="fa fa-play"></i>
                                                                        </a>
                                                                        {{-- <button type="button" class="btn btn-primary" onclick="show_lesson('','{{$value->lesson_vdo_url}}','','');" style="width: 100%;">Open <i class="fa fa-play"></i></button> --}}
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        @else
                                                            <tr>
                                                                <td colspan="4">@include('page.member.data_not_found')</td>
                                                            </tr>
                                                        @endif

                                                    </tbody>
                                                </table>
                                            </div>


                                        <div class="text-center">
                                            <!-- <button class="btn btn-primary nextBtn pull-right" type="submit">Next</button> -->
                                            <button class="btn text-center" style="background-color:#19cc95;margin-top:20px;margin-bottom:20px;color:#FFF;width:340px;height:54px;" type="submit">POST TEST</button>
                                        </div>
                                    </div>
                                </div>
                                @endif

                                {{-- STEP::2 Learning :: Detail --}}
                                @if($data['step']==9)
                                <div id="step-9" class="col-md-12">

                                    @foreach($data['detail']['lesson'] as $key1 => $value3)
                                        @if($value3->lesson_id==$data['lesson'])
                                            <div class="col-md-7">
                                                <div class="embed-responsive embed-responsive-16by9" style="border: 1px solid #ccc;margin-bottom: 10px;">
                                                    <iframe class="embed-responsive-item" src="{{$value3->lesson_vdo_url}}?rel=0&showinfo=0" allowfullscreen ></iframe>
                                                </div>
                                                <div>
                                                    <h4><u><b>{{$value3->lesson_name}}</b></u></h4>
                                                    <p>{!!$value3->lesson_content!!}</p>
                                                </div>
                                            </div>
                                            <div class="col-md-5">

                                                <div class="box-document">
                                                    <h4>Document</h4>
                                                    @if(!$data['detail']['file_lesson'][$key1]->isEmpty())

                                                        @foreach($data['detail']['file_lesson'][$key1] as $value2)

                                                            @php

                                                                $lesson_file[] = $value2->lesson_file;
                                                                $extension = explode('.',$value2->lesson_file);

                                                                if($extension[1]=='jpg'||$extension[1]=='jpeg'||$extension[1]=='gif'||$extension[1]=='png'||$extension[1]=='bmp'){
                                                                    $datafile = 'ico_img.png';
                                                                }else if($extension[1]=='doc'||$extension[1]=='docx'){
                                                                    $datafile = 'ico_doc.png';
                                                                }else if($extension[1]=='xls'||$extension[1]=='xlsx'){
                                                                    $datafile = 'ico_xls.png';
                                                                }else if($extension[1]=='ppt'||$extension[1]=='pptx'){
                                                                    $datafile = 'ico_ppt.png';
                                                                }else if($extension[1]=='pdf'){
                                                                    $datafile = 'ico_pdf.png';
                                                                }else{
                                                                    $datafile = 'ico_zip.png';
                                                                }

                                                            @endphp

                                                            @if(file_exists(public_path().'/upload/member/lesson/file/'.$value2->lesson_file) && $value2->lesson_file!=null)
                                                                <a target="_blank" href="{{url('upload/member/lesson/file/'.$value2->lesson_file)}}" <?php if($extension[1]=='jpg'||$extension[1]=='jpeg'||$extension[1]=='gif'||$extension[1]=='png'||$extension[1]=='bmp'){ echo 'data-fancybox="Download"'; } ?> title="{{$extension[0]}}">
                                                                    <img src="{{asset('mockup/'.$datafile)}}" alt="" style="margin-bottom: 5px;">
                                                                </a>
                                                            @endif

                                                        @endforeach
                                                    @else
                                                        <h6 class="text-center">-- Not file document --</h6>
                                                    @endif

                                                </div>


                                                <div class="border-course">
                                                    <p><u>Comment</u></p>

                                                    <div class="box-comment">

                                                        @foreach($data['detail']['lesson_comment'][$key1] as $value4)
                                                        @if($value4->comment!=null || $value4->comment!='')
                                                            <div class="col-md-12 commentline">
                                                                <div class="col-xs-3 col-sm-3 col-md-2 text-center">
                                                                    @php
                                                                        if($value4->image!=''){
                                                                            $img = $value4->image;
                                                                        }else{
                                                                            $img = 'no-image.png';
                                                                        }
                                                                    @endphp
                                                                    <img src="{{asset('upload/profile/'.$img)}}" class="img-circle img-responsive">
                                                                </div>
                                                                <div class="col-xs-9 col-sm-9 col-md-10">
                                                                    <small>{{$value4->comment}}</small>
                                                                    <br>
                                                                    <small style="font-size:10px;"><i>{{$value4->created_at}}</i></small>
                                                                    @if(session('session_id')==$value4->user_id)
                                                                        <i class="pointer fa fa-times text-red deletecomment" data-id="{{$value4->comment_id}}"></i>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="clearfix"></div>
                                                        @else
                                                            <div class="col-md-12">
                                                                <small>-- No comment --</small>
                                                            </div>
                                                        @endif
                                                        @endforeach

                                                    </div>


                                                    @if($data['detail']['lesson_comment_count'][$key1]==0)
                                                        <div class="box-post" style="margin-top: 10px;">
                                                            <label for="txtcomment">Comment</label>
                                                            <textarea name="txtcomment" id="txtcomment" cols="30" rows="3" class="form-control"></textarea>
                                                            <input type="hidden" name="txtuserid" id="txtuserid" value="{{session('session_id')}}">
                                                            <button class="btn btn-sm btn-info btn-comment" style="margin-top:5px;">Comment</button>
                                                        </div>
                                                    @else
                                                        <div class="text-center" style="margin-top: 10px;">
                                                            <h3>Your comment is already.</h3>
                                                        </div>
                                                    @endif
                                                </div>


                                            </div>



                                        @endif
                                    @endforeach

                                    <div class="clearfix"></div>
                                    <div class="col-md-12" style="margin-top: 5px">
                                        <a href="{{url('/mycourse/testing'."/".$data['id']."/".$data['title']."/2")}}" class="btn btn-primary">
                                            <i class="fa fa-backward"></i> Back
                                        </a>
                                    </div>

                                </div>
                                @endif

                                {{-- STEP::3 Postest --}}
                                @if($data['step']==3)
                                <div id="step-3">
                                    <p class="text-center" style="color:#8f989c">
                                        {{$data['detail']['pretest_posttest_header']->posttest_header}}
                                    </p>

                                    @if((count($data['detail']['question'])>0))
                                    <?php $i = 1;$n = 0; ?>
                                    @foreach($data['detail']['question'] as $key => $value)

                                    <div class="box">

                                        <p class="txtques">
                                            {{$i.'. '.$value->question}}
                                            @if($value->question_img!='')
                                                <a href="{{asset('upload/member/question/'.$value->question_img)}}" class="fancy-box" data-fancybox="question">
                                                    <img src="{{asset('upload/member/question/'.$value->question_img)}}" alt="{{$value->question_img}}" class="img-responsive" style="margin-left: 20px;">
                                                </a>
                                            @endif
                                        </p>

                                        @if(count($data['detail']['choice'][$key])>0)
                                        <?php $y = 1; ?>
                                        @foreach($data['detail']['choice'][$key] as $choice)
                                        <div class="boxchoice">
                                            <label for="cbx{{$i.$y}}" class="label-cbx">
                                                <input id="cbx{{$i.$y}}" name="choice_posttest[{{$n}}]" type="radio"
                                                    class="invisible" value="{{$choice->choice_id}}">
                                                <div class="checkbox">
                                                    <svg width="25px" height="25px" viewBox="0 0 25 25">
                                                        <polyline points="4 11 8 15 16 6"></polyline>
                                                    </svg>
                                                </div>
                                                <span>{{$choice->choice}}</span>
                                                <img src="{{asset('upload/member/choice/'.$choice->choice_img)}}" alt="{{$choice->choice_img}}" class="img-responsive" style="margin-left: 34px;">
                                            </label>
                                        </div>
                                        <?php $y++; ?>
                                        @endforeach
                                        @endif

                                    </div>

                                    <?php $i++;$n++; ?>
                                    @endforeach

                                    @endif

                                    <div class="text-center">
                                        <button class="btn text-center"
                                            style="background-color:#19cc95;margin-top:20px;margin-bottom:20px;color:#FFF;width:340px;height:54px;"
                                            type="submit">Submit</button>
                                    </div>
                                </div>

                                @endif

                            </form>

                            @else

                            @include('page.member.data_not_found')

                            @endif

                        </div>

                </div>

            </div>
            </figcaption>

        </div>
    </div>
    </div>
    </div>
</section>

<style>
    .box-document{
        padding: 0 10px 10px 10px;
        border-radius: 5px;
        border: 1px solid #ccc;
        margin-bottom: 10px;
    }
    .box-comment{
        overflow: auto;
        max-height: 300px;
    }
    .box-comment img{
        width:35px;
        height:35px;
        margin-top:50%;
        border:1px solid #ccc;
    }
    .commentline{
        border-bottom: 1px dotted #ccc;
        padding: 10px 0 10px 0
    }
    .table td{
        padding: 20px 0 20px 8px !important;
    }
    .box {
        padding: 40px 60px 40px 60px;
        border: 1px solid #ddd;
        margin-top: 20px;
    }

    .txtques {
        font-weight: bold;
        font-size: 16px;
        color: #0072bc;
        margin-bottom: 30px;
    }

    .boxchoice {
        margin-top: 25px;
        margin-bottom: 25px;
    }

    .label-cbx {
        user-select: none;
        cursor: pointer;
        margin-bottom: 0;
        font-weight: 400;
    }

    .label-cbx input:checked+.checkbox {
        border-color: #737a7d;
    }

    .label-cbx input:checked+.checkbox svg path {
        fill: #20C2E0;
    }

    .label-cbx input:checked+.checkbox svg polyline {
        stroke-dashoffset: 0;
    }

    .label-cbx:hover .checkbox svg path {
        stroke-dashoffset: 0;
    }

    .label-cbx .checkbox {
        position: relative;
        top: 2px;
        float: left;
        margin-right: 8px;
        margin-top: 0px;
        margin-bottom: 0px;
        width: 25px;
        height: 25px;
        border: 1px solid #a2acb1;
        border-radius: 3px;
        box-shadow: 2px 2px 1px #d4d4d3;
    }

    .label-cbx .checkbox svg {
        position: absolute;
        top: 1px;
        left: 1px;
    }

    .label-cbx .checkbox svg path {
        fill: none;
        stroke: #20C2E0;
        stroke-width: 2;
        stroke-linecap: round;
        stroke-linejoin: round;
        stroke-dasharray: 71px;
        stroke-dashoffset: 71px;
        transition: all 0.6s ease;
    }

    .label-cbx .checkbox svg polyline {
        fill: none;
        stroke: #333;
        stroke-width: 2;
        stroke-linecap: round;
        stroke-linejoin: round;
        stroke-dasharray: 20px;
        stroke-dashoffset: 20px;
        transition: all 0.3s ease;
    }

    .label-cbx>span {
        pointer-events: none;
        vertical-align: middle;
    }

    .cntr {
        position: absolute;
        top: 45%;
        left: 0;
        width: 100%;
        text-align: center;
    }

    .invisible {
        position: absolute;
        z-index: -1;
        width: 0;
        height: 0;
        opacity: 0;
    }

    .panel-learning{
        padding: 15px;
        border: 1px solid #bce8f1;
        margin-top: -15px;
    }

    .lesson_desc{
        font-size:12px;
        color:#999;
    }

</style>

@stop


@section('javascript')
<script>
    $('.btn-comment').click(function(){
        var comment = $('#txtcomment').val();
        var userid = $('#txtuserid').val();

        var id = "{{$data['id']}}";
        var title = "{{$data['title']}}";
        var step = "{{$data['step']}}";
        var lesson = "{{$data['lesson']}}";

        var url = '{{url("mycourse/addcomment")}}'+'/'+'{{session('session_id')}}'+'/'+lesson+'/'+comment;

        $.get(url,function(data){
            if(data!=0){
                window.location.reload();
            }
        });
    });

    $(document).on('click', '.deletecomment', function(){
        // console.log($(this).data('id'));
        var comment_id = $(this).data('id');
        var url = '{{url("mycourse/deletecomment")}}'+'/'+comment_id;
        $.get(url,function(data){
            if(data!=0){
                window.location.reload();
            }
        });
    });


</script>
@stop
