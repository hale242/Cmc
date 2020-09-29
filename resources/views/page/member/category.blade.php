@extends('layouts.member.template')

@section('detail')

<section id="mu-course-content">
   <div class="container">
     <div class="row">
      <div class="col-md-12 text-left">
      <a href="{{url('/')}}">Home</a> > <a href="{{url('course')}}" class="text-primary">Course</a>
      <hr>
      </div>
       <div class="col-md-12">
         <div class="mu-course-content-area">
            <div class="row">

              <div class="col-md-3">
                <!-- start sidebar -->
                <aside class="mu-sidebar">

                  <form name="form_search" id="form_search" method="post" action="{{url('course/search')}}">
                  @csrf
                  <input type="text" name="txt_search" class="form-control" placeholder="Search our course" required>
                  </form>

                 <br>

                  <!-- start single sidebar -->
                  <div class="mu-single-sidebar">
                    <h4><b>Course Categories</b></h4>
                    <ul class="mu-sidebar-catg">
                      @if(isset($data['category']))
                      @foreach ($data['category'] as $value)
                      <li><a href="{{url('course/category/'.$value->category_id.'/'.$value->category_name)}}">{{$value->category_name}}</a></li>
                      @endforeach
                      @endif
                    </ul>

                    <h4><b>Price</b></h4>
                    <div class="col-md-12">
                    <p>
                    <input type="text" id="amount" readonly style="border:0; color:#337ab7; font-weight:bold;">
                    </p>
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

                    <input type="hidden" name="category_id" id="category_id" value="{{$data['category_id']}}">

                    <div class="loader"></div>
                    <div id="tag_container">
                    <div id="show_course_category"></div>
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

@stop

