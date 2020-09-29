@extends('layouts.admin.template')

@section('detail')

<section id="content">
    <section class="vbox">
        <section class="scrollable padder">

            <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
                <li><a href="{{url('admin/home')}}"><i class="fa fa-home"></i> Home</a></li>
                <li><a href="{{url('admin/language/main')}}">Language</a></li>
                <li class="active"><a href="{{url('admin/language/'.strtolower($data['page']))}}">{{$data['page']}}</a>
                </li>
            </ul>
            @if($data['page']=='Main')<?php $title = 'Language'; ?>@else<?php $title = $data['page']; ?>@endif

            <div class="m-b-md">
                <h3 class="m-b-none">{{$title}}</h3>
                <small>Manage data {{$title}}</small>
            </div>
            @if($data['type']!='form' && $data['type']!='show')

            <div class="row">

                <div class="col-lg-12">
                    <section class="panel panel-default">
                        <header class="panel-heading">
                            Data view
                            <i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i>
                        </header>

                        <section class="panel panel-default">

                            <div class="row wrapper">

                                <div class="col-lg-12 text-right">
                                    <a href="{{url('admin/language/'.strtolower($data['page']).'/add')}}" class="btn btn-primary" title="Add"><i class="fa fa-plus"></i> Create</a>
                                </div>

                                <br><br><br>

                                <form action="{{url('admin/language/'.$data['page']).'/search'}}" method="get" enctype="multipart/form-data">
                                    @csrf

                                    <div class="col-sm-6 m-b-xs">
                                        <div class="col-sm-5">
                                            <label for="language_status">Status</label>
                                            <select name="language_status" class="input-sm form-control ">
                                                <option value="1" @if($data['session_search']['language_status']==1) selected @endif>Activate</option>
                                                <option value="0" @if($data['session_search']['language_status']==0) selected @endif>Inactivate</option>
                                                <option value="" @if($data['session_search']['language_status']==='' ) selected @endif></option>
                                            </select>
                                        </div>
                                        <div class="col-sm-7">
                                            <label for="language_name">Language</label>
                                            <input name="language_name" type="text" class="input-sm form-control" placeholder="Search" value="{{$data['session_search']['language_name']}}">
                                        </div>
                                    </div>

                                    <div class="col-sm-12 m-t">
                                        <div class="col-sm-12">
                                            <button type="submit" class="btn btn-sm btn-info">Apply Filter</button>
                                            <a href="{{url('admin/language/'.strtolower($data['page']))}}">
                                                <button type="button" class="btn btn-sm btn-warning">Reset Filter</button>
                                            </a>
                                        </div>
                                    </div>

                                </form>

                            </div>

                            @endif

                            <div class="table-responsive">
                            @if($data['type']=='view')
                                @include('page.admin.include.language.view')
                                @elseif($data['type']=='form')
                                @include('page.admin.include.language.form')
                                @else
                                @include('page.admin.include.language.show')
                                @endif
                            </div>
                        </section>
                </div>

            </div>

        </section>
    </section>
</section>

@stop