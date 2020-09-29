@extends('layouts.member.template')

@section('detail')

<div class="loader"></div>

<section id="mu-course-content">
    <div>
        <div>
            <div class="col-12">
                <div>

                    <div class="bar_mydashboard">
                        <div class="container">
                            @include('layouts.member.menu_dashboard')
                        </div>
                    </div>

                    <div class="container">
                        <div class="col-md-12 text-left breadcrumb pt-2 pl-1">
                            <a href="{{url('/')}}">Home</a> > <a href="{{url('/dashboard')}}">Dashboard</a> > My Orders
                        </div>
                    </div>

                    <figcaption class="container">
                        <div class="row">

                            <div class="col-md-12">

                                <div class="col-md-12">

                                    <table class="DataTable table table-striped b-t b-light">
                                        <thead>
                                            <tr>
                                                <th class="text-center">#</th>
                                                <th>Order number</th>
                                                <th>Name</th>
                                                <th class="text-center">Status</th>
                                                <th class="text-center">Order Date</th>
                                                <th class="text-right">Total Price</th>
                                                <th class="text-right">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                            // dd($data['detail']);
                                            @endphp

                                            @if(count($data['detail'])>0)
                                            <?php $i = 1;?>
                                            @foreach($data['detail'] as $key => $value)
                                            <tr>
                                                <td class="text-center">{{$i++}}</td>
                                                <td>{{$value->order_number}}</a></td>
                                                <td>{{$value->first_name.' '.$value->last_name}}</td>
                                                <td class="text-center">
                                                    @if($value->order_status==1)
                                                    <span class="label label-info">Payment</span>
                                                    @elseif($value->order_status==2)
                                                    <span class="label label-warning">Wait</span>
                                                    @elseif($value->order_status==3)
                                                    <span class="label label-success">Success</span>
                                                    @endif
                                                </td>
                                                <td class="text-center">@if($value->order_date!=null){{$value->order_date}}@else{{'-'}}@endif</td>

                                                <td class="text-right">
                                                    @if($value->order_total!=0)
                                                        {{number_format($value->order_total,2)}}
                                                    @else
                                                        <span class="text-red">FREE</span>
                                                    @endif
                                                </td>

                                                <td class="text-right">
                                                    @php
                                                        $type_payment = $value->order_payment_type;
                                                        $order_status = $value->order_status;
                                                        $order_total = $value->order_total;
                                                        $order_number = $value->order_number;
                                                    @endphp
                                                    @if($type_payment == 1 && $order_status == 2)
                                                        <form method="POST" action="{{url('checkout/gbpay_again')}}" style="float: right;margin-left: 6px;">
                                                            @csrf
                                                            <input type="hidden" name="order_number" value="{{$order_number}}" />
                                                            <input type="hidden" name="order_price" value="{{$order_total}}" />
                                                            <input type="hidden" name="amount" value="{{$order_total}}" />
                                                            <button class="btn btn-sm btn-warning" title="Payment"><i class="fa fa-credit-card"></i></button>
                                                        </form>
                                                    @endif
                                                    <a target="_blank" href="{{url('myorder/detail/'.$value->order_id)}}" class="btn btn-sm btn-success" title="View Detail">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            @endforeach
                                            {{-- @else
                                            <tr>
                                                <td colspan="9">
                                                    <div align="center">@include('page.member.data_not_found')</div>
                                                </td>
                                            </tr> --}}
                                            @endif
                                        </tbody>
                                    </table>

                                    {{-- <footer>
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
                                    </footer> --}}

                                </div>

                            </div>

                        </div>
                    </figcaption>

                </div>
            </div>
        </div>
    </div>
</section>

@stop
