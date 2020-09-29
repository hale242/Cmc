@php
if($data['page']=='All'){
$page = 'all';
}else if($data['page']=='Admin'){
$page = 'admin';
}else if($data['page']=='User'){
$page = 'user';
}else if($data['page']=='Teacher'){
$page = 'teacher';
}
@endphp


<div class="row">
    <div class="col-lg-12">
        <table class="table table-striped b-t b-light" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Create Date</th>
                    <th class="text-center">Modify Date</th>
                    <th class="text-center">Type</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @if(count($data['detail'])>0)
                @php $item = $data['detail']->firstItem(); @endphp
                @foreach($data['detail'] as $value)
                <tr>
                    <td class="text-center">{{$item++}}</td>
                    <td>{{$value->first_name}}</a></td>
                    <td>{{$value->last_name}}</td>
                    <td class="text-center">
                        @if($value->user_status==1)
                        <span class="label label-success">Activate</span>
                        @else
                        <span class="label label-warning">Draft</span>
                        @endif
                    </td>
                    <td class="text-center">{{date("d-m-Y",strtotime($value->created_at))}}</td>
                    <td class="text-center">{{date("d-m-Y",strtotime($value->updated_at))}}</td>
                    <td class="text-center">@if($value->user_type==1){{'Admin'}}@elseif($value->user_type==2){{'User'}}@elseif($value->user_type==3){{'Teacher'}}
                        @endif</td>
                    <td class="text-center">
                        <a href="{{url('admin/users/'.$page.'/edit/'.$value->user_id)}}" class="btn btn-success"
                            title="Edit"><i class="fa fa-edit"></i></a>
                        <a href="#" class="btn btn-danger"
                            onclick="confirm_delete('{{url('admin/users/delete/'.$data['page'])}}','{{$value->user_id}}');"
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
                        {{'Showing '.$data['detail']->firstItem().' - '.$data['detail']->lastItem()}} / Total : {{$data['detail']->total()}} items
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
