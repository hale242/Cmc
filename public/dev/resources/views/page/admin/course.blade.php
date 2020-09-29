@extends('layouts.admin.template')

@section('detail')

@php
    if($data['page']=='Main'){
        $title = 'Course';
    }else{
        $title = $data['page'];
    }
@endphp

<section id="content">
    <section class="vbox">
        <section class="scrollable padder">

            <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
                <li><a href="{{url('admin/home')}}"><i class="fa fa-home"></i> Home</a></li>
                <li><a href="{{url('admin/course/main')}}">Course</a></li>
                <li class="active"><a href="{{url('admin/course/'.strtolower($data['page']))}}">{{$data['page']}}</a></li>
            </ul>

            <div class="m-b-md">
                <h3 class="m-b-none">{{$title}}</h3>
                <small>Manage data {{$title}}</small>
            </div>

            @if($data['type']!='form' && $data['type']!='show')

            <div class="row">

                <div class="col-lg-12">

                    <section class="panel panel-default">
                        <header class="panel-heading" style="height: 55px;">
                            Data view <i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i>
                        <a href="{{url('admin/course/'.strtolower($data['page']).'/add')}}" class="btn btn-primary pull-right" title="Add"><i class="fa fa-plus"></i> Create {{$title}}</a>
                        </header>

                        <section class="panel panel-default">

                            <div class="row wrapper">

                                <form action="{{url('admin/course/'.$data['page']).'/search'}}" method="get" enctype="multipart/form-data">
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
                                                <option value="1" @if($data['session_search']['status']==1) selected @endif>Activate</option>
                                                <option value="0" @if($data['session_search']['status']==0) selected @endif>Draft</option>
                                                <option value="" @if($data['session_search']['status']==='') selected @endif></option>
                                            </select>
                                        </div>
                                        <div class="col-sm-7">
                                            @php
                                                if($data['page']=='Main'){
                                                    $pagesearch = 'Search Course or Teacher';
                                                }else if($data['page']=='Skill'){
                                                    $pagesearch = 'Skill Name';
                                                }else if($data['page']=='Category'){
                                                    $pagesearch = 'Category name';
                                                }
                                            @endphp
                                            <label for="txt_search">{{$pagesearch}}</label>
                                            <input name="txt_search" type="text" class="input-sm form-control" placeholder="Search" value="{{$data['session_search']['txt_search']}}">
                                        </div>
                                    </div>

                                    <div class="col-sm-12 m-t">
                                        <div class="col-sm-12">
                                            <button type="submit" class="btn btn-sm btn-info">Apply Filter</button>
                                            <a href="{{url('admin/course/'.strtolower($data['page']))}}">
                                                <button type="button" class="btn btn-sm btn-warning">Reset Filter</button>
                                            </a>
                                        </div>
                                    </div>

                                </form>

                            </div>

                            @endif

                            <div class="table-responsive">
                                @if($data['type']=='view')
                                @include('page.admin.include.course.view')
                                @elseif($data['type']=='form')
                                @include('page.admin.include.course.form')
                                @else
                                @include('page.admin.include.course.show')
                                @endif
                            </div>
                        </section>
                </div>

            </div>

        </section>
    </section>
</section>

@stop