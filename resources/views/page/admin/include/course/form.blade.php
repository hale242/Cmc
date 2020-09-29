<div class="row">
    <div class="col-sm-12">

        @include('layouts.admin.flash-message')

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

        {{-- Main Page --}}
        @if($data['page']=='Main')

            @if(isset($data['detail']['course_name']))
            <?php $course = $data['detail']['course_name'];?>
            @else
            <?php $course = null;?>
            @endif

            @if(isset($data['detail']['course_cat_id']))
            <?php $category_id = $data['detail']['course_cat_id'];?>
            @else
            <?php $category_id = null;?>
            @endif

            @if(isset($data['detail']['course_teacher_id']))
            <?php $teacher_id = $data['detail']['course_teacher_id'];?>
            @else
            <?php $teacher_id = null;?>
            @endif

            @if(isset($data['detail']['course_vdo_url']))
            <?php $vdo_url = $data['detail']['course_vdo_url'];?>
            @else
            <?php $vdo_url = null;?>
            @endif

            @if(isset($data['detail']['course_price']))
            <?php $course_price = $data['detail']['course_price'];?>
            @else
            <?php $course_price = null;?>
            @endif

            @if(isset($data['detail']['course_short_description']))
            <?php $course_short_description = $data['detail']['course_short_description'];?>
            @else
            <?php $course_short_description = null;?>
            @endif

            @php

                // dd($data);

                if(isset($data['detail']['course_curriculum'])){
                    $course_curriculum = $data['detail']['course_curriculum'];
                }else{
                    $course_curriculum = null;
                }

                if(isset($data['detail']['course_instructor'])){
                    $course_instructor = $data['detail']['course_instructor'];
                }else{
                    $course_instructor = null;
                }

                if(isset($data['detail']['course_full_description'])){
                    $course_full_description = $data['detail']['course_full_description'];
                }else{
                    $course_full_description = null;
                }

                if(isset($data['detail']['duration'])){
                    $duration = $data['detail']['duration'];
                }else{
                    $duration = null;
                }

                if(isset($data['detail']['skilllevel'])){
                    $skilllevel = $data['detail']['skilllevel'];
                }else{
                    $skilllevel = null;
                }

                if(isset($data['detail']['language'])){
                    $language = $data['detail']['language'];
                }else{
                    $language = null;
                }

            @endphp



            @if(file_exists(public_path().'/upload/member/course/images/'.$data['detail']['course_image']) &&
            $data['detail']['course_image']!=null)
            <?php $img = asset('upload/member/course/images/'.$data['detail']['course_image']);?>
            @else
            <?php $img = asset('assets/member/images/no-image.png');?>
            @endif

            @if(isset($data['detail']['course_is_required']))
            <?php $course_is_required_id = $data['detail']['course_is_required'];?>
            @else
            <?php $course_is_required_id = null;?>
            @endif

            @if(isset($data['pre_post_test']->pretest_header))
            <?php $pretest = $data['pre_post_test']->pretest_header;?>
            @else
            <?php $pretest = null;?>
            @endif

            @if(isset($data['pre_post_test']->posttest_header))
            <?php $posttest = $data['pre_post_test']->posttest_header;?>
            @else
            <?php $posttest = null;?>
            @endif

            @if(isset($data['pre_post_test']->score_required))
            <?php $score = $data['pre_post_test']->score_required;?>
            @else
            <?php $score = null;?>
            @endif

            @if(isset($data['pre_post_test']->question_type))
            <?php $question_type = $data['pre_post_test']->question_type;?>
            @else
            <?php $question_type = null;?>
            @endif

            @if(isset($data['detail']['course_status']))
            <?php $status = $data['detail']['course_status'];?>
            @else
            <?php $status = null;?>
            @endif



            <section class="panel panel-default">
                <header class="panel-heading">
                    <span class="h4">{{$data['action']}} Course</span>
                </header>

                <div class="panel-body">

                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item active">
                            <a class="nav-link" id="course-tab" data-toggle="tab" href="#course" role="tab" aria-controls="home" aria-selected="true">Course detail</a>
                        </li>
                        @if($data['action']=='Edit')
                            <li class="nav-item">
                                <a class="nav-link" id="pre-tab" data-toggle="tab" href="#pre" role="tab" aria-controls="profile" aria-selected="false">Pre & Post Test</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="lessons-tab" data-toggle="tab" href="#lessons" role="tab" aria-controls="contact" aria-selected="false">Lessons</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="gradebook-tab" data-toggle="tab" href="#gradebook" role="tab" aria-controls="contact" aria-selected="false">Gradebook</a>
                            </li>
                        @endif
                    </ul>
                    <div class="tab-content" id="myTabContent">

                        {{-- Start Course --}}
                        <div class="tab-pane fade active in" id="course" role="tabpanel" aria-labelledby="course-tab">

                            <form id="form_course" name="form_course" class="form-horizontal" novalidate action="{{url('admin/course/Main/action')}}" method="post" enctype="multipart/form-data" autocomplete="off">
                                @csrf
                                <input type="hidden" name="img_hidden" value="{{$data['detail']['course_image']}}">
                                <input type="hidden" name="type_action" id="type_action" value="{{$data['action']}}">
                                <input type="hidden" name="id" value="@if(isset($data['id'])){{$data['id']}}@else{{''}}@endif">

                                <div class="col-sm-7">
                                    @if($data['pre_test_count']===0)
                                        <div class="alert alert-warning m-t">Please create Pre & Post Test for complete course.</div>
                                    @endif
                                    <div class="form-group col-sm-12 m-t">
                                        <div class="col-sm-12">
                                            <label><b>Course Name</b> <small class="text-danger">*</small></label>
                                            <input name="course_name" id="course_name" type="text" class="form-control" placeholder="Course Name" value="{{$course}}" required>
                                            <span id="course_name_help" class="help-block text-danger hide">Please enter Course name</span>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <div class="col-sm-6">
                                            <label><b>Category</b> <small class="text-danger">*</small></label>
                                            <select name="category" id="category" class="form-control" required>
                                                <option value="">Select</option>
                                                @foreach($data['category'] as $value)
                                                    <option value="{{$value->category_id}}" @if($category_id==$value->category_id){{'selected'}}@endif>{{$value->category_name}}</option>
                                                @endforeach
                                            </select>
                                            <span id="category_help" class="help-block text-danger hide">Please select Category</span>
                                        </div>
                                        <div class="col-sm-6">
                                            <label><b>Teacher</b> <small class="text-danger">*</small></label>
                                            <select name="teacher" id="teacher" class="form-control" required>
                                                <option value="">Select</option>
                                                @foreach($data['teacher'] as $value)
                                                    <option value="{{$value->user_id}}" @if($teacher_id==$value->user_id){{'selected'}}@endif>{{$value->first_name.' '.$value->last_name}}
                                                </option>
                                                @endforeach
                                            </select>
                                            <span id="teacher_help" class="help-block text-danger hide">Please select Teacher</span>
                                        </div>
                                    </div>

                                    <div class="form-group col-sm-12">
                                        <div class="col-sm-7">
                                            <label><b>Video Url</b></label>
                                            <input name="video_url" id="video_url" type="text" class="form-control" placeholder="Embed Video" value="{{$vdo_url}}">
                                        </div>
                                        <div class="col-sm-5">
                                            <label><b>Price Course</b> <small class="text-danger">*</small></label>
                                            <div class="input-group">
                                                <span class="input-group-addon">฿</span>
                                                <input name="price" id="price" type="text" class="form-control text-right" placeholder="Price Course" value="{{$course_price}}" required>
                                                <span class="input-group-addon">.00</span>
                                            </div>
                                            <span id="price_help" class="help-block text-danger hide">Please enter Course price</span>
                                        </div>
                                    </div>

                                    <div class="form-group col-sm-12">
                                        <div class="col-sm-4">
                                            <label><b>Duration</b></label>
                                            <div class="input-group">
                                                <input name="duration" id="duration" type="text" class="form-control text-right" placeholder="Duration" value="{{$duration}}">
                                                <span class="input-group-addon">Hour</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <label><b>Skill level</b></label>
                                            {{-- <input name="skilllevel" id="skilllevel" type="text" class="form-control" placeholder="Skill level" value="{{$skilllevel}}"> --}}
                                            <select name="skilllevel" id="skilllevel" class="form-control">
                                                @foreach ($data['skills'] as $skill)
                                                    <option value="{{$skill->id}}" <?php if($skilllevel == $skill->id){ echo "selected"; } ?>>{{$skill->skill_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-sm-4">
                                            <label><b>Language</b></label>
                                            <input name="language" id="language" type="text" class="form-control" placeholder="Language" value="{{$language}}">
                                        </div>
                                    </div>


                                    <div class="form-group col-sm-12">
                                        <div class="col-sm-12">
                                            <label><b>Short Description</b> <small class="text-danger">*</small></label>
                                            <textarea name="short_description" id="short_description"  class="form-control" placeholder="Course Short Description" rows="6" required>{{$course_short_description}}</textarea>
                                            <span id="short_description_help" class="help-block text-danger hide">Please enter Short Description</span>
                                        </div>
                                    </div>

                                    <div class="form-group col-sm-12">
                                        <div class="col-sm-12">
                                            <label><b>Overview</b> <small class="text-danger">*</small></label>
                                            <input type="hidden" id="content_desc">
                                            <textarea name="full_description" id="full_description" class="form-control" placeholder="Course Full Description" required>{{ $course_full_description }}</textarea>
                                            <span id="content_desc_help" class="help-block text-danger hide">Please enter Overview</span>
                                        </div>
                                    </div>

                                    <div class="form-group col-sm-12">
                                        <div class="col-sm-12">
                                            <label><b>Course Curriculum</b> <small class="text-danger">*</small></label>
                                            <textarea name="course_curriculum" id="course_curriculum" class="form-control" placeholder="Course Curriculum" required>{{ $course_curriculum }}</textarea>
                                            <span id="course_curriculum_help" class="help-block text-danger hide">Please enter Course curriculum</span>
                                        </div>
                                    </div>

                                    <div class="form-group col-sm-12">
                                        <div class="col-sm-12">
                                            <label><b>Course Instructor</b> <small class="text-danger">*</small></label>
                                            <textarea name="course_instructor" id="course_instructor" class="form-control" placeholder="Course Instructor" required>{{ $course_instructor }}</textarea>
                                            <span id="course_instructor_help" class="help-block text-danger hide">Please enter Course instructor</span>
                                        </div>
                                    </div>

                                    <div class="form-group col-sm-12">
                                        <div class="col-sm-12">
                                            <label><b>Course is required</b></label>
                                            <select name="course_is_required" class="form-control">
                                                <option value="">Select</option>
                                                @foreach($data['course_is_required'] as $value)
                                                    <option value="{{$value->course_id}}" @if($course_is_required_id==$value->course_id){{'selected'}}@endif>{{$value->course_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                </div>

                                <div class="col-sm-5 m-t">

                                    @if($data['action']=='Edit' && $data['pre_test_count']>0)
                                        <div class="form-group col-sm-12 text-right">
                                            <span style="margin-right: 10px;">Active Status</span>
                                            <label class="switch switch-sm" title="Open | Close Status" style="margin-top: 8px;">
                                                <input name="status" type="checkbox" @if($status==1){{'checked'}}@endif value="1">
                                                <span style="padding-top: 5px; padding-right: 4px;">OFF</span>
                                            </label>
                                        </div>
                                    @endif

                                    <div class="form-group col-sm-12">

                                        <div class="text-center" style="padding:5px;border:1px solid #ccc">
                                            <a data-fancybox="gallery" href="{{$img}}" target="_blank" class="fancy-box">
                                                <img src="{{$img}}" class="img-responsive" style="margin: auto;">
                                            </a>
                                        </div>

                                        <label for="img" class="m-t"><b>Thumbnail</b></label>
                                        <input type="file" name="img" id="img" class="form-control">
                                        <small class="text-xs text-success m-t">Only support jpeg, jpg, png files. || Upload file a maximum of 2 mb.</small>
                                        <span id="img_help" class="help-block text-danger hide">Please enter Thumbnail</span>
                                    </div>

                                </div>

                                <div class="col-lg-12">

                                    <footer class="panel-footer text-right bg-light lter">
                                        <button type="submit" class="btn btn-success btn-s-xs">Save</button>
                                        <button type="reset" class="btn btn-danger btn-s-xs">Cancel</button>
                                    </footer>

                                </div>

                            </form>

                        </div>
                        {{-- End Course --}}

                        {{-- Start Pre & Post Tab --}}
                        <div class="tab-pane fade" id="pre" role="tabpanel" aria-labelledby="pre-tab">

                            <form id="form_pre_post" name="form_pre_post" class="form-horizontal" method="post" enctype="multipart/form-data" autocomplete="off">
                                @csrf

                                <input type="hidden" name="type_action" value="{{$data['action']}}">

                                <input type="hidden" name="id" value="@if(isset($data['id'])){{$data['id']}}@else{{''}}@endif">

                                <input type="hidden" name="test_id" id="test_id" value="@if(isset($data['pre_post_test']->test_id)){{$data['pre_post_test']->test_id}}@else{{''}}@endif">

                                <div class="col-md-12 m-t">
                                    <div class="col-md-4">

                                        <div class="form-group col-sm-12">
                                            <label>Pretest header</label>
                                            <input name="pretest" type="text" class="form-control" placeholder="Pretest header" value="{{$pretest}}" required>
                                        </div>

                                    </div>

                                    <div class="col-md-4">

                                        <div class="form-group col-sm-12">
                                            <label>Posttest header</label>
                                            <input name="posttest" type="text" class="form-control" placeholder="Posttest header" value="{{$posttest}}" required>
                                        </div>

                                    </div>

                                    <div class="col-md-4">

                                        <div class="form-group col-sm-12">
                                            <label>Minimum score required</label>
                                            <input name="score" id="score" type="text" class="form-control text-center" maxlength="3" placeholder="Minimum score required" value="{{$score}}" required>
                                        </div>

                                    </div>

                                </div>

                                <style>
                                    .input-group-addon{
                                        padding: 0px 12px !important;
                                    }
                                    .bg-question {
                                        background-color: #41586e !important;
                                        color: #ffffff;
                                    }
                                    .bg-answer {
                                        background-color: #505050 !important;
                                        color: #e2f3e5;
                                    }
                                    .scroller{
                                        max-height: 400px;
                                        overflow: auto;
                                    }
                                    .manage{
                                        margin-top: 5px;
                                        position: absolute;
                                        right: 20px;
                                    }
                                    .has-error{
                                        border-color: #a94442;
                                    }
                                    .btn-add-ans{
                                        width: 100%;
                                        height: 40px;
                                        margin: -10px 0px 20px 0px;
                                    }
                                </style>

                                <!-- show question เฉพาะเพิ่มคำถามใหม่-->
                                @if(isset($data['pre_post_test']->test_id))
                                    @php
                                        $number = sizeof($data['question']);
                                    @endphp
                                    <div id="show_question_amount">
                                        <div class="form-group col-md-12 form-group">
                                            <div class="col-md-12">
                                                <div class="show_question col-md-12">

                                                    <div class="alert b-primary" style="background-color: #efefef;box-shadow: 1px 3px 5px #cbf1d3;">
                                                            <div class="input-group">
                                                                <span class="input-group-addon bg-question">Question</span>
                                                                    <input type="text" name="question" id="question" class="form-control" placeholder="Enter question.">
                                                                    <input type="hidden" name="questionid" id="questionid">
                                                                <span class="input-group-addon hide que_img"></span>
                                                                <span class="input-group-addon hide que_img_del"></span>
                                                                <span class="input-group-addon">
                                                                    <input type="file" name="question_img" id="question_img">
                                                                    <input type="hidden" name="question_old_img" id="question_old_img">
                                                                    <input type="hidden" name="cou_ans_file" id="cou_ans_file">
                                                                </span>
                                                            </div>
                                                            <span id="question_help" class="help-block text-danger hide">Please enter Question</span>


                                                            {{-- Answer Box --}}
                                                            <div class="show_ans alert m-t" style="/*background-color: #a0a0a0;*/border: 1px dotted #737373;max-height: 300px;overflow: auto;"></div>

                                                            {{-- Answer Btn --}}
                                                            <button type="button" class="btn btn-success btn-sm btn-add-ans"><i class="fa fa-plus "></i> Add Answer</button>

                                                            <div>
                                                                <button type="button" id="add-question" class="btn btn-success">Save Question</button>
                                                                <button type="button" id="edit-question" class="btn btn-warning hide">Edit Question</button>
                                                                <button type="button" id="cancel-question" class="btn btn-danger hide">Cancel</button>
                                                            </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- แสดงคำถามทั้งหมด --}}
                                    <div class="question-all">
                                        <div class="form-group col-md-12 form-group">
                                            <div class="col-md-12 scroller">
                                                <div id="showall_item" class="show_question col-md-12">
                                                    @if($data['question']!='')
                                                        @foreach ($data['question'] as $key => $item)
                                                        <div class="manage">
                                                            <i class="btn btn-sm btn-warning fa fa-pencil btn_edit_question" q-count="{{sizeof($data['choice'][$key])}}" question-id="{{$item['question_id']}}" data-q="{{$item['question']}}" test-id="{{$data['pre_post_test']->test_id}}"></i>
                                                            <i class="btn btn-sm btn-danger fa fa-times btn_del_question" question-id="{{$item['question_id']}}" test-id="{{$data['pre_post_test']->test_id}}"></i>
                                                        </div>
                                                            <div class="alert alert-success">
                                                                <b>Question # {{$number--}} : {{$item['question']}}</b>
                                                                <div class="m-t">
                                                                    @foreach ($data['choice'][$key] as $keyans => $ans)
                                                                        <p style="margin-bottom:0px;">Ans # {{$keyans+1}} : {{$ans['choice']}} <b>(<?php if($ans['answer']=='true'){ echo 'Yes'; }else{ echo 'N'; } ?>)</b></p>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- แสดงคำถามทั้งหมด --}}

                                @endif



                                <div class="col-lg-12">

                                    <footer class="panel-footer text-right bg-light lter">
                                        <button type="submit" class="btn btn-success btn-s-xs">Save</button>
                                        <button type="reset" class="btn btn-danger btn-s-xs">Cancel</button>
                                    </footer>

                                </div>

                            </form>


                        </div>
                        {{-- End Pre & Post Tab --}}

                        {{-- Start Lessons --}}
                        <div class="tab-pane fade" id="lessons" role="tabpanel" aria-labelledby="lessons-tab">



                            <div class="row">
                                <div class="col-lg-12">

                                    <div class="row m-t">
                                        <div class="col-md-4">
                                            <label for="">Lesson name</label>
                                            <input type="text" class="column_filter form-control" id="lesson1_filter">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="">Status</label>
                                            <select name="" id="lesson3_filter" class="column_filter form-control">
                                                <option value=""></option>
                                                <option value="Activate">Activate</option>
                                                <option value="Draft">Draft</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4 text-right m-t-md">
                                            <button type="button" class="btn btn-primary" onclick="btn_create_lesson('Create','{{$data['lesson']['document_file']}}','{{$data['detail']['course_id']}}','{{$data['lesson']['lesson_id']}}');">
                                                <i class="fa fa-plus"></i> Create
                                            </button>
                                        </div>
                                    </div>

                                    <table id="Lesson_datatable" class="table table-striped b-t b-light m-t" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Lesson Name</th>
                                                <th>Document file</th>
                                                <th>Status</th>
                                                <th>Create Date</th>
                                                <th>Modify Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if(count($data['lesson'])>0)

                                            <?php
                                                $i = 1;
                                                $lesson_file = [];
                                            ?>

                                            @foreach($data['lesson'] as $key => $value)
                                            <tr>
                                                <td>{{$i++}}</td>
                                                <td>{{$value->lesson_name}}</td>
                                                <td>
                                                    @php
                                                    // dd($data['file_lesson']);
                                                    @endphp
                                                    @if(isset($data['file_lesson']))
                                                        @if($data['file_lesson'][$key])
                                                            @foreach($data['file_lesson'][$key] as $value2)

                                                                @php

                                                                    $lesson_file[] = $value2->lesson_file;
                                                                    $extension = explode('.',$value2->lesson_file);

                                                                    if($extension[1]=='jpg'||$extension[1]=='jpeg'||$extension[1]=='gif'||$extension[1]=='png'||$extension[1]=='bmp'){
                                                                        $datafile = 'ico_img.png';
                                                                    }else if($extension[1]=='doc'||$extension[1]=='docx'){
                                                                        $datafile = 'ico_doc.png';
                                                                    }else if($extension[1]=='xls'||$extension[1]=='xlsx'){
                                                                        $datafile = 'ico_xls.png';
                                                                    }else if($extension[1]=='ppt'||$extension[1]=='pptx'){
                                                                        $datafile = 'ico_ppt.png';
                                                                    }else if($extension[1]=='pdf'){
                                                                        $datafile = 'ico_pdf.png';
                                                                    }else{
                                                                        $datafile = 'ico_zip.png';
                                                                    }

                                                                @endphp

                                                                @if(file_exists(public_path().'/upload/member/lesson/file/'.$value2->lesson_file) && $value2->lesson_file!=null)
                                                                    <a target="_blank" href="{{url('upload/member/lesson/file/'.$value2->lesson_file)}}" <?php if($extension[1]=='jpg'||$extension[1]=='jpeg'||$extension[1]=='gif'||$extension[1]=='png'||$extension[1]=='bmp'){ echo 'data-fancybox="Download"'; } ?> title="{{$extension[0]}}">
                                                                        <img src="{{asset('mockup/'.$datafile)}}" alt="">
                                                                    </a>
                                                                @endif

                                                            @endforeach
                                                        @else
                                                            {{'-'}}
                                                        @endif
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($value->lesson_status==1)
                                                    <span class="label label-success">Activate</span>
                                                    @else
                                                    <span class="label label-warning">Draft</span>
                                                    @endif
                                                </td>
                                                <td>{{date("d-m-Y",strtotime($value->date_create))}}</td>
                                                <td>{{date("d-m-Y",strtotime($value->date_update))}}</td>
                                                <td>

                                                    @php
                                                        $textcontent = htmlspecialchars($value->lesson_status);
                                                    @endphp


                                                    <a href="javascript:;" class="btn btn-success" onclick="btn_create_lesson('Edit','{{json_encode($lesson_file)}}','{{$value->course_id}}','{{$value->lesson_id}}','{{$value->lesson_name}}','{{$value->lesson_vdo_url}}','','{{$textcontent}}');" title="Edit"><i class="fa fa-edit"></i></a>

                                                    <a href="#" class="btn btn-danger" onclick="confirm_delete('{{url('admin/course/delete/Lesson/')}}','{{$value->lesson_id}}');" title="Delete"><i class="fa fa-trash-o"></i></a>
                                                </td>
                                            </tr>
                                            @endforeach
                                            @else
                                            <tr>
                                                <td colspan="10" class="text-danger">
                                                    <div class="text-center">{{trans('other.data_not_found')}}</div>
                                                </td>
                                            </tr>
                                            @endif
                                        </tbody>
                                    </table>

                                    <footer class="panel-footer">
                                        <div class="row">
                                            <div class="col-sm-2 text-left">
                                                <small class="text-muted inline m-t-sm m-b-sm">@if(count($data['lesson'])>10){{'Showing 1-10 of'.count($data['lesson']).'items'}}@else{{'Showing '.count($data['lesson']).' items'}}@endif</small>
                                            </div>
                                            <div class="col-sm-8">
                                            </div>
                                            <div class="col-sm-3 text-right">
                                                {{$data['lesson']->links()}}
                                            </div>
                                        </div>
                                    </footer>

                                </div>
                            </div>

                        </div>
                        {{-- End Lessons --}}

                        {{-- Start Gradebook --}}
                        <div class="tab-pane fade" id="gradebook" role="tabpanel" aria-labelledby="gradebook-tab">

                            <div class="row">
                                <div class="col-lg-12">

                                    <div class="row m-t">
                                        <div class="col-md-4">
                                            <label for="">Student name</label>
                                            <input type="text" class="column_filter form-control" id="col1_filter">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="">Score</label>
                                            <input type="text" class="column_filter form-control" id="col4_filter">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="">Status</label>
                                            <select name="" id="col5_filter" class="column_filter form-control">
                                                <option value=""></option>
                                                <option value="Pass">Pass</option>
                                                <option value="False">False</option>
                                                <option value="Wait">Wait</option>
                                            </select>
                                        </div>
                                    </div>


                                    <table id="Gradbook_datatable" class="table table-striped b-t b-light m-t" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th class="text-center">#</th>
                                                <th>Student Name</th>
                                                <th class="text-center">Start Date</th>
                                                <th class="text-center">Finish Date</th>
                                                <th class="text-center">Total Score</th>
                                                <th class="text-center">Grade Status</th>
                                                {{-- <th class="text-center">Action</th> --}}
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{-- {{dd($data['gradebook'])}} --}}
                                            @if(count($data['gradebook'])>0)

                                                {{-- {{dd($data['gradebook'])}} --}}
                                                @php $i = 1; @endphp
                                                @foreach($data['gradebook'] as $value)
                                                    <tr>

                                                        <td class="text-center">{{$i++}}</td>
                                                        <td>{{$value->first_name.' '.$value->last_name}}</a></td>
                                                        <td class="text-center">{{date("d-m-Y",strtotime($value->created_at))}}</td>
                                                        <td class="text-center">{{date("d-m-Y",strtotime($value->updated_at))}}</td>
                                                        <td class="text-center">{{$value->posttest_score}}</td>
                                                        <td class="text-center">
                                                            @if($value->pretest_status==0)
                                                                <span class="badge bg-warning">Wait</span>
                                                            @elseif($value->pretest_status==1)
                                                                <span class="badge bg-danger">False</span>
                                                            @elseif($value->pretest_status==2)
                                                                <span class="badge bg-success">Pass</span>
                                                            @endif
                                                        </td>
                                                        {{-- <td class="text-center">
                                                            <a href="#" class="btn btn-sm btn-danger" onclick="confirm_delete('{{url('admin/course/delete/Gradebook/')}}','{{$value->user_course_id}}');" title="Delete">
                                                                <i class="fa fa-trash-o"></i>
                                                            </a>
                                                        </td> --}}

                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td colspan="10" class="text-danger">
                                                        <div class="text-center">{{trans('other.data_not_found')}}</div>
                                                    </td>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>

                                    <footer class="panel-footer">
                                        <div class="row">
                                            <div class="col-sm-2 text-left">
                                                <small class="text-muted inline m-t-sm m-b-sm">
                                                    @if(count($data['gradebook'])>25){{'Showing 1-25 of'.count($data['gradebook']).'items'}}@else{{'Showing '.count($data['gradebook']).' items'}}@endif
                                                </small>
                                            </div>
                                            <div class="col-sm-8">
                                            </div>
                                            <div class="col-sm-3 text-right">
                                                {{$data['gradebook']->links()}}
                                            </div>
                                        </div>
                                    </footer>
                                </div>
                            </div>

                        </div>
                        {{-- End Gradebook --}}

                    </div>

                </div>

            </section>
        @endif

        {{-- Category Page --}}
        @if($data['page']=='Category')

            @if(isset($data['detail']['category_name']))
            <?php $category = $data['detail']['category_name'];?>
            @else
            <?php $category = null;?>
            @endif

            @if(isset($data['detail']['category_status']))
            <?php $status = $data['detail']['category_status'];?>
            @else
            <?php $status = null;?>
            @endif

            <form class="form-horizontal" action="{{url('admin/course/'.$data['page'].'/action')}}" method="post" enctype="multipart/form-data" autocomplete="off">
                @csrf

                <input type="hidden" name="type_action" value="{{$data['action']}}">

                <input type="hidden" name="id" value="@if(isset($data['id'])){{$data['id']}}@else{{''}}@endif">

                <section class="panel panel-default">
                    <header class="panel-heading">
                        <span class="h4">{{$data['action']}} Category</span>
                    </header>
                    <div class="panel-body">
                        <div class="form-group pull-in clearfix">
                            <div class="col-sm-6">
                                <label>Category Name</label>
                                <input name="category" type="text" class="form-control" placeholder="Category Name"
                                    value="{{$category}}" required>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-sm-5">
                                <div class="line line-dashed line-lg pull-in"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Status</label>
                                    <div class="col-sm-10">
                                        <label class="switch">
                                            <input name="status" type="checkbox" @if($status==1){{'checked'}}@endif
                                                value="1">
                                            <span></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <footer class="panel-footer text-right bg-light lter">
                            <button type="submit" class="btn btn-success btn-s-xs">Save</button>
                            <button type="reset" class="btn btn-danger btn-s-xs">Cancel</button>
                        </footer>
                </section>

            </form>

        @endif


        @if($data['page']=='Skill')

            @php
                if(isset($data['detail']['skill_name'])){
                    $skillname = $data['detail']['skill_name'];
                }else{
                    $skillname = null;
                }

                if(isset($data['detail']['status'])){
                    $status = $data['detail']['status'];
                }else{
                    $status = null;
                }

                if(isset($data['detail']['sort'])){
                    $sort = $data['detail']['sort'];
                }else{
                    $sort = null;
                }
            @endphp


            <form class="form-horizontal" action="{{url('admin/course/'.$data['page'].'/action')}}" method="post" enctype="multipart/form-data" autocomplete="off">
                @csrf
                <input type="hidden" name="type_action" value="{{$data['action']}}">
                <input type="hidden" name="id" value="@if(isset($data['id'])){{$data['id']}}@else{{''}}@endif">

                <section class="panel panel-default">
                    <header class="panel-heading">
                        <span class="h4">{{$data['action']}} Skill</span>
                    </header>

                    <div class="panel-body">
                        <div class="col-sm-6">
                            <label for="">Skill name</label>
                            <input type="text" id="skillname" name="skillname" value="{{$skillname}}" class="form-control">
                        </div>

                        <div class="col-sm-3">
                            <label for="">Sort</label>
                            <input type="text" id="sort" name="sort" value="{{$sort}}" class="form-control">
                        </div>

                        <div class="col-sm-3">
                            {{-- <div class="line line-dashed line-lg pull-in"></div> --}}
                            <div class="form-group" style="margin-top: 23px;">
                                <label class="col-sm-2 control-label">Status</label>
                                <div class="col-sm-10">
                                    <label class="switch">
                                        <input name="status" type="checkbox" @if($status=='1'){{'checked'}}@endif value="1">
                                        <span></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <footer class="panel-footer text-right bg-light lter">
                        <button type="submit" class="btn btn-success btn-s-xs">Save</button>
                        <button type="reset" class="btn btn-danger btn-s-xs">Cancel</button>
                    </footer>

                </section>
            </form>

        @endif

    </div>
</div>

<style>
    #Lesson_datatable_filter, #Gradbook_datatable_filter {
        display: none;
    }
