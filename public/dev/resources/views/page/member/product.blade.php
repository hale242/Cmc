@extends('layouts.member.template')

@section('detail')

<img src="{{asset('assets/member/images/banner_product.png')}}" class="img-responsive">
<section id="mu-course-content">
   <div class="container">
     <div class="row">
      <div class="col-md-12 text-left">
        <br>
      <a href="{{url('/')}}">Home</a> > <a href="{{url('product')}}" class="text text-primary">Our Products</a>
      <br><hr>
      </div>
       <div class="col-md-12">
         <div class="mu-course-content-area">
            <div class="row">

              @if(count($data['detail'])>0)

              @php
                $col = 1;
                $j = 3;
              @endphp

              @foreach($data['detail'] as $key => $value)

                <div class="col-md-12 alert mb-5" align="center">

                    @if($j%2===0)

                        <div class="col-md-6 text-left" style="padding-left: 50px;">
                            <h3 class="text-primary">
                                <div class="mb-2"><h2 class="text-blue"><b>{{$value->product_name}}</b></h2></div>
                                <div class="mb-3" style="font-size:14px;color:#666;line-height: 1.8;">{{$value->product_short_desc}}</div>
                            </h3>
                            <a href="{{url('product/detail/'.$value->product_id.'/'.$value->product_name)}}" class="btn btn-danger btn-lg btn-find-out-more" ><small>Find out more</small></a>
                        </div>

                        <div class="col-md-6 text-center">
                            <img src="{{asset('upload/member/product/images/'.$value->product_image)}}" class="img-responsive">
                        </div>

                    @else

                        <div class="col-md-6 text-center">
                            <img src="{{asset('upload/member/product/images/'.$value->product_image)}}" class="img-responsive">
                        </div>

                        <div class="col-md-6 text-left" style="padding-left: 50px;">
                            <h3 class="text-primary">
                                <div class="mb-2"><h2 class="text-blue"><b>{{$value->product_name}}</b></h2></div>
                                <div class="mb-3" style="font-size:14px;color:#666;line-height: 1.8;">{{$value->product_short_desc}}</div>
                            </h3>
                            <a href="{{url('product/detail/'.$value->product_id.'/'.$value->product_name)}}" class="btn btn-danger btn-lg btn-find-out-more" ><small>Find out more</small></a>
                        </div>

                    @endif


                </div>

                @php
                    $j++;
                @endphp

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
 <br>
 </section>

 <style>
     .btn-find-out-more {
        padding: 10px;
        background-color: #FF0000;
        width: 200px;
        height: 45px;
        border-radius: 5px;
        border-bottom: 3px solid #ce2828;
        font-size: 16px;
        font-style: italic;
     }

 </style>

@stop

