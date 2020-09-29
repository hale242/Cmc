@extends('layouts.member.template')

@section('detail')

<section id="mu-course-content">
    <div class="container">
        <div class="row">
            {{-- <div class="col-md-12 text-left">
                <a href="{{url('/')}}">Home</a> > <a href="{{url('register')}}" class="text text-primary">Register</a>
                <hr>
            </div> --}}
            <div class="col-md-12" style="margin-bottom:80px;">
                <div class="mu-course-content-area">
                    <div class="row">

                        <div class="col-md-6 col-md-offset-3">

                            <div class="text-center" style="margin-top:50px;margin-bottom:50px;">
                                <img src="{{asset('mockup/logo_top.jpg')}}" alt="">
                            </div>

                            <!-- start register -->
                            <div id="logreg-forms">

                                <form class="form-signin" method="post" action="{{url('register/create')}}"  >
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
                                        {{-- <h2 class="text text-primary"><b><i class="fa fa-user"></i> Register</b></h2> --}}
                                        <h2 class="text text-dark"><b>Register</b></h2>
                                    </div>

                                    <div class="form-group">
                                        <label for="">First Name</label>
                                        <input name="first_name" type="text" class="form-control" required autofocus="" autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Last Name</label>
                                        <input name="last_name" type="text" class="form-control" required autofocus="" autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Email Address</label>
                                        <input name="email" type="email" class="form-control" required autofocus="" autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Password</label>
                                        <input name="password" type="password" class="form-control" minlength="8" required autofocus="" autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Confirm password</label>
                                        <input name="password_confirmation" type="password" class="form-control" minlength="8" required autofocus="" autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Company / Hospital / University</label>
                                        <input name="company" type="text" class="form-control" required autofocus="" autocomplete="off">
                                        <input name="event" type="hidden" class="form-control" value="{{$data['evcode']}}" autocomplete="off">
                                    </div>

                                    <div class="form-group">

                                        <div class="boxchoice">
                                            <label for="term_chk" class="label-cbx">
                                                <input id="term_chk" name="term_chk" type="checkbox" class="check_cat invisible" data-st="n" value="" autofocus="">
                                                <div class="checkbox">
                                                    <svg width="20px" height="20px" viewBox="0 0 25 25">
                                                        <polyline points="4 11 8 15 16 6"></polyline>
                                                    </svg>
                                                </div>
                                                <span style="font-weight:300">I accept the </span>
                                            </label>
                                            <div class="terms pointer" data-toggle="modal" data-target=".bd-example-modal-lgx">Terms and Conditions.</div>
                                        </div>

                                    </div>

                                    <button class="btn btn-new-regis" type="submit">New Registration</button>

                                    <div class="clearfix"></div>

                                    <div class="text-center" style="margin-top: 40px;">
                                        <span>Already have an account?</span> <a href="{{ url('login') }}" style="color:red">Log in</a>
                                    </div>


                                </form>

                            </div>

                            <!-- end register -->
                        </div>


                    </div>

                </div>

            </div>
        </div>
    </div>
    </div>
    </div>

    <div class="modal fade bd-example-modal-lgx" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content" style="padding: 20px;">
                <div class="modal-body">
                    <h2>Terms & Conditions</h2>
                    <hr>
                    <p class="text-justify">
                        The standard Lorem Ipsum passage, used since the 1500s "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
                    </p>
                    <p class="text-justify">
                        The standard Lorem Ipsum passage, used since the 1500s "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
                    </p>
                    <p class="text-justify">
                        The standard Lorem Ipsum passage, used since the 1500s "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
                    </p>
                    <p class="text-justify">
                        The standard Lorem Ipsum passage, used since the 1500s "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
                    </p>
                    <div class="text-center" style="margin-top: 20px;">
                        <button type="button" class="btn btn-success" data-dismiss="modal" style="width:200px;height:50px;font-size: 18px;">Accept</button>
                    </div>
                </div>
            </div>
        </div>

    </div>


</section>

@stop
