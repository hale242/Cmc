<div class="row">

    <div class="col-lg-12">

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

    </div>

    <div class="col-lg-12">
        <table class="table table-striped b-t b-light" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Order number</th>
                    <th>Name</th>
                    <th>Status</th>
                    <th>Order Date</th>
                    <!--<th>Course name</th>
                        <th>Teacher name</th> -->
                    <th class="text-right">Total</th>
                    <th class="text-right">Action</th>
                </tr>
            </thead>
            <tbody>

                @if(count($data['detail'])>0)
                    @php $item = $data['detail']->firstItem(); @endphp
                @foreach($data['detail'] as $key => $value)
                    @foreach($data['teacher'] as $value2)
                        @if($value->course_teacher_id == $value2->user_id)
                            <?php $teacher = $value2->first_name.' '.$value2->last_name;?>
                        @else
                            <?php $teacher = '-';?>
                        @endif
                    @endforeach

                    <tr>
                        <td>{{$item++}}</td>
                        <td>{{$value->order_number}}</a></td>
                        <td>{{$value->first_name.' '.$value->last_name}}</td>
                        <td>
                            @if($value->order_status==1)
                            <span class="label label-info">Payment</span>
                            @elseif($value->order_status==2)
                            <span class="label label-warning">Wait</span>
                            @else
                            <span class="label label-success">Success</span>
                            @endif
                        </td>
                        <td>@if($value->created_at!=null){{$value->created_at}}@else {{'-'}}@endif</td>
                        <td class="text-black text-right"><b>@if($value->order_total==0) <span class="text-danger">Free</span> @else ฿ {{number_format($value->order_total,2)}} @endif</b></td>
                        <td class="text-right">
                            @if($value->order_slip_file!='-')
                                <button data-target="#slip_{{$value->order_number}}"class="btn btn-sm btn-success" data-toggle="modal">
                                    <i class="fa fa-money"></i>
                                </button>

                                <div class="modal fade" id="slip_{{$value->order_number}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-body row">
                                                <div class="col-md-12 text-left">
                                                    <p><b>Order number :</b> {{$value->order_number}}</p>
                                                    <p><b>Order Price :</b> {{number_format($value->order_total,2)}} ฿</p>
                                                    <p><b>Payment Date :</b> {{$value->order_payment_date}}</p>
                                                    <p><b>Payment Time :</b> {{$value->order_payment_time}}</p>
                                                    <p><b>Bank Transfer :</b> {{$value->order_bank_transfer}}</p>
                                                    @if($value->order_status==3)
                                                        <p><b>Order Note :</b> {{($value->order_note=='') ? "-" : $value->order_note}}</p>
                                                    @endif
                                                </div>
                                                <div class="col-md-12">
                                                    <img src="{{url('upload/payment/'.$value->order_slip_file)}}" alt="" class="img-responsive" style="margin: auto;">
                                                </div>
                                                @if($value->order_status!=3)
                                                    <div class="col-md-6 m-t">
                                                        <input type="text" id="ordernote_{{$value->order_id}}" name="ordernote" placeholder="Order Note" class="form-control input-sm">
                                                    </div>
                                                @endif
                                                <div class="<?php if($value->order_status!=3){ echo "col-md-6"; }else{ echo "col-md-12"; } ?> m-t">
                                                    <p class="text-right">
                                                        @if($value->order_status!=3)
                                                            <button class="btn btn-sm btn-success payment_id" data-id="{{$value->order_id}}">Payment</button>
                                                        @endif
                                                        <button class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>
                                                    </p>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <a target="_self" href="{{url('admin/orders/view/'.$value->order_id)}}" class="btn btn-sm btn-warning" title="View"><i class="fa fa-pencil"></i></a>
                            <a href="#" class="btn btn-sm btn-danger" onclick="confirm_delete('{{url('admin/orders/delete/')}}','{{$value->order_id}}');" title="Delete"><i class="fa fa-trash-o"></i></a>
                        </td>
                    </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="9" class="text-danger">
                        <div class="text-center">{{trans('other.data_not_found')}}</div>
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
