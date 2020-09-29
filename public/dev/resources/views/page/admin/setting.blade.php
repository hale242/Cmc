<!-- นำ template มาใช้ -->
@extends('layouts.admin.template')

<!-- ส่วนของการแสดงข้อมูล -->
@section('detail')


<section id="content">
    <section class="vbox">
        <section class="scrollable padder">

            <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
                <li><a href="{{url('admin/home')}}"><i class="fa fa-home"></i> Home</a></li>
                <li><a href="{{url('admin/setting/website')}}">Setting</a></li>
                <li class="active"><a href="{{url('admin/setting/'.strtolower($data['page']))}}">{{$data['page']}}</a>
                </li>
            </ul>

            <div class="m-b-md">
                <h3 class="m-b-none">Setting</h3>
                <small>Manage data website</small>
            </div>

            <div class="row">
                <div class="col-lg-12" style="height: 700px;">

                    <section class="panel panel-default">

                        <div class="table-responsive">

                            @if($data['type']=='view')
                            @include('page.admin.include.setting.view')
                            @else
                            @include('page.admin.include.setting.form')
                            @endif

                        </div>

                    </section>

                </div>
            </div>


        </section>
    </section>
</section>

@stop
