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

                                <div class="container">
                                    <div class="text-center">
                                        <h3><b>Testing Course Score</b></h3>
                                        <p class="text-primary">{{$data['title']}}</p>
                                    </div>
                                    <hr>

                                    @if($data['status']==1)
                                        <h1 class="failico">Fail</h1>
                                    @else
                                        <h1 class="successico">Success</h1>
                                    @endif


                                    <div class="col-md-6 text-center">
                                        <h5><b>Pre test Score</b></h5>
                                        <div class="score-box">
                                            <span class="youscore"><b class="text-primary">{{$data['score_pretest']}}</b></span>
                                            <span class="fullscore"><b class="text-success"> / {{$data['question_amount']}}</b></span>
                                        </div>
                                    </div>

                                    <div class="col-md-6 text-center">
                                        <h5><b>Post test Score</b></h5>
                                        <div class="score-box">
                                            <span class="youscore"><b class="text-primary">{{$data['score_posttest']}}</b></span>
                                            <span class="fullscore"><b class="text-success"> / {{$data['question_amount']}}</b></span>
                                        </div>
                                    </div>

                                    <div class="col-md-12" align="center">
                                        <hr>
                                        @if($data['status']==1)
                                            <h5 class="alert alert-danger"><b class="text-danger">You Almost Done, Please try again.</b></h5>
                                        @else
                                            <h5 class="alert alert-success"><b class="text-success">Congratulation !! You Pass</b></h5>
                                        @endif
                                    </div>

                                    <div class="col-md-12 text-center">
                                        <a href="{{url('dashboard')}}" class="btn btn-default">
                                            <i class="fa fa-reply"></i> Back to Dashboard
                                        </a>
                                    </div>


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
    .score-box{
        width: 150px;
        height: 150px;
        border: 5px solid #20b7f0;
        border-radius: 50%;
        padding-top: 45px;
        margin: auto;
    }
    .youscore{
        font-size: 36px;
        color: #000;
    }
    .fullscore{
        font-size: 30px;
        color: #A3ACB3;
    }
    .failico{
        position: absolute;
        top: 29%;
        left: 42%;
        font-weight: bolder;
        color: red;
        font-size: 110px;
        transform: rotate(-20deg);
    }

    .successico{
        position: absolute;
        top: 33%;
        left: 37%;
        font-weight: bolder;
        color: green;
        font-size: 80px;
        transform: rotate(-20deg);
    }

</style>

@stop