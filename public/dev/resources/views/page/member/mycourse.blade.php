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
                            <a href="{{url('/')}}">Home</a> > <a href="{{url('/dashboard')}}">Dashboard</a> > My Course
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

                                <div class="col-md-12">

                            <table class="DataTable table table-striped b-t b-light">
                                <thead>
                                    <tr>
                                        <th style="width:5%">#</th>
                                        <th style="width:20%">Course Name</th>
                                        <th style="width:5%" class="text-center">Status</th>
                                        <th style="width:5%" class="text-center">View</th>
                                        <th style="width:5%" class="text-center">Category</th>
                                        <th style="width:10%" class="text-center">Pre test</th>
                                        <th style="width:10%" class="text-center">Post test</th>
                                        <th style="width:15%">Teacher Name</th>
                                        <th style="width:10%" class="text-right">Action</th>
                                        <th style="width:15%" class="text-center">Get certificate</th>
                                    </tr>
                                </thead>
                                <tbody style="font-size:12px;">

                                    @php
                                    // dd($data);
                                    @endphp

                                    @if($data['detail'])

                                        <?php $i = 1;?>

                                        @foreach($data['detail'] as $key => $value)

                                        @php
                                        // dd($data['preposttest_result']);

                                        if($data['preposttest_result']!==null){

                                        if($data['preposttest_result'][$key]->course_id == $value->course_id){
                                        $status = $data['preposttest_result'][$key]->pretest_status;
                                        }else{
                                        $status = 0;
                                        }

                                        }else{

                                        $status = 0;

                                        }


                                        // dd($data['teacher']);
                                        @endphp

                                    <tr>
                                        <td class="text-center">{{$i++}}</td>

                                        <td title="{{$value->course_name}}">{{substr($value->course_name,0,20)}}@if(strlen($value->course_name)>20)...@endif</a></td>

                                        <td class="text-center">
                                            @if($status==0)
                                            <span class="label label-warning">Wait</span>
                                            @elseif($status==1)
                                            <span class="label label-danger">Fail</span>
                                            @elseif($status==2)
                                            <span class="label label-success">Pass</span>
                                            @endif
                                        </td>

                                        <td class="text-center">{{$value->course_view}}</td>
                                        <td class="text-center">
                                            {{$value->category_name}}
                                        </td>

                                        <td class="text-center">
                                            @if($data['preposttest_result'][$key]->pretest_score!==null)
                                                {{date("d-m-Y",strtotime($data['preposttest_result'][$key]->date_create))}}
                                            @else
                                                {{'-'}}
                                            @endif
                                        </td>

                                        <td class="text-center">
                                            @if($data['preposttest_result'][$key]->posttest_score!==null)
                                                {{date("d-m-Y",strtotime($data['preposttest_result'][$key]->date_end))}}
                                            @else
                                                {{'-'}}
                                            @endif
                                        </td>

                                        @foreach($data['teacher'] as $value3)
                                            @if($value->course_teacher_id == $value3->user_id)
                                                @php $teacher = $value3->first_name.' '.$value3->last_name @endphp
                                            @endif
                                        @endforeach

                                        <td title="{{$teacher}}">
                                            {{substr($teacher,0,20)}}@if(strlen($teacher)>20)...@endif
                                        </td>

                                        <td class="text-right">
                                            <?php

                                                // if($data['preposttest_result'][$key]->pretest_score!=null && $data['preposttest_result'][$key]->posttest_score==null){
                                                //     $steplink = 2;
                                                // }else if($data['preposttest_result'][$key]->posttest_score!=null){
                                                //     $steplink = 1;
                                                // }else{
                                                //     $steplink = 1;
                                                // }

                                                $steplink = 1;

                                                if($value->order_status==3 || $value->order_status==1){
                                            ?>
                                                    @php
                                                        if($data['preposttest_result'][$key]->pretest_score!=null){
                                                            $stylebtn = 'danger';
                                                            $textbtn = 'Learn & Post test';
                                                        }elseif($data['preposttest_result'][$key]->posttest_score!=null){
                                                            $stylebtn = 'info';
                                                            $textbtn = 'Pre test agin';
                                                        }else{
                                                            $stylebtn = 'warning';
                                                            $textbtn = 'Pre test';
                                                        }
                                                    @endphp

                                                    <a href="{{url('mycourse/testing/'.$value->course_id.'/'.$value->course_name.'/'.$steplink) }}" class="btn btn-{{$stylebtn}} btn-sm" title="View">
                                                        <i class="fa fa-book"></i> {{$textbtn}}
                                                    </a>

                                            <?php
                                                }else{
                                                    echo "wait for payment";
                                                }
                                            ?>
                                        </td>

                                        <td class="text-center">
                                            @if($status==2)
                                                <span class="btn btn-sm btn-info" style="width: 100%;" data-toggle="modal" data-target="#certificate">View</span>
                                            @else
                                                <span>-</span>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach

                                    {{-- @else
                                    <tr>
                                        <td colspan="9">
                                            <div class="text-center">@include('page.member.data_not_found')</div>
                                        </td>
                                    </tr> --}}
                                    @endif

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


                            <div id="certificate" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                                <div class="modal-dialog" role="document"> <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                        <h4 class="modal-title" id="mySmallModalLabel">How to get certificate.</h4>
                                    </div>
                                    <div class="modal-body row">
                                        <div class="col-md-6">
                                            <img src="{{url('mockup/certificate.jpg')}}" alt="" class="img-responsive">
                                        </div>
                                        <div class="col-md-6">
                                            <span><u>Please contact</u></span>
                                            <ul>
                                                <li>Name :: xxxxxx xxxxxxx</li>
                                                <li>Address :: 9999 ssss bbbb xxxx</li>
                                                <li>Phone :: 888-777-6666</li>
                                                <li>Email :: cert.cmcbiotexh.co.th</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>



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
