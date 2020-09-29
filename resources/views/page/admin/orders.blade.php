@extends('layouts.admin.template')

@section('detail')

<section id="content">
    <section class="vbox">
        <section class="scrollable padder">

            <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
                <li><a href="{{url('admin/home')}}"><i class="fa fa-home"></i> Home</a></li>
                <li><a href="#">Orders</a></li>
                <li class="active"><a href="{{url('admin/orders/'.strtolower($data['page']))}}">{{$data['page']}}</a>
                </li>
            </ul>


            @if($data['page']=='Main')<?php $title = 'Orders';?>@else<?php $title = $data['page'];?>@endif

                <div class="m-b-md">
                    <h3 class="m-b-none">{{$title}}</h3>
                    <small>Manage data {{$title}}</small>
                </div>


            <div class="row">

                <div class="col-lg-12">
                    <section class="panel panel-default">
                        <header class="panel-heading">
                            Data view
                            <i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i>
                        </header>

                        <section class="panel panel-default">


                            @if($data['type']!='show')

                                <div class="row wrapper">

                                    <form action="{{url('admin/orders/'.$data['page']).'/search'}}" method="post" enctype="multipart/form-data">
                                        @csrf

                                        <div class="col-sm-6 m-b-xs">
                                            <div class="col-sm-6">
                                                <label for="startdate">Start Date</label>
                                                <div class="input-group">
                                                    <input type="text" name="date_start" class="input-sm form-control datepicker-input" placeholder="Start Date" value="{{$data['session_search']['date_start']}}">
                                                    <span class="input-group-btn">
                                                        <button class="btn btn-sm btn-default" type="button"><i class="fa fa-calendar"></i></button>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <label for="enddate">End Date</label>
                                                <div class="input-group">
                                                    <input type="text" name="date_end" id="date_end" class="input-sm form-control datepicker-input" placeholder="End Date" value="{{$data['session_search']['date_end']}}">
                                                    <span class="input-group-btn">
                                                        <button class="btn btn-sm btn-default" type="button"><i class="fa fa-calendar"></i></button>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-sm-6 m-b-xs">
                                            <div class="col-sm-5">
                                            <label for="status">Status</label>
                                                <select name="status" class="input-sm form-control ">
                                                    <option value="3" @if($data['session_search']['status']==3) selected @endif>Success</option>
                                                    <option value="2" @if($data['session_search']['status']==2) selected @endif>Wait</option>
                                                    <option value="" @if($data['session_search']['status']==='') selected @endif></option>
                                                </select>
                                            </div>
                                            <div class="col-sm-7">
                                                <label for="txt_search">Order Search</label>
                                                <input name="txt_search" type="text" class="input-sm form-control" placeholder="Search" value="{{$data['session_search']['txt_search']}}">
                                            </div>
                                        </div>

                                        <div class="col-sm-12 m-t">
                                            <div class="col-sm-12">
                                                <button type="submit" class="btn btn-sm btn-info">Apply Filter</button>
                                                <a href="{{url('admin/orders/'.strtolower($data['page']))}}">
                                                    <button type="button" class="btn btn-sm btn-warning">Reset Filter</button>
                                                </a>
                                            </div>
                                        </div>

                                    </form>

                                </div>

                            @endif



                            <div class="table-responsive">
                                @if($data['type']=='view')

                                    @include('page.admin.include.orders.view')

                                @elseif($data['type']=='form')

                                    @include('page.admin.include.orders.form')

                                @else

                                    @include('page.admin.include.orders.show')

                                @endif
                            </div>

                        </section>
                </div>

            </div>

        </section>
    </section>
</section>

@stop
