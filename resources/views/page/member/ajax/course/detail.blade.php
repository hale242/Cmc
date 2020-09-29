<input type="hidden" name="minimum_range" id="minimum_range" value="{{$data['minimum_range']}}">
<input type="hidden" name="maximum_range" id="maximum_range" value="{{$data['maximum_range']}}">

@php
    // dd($useridx);
    // dd($data['detail']);
@endphp

@if(count($data['detail'])>0)
@foreach ($data['detail'] as $value)

    <?php

    $id = $value->course_id;

    $catname = $value->category_name;
    $skillname = $value->skill_name;

    $teacher_name = $value->first_name.' '.$value->last_name;

    $course_name = iconv_substr($value->course_name,0,20,'UTF-8');

    $short_description = iconv_substr($value->course_short_description,0,20,'UTF-8');

    $view = $value->course_view;

    $date = date("d",strtotime($value->created_at)).' '.date("M",strtotime($value->created_at)).' '.date("Y",strtotime($value->created_at));

    if(file_exists(public_path().'/upload/member/course/images/'.$value->course_image) && $value->course_image != null)
    {
        $image = asset('upload/member/course/images/'.$value->course_image);
    }
    else{
        $image = asset('assets/member/images/no-image.png');
    }

    if($value->image!=''){
        $img = $value->image;
    }else{
        $img = "no-image.png";
    }


    $url = url('course/detail/'.$id.'/'.$course_name);

    ?>

    <div class="col-md-4 col-sm-4">
        <div class="mu-latest-course-single hvr-float-shadow">

            <div class="catname">
                {{$catname}}
            </div>

            <figure class="mu-latest-course-img">
                {{-- <img src="{{asset('upload/teacher/profile/images/070120_111213.jpg')}}" alt="" class="img-teacher-small" style="margin-top: 115px;width: 55px;height: 55px;"> --}}
                <div class="img-teacher-small img-teacher-in" style="background: url({{asset('upload/profile/'.$img)}});background-size: cover;background-position: top center;"></div>
                {{-- <a href="{{$url}}" style=""><img src="{{$image}}" alt="img" class="img-responsive"></a> --}}
                <a href="{{$url}}" style="height: 145px;background: url({{$image}});background-size: cover;background-position: center top;"></a>
            </figure>

            <div class="mu-latest-course-single-content box-course" style="padding-top: 35px;">

                <div class="box-skill">
                    {{$skillname}}
                </div>

                @php
                    $wishlist = DB::table('wishlist')->where('course_id',$id)->where('user_id', $useridx)->count();
                @endphp

                <div class="box-heart pointer wishlist" course-id="{{$id}}" title="Click to add wishlist">
                    <i class="fa @if($wishlist==0) fa-heart-o text-primary @else fa-heart text-red @endif pointer" style="font-size: 16px;"></i>
                </div>

                <h6 class="course-teacher">{{$teacher_name}}</h6>
                <h4 class="course-name">
                    <a href="{{$url}}"><b>{{$course_name}}</b></a>
                </h4>


                {{-- <p>{{$short_description}}</p> --}}

                <div class="mu-latest-course-single-contbottom line-top">
                    <p> View {{$view}}
                        @if($value->course_price==0)
                            <span class="mu-course-price text-red" href="#"><b>FREE</b></span>
                        @else
                            <span class="mu-course-price text-blue" href="#"><b>{{number_format($value->course_price,2)}} THB</b></span>
                        @endif
                    </p>
                </div>

            </div>

        </div>
    </div>

    @endforeach

    <div class="col-lg-12" align="right">{{$data['detail']->links()}}<div>

@else

    <div style="border: 1px dotted #ccc;padding: 10px;margin: 5px;">
        <div class="text-center text-danger">
            @include('page.member.data_not_found')
        </div>
    </div>

    @endif
