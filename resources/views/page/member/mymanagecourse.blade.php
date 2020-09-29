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
                            <a href="{{url('/')}}">Home</a> > <a href="{{url('/dashboard')}}">Dashboard</a> > Manage Course
                        </div>
                    </div>

                    <div class="container">
                        @include('layouts.member.flash-message')
                    </div>

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

                    <figcaption class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="DataTable table table-strip">
                                    <thead>
                                        <th class="text-center">#</th>
                                        <th>My Course</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Create Date</th>
                                        <th class="text-center">Modify Date</th>
                                        <th class="text-right">Price</th>
                                        <th class="text-center">Subcription</th>
                                        <th class="text-center">Action</th>
                                    </thead>
                                    <tbody>
                                        {{-- {{dd($data['detail'])}} --}}
                                        @php $i=1; @endphp
                                        @foreach ($data['detail'] as $item)
                                            @php
                                                if($item->course_status==1){
                                                    $status = 'Active';
                                                    $status_color = 'success';
                                                }else{
                                                    $status = 'Draf';
                                                    $status_color = 'warning';
                                                }
                                            @endphp
                                            <tr>
                                                <td class="text-center">{{$i++}}</td>
                                                <td title="{{$item->course_name}}">
                                                    <a href="{{url('/course/detail/'.$item->course_id."/".$item->course_name)}}" target="_blank">
                                                        {{substr($item->course_name,0,50)}}@if(strlen($item->course_name)>50)...@endif
                                                    </a>
                                                </td>
                                                <td class="text-center"><span class="label label-{{$status_color}}">{{$status}}</span></td>
                                                <td class="text-center">{{date('Y-m-d', strtotime($item->created_at))}}</td>
                                                <td class="text-center">{{date('Y-m-d', strtotime($item->updated_at))}}</td>
                                                <td class="text-right">
                                                    @if($item->course_price!=0)
                                                        {{number_format($item->course_price,2)}}
                                                    @else
                                                        <span class="text-red"><b>FREE</b></span>
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    @foreach ($data['wishlist'] as $wishlist)
                                                        @if($wishlist->course_id==$item->course_id)
                                                            {{$wishlist->counter}}
                                                        @endif
                                                    @endforeach
                                                </td>
                                                <td class="text-center">
                                                    <a href="{{url('gradebook/'.$item->course_id)}}">
                                                        <button class="btn btn-sm btn-info">Grade book</button>
                                                    </a>
                                                </td>
                                            </tr>

                                        @endforeach
                                    </tbody>
                                </table>

                                {{-- <footer>
                                    <div class="row">
                                        <div class="col-sm-12 text-left">
                                            <small class="text-muted inline m-t-sm m-b-sm">@if(count($data['detail'])>10){{'Showing 1-10 of'.count($data['detail']).'items'}}@else{{'Showing '.count($data['detail']).' items'}}@endif</small>
                                        </div>
                                        <div class="col-sm-12 text-center">
                                            {{$data['detail']->links()}}
                                        </div>
                                    </div>
                                </footer> --}}
                            </div>
                        </div>
                    </figcaption>



                </div>
            </div>
        </div>
    </div>
</section>

@stop
