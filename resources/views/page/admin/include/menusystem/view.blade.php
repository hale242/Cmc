
<div class="row">

    <div class="col-lg-12">
        <table class="table table-striped b-t b-light" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th>Name Menu</th>
                    <th>Link</th>
                    <th class="text-center">Icon</th>
                    <th class="text-center">Order By</th>
                    <th class="text-center">Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @if(count($data['detail'])>0)
                @php $item = $data['detail']->firstItem(); @endphp
                @foreach($data['detail'] as $value)
                <tr>
                    <td class="text-center">{{$item++}}</td>
                    <td>
                        @foreach($value->MenuSystemLang as $val)
                        {{ $val->menu_system_lang_name }}</br>
                        @endforeach
                    </td>
                    <td>{{$value->menu_system_path}}</td>
                    <td class="text-center">{{$value->menu_system_icon}}</td>
                    <td class="text-center">{{$value->menu_system_z_index}}</td>
                    <td class="text-center"> @if($value->menu_system_status==1)
                        <span class="label label-success">Activate</span>
                        @else
                        <span class="label label-danger">Inactivate</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{url('admin/menusystem/main/edit/'.$value->menu_system_id)}}" class="btn btn-success" title="Edit"><i class="fa fa-edit"></i></a>
                        <a href="javascript:;" class="btn btn-info SubMenu" id="{{ $value->menu_system_id }}" title="Sub Menu"><i class="fa fa-bars"></i></a>
                        <!-- <a href="{{url('admin/menusystem/main/submenu/'.$value->menu_system_id)}}" class="btn btn-info" title="Sub Menu"><i class="fa fa-bars"></i></a> -->
                        <a href="#" class="btn btn-danger" onclick="confirm_delete('{{url('admin/menusystem/delete/menusystem/')}}','{{$value->menu_system_id}}');" title="Delete"><i class="fa fa-trash-o"></i></a>
                    </td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="10" class="text-danger">
                        <div align="center">{{trans('other.data_not_found')}}</div>
                    </td>
                </tr>
                @endif
            </tbody>
        </table>

        <footer class="panel-footer">
            <div class="row">
                <div class="col-sm-2 text-left">
                    <small class="text-muted inline m-t-sm m-b-sm">
                        {{'Showing '.$data['detail']->firstItem().' - '.$data['detail']->lastItem()}} / Total :
                        {{$data['detail']->total()}} items
                    </small>
                </div>
                <div class="col-sm-8 text-center">
                </div>
                <div class="col-sm-2 text-right">
                    {{$data['detail']->links()}}
                </div>
            </div>
        </footer>
    </div>
</div>