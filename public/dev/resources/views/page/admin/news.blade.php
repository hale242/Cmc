@extends('layouts.admin.template')

@section('detail')


<section id="content">
          <section class="vbox">
            <section class="scrollable padder">

              <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
                <li><a href="{{url('admin/home')}}"><i class="fa fa-home"></i> Home</a></li>
                <li><a href="#">News</a></li>
                <li class="active"><a href="{{url('admin/news/'.strtolower($data['page']))}}">{{$data['page']}}</a></li>
              </ul>
              @if($data['page']=='Main')<?php $title = 'News';?>@else<?php $title = $data['page'];?>@endif
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
                 <a href="{{url('admin/news/'.strtolower($data['page']).'/add')}}" class="btn btn-primary" title="Add"><i class="fa fa-plus"></i> Create</a>
                </div>

                <br><br><br>

                <form action="{{url('admin/news/'.$data['page']).'/search'}}" method="get" enctype="multipart/form-data">
                    @csrf

                  {{-- <div class="col-sm-6 m-b-xs"> --}}
                    <div class="col-sm-3">
                    <div class="input-group">
                    <input type="text" name="date_start" class="input-sm form-control datepicker-input" placeholder="Start Date" value="{{$data['session_search']['date_start']}}">
                    <span class="input-group-btn">
                        <button class="btn btn-sm btn-default" type="button"><i class="fa fa-calendar"></i></button>
                      </span>
                    </div>
                    </div>
                    <div class="col-sm-3">
                    <div class="input-group">
                    <input type="text" name="date_end" id="date_end" class="input-sm form-control datepicker-input" placeholder="End Date" value="{{$data['session_search']['date_end']}}">
                    <span class="input-group-btn">
                        <button class="btn btn-sm btn-default" type="button"><i class="fa fa-calendar"></i></button>
                      </span>
                    </div>
                    </div>
                  {{-- </div> --}}

                  {{-- <div class="col-sm-6 m-b-xs"> --}}
                    <div class="col-sm-3">
                        <select name="status" class="input-sm form-control ">
                            <option value="1" @if($data['session_search']['status']==1) selected @endif>Activate</option>
                            <option value="0" @if($data['session_search']['status']==0) selected @endif>Draft</option>
                            <option value="" @if($data['session_search']['status']==='') selected @endif></option>
                        </select>
                    </div>

                    <div class="col-sm-3">
                        <input name="txt_search" type="text" class="input-sm form-control" placeholder="Search Title" value="{{$data['session_search']['txt_search']}}">
                    </div>
                  {{-- </div> --}}

                  <div class="col-sm-12 m-t">
                    <button type="submit" class="btn btn-sm btn-info">Apply Filter</button>
                    <a href="{{url('admin/news/main')}}">
                        <button type="button" class="btn btn-sm btn-warning">Reset Filter</button>
                    </a>
                  </div>

              </form>

                </div>

                @endif

                <div class="table-responsive">
                  @if($data['type']=='view')
                  @include('page.admin.include.news.view')
                  @elseif($data['type']=='form')
                  @include('page.admin.include.news.form')
                  @else
                  @include('page.admin.include.news.show')
                  @endif
                </div>
              </section>
                </div>

              </div>

      </section>
    </section>
  </section>

@stop

