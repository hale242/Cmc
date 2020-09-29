<div class="card-body">
    <div class="basic-elements" style="padding:10px;">

        <form action="{{url('admin/setting/'.$data['page'].'/action')}}" method="post" enctype="multipart/form-data">
            @csrf

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

            @if($data['page']=='Website')
                @php
                    $setting = $data['setting'][0];
                    // dd($setting->title_web);
                    // dd($data['setting'][0]->title_web);
                @endphp
                <div class="row">
                    <div class="col-md-12">

                        <div class="col-md-12 m-t text-right">
                            <label class="switch switch-sm" title="Open | Close Status" >
                                <p>Status web</p>
                                <input name="statusweb" id="statusweb" type="checkbox" @if($setting->status_web==1) checked @endif value="1"><span style="padding-top:5px;padding-right:4px;">ON OFF</span>
                            </label>
                        </div>
                        <div class="col-md-6">
                            <label for="titleweb">Title Website</label>
                            <input type="text" class="form-control input-sm" name="titleweb" id="titleweb" value="{{$setting->title_web}}">
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-md-6 m-t">
                            <label for="titleweb">Email Main Website <small class="text-danger">(Email หลักสำหรับส่งเมล์)</small></label>
                            <input type="email" class="form-control input-sm" name="emailweb" id="emailweb" value="{{$setting->email_web}}">
                        </div>
                        <div class="col-md-6 m-t">
                            <label for="phoneweb">Phone Main Website</label>
                            <input type="text" class="form-control input-sm" name="phoneweb" id="phoneweb" value="{{$setting->phone_web}}">
                        </div>

                        <div class="col-md-12 m-t">
                            <label for="descriptionweb">รายละเอียดเกี่ยวกับเว็บไซต์ <span class="text-danger">(ตัวอย่าง คอร์สเรียน สอนออนไลน์ เรียนออนไลน์)</span></label>
                            <textarea name="descriptionweb" id="descriptionweb" cols="30" rows="5" class="form-control input-sm">{{$setting->seo_description}}</textarea>
                        </div>

                        <div class="col-md-6 m-t">
                            <label for="footerweb">Footer Main Website</label>
                            <input type="text" class="form-control input-sm" name="footerweb" id="footerweb" value="{{$setting->footer_web}}">
                        </div>

                        <div class="col-md-12 m-t text-right">
                            <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-save"></i> Submit</button>
                            <button type="reset" class="btn btn-sm btn-dark"><i class="fa fa-repeat"></i> Reset</button>
                        </div>
                    </div>
                </div>
            @endif

        </form>

    </div>
</div>
