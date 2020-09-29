<div class="row">
    <div class="col-sm-12">

        <form class="form-horizontal" action="{{url('admin/language/'.$data['page'].'/action')}}" method="post"
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



            @if($data['page']=='Main')

            @if(isset($data['detail']['language_name']))
            <?php $language_name = $data['detail']['language_name'];?>
            @else
            <?php $language_name = null;?>
            @endif

            @if(isset($data['detail']['language_code']))
            <?php $language_code = $data['detail']['language_code'];?>
            @else
            <?php $language_code = null;?>
            @endif
            
            @if(isset($data['detail']['language_details']))
            <?php $language_details = $data['detail']['language_details'];?>
            @else
            <?php $language_details = null;?>
            @endif

            @if(isset($data['detail']['language_main']))
            <?php $language_main = $data['detail']['language_main'];?>
            @else
            <?php $language_main = null;?>
            @endif

            @if(isset($data['detail']['language_status']))
            <?php $status = $data['detail']['language_status'];?>
            @else
            <?php $status = null;?>
            @endif

            <section class="panel panel-default">
                <header class="panel-heading">
                    <span class="h4">{{$data['action']}} Language</span>
                </header>
                <div class="panel-body">
                    <div class="form-group pull-in clearfix">
                        
                        <div class="clearfix"></div>
                        <div class="col-sm-7">
                            <label>Language Name</label>
                            <input name="language_name" type="text" class="form-control" placeholder="Language Name"
                                value="{{$language_name}}" required>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-sm-7 m-t">
                            <label>Language Code</label>
                            <input name="language_code" type="text" class="form-control" placeholder="Language Code"
                                value="{{$language_code}}" required>
                        </div>
                        <div class="col-sm-12">
                            <br>
                            <label>Description</label>
                            <textarea name="language_details" id="full_content" class="form-control "
                                placeholder="Description">{{$language_details}}</textarea>
                        </div>
                        <div class="col-sm-5">
                            <div class="line line-dashed line-lg pull-in"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Language Main</label>
                                <div class="col-sm-10">
                                    <label class="switch">
                                        <input name="language_main" type="checkbox" @if($language_main==1){{'checked'}}@endif
                                            value="1">
                                        <span></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="line line-dashed line-lg pull-in"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Status</label>
                                <div class="col-sm-10">
                                    <label class="switch">
                                        <input name="language_status" type="checkbox" @if($status==1){{'checked'}}@endif
                                            value="1">
                                        <span></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <footer class="panel-footer text-right bg-light lter">
                        <button type="submit" class="btn btn-success btn-s-xs">Save</button>
                        <button type="reset" class="btn btn-danger btn-s-xs">Cancel</button>
                    </footer>
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

        var editor = CKEDITOR.replace( 'full_content', {
            filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form'
        } );
        editor.on( 'change', function( evt ) {
            $('#full_content').val(evt.editor.getData());
        });

    });

</script>
@stop