</style>


@section('javascript')

<script>
    $(document).ready(function() {
        function filterColumn (i) {
            $('#Gradbook_datatable').DataTable().column(i).search(
                $('#col'+i+'_filter').val()
            ).draw();
        }

        function filterColumnLesson (i) {
            $('#Lesson_datatable').DataTable().column(i).search(
                $('#lesson'+i+'_filter').val()
            ).draw();
        }

        var url = '<?php echo url()->current(); ?>';
        var res = url.split('/');
        var check = res[5]+'\/'+res[6];

        if(check=='main/add' || check=='course/edit'){
            var editor = CKEDITOR.replace( 'full_description', {
                filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
                filebrowserUploadMethod: 'form'
            } );
            editor.on( 'change', function( evt ) {
                $('#full_description').val(evt.editor.getData());
            });

            var editor = CKEDITOR.replace( 'course_curriculum', {
                filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
                filebrowserUploadMethod: 'form'
            } );
            editor.on( 'change', function( evt ) {
                $('#course_curriculum').val(evt.editor.getData());
            });

            var editor = CKEDITOR.replace( 'course_instructor', {
                filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
                filebrowserUploadMethod: 'form'
            });
            editor.on( 'change', function( evt ) {
                $('#course_instructor').val(evt.editor.getData());
            });
        }

            var gradebook = '<?php echo count($data["gradebook"]) ?>';
            var lesson    = '<?php echo count($data["lesson"]) ?>';

            if(gradebook>0){
                $('#Gradbook_datatable').DataTable();

                $('#col1_filter').on( 'keyup click', function () {
                    filterColumn(1);
                } );
                $('#col4_filter').on( 'keyup click', function () {
                    filterColumn(4);
                } );
                $('#col5_filter').on( 'change click', function () {
                    filterColumn(5);
                } );
            }

            if(gradebook>0){
                $('#Lesson_datatable').DataTable();

                $('#lesson1_filter').on( 'keyup click', function () {
                    filterColumnLesson(1);
                } );

                $('#lesson3_filter').on( 'change click', function () {
                    filterColumnLesson(3);
                } );
            }

    });


</script>

@stop

