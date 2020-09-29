<div class="row">
    <div class="col-sm-12">

        <form class="form-horizontal" action="{{url('admin/users/'.$data['page'].'/action')}}" method="post"
            enctype="multipart/form-data">
            @csrf

            <input type="hidden" name="type_action" value="{{$data['action']}}">

            <input type="hidden" name="id" value="@if(isset($data['id'])){{$data['id']}}@else{{''}}@endif">

            @include('layouts.admin.flash-message')

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

            @php
            if(isset($data['detail']['image'])){
            $img = asset('upload/profile/'.$data['detail']['image']);
            }else{
            $img = asset('upload/profile/no-image.png');
            }

            (isset($data['detail']['first_name']) ? $first_name = $data['detail']['first_name'] : $first_name = null);
            (isset($data['detail']['last_name']) ? $last_name = $data['detail']['last_name'] : $last_name = null);
            (isset($data['detail']['email']) ? $email = $data['detail']['email'] : $email = null);
            (isset($data['detail']['sex']) ? $sex = $data['detail']['sex'] : $sex = null);
            (isset($data['detail']['birthday']) ? $birthday = $data['detail']['birthday'] : $birthday = null);
            (isset($data['detail']['phone_number']) ? $phone = $data['detail']['phone_number'] : $phone = null);
            (isset($data['detail']['address']) ? $address = $data['detail']['address'] : $address = null);
            (isset($data['detail']['id_card']) ? $id_card = $data['detail']['id_card'] : $id_card = null);
            (isset($data['detail']['occupation']) ? $occupation = $data['detail']['occupation'] : $occupation = null);
            (isset($data['detail']['company']) ? $company = $data['detail']['company'] : $company = null);
            (isset($data['detail']['user_status']) ? $status = $data['detail']['user_status'] : $status = null);
            (isset($data['detail']['user_type']) ? $type = $data['detail']['user_type'] : $type = null);

            @endphp


            @if(isset($data['detail']['image']))
            <input type="hidden" name="img_hidden" value="{{$data['detail']['image']}}">
            @endif

            <section class="panel panel-default">
                <header class="panel-heading">
                    <span class="h4">{{$data['action']}} {{$data['page']}}</span>
                </header>
                <div class="panel-body">

                    <div class="col-sm-6">

                        <div class="col-sm-12 form-group">
                            <label>First Name <small class="text-danger">*</small></label>
                            <input name="first_name" type="text" class="form-control" placeholder="First Name"
                                value="{{$first_name}}" required>
                        </div>

                        <div class="col-sm-12 form-group">
                            <label>Last Name <small class="text-danger">*</small></label>
                            <input name="last_name" type="text" class="form-control" placeholder="Last Name"
                                value="{{$last_name}}" required>
                        </div>

                        <div class="col-sm-12 form-group">
                            <div class="text-left">
                                <a href="{{$img}}" target="_blank" data-fancybox="profile">
                                    <img src="{{$img}}" class="img-thumbnail" style="max-height: 200px;">
                                </a>
                            </div>
                            <label>Upload image</label>
                            <input type="file" name="img" class="form-control" id="img">
                            <p class="text-danger">Only support jpeg, jpg, png files. || Upload file a maximum of 2 mb.
                            </p>
                        </div>

                        <div class="clearfix"></div>

                        <div class="col-sm-12 form-group">
                            <label>Email <small class="text-danger">*</small></label>
                            <input name="email" type="email" class="form-control" placeholder="Email" value="{{$email}}"
                                required>
                        </div>

                        @if($data['action']=='Create')

                        <div class="col-sm-12 form-group">
                            <label>Password <small class="text-danger">*</small></label>
                            <input name="password" type="text" class="form-control" placeholder="Password 8 digits"
                                maxlength="8" id="show_gen_pass" required>
                            <button type="button" class="btn btn-primary btn-sm m-t-sm" onclick="gen_pass(8);">Generate
                                password</button>
                        </div>

                        @endif

                        <div class="col-sm-12 form-group">
                            <label>Phone <small class="text-danger">*</small></label>
                            <input name="phone" type="text" class="form-control" placeholder="Phone 10 digits"
                                minlength="10" value="{{$phone}}">
                        </div>

                        <div class="col-sm-12 form-group">
                            <label>Address</label>
                            <textarea name="address" class="form-control" placeholder="Address">{{$address}}</textarea>
                        </div>

                    </div>

                    <div class="col-sm-6">

                        <div class="col-sm-12 form-group">
                            <label>Sex</label>
                            <select name="sex" class="form-control">
                                <option value="">Select</option>
                                <option value="1" @if($sex==1){{'selected'}}@endif>Male</option>
                                <option value="2" @if($sex==2){{'selected'}}@endif>Famale</option>
                            </select>
                        </div>

                        <div class="col-sm-12 form-group">
                            <label>Birthday</label>
                            <input name="birthday" type="text" class="form-control datepicker-input"
                                placeholder="Birthday" value="{{$birthday}}">
                        </div>

                        <div class="col-sm-12 form-group">
                            <label>ID Card No. <small class="text-danger">*</small></label>
                            <input name="id_card" type="text" class="form-control" maxlength="13"
                                placeholder="ID Card No 13 digits" value="{{$id_card}}" required>
                        </div>

                        <div class="col-sm-12 form-group">
                            <label>Occupation</label>
                            <input name="occupation" type="text" class="form-control" placeholder="Occupation"
                                value="{{$occupation}}">
                        </div>

                        <div class="col-sm-12 form-group">
                            <label>Company</label>
                            <input name="company" type="text" class="form-control" placeholder="Company"
                                value="{{$company}}">
                        </div>

                        <div class="col-sm-12 form-group">
                            <label>User type</label>
                            <select name="type" class="form-control" required>
                                <option value="">Select</option>
                                <option value="1" @if($type==1){{'selected'}}@endif>Admin</option>
                                <option value="2" @if($type==2){{'selected'}}@endif>User</option>
                                <option value="3" @if($type==3){{'selected'}}@endif>Teacher</option>
                            </select>
                        </div>

                        <div class="col-sm-5 form-group">
                            <div class="form-group">
                                <label class="col-sm-3 control-label text-right">Status</label>
                                <div class="col-sm-9">
                                    <label class="switch">
                                        <input name="status" type="checkbox" @if($status==1){{'checked'}}@endif value="1">
                                        <span style="padding: 5px 3px;">ON&nbsp;&nbsp;OFF</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <footer class="text-right bg-light lter">
                        <button type="submit" class="btn btn-success btn-s-xs">Save</button>
                        <button type="reset" class="btn btn-danger btn-s-xs">Cancel</button>
                        <a href="{{url('admin/users/all')}}" class="btn btn-info btn-s-xs">Back</a>
                    </footer>

            </section>

        </form>

    </div>
</div>

<script type="text/javascript">
function gen_pass(length) {
   var result           = '';
   var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
   var charactersLength = characters.length;
   for ( var i = 0; i < length; i++ ) {
      result += characters.charAt(Math.floor(Math.random() * charactersLength));
   }

   $("#show_gen_pass").val(result);
}
</script>
