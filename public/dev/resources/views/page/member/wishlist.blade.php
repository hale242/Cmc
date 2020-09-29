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
                            <a href="{{url('/')}}">Home</a> > <a href="{{url('/dashboard')}}">Dashboard</a> > My Wishlist
                        </div>
                    </div>


                    <figcaption class="container">
                        <div class="row">

                            <div class="col-md-12">

                                <div class="col-md-12">

                                    <table class="DataTable table table-striped b-t b-light">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Course Name</th>
                                                <th class="text-right">Course Price</th>
                                                <th>View</th>
                                                <th class="text-center">Date</th>
                                                <th>Teacher Name</th>
                                                <th class="text-right">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if(count($data['detail'])>0)
                                            <?php $i = 1;?>
                                            @foreach($data['detail'] as $value)
                                            <tr>
                                                <td>{{$i++}}</td>
                                                <td>
                                                    <a target="_blank" href="{{url('course/detail/'.$value->course_id.'/'.$value->course_name)}}" title="View">
                                                        {{substr($value->course_name,0,50)}}@if(strlen($value->course_name)>50)...@endif
                                                    </a>
                                                </td>
                                                <td class="text-right">
                                                    @if($value->course_price!=0)
                                                        {{number_format($value->course_price,2)}}
                                                    @else
                                                        <span class="text-red">FREE</span>
                                                    @endif
                                                </td>
                                                <td class="text-center">{{$value->course_view}}</td>
                                                <td class="text-center">{{date("Y-m-d",strtotime($value->date_create))}}</td>
                                                @foreach($data['teacher'] as $value3)
                                                    @if($value->course_teacher_id == $value3->user_id)
                                                        @php $teacher = $value3->first_name.' '.$value3->last_name @endphp
                                                    @endif
                                                @endforeach

                                                <td title="{{$teacher}}">
                                                    {{substr($teacher,0,20)}}@if(strlen($teacher)>20)...@endif
                                                </td>
                                                <td class="text-right">
                                                    <a target="_blank" href="{{url('course/detail/'.$value->course_id.'/'.$value->course_name)}}" class="btn btn-sm btn-success" title="View Detail">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                    <a href="#" class="btn btn-sm btn-danger" onclick="confirm_delete('{{url('mywishlist/delete/')}}','{{$value->wishlist_id}}');" title="Delete form wishlist">
                                                        <i class="fa fa-times"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            @endforeach
                                            {{-- @else
                                                <tr>
                                                    <td colspan="9" class="text-danger">
                                                        <div class="text-center">{{trans('other.data_not_found')}}</div>
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
