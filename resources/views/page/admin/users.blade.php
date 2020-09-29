<!-- นำ template มาใช้ -->
@extends('layouts.admin.template')

<!-- ส่วนของการแสดงข้อมูล -->
@section('detail')

<section id="content">
    <section class="vbox">
        <section class="scrollable padder">

            <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
                <li><a href="{{url('admin/home')}}"><i class="fa fa-home"></i> Home</a></li>
                <li><a href="#">Users</a></li>
                <li class="active"><a href="{{url('admin/users/'.strtolower($data['page']))}}">{{$data['page']}}</a>
                </li>
            </ul>
            @if($data['page']=='Main')<?php $title = 'Users';?>@else<?php $title = $data['page'];?>@endif
            <div class="m-b-md">
                <h3 class="m-b-none">{{$title}}</h3>
                <small>Manage data {{$title}}</small>
            </div>

            @if($data['type']!='form' && $data['type']!='show')

            <div class="row">

                <div class="col-lg-12">
                    <section class="panel panel-default">
                        <header class="panel-heading" style="height:55px;">
                            Data view
                            <i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom"
                                data-title="ajax to load the data."></i>

                            <div class="pull-right">
                                <a href="{{url('admin/users/'.strtolower($data['page']).'/add')}}"
                                    class="btn btn-primary" title="Add"><i class="fa fa-plus"></i> Create</a>
                            </div>
                        </header>

                        <section class="panel panel-default">

                            <div class="row wrapper">

                                <form action="{{url('admin/users/'.$data['page']).'/search'}}" method="get"
                                    enctype="multipart/form-data">
                                    @csrf

                                    <div class="col-sm-4 m-b-xs">
                                        <div class="col-sm-6">
                                            <label for="date_start">Create Date Start</label>
                                            <div class="input-group">
                                                <input type="text" name="date_start"
                                                    class="input-sm form-control datepicker-input"
                                                    placeholder="Start Date">
                                                <span class="input-group-btn">
                                                    <button class="btn btn-sm btn-default" type="button"><i
                                                            class="fa fa-calendar"></i></button>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="date_end">Create Date End</label>
                                            <div class="input-group">
                                                <input type="text" name="date_end" id="date_end"
                                                    class="input-sm form-control datepicker-input"
                                                    placeholder="End Date">
                                                <span class="input-group-btn">
                                                    <button class="btn btn-sm btn-default" type="button"><i
                                                            class="fa fa-calendar"></i></button>
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-8 m-b-xs">
                                        <div class="col-sm-3">
                                            <label for="status">Status</label>
                                            <select name="status" class="input-sm form-control ">
                                                <option value="">=======Status========</option>
                                                <option value="1">Activate</option>
                                                <option value="0">Draft</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-3">
                                            <label for="sli_type">User type</label>
                                            <select name="sli_type" class="input-sm form-control ">
                                                <option value="">=======Type========</option>
                                                <option value="1">Admin</option>
                                                <option value="2">User</option>
                                                <option value="3">Teacher</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="txt_search">Keyword</label>
                                            <input name="txt_search" type="text" class="form-control input-sm "
                                                placeholder="Search Firstname, Lastname">
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="col-sm-12">
                                            <button type="submit" class="btn btn-sm btn-info">Apply Filter</button>
                                            <button type="submit" class="btn btn-sm btn-warning">Reset Filter</button>
                                        </div>
                                    </div>

                                </form>

                            </div>

                            @endif

                            <div class="table-responsive">
                                @if($data['type']=='view')
                                @include('page.admin.include.users.view')
                                @elseif($data['type']=='form')
                                @include('page.admin.include.users.form')
                                @else
                                @include('page.admin.include.users.show')
                                @endif
                            </div>
                        </section>
                </div>

            </div>

        </section>
    </section>
</section>

@stop