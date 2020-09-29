@if($data['page']=='Main')
    <div class="row">
        <div class="col-lg-12">
            <table class="table table-striped b-t b-light" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th style="width:1%">#</th>
                        <th style="width:14%">Course name</th>
                        <th style="width:13%">Category Name</th>
                        <th style="width:13%">Teacher name</th>
                        <th style="width:9%" class="text-center">Status</th>
                        <th style="width:10%" class="text-center">Create Date</th>
                        <th style="width:10%" class="text-center">Modify Date</th>
                        <th style="width:5%" class="text-center">Price</th>
                        <th style="width:5%" class="text-center">Subscription</th>
                        <th style="width:10%" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($data['detail'])>0)
                    <?php $i = 1;?>
                    @foreach($data['detail'] as $key => $value)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$value->course_name}}</a></td>
                        <td>{{$value->category_name}}</td>
                        <td>{{$value->first_name.' '.$value->last_name}}</td>
                        <td class="text-center">
                            @if($value->course_status==1)
                            <span class="label label-success">Activate</span>
                            @else
                            <span class="label label-warning">Draft</span>
                            @endif
                        </td>
                        <td class="text-center">{{date("d-m-Y",strtotime($value->date_create))}}</td>
                        <td class="text-center">{{date("d-m-Y",strtotime($value->date_update))}}</td>
                        <td class="text-center">{{number_format($value->course_price,0)}}</td>
                        <td class="text-center">{{$data['total_sub'][$key]}}</td>
                        <td class="text-center">
                            <a href="{{url('admin/course/course/edit/'.$value->course_id)}}" class="btn btn-sm btn-success" title="Edit"><i class="fa fa-edit"></i></a>
                            <a href="#" onclick="confirm_delete('{{url('admin/course/delete/Main/')}}','{{$value->course_id}}');" class="btn btn-sm btn-danger" title="Delete"><i class="fa fa-trash-o"></i></a>
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="10" class="text-danger">
                            <div class="text-center">{{trans('other.data_not_found')}}</div>
                        </td>
                    </tr>
                    @endif
                </tbody>
            </table>

            <footer class="panel-footer">
                <div class="row">
                    <div class="col-sm-2 text-left">
                        <small
                            class="text-muted inline m-t-sm m-b-sm">@if(count($data['detail'])>10){{'Showing 1-10 of'.count($data['detail']).'items'}}@else{{'Showing '.count($data['detail']).' items'}}@endif</small>
                    </div>
                    <div class="col-sm-8">
                    </div>
                    <div class="col-sm-3 text-right">
                        {{$data['detail']->links()}}
                    </div>
                </div>
            </footer>
        </div>
    </div>
@endif


@if($data['page']=='Category')
    <div class="row">
        <div class="col-lg-12">
            <table class="table table-striped b-t b-light" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Category</th>
                        <th>Status</th>
                        <th>Create Date</th>
                        <th>Modify Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($data['detail'])>0)
                    <?php $i = 1;?>
                    @foreach($data['detail'] as $value)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$value->category_name}}</a></td>
                        <td>
                            @if($value->category_status==1)
                            <span class="label label-success">Activate</span>
                            @else
                            <span class="label label-warning">Draft</span>
                            @endif
                        </td>
                        <td>{{date("d-m-Y",strtotime($value->created_at))}}</td>
                        <td>{{date("d-m-Y",strtotime($value->updated_at))}}</td>
                        <td>
                            <a href="{{url('admin/course/category/edit/'.$value->category_id)}}" class="btn btn-success" title="Edit"><i class="fa fa-edit"></i></a>
                            <a href="#" class="btn btn-danger" onclick="confirm_delete('{{url('admin/course/delete/Category/')}}','{{$value->category_id}}');" title="Delete"><i class="fa fa-trash-o"></i></a>
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="6" class="text-danger">
                            <div align="center">{{trans('other.data_not_found')}}</div>
                        </td>
                    </tr>
                    @endif
                </tbody>
            </table>

            <footer class="panel-footer">
                <div class="row">
                    <div class="col-sm-2 text-left">
                        <small
                            class="text-muted inline m-t-sm m-b-sm">@if(count($data['detail'])>10){{'Showing 1-10 of'.count($data['detail']).'items'}}@else{{'Showing '.count($data['detail']).' items'}}@endif</small>
                    </div>
                    <div class="col-sm-8">
                    </div>
                    <div class="col-sm-3 text-right">
                        {{$data['detail']->links()}}
                    </div>
                </div>
            </footer>
        </div>
    </div>
@endif

@if($data['page']=='Skill')
    <div class="row">
        <div class="col-lg-12">
            <table class="table table-striped b-t b-light" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Skill Name</th>
                        <th>Status</th>
                        <th>Create Date</th>
                        <th>Modify Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($data['detail'])>0)
                    <?php $i = 1;?>
                    @foreach($data['detail'] as $value)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$value->skill_name}}</a></td>
                        <td>
                            @if($value->status==1)
                            <span class="label label-success">Activate</span>
                            @else
                            <span class="label label-warning">Draft</span>
                            @endif
                        </td>
                        <td>{{date("d-m-Y",strtotime($value->created_at))}}</td>
                        <td>{{date("d-m-Y",strtotime($value->updated_at))}}</td>
                        <td>
                            <a href="{{url('admin/course/skill/edit/'.$value->id)}}" class="btn btn-success" title="Edit"><i class="fa fa-edit"></i></a>
                            <a href="#" class="btn btn-danger" onclick="confirm_delete('{{url('admin/course/skill/delete/')}}','{{$value->id}}');" title="Delete"><i class="fa fa-trash-o"></i></a>
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="6" class="text-danger">
                            <div align="center">{{trans('other.data_not_found')}}</div>
                        </td>
                    </tr>
                    @endif
                </tbody>
            </table>

            <footer class="panel-footer">
                <div class="row">
                    <div class="col-sm-2 text-left">
                        <small
                            class="text-muted inline m-t-sm m-b-sm">@if(count($data['detail'])>10){{'Showing 1-10 of'.count($data['detail']).'items'}}@else{{'Showing '.count($data['detail']).' items'}}@endif</small>
                    </div>
                    <div class="col-sm-8">
                    </div>
                    <div class="col-sm-3 text-right">
                        {{$data['detail']->links()}}
                    </div>
                </div>
            </footer>
        </div>
    </div>
@endif
