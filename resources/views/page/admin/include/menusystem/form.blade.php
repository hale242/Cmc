<div class="row">
    <div class="col-sm-12">

        <form class="form-horizontal" action="{{url('admin/menusystem/'.$data['page'].'/action')}}" method="post" enctype="multipart/form-data">
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


            @if($data['page']=='Main')
            @if(isset($data['data_detail']['menu_system_path']))
            <?php $menu_system_path = $data['data_detail']['menu_system_path']; ?>
            @else
            <?php $menu_system_path = null; ?>
            @endif

            @if(isset($data['data_detail']['menu_system_icon']))
            <?php $menu_system_icon = $data['data_detail']['menu_system_icon']; ?>
            @else
            <?php $menu_system_icon = null; ?>
            @endif

            @if(isset($data['data_detail']['menu_system_main_menu ']))
            <?php $menu_system_main_menu  = $data['data_detail']['menu_system_main_menu ']; ?>
            @else
            <?php $menu_system_main_menu  = null; ?>
            @endif

            @if(isset($data['data_detail']['menu_system_z_index']))
            <?php $menu_system_z_index = $data['data_detail']['menu_system_z_index']; ?>
            @else
            <?php $menu_system_z_index = null; ?>
            @endif

            @if(isset($data['data_detail']['menu_system_status']))
            <?php $menu_system_status = $data['data_detail']['menu_system_status']; ?>
            @else
            <?php $menu_system_status = null; ?>
            @endif


            <section class="panel panel-default">

                <header class="panel-heading">
                    <span class="h4">{{$data['action']}} Menu System</span>
                </header>
                <div class="panel-body">

                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        @foreach($data['detail']['Language'] as $val)
                        <li class="nav-item {{ $val->language_main == '1' ? 'active' : ''}}">
                            <a class="nav-link" id="{{ $val->language_id }}" data-toggle="tab" href="#{{ $val->language_id }}-add" role="tab" aria-controls="home">{{ $val->language_name }}</a>
                        </li>
                        @endforeach
                        <li class="nav-item">
                            <a class="nav-link" id="Setting" data-toggle="tab" href="#setting" role="tab" aria-controls="home">Setting</a>
                        </li>
                    </ul>

                    <div class="tab-content" id="myTabContent">
                        @if(isset($data['data_detail']['MenuSystemLang']))

                        @foreach($data['data_detail']['MenuSystemLang'] as $val)

                        @if(isset($data['data_detail']['menu_system_lang_code']))
                        <?php $menu_system_lang_code = $data['data_detail']['menu_system_lang_code']; ?>
                        @else
                        <?php $menu_system_lang_code = null; ?>
                        @endif

                        @if(isset($data['data_detail']['menu_system_lang_name']))
                        <?php $menu_system_lang_name = $data['data_detail']['menu_system_lang_name']; ?>
                        @else
                        <?php $menu_system_lang_name = null; ?>
                        @endif

                        @if(isset($data['data_detail']['menu_system_lang_details']))
                        <?php $menu_system_lang_details = $data['data_detail']['menu_system_lang_details']; ?>
                        @else
                        <?php $menu_system_lang_details = null; ?>
                        @endif

                        @if(isset($data['data_detail']['menu_system_lang_status']))
                        <?php $menu_system_lang_status = $data['data_detail']['menu_system_lang_status']; ?>
                        @else
                        <?php $menu_system_lang_status = null; ?>
                        @endif

                        <div class="tab-pane fade {{ $val->language_id == '1' ? 'active in' : ''}}" id="{{ $val->language_id }}-add" role="tabpanel" aria-labelledby="{{ $val->language_id }}">

                            <div class="form-group pull-in clearfix">
                                <input name="lag['{{$val->language_id}}'][language_id]" type="hidden" value="{{ $val->language_id }}">
                                <input name="lag['{{$val->language_id}}'][menu_system_lang_code]" type="hidden" value="{{ $val->menu_system_lang_code }}">

                                <!-- <div class="col-sm-7 m-t">
                                    <label>Menu Code</label>
                                    <input name="lag['{{$val->language_id}}'][menu_system_lang_code]" type="text" class="form-control" placeholder="Menu Code" value="{{ $val->menu_system_lang_code }}" required>
                                </div> -->
                                <div class="col-sm-7 m-t">
                                    <label>Menu Name</label>
                                    <input name="lag['{{$val->language_id}}'][menu_system_lang_name]" type="text" class="form-control" placeholder="Menu Name" value="{{ $val->menu_system_lang_name }}" required>
                                </div>
                                <div class="col-sm-7 m-t">
                                    <label>Detail</label>
                                    <input name="lag['{{$val->language_id}}'][menu_system_lang_details]" type="text" class="form-control" placeholder="Detail" value="{{ $val->menu_system_lang_details }}" required>
                                </div>
                                <div class="col-sm-6">
                                    <div class="line line-dashed line-lg pull-in"></div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Status</label>
                                        <div class="col-sm-10">
                                            <label class="switch">
                                                <input name="lag['{{$val->language_id}}'][menu_system_lang_status]" type="checkbox" @if($menu_system_lang_status==1){{'checked'}}@endif value="1">
                                                <span></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @else
                        @foreach($data['detail']['Language'] as $val)

                        <div class="tab-pane fade {{ $val->language_main == '1' ? 'active in' : ''}}" id="{{ $val->language_id }}-add" role="tabpanel" aria-labelledby="{{ $val->language_id }}">

                            <div class="form-group pull-in clearfix">
                                <input name="lag['{{$val->language_id}}'][language_id]" type="hidden" value="{{ $val->language_id }}">
                                <input name="lag['{{$val->language_id}}'][menu_system_lang_code]" type="hidden" value="{{ $val->language_code }}">

                                <!-- <div class="col-sm-7 m-t">
                                    <label>Menu Code</label>
                                    <input name="lag['{{$val->language_id}}'][menu_system_lang_code]" type="text" class="form-control" placeholder="Menu Code" value="" required>
                                </div> -->
                                <div class="col-sm-7 m-t">
                                    <label>Menu Name</label>
                                    <input name="lag['{{$val->language_id}}'][menu_system_lang_name]" type="text" class="form-control" placeholder="Menu Name" value="" required>
                                </div>
                                <div class="col-sm-7 m-t">
                                    <label>Detail</label>
                                    <input name="lag['{{$val->language_id}}'][menu_system_lang_details]" type="text" class="form-control" placeholder="Detail" value="" required>
                                </div>
                                <div class="col-sm-6">
                                    <div class="line line-dashed line-lg pull-in"></div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Status</label>
                                        <div class="col-sm-10">
                                            <label class="switch">
                                                <input name="lag['{{$val->language_id}}'][menu_system_lang_status]" type="checkbox" value="1">
                                                <span></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endif

                        <div class="tab-pane fade" id="setting" role="tabpanel" aria-labelledby="setting">

                            <div class="form-group pull-in clearfix">
                                <input name="menu_system[menu_system_main_menu]" type="hidden" value="0">
                                <div class="col-sm-6 m-t">
                                    <label>Link</label>
                                    <input name="menu_system[menu_system_path]" type="text" class="form-control" placeholder="Link" value="{{ $menu_system_path }}" required>
                                </div>
                                <div class="col-sm-6 m-t">
                                    <label>Icon</label>
                                    <input name="menu_system[menu_system_icon]" type="text" class="form-control" placeholder="Icon" value="{{ $menu_system_icon }}" required>
                                </div>
                                <div class="col-sm-6 m-t">
                                    <label>Order By</label>
                                    <input name="menu_system[menu_system_z_index]" type="number" class="form-control" placeholder="Order By" value="{{ $menu_system_z_index }}" required>
                                </div>
                                <div class="col-sm-12">
                                    <div class="line line-dashed line-lg pull-in"></div>
                                    <div class="form-group">
                                        <label class="col-sm-1 control-label">Status</label>
                                        <div class="col-sm-10">
                                            <label class="switch">
                                                <input name="menu_system[menu_system_status]" id='menu_system_status' type="checkbox" @if($menu_system_status==1){{'checked'}}@endif value="1">
                                                <span></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <footer class="panel-footer text-right bg-light lter">
                            <button type="submit" class="btn btn-success btn-s-xs">Save</button>
                            <button type="reset" class="btn btn-danger btn-s-xs">Cancel</button>
                        </footer>
                    </div>
                </div>
            </section>
            @endif
        </form>

    </div>
</div>

@section('javascript')

<!-- ckeditor -->
<script>
    $(document).ready(function() {

        var url = '<?php echo url()->current(); ?>';
        var res = url.split('/');

        var editor = CKEDITOR.replace('full_content', {
            filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form'
        });
        editor.on('change', function(evt) {
            $('#full_content').val(evt.editor.getData());
        });


    });
</script>
@stop