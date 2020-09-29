<style type="text/css">
    .text_color{
        color:#bbbbbb;
    }
    .member-menudash{
        padding-right: 0px;
        margin-top: 6px;
        padding-top: 10px;
        height: 47px;
    }
    .member-menudash a{
        margin-right:10px;
        color: #FFFFFF;
    }
    .member-menudash .active{
        color: #353535;
    }
    .profile-small{
        width: 40px;
        height: 40px;
        border-radius: 50%;
        margin-left: 10px;
        margin-top: -1px;
    }
    .text-profile-small{
        color: #FFF;
        padding-top: 7px;
        font-size: 12px;
        margin-left: 14px;
    }
</style>

    <div class="col-md-6 member-menudash">
        <a href="{{url('dashboard')}}" class="@if(Request::segment('1')=='dashboard'||Request::segment('1')=='profile') active @endif">Dashboard</a>
        <a href="{{url('mycourse')}}" class="@if(Request::segment('1')=='mycourse') active @endif">My Course</a>
        <a href="{{url('mywishlist')}}" class="@if(Request::segment('1')=='mywishlist') active @endif">My Wishlist</a>
        <a href="{{url('myorder')}}" class="@if(Request::segment('1')=='myorder') active @endif">My Order</a>
        {{-- <a href="{{url('coursebyme')}}" class="@if(Request::segment('1')=='coursebyme') text-info @else text_color @endif">Course by me</a> --}}
        @if(session('session_user_type')==3)
            <a href="{{url('managecourse')}}" class="@if(Request::segment('1')=='managecourse') active @endif" style="background-color: #0027ff;padding: 17px;">Manage Course</a>
        @endif
    </div>

    <div class="col-md-6 text-right">
        <div class="text-profile-small">
            @php
                $data = DB::table('user')->where('user_id',session('session_id'))->first();
                // dd($data);
                if($data==null){
                    header('Location: /login');
                    exit;
                }
            @endphp
            {{$data->first_name.' '.$data->last_name}}
            @php
                if(isset($data->image)){
                    $img = $data->image;
                }else{
                    $img = 'no-image.png';
                }
            @endphp

            <img src="{{asset('upload/profile/'.$img)}}" class="profile-small">
            {{-- <img src="{{ asset('mockup/avatar.jpg') }}" class="profile-small"> --}}
        </div>
    </div>



