<div class="row">
    <div class="col-lg-12">
        <table class="table table-striped b-t b-light" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th>Name</th>
                    <th >Code</th>
                    <th class="text-center">Main Status</th>
                    <th class="text-center">Status</th>
                    <th>Create Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @if(count($data['detail'])>0)
                @php $item = $data['detail']->firstItem(); @endphp
                @foreach($data['detail'] as $value)
                <tr>
                    <td class="text-center">{{$item++}}</td>
                    <td>{{$value->language_name}}</td>
                    <td>
                    {{$value->language_code}}
                    </td>
                    <td class="text-center">  @if($value->language_main==1)
                        <span class="label label-success">Main</span>
                        @else
                        <span class="label label-warning">Default</span>
                        @endif
                    </td>
                    <td class="text-center">  @if($value->language_status==1)
                        <span class="label label-success">Activate</span>
                        @else
                        <span class="label label-danger">Inactivate</span>
                        @endif
                    </td>
                    <td>{{date("d-m-Y",strtotime($value->created_at))}}</td>
                    
                    <td>
                        <a href="{{url('admin/language/main/edit/'.$value->language_id)}}" class="btn btn-success"
                            title="Edit"><i class="fa fa-edit"></i></a>
                        <a href="#" class="btn btn-danger"
                            onclick="confirm_delete('{{url('admin/language/delete/language/')}}','{{$value->language_id}}');"
                            title="Delete"><i class="fa fa-trash-o"></i></a>
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
