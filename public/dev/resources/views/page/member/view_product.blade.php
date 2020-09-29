@extends('layouts.member.template')

@section('detail')

<section id="mu-course-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-left">
                <a href="{{url('/')}}">Home</a> > <a href="{{url('product')}}">Our Products</a> >
                <a href="{{url('product/detail/'.$data['detail']['main']->product_id.'/'.$data['detail']['main']->product_name)}}" class="text text-primary">{{$data['detail']['main']->product_name}}</a>
            </div>
            <div class="col-md-12">
                <div class="mu-course-content-area">
                    <div class="row">

                        @if(file_exists(public_path().'/upload/member/product/images/'.$data['detail']['main']->product_image)
                        && $data['detail']['main']->product_image != null)
                        <?Php $img = asset('upload/member/product/images/'.$data['detail']['main']->product_image);?>
                        @else
                        <?Php $img = asset('assets/member/images/no-image.png');?>
                        @endif

                        <div class="col-md-12 mb-3" style="margin: 15px;position: relative;">
                            <img src="{{$img}}" class="img-responsive">
                            <span class="product_title">{{$data['detail']['main']->product_name}}</span>
                        </div>

                        <div class="col-md-9 br-1">

                            <div class="col-md-4 mb-2">
                                <h6 class="text-darkgray">DATE</h6>
                                <h5><b>{{date("d M Y",strtotime($data['detail']['main']->created_at))}}</b></h5>
                            </div>

                            <div class="col-md-4 mb-2 bl-1">
                                <h6 class="text-darkgray">VIEW</h6>
                                <h5><b>{{$data['detail']['main']->product_view}}</b></h5>
                            </div>

                            <div class="col-md-4 mb-2 bl-1" style="height: 58px;">
                                <h6 class="text-darkgray">SHARE</h6>
                                <!-- AddToAny BEGIN -->
                                <div class="a2a_kit a2a_kit_size_14 a2a_default_style">
                                    <a class="a2a_button_facebook" title="Shared to facebook"></a>
                                    <a class="a2a_button_twitter" title="Shared to twitter"></a>
                                    <a class="a2a_button_line" title="Shared to line"></a>
                                </div>
                                <script async src="https://static.addtoany.com/menu/page.js"></script>
                                <!-- AddToAny END -->
                            </div>

                            <div class="col-md-12 news-content">
                                {!! $data['detail']['main']->product_detail !!}
                            </div>

                            <div class="clearfix"></div>

                        </div>

                        <div class="col-md-3 mu-single-sidebar">

                            <h4 class="text-info"><b style="color:#0072bc;">LATEST</b></h4>

                            @if(count($data['detail']['last'])>0)

                            @foreach($data['detail']['last'] as $value)

                            @if(file_exists(public_path().'/upload/member/product/images/'.$value->product_image) &&
                                $value->product_image != null)
                                <?Php $img = asset('upload/member/product/images/'.$value->product_image);?>
                            @else
                                <?Php $img = asset('assets/member/images/no-image.png');?>
                            @endif

                            <div class="media">
                                <div class="media-left">
                                    <a href="{{url('product/detail/'.$value->product_id.'/'.$value->product_name)}}">
                                        <img class="media-object" src="{{$img}}" alt="img" width="75px">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <h6 class="media-heading"><a
                                            href="{{url('product/detail/'.$value->product_id.'/'.$value->product_name)}}"><b>{{iconv_substr($value->product_name,0,30,'UTF-8')}}</b></a>
                                    </h6>
                                    <p class="small"><i class="fa fa-clock-o"></i>
                                        {{date("d",strtotime($value->created_at))}}
                                        {{date("M",strtotime($value->created_at))}}
                                        {{date("Y",strtotime($value->created_at))}}</p>
                                </div>
                            </div>
                            @endforeach
                            @else
                            @include('page.member.data_not_found')
                            @endif

                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>
    </div>
    </div>
    <br>
</section>

@stop
