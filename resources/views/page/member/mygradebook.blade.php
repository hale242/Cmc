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
                            <a href="{{url('/')}}">Home</a> > <a href="{{url('/dashboard')}}">Dashboard</a> > <a href="{{url('managecourse')}}"> Manage Course </a> > Gradebook
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
                                        <th>Student Name</th>
                                        <th class="text-center">Start Date</th>
                                        <th class="text-center">Update Date</th>
                                        <th class="text-center">Pretest Score</th>
                                        <th class="text-center">Posttest Score</th>
                                        <th class="text-center">Grade Status</th>
                                    </thead>
                                    <tbody>
                                        @php $i = 1; @endphp
                                        @foreach ($data['detail'] as $item)
                                            <tr>
                                                <td class="text-center">{{$i++}}</td>
                                                <td>{{$item->first_name." ".$item->last_name}}</td>
                                                <td class="text-center">{{date('Y-m-d',strtotime($item->created_at))}}</td>
                                                <td class="text-center">{{date('Y-m-d',strtotime($item->updated_at))}}</td>
                                                <td class="text-center">{{$item->pretest_score}}</td>
                                                <td class="text-center">{{$item->posttest_score}}</td>
                                                <td class="text-center">
                                                   @if($item->pretest_status==2)
                                                    <span class="label label-success">Pass</span>
                                                   @elseif($item->pretest_status==1)
                                                    <span class="label label-danger">False</span>
                                                   @elseif($item->pretest_status==0)
                                                    <span class="label label-warning">Wait</span>
                                                   @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </figcaption>



                </div>
            </div>
        </div>
    </div>
</section>

@stop
