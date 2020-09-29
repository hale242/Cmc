@extends('layouts.member.template')

@section('detail')

<section id="mu-course-content">
   <div class="container">
     <div class="row">
      <div class="col-md-12 text-left breadcrumb">
      <a href="{{url('/')}}">Home</a> > <a href="{{url('course')}}" class="text-primary">Course</a>
      <hr>
      </div>
       <div class="col-md-12">
         <div class="mu-course-content-area">
            <div class="row">

              <div class="col-md-3">


                <!-- start sidebar -->
                <aside class="mu-sidebar">

                  <form name="form_search" id="form_search" method="post" action="{{url('course/search')}}" style="margin-bottom:20px; position:relative;">
                    @csrf
                    <input type="text" name="txt_search" class="form-control" placeholder="our course" required style="padding-left:98px;">
                    <img src="{{ asset('mockup/search_bar.png')}}" style="position:absolute;top: 5px;left: 10px;">
                  </form>

                  <!-- start single sidebar -->
                  <div class="col-md-12" style="padding: 20px;background-color: #f4f4f4; margin-bottom:30px;">
                    <h4><b>Course Categories</b></h4>

                      @if(isset($data['category']))
                      @foreach ($data['category'] as $value)

                        <div class="boxchoice">
                            <label for="cbx{{$value->category_id}}" class="label-cbx">
                                <input id="cbx{{$value->category_id}}" name="choice_pretest[{{$value->category_id}}]" type="checkbox" class="check_cat invisible" value="{{$value->category_id}}">
                                <div class="checkbox">
                                    <svg width="20px" height="20px" viewBox="0 0 25 25">
                                        <polyline points="4 11 8 15 16 6"></polyline>
                                    </svg>
                                </div>
                                <span style="font-weight:300">{{$value->category_name}} <small style="color:#0072bc">({{DB::table('course')->where('course_cat_id', $value->category_id)->count()}})</small></span>
                            </label>
                        </div>

                      @endforeach
                      @endif



                    <h4 class="mt-2"><b>Skill Level</b></h4>
                        @if(isset($data['skill']))
                        @foreach ($data['skill'] as $valuex)

                        <div class="boxchoice">
                            <label for="skill{{$valuex->id}}" class="label-cbx">
                                <input id="skill{{$valuex->id}}" name="skill[{{$valuex->id}}]" type="checkbox" class="check_skill invisible" value="{{$valuex->id}}">
                                <div class="checkbox">
                                    <svg width="20px" height="20px" viewBox="0 0 25 25">
                                        <polyline points="4 11 8 15 16 6"></polyline>
                                    </svg>
                                </div>
                                <span style="font-weight:300">{{$valuex->skill_name}} <small style="color:#0072bc">({{DB::table('course')->where('skilllevel', $valuex->id)->count()}})</small></span>
                            </label>
                        </div>

                        @endforeach
                        @endif


                    <h4 class="mt-2"><b>Price</b></h4>
                    <div class="col-md-12">
                        <div id="showamount" class="text-center" style="margin-bottom:10px;color: #0072c9;font-size: 16px;"></div>
                        <input type="hidden" id="amount">
                        <input type="hidden" id="min_price" value="{{$data['min_price']}}">
                        <input type="hidden" id="max_price" value="{{$data['max_price']}}">
                        <div id="price_range"></div>
                    </div>

                  </div>
                  <!-- end single sidebar -->



                </aside>
                <!-- / end sidebar -->


             </div>



              <div class="col-md-9">
                <!-- start course content container -->
                <div class="mu-course-container">
                  <div class="row">

                    <div class="loader"></div>

                    <div class="col-md-3 pull-right">
                        <select name="sort_order" id="sort_order" class="form-control">
                            <option value="desc">Newly Published</option>
                            <option value="asc">Older Published</option>
                        </select>
                    </div>
                    <div style="clear: both;margin-bottom:20px;"></div>

                    <div id="tag_container">
                        <div id="show_course"></div>
                    </div>

                  </div>
                </div>
                <!-- end course content container -->


              </div>

           </div>
         </div>
       </div>
     </div>
   </div>
 </section>

 <style>

    .box{
        padding: 40px 60px 40px 60px;
        border: 1px solid #ddd;
        margin-top: 20px;
    }

    .txtques{
        font-weight: bold;
        font-size: 16px;
        color: #0072bc;
        margin-bottom: 30px;
    }

    .boxchoice{
        margin-top: 10px;
        margin-bottom: 10px;
    }

    .label-cbx {
        user-select: none;
        cursor: pointer;
        margin-bottom: 0;
    }

    .label-cbx input:checked+.checkbox {
        border-color: #737a7d;
    }

    .label-cbx input:checked+.checkbox svg path {
        fill: #20C2E0;
    }

    .label-cbx input:checked+.checkbox svg polyline {
        stroke-dashoffset: 0;
    }

    .label-cbx:hover .checkbox svg path {
        stroke-dashoffset: 0;
    }

    .label-cbx .checkbox {
        position: relative;
        top: 2px;
        float: left;
        margin-right: 8px;
        margin-top: 0px;
        margin-bottom: 0px;
        width: 20px;
        height: 20px;
        border: 1px solid #a2acb1;
        border-radius: 3px;
        /* box-shadow: 2px 2px 1px #d4d4d3; */
    }

    .label-cbx .checkbox svg {
        position: absolute;
        top: 1px;
        left: 1px;
    }

    .label-cbx .checkbox svg path {
        fill: none;
        stroke: #20C2E0;
        stroke-width: 2;
        stroke-linecap: round;
        stroke-linejoin: round;
        stroke-dasharray: 71px;
        stroke-dashoffset: 71px;
        transition: all 0.6s ease;
    }

    .label-cbx .checkbox svg polyline {
        fill: none;
        stroke: #333;
        stroke-width: 2;
        stroke-linecap: round;
        stroke-linejoin: round;
        stroke-dasharray: 20px;
        stroke-dashoffset: 20px;
        transition: all 0.3s ease;
    }

    .label-cbx>span {
        pointer-events: none;
        vertical-align: middle;
    }

    .cntr {
        position: absolute;
        top: 45%;
        left: 0;
        width: 100%;
        text-align: center;
    }

    .invisible {
        position: absolute;
        z-index: -1;
        width: 0;
        height: 0;
        opacity: 0;
    }

</style>

@stop

