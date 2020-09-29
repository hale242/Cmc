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
                            <a href="{{url('/')}}">Home</a> > <a href="{{url('/dashboard')}}">Dashboard</a> > My Profile
                        </div>
                    </div>

                    <div class="container">
                        @include('layouts.member.flash-message')
                    </div>

                    <figcaption class="container">

                        @php
                            // dd($data);
                        @endphp

                        <form action="{{url('profile/update/updateprofile')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" id="id" value="{{{$data['profile']->user_id}}}">
                            <div class="col-md-2 text-center">
                                @php
                                    if(isset($data['profile']->image)){
                                        $img = $data['profile']->image;
                                        $imgname = $data['profile']->image;
                                    }else{
                                        $img = 'no-image.png';
                                        $imgname = '';
                                    }
                                @endphp
                                <a href="{{asset('upload/profile/'.$img)}}" class="fancy-box" data-fancybox="s">
                                    <img src="{{asset('upload/profile/'.$img)}}" class="profile-img">
                                </a>
                                <input type="file" name="image" id="image" class="form-control mt-1">
                                <input type="hidden" name="imgold" id="imgold" value="{{$imgname}}">
                                <small class="text-red">Only support *.jpeg, *.jpg, *.png files.<br>Maximum of 2 mb.</small>
                            </div>
                            <div class="col-md-10">
                                {{-- Line#1 --}}
                                <div class="col-md-4 form-group">
                                    <label for="first_name">First name</label>
                                    <input type="text" name="first_name" id="first_name"  class="form-control" value="{{$data['profile']->first_name}}" maxlength="150">
                                </div>
                                <div class="col-md-4 form-group">
                                    <label for="last_name">Last name</label>
                                    <input type="text" name="last_name" id="last_name"  class="form-control" value="{{$data['profile']->last_name}}" maxlength="150">
                                </div>
                                <div class="col-md-4 form-group">
                                    <label for="last_name">Sex</label>
                                    <select name="sex" id="sex" class="form-control" >
                                        <option value="">== Select Sex ==</option>
                                        <option value="1" @if($data['profile']->sex==1) selected @endif>Male</option>
                                        <option value="2" @if($data['profile']->sex==2) selected @endif>Female</option>
                                    </select>
                                </div>
                                {{-- Line#2 --}}
                                <div class="col-md-4 form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" id="email"  class="form-control" value="{{$data['profile']->email}}" maxlength="150" disabled>
                                </div>
                                <div class="col-md-4 form-group">
                                    <label for="phone_number">Phone Number</label>
                                    <input type="text" name="phone_number" id="phone_number"  class="form-control" value="{{$data['profile']->phone_number}}" maxlength="10" >
                                </div>
                                <div class="col-md-4 form-group">
                                    <label for="birthday">Birthday</label>
                                    <input type="text" name="birthday" id="birthday"  class="form-control datepicker-input"  value="{{$data['profile']->birthday}}" >
                                </div>
                                {{-- Line#3 --}}
                                <div class="col-md-4 form-group">
                                    <label for="id_card">ID Card</label>
                                    <input type="text" name="id_card" id="id_card"  class="form-control" minlength="13" maxlength="13" value="{{$data['profile']->id_card}}" >
                                </div>
                                <div class="col-md-4 form-group">
                                    <label for="occupation">Occupation</label>
                                    <input type="text" name="occupation" id="occupation"  class="form-control"  value="{{$data['profile']->occupation}}">
                                </div>
                                <div class="col-md-4 form-group">
                                    <label for="company">Company</label>
                                    <input type="text" name="company" id="company"  class="form-control"  value="{{$data['profile']->company}}">
                                </div>
                                {{-- Line#4 --}}
                                <div class="col-md-12 form-group">
                                    <label for="address">Address</label>
                                    <input type="text" name="address" id="address"  class="form-control"  value="{{$data['profile']->address}}">
                                </div>

                                <div class="clearfix"></div>

                                <div class="col-md-12 form-group">
                                    <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Save</button>
                                    <button type="reset" class="btn btn-default"><i class="fa fa-repeat"></i> Reset</button>
                                </div>

                                <div class="clearfix"></div>
                                <hr/>

                            </div>
                        </form>


                        <form action="{{url('profile/update/changepassword')}}" method="POST">
                            @csrf
                            <input type="hidden" name="id" id="id" value="{{{$data['profile']->user_id}}}">
                            {{-- Line#5 --}}
                            <div class="alert alert-info col-md-10 col-md-offset-2 form-group mt-2">
                                <div class="col-md-6 form-group">
                                    <label for="oldpassword">Current Password</label>
                                    <input type="password" name="oldpassword" id="oldpassword"  class="form-control" minlength="8" required autocomplete="off">
                                </div>
                                <div class="clearfix"></div>
                                <div class="col-md-6 form-group">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" id="password"  class="form-control" minlength="8" required autocomplete="off">
                                    <small class="text-red">Type your password. Minimum length of 8 characters</small>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="cpassword">Confirm Password</label>
                                    <input type="password" name="cpassword" id="cpassword"  class="form-control" minlength="8" required autocomplete="off">
                                </div>
                                <div class="col-md-12 form-group">
                                    <button type="submit" class="btn btn-warning btn-change-password"><i class="fa fa-pencil-square-o"></i> Change Password</button>
                                </div>
                            </div>
                        </form>
                    </figcaption>

                </div>
            </div>
        </div>
    </div>
</section>

@stop
