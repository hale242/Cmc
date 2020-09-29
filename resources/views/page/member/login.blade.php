@extends('layouts.member.template')



@section('detail')

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

                                <form class="form-signin" method="post" action="{{url('login/auth')}}">
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

                                    <div class="text-center" style="margin-bottom:20px;">
                                        <h2 class="text text-dark"><b>Login</b></h2>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Email Address</label>
                                        <input name="email" type="text" id="inputEmail" class="form-control" value="@if(isset($_COOKIE['remember_email_user'])){{$_COOKIE['remember_email_user']}}@endif" required autocomplete="off">
                                    </div>
                                    <div class="form-group" style="margin-bottom: 0 !important;">
                                        <label for="">Password</label>
                                        <input name="password" type="password" id="inputPassword" class="form-control" value="@if(isset($_COOKIE['remember_password_user'])){{$_COOKIE['remember_password_user']}}@endif" required autocomplete="off">
                                    </div>

                                    <div class="text-left pull-left" style="margin-bottom: 20px;">
                                        {{-- <input type="checkbox" name="remember_login_user" @if(isset($_COOKIE['remember_login_user'])){{'checked'}}@endif> Remember me --}}

                                        <div class="boxchoice">
                                            <label for="remem_chk" class="label-cbx">
                                                <input id="remem_chk" name="remem_chk" type="checkbox" class="check_cat invisible" data-st="n" value="" autofocus="" @if(isset($_COOKIE['remember_login_user'])){{'checked'}}@endif>
                                                <div class="checkbox">
                                                    <svg width="20px" height="20px" viewBox="0 0 25 25">
                                                        <polyline points="4 11 8 15 16 6"></polyline>
                                                    </svg>
                                                </div>
                                                <span style="font-weight:300">Remember me</span>
                                            </label>
                                        </div>

                                    </div>

                                    <a href="{{url('forgotpassword')}}" class="pull-right" style="margin-top: 12px;margin-bottom: 20px;color: #848a90;">Forgot Password?</a>

                                    <button class="btn btn-new-regis" type="submit">Login</button>

                                    <div class="clearfix"></div>

                                    <div class="text-center" style="margin-top: 40px;">
                                        <span>Don't have an account? </span> <a href="{{ url('register') }}" style="color:red">Register now</a>
                                    </div>


                                </form>

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
