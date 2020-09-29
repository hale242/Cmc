@extends('layouts.member.template')

@section('detail')

@if($data['step']=='step1')
<?php $title_url = 'ForgotPassword';?>
@else
<?php $title_url = 'Change New Password';?>
@endif

<section id="mu-course-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12" style="margin-bottom:80px;">
                <div class="mu-course-content-area">
                    <div class="row">

                        <div class="col-md-6 col-md-offset-3">

                            <div class="text-center" style="margin-top:50px;margin-bottom:50px;">
                                <img src="{{asset('mockup/logo_top.jpg')}}" alt="">
                            </div>

                            <!-- start login -->
                            <div id="logreg-forms">

                                @if($data['step']=='step1')

                                <form class="form-signin" method="post" action="{{url('forgotpassword/sendmail')}}">
                                    @csrf

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

                                    <div class="text-center">
                                        <h2 class="text"><b><i class="fa fa-unlock"></i> Forgot Password</b>
                                        </h2>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <input name="email" type="text" id="inputEmail" class="form-control" placeholder="Email" required autocomplete="off">
                                    </div>

                                    <button class="btn btn-new-regis" type="submit">Confirm</button>

                                </form>

                                @else

                                <form class="form-signin" method="post" action="{{url('forgotpassword/verify')}}">
                                    @csrf

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

                                    <input type="hidden" name="token_email" value="{{$data['token_email']}}">

                                    <div class="text-center">
                                        <h2 class="text text-success"><b><i class="fa fa-unlock"></i> Change New Password</b></h2>
                                    </div>


                                    <div class="form-group">
                                        <input name="password" type="password" class="form-control" placeholder="New Password" required autocomplete="off">
                                    </div>

                                    <div class="form-group">
                                        <input name="password_confirmation" type="password" class="form-control" placeholder="Confirm Password" required autocomplete="off">
                                    </div>

                                    <button class="btn btn-new-regis" type="submit">Confirm</button>

                                </form>

                                @endif

                            </div>

                            <!-- end login -->
                        </div>


                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>
    <br>
</section>

@stop
