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
                        <a class="nav-link" id="course-tab" data-toggle="tab" href="#course" role="tab"
                            aria-controls="home" aria-selected="true">Course detail</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pre-tab" data-toggle="tab" href="#pre" role="tab"
                            aria-controls="profile" aria-selected="false">Pre & Post Test</a>
                    </li>
                    @if($data['action']=='Edit')
                    <li class="nav-item">
                        <a class="nav-link" id="lessons-tab" data-toggle="tab" href="#lessons" role="tab"
                            aria-controls="contact" aria-selected="false">Lessons</a>
                    </li>
                    @endif
                    @if($data['action']=='Edit')
                    <li class="nav-item">
                        <a class="nav-link" id="gradebook-tab" data-toggle="tab" href="#gradebook" role="tab"
                            aria-controls="contact" aria-selected="false">Gradebook</a>
                    </li>
                    @endif
                </ul>
                <div class="tab-content" id="myTabContent">

                    {{-- Start Course --}}
                    <div class="tab-pane fade active in" id="course" role="tabpanel" aria-labelledby="course-tab">

                        <form id="form_course" name="form_course" class="form-horizontal" action="{{url('admin/course/Main/action')}}" method="post" enctype="multipart/form-data" autocomplete="off">
                            @csrf
                            <input type="hidden" name="img_hidden" value="{{$data['detail']['course_image']}}">
                            <input type="hidden" name="type_action" value="{{$data['action']}}">
                            <input type="hidden" name="id" value="@if(isset($data['id'])){{$data['id']}}@else{{''}}@endif">

                            <div class="col-sm-7">
                                <div class="form-group col-sm-12 m-t">
                                    <div class="col-sm-12">
                                        <label><b>Course Name</b> <small class="text-danger">*</small></label>
                                        <input name="course_name" type="text" class="form-control" placeholder="Course Name" value="{{$course}}" required>
                                    </div>
                                </div>
                                <div class="form-group col-sm-12">
                                    <div class="col-sm-6">
                                        <label><b>Category</b> <small class="text-danger">*</small></label>
                                        <select name="category" class="form-control" required>
                                            <option value="">Select</option>
                                            @foreach($data['category'] as $value)
                                                <option value="{{$value->category_id}}" @if($category_id==$value->category_id){{'selected'}}@endif>{{$value->category_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-6">
                                        <label><b>Teacher</b> <small class="text-danger">*</small></label>
                                        <select name="teacher" class="form-control" required>
                                            <option value="">Select</option>
                                            @foreach($data['teacher'] as $value)
                                                <option value="{{$value->user_id}}" @if($teacher_id==$value->user_id){{'selected'}}@endif>{{$value->first_name.' '.$value->last_name}}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group col-sm-12">
                                    <div class="col-sm-7">
                                        <label><b>Video Url</b></label>
                                        <input name="video_url" type="text" class="form-control" placeholder="Embed Video" value="{{$vdo_url}}">
                                    </div>
                                    <div class="col-sm-5">
                                        <label><b>Price Course</b> <small class="text-danger">*</small></label>
                                        <div class="input-group">
                                            <span class="input-group-addon">฿</span>
                                            <input name="price" type="number" class="form-control text-right" placeholder="Price Course" value="{{$course_price}}" required>
                                            <span class="input-group-addon">.00</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group col-sm-12">
                                    <div class="col-sm-4">
                                        <label><b>Duration</b></label>
                                        <div class="input-group">
                                            <input name="duration" type="text" class="form-control text-right" placeholder="Duration" value="{{$duration}}">
                                            <span class="input-group-addon">Hour</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <label><b>Skill level</b></label>
                                        <input name="skilllevel" type="text" class="form-control" placeholder="Skill level" value="{{$skilllevel}}">
                                    </div>
                                    <div class="col-sm-4">
                                        <label><b>Language</b></label>
                                        <input name="language" type="text" class="form-control" placeholder="Language" value="{{$language}}">
                                    </div>
                                </div>


                                <div class="form-group col-sm-12">
                                    <div class="col-sm-12">
                                        <label><b>Short Description</b> <small class="text-danger">*</small></label>
                                        <textarea name="short_description" class="form-control" placeholder="Course Short Description" rows="6" required>{{$course_short_description}}</textarea>
                                    </div>
                                </div>

                                <div class="form-group col-sm-12">
                                    <div class="col-sm-12">
                                        <label><b>Overview</b> <small class="text-danger">*</small></label>
                                        <input type="hidden" id="content_desc">
                                        <textarea name="full_description" id="full_description" class="form-control" placeholder="Course Full Description" required>{{ $course_full_description }}</textarea>
                                    </div>
                                </div>

                                <div class="form-group col-sm-12">
                                    <div class="col-sm-12">
                                        <label><b>Course Curriculum</b></label>
                                        <textarea name="course_curriculum" id="course_curriculum" class="form-control" placeholder="Course Curriculum">{{ $course_curriculum }}</textarea>
                                    </div>
                                </div>

                                <div class="form-group col-sm-12">
                                    <div class="col-sm-12">
                                        <label><b>Course Instructor</b></label>
                                        <textarea name="course_instructor" id="course_instructor" class="form-control" placeholder="Course Instructor">{{ $course_instructor }}</textarea>
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

                            <div class="col-sm-5">

                                <div class="form-group col-sm-12 m-t text-right">
                                    <span style="margin-right: 10px;">Active Status</span>
                                    <label class="switch switch-sm" title="Open | Close Status" style="margin-top: 8px;">
                                        <input name="status" type="checkbox" @if($status==1){{'checked'}}@endif value="1">
                                        <span style="padding-top: 5px; padding-right: 4px;">OFF</span>
                                    </label>
                                </div>

                                <div class="form-group col-sm-12">

                                    <div class="text-center" style="padding:5px;border:1px solid #ccc">
                                        <a data-fancybox="gallery" href="{{$img}}" target="_blank" class="fancy-box">
                                            <img src="{{$img}}" class="img-responsive" style="margin: auto;">
                                        </a>
                                    </div>

                                    <label for="img" class="m-t"><b>Thumbnail</b></label>
                                    <input type="file" name="img" class="form-control" id="img">
                                    <small class="text-danger m-t">Only support jpeg, jpg, png files. || Upload file a maximum of 2 mb.</small>
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

                        <form id="form_pre_post" name="form_pre_post" class="form-horizontal" method="post"
                            enctype="multipart/form-data" autocomplete="off">
                            @csrf

                            <input type="hidden" name="type_action" value="{{$data['action']}}">

                            <input type="hidden" name="id" value="@if(isset($data['id'])){{$data['id']}}@else{{''}}@endif">

                            <input type="hidden" name="test_id" value="@if(isset($data['pre_post_test']->test_id)){{$data['pre_post_test']->test_id}}@else{{''}}@endif">

                            <div class="col-md-12 m-t">
                                <div class="col-md-3">

                                    <div class="form-group col-sm-12">
                                        <label>Pretest header</label>
                                        <input name="pretest" type="text" class="form-control" placeholder="Pretest header" value="{{$pretest}}" required>
                                    </div>

                                </div>

                                <div class="col-md-3">

                                    <div class="form-group col-sm-12">
                                        <label>Posttest header</label>
                                        <input name="posttest" type="text" class="form-control" placeholder="Posttest header" value="{{$posttest}}" required>
                                    </div>

                                </div>

                                <div class="col-md-3">

                                    <div class="form-group col-sm-12">
                                        <label>Minimum score required</label>
                                        <input name="score" type="number" class="form-control" placeholder="Minimum score required" value="{{$score}}" required>
                                    </div>

                                </div>

                                <div class="col-md-3">

                                    <div class="form-group col-sm-12">
                                        <label>Question type</label>
                                        <select name="question_type" id="question_type" class="form-control" required>
                                            <option value="">Select</option>
                                            <option value="1" @if($question_type==1){{'selected'}}@endif>คำถามปรนัย</option>
                                            <option value="2" @if($question_type==2){{'selected'}}@endif>คำถามอัตนัย
                                            </option>
                                        </select>
                                    </div>

                                </div>
                            </div>


                            @if($data['action']=='Edit')

                                <div class="col-md-12">
                                    <div class="col-md-12">
                                        <h5><b>แบบทดสอบคำถามปรนัย</b></h5>
                                    </div>

                                    <div class="col-md-2">
                                        <select name="amount_question" id="amount_question" class="form-control">
                                            <option value="">Amount Question</option>
                                            <?php for($i=1;$i<=30;$i++){?>
                                            <option value="<?php echo $i;?>"><?php echo $i;?></option>
                                            <?php } ?>
                                        </select>
                                    </div>

                                    <div class="col-md-2">
                                        <select name="amount_choice" id="amount_choice" class="form-control">
                                            <option value="">Amount Choice</option>
                                            <?php for($i=1;$i<=4;$i++){?>
                                            <option value="<?php echo $i;?>"><?php echo $i;?></option>
                                            <?php } ?>
                                        </select>
                                    </div>

                                    <div class="col-md-2">
                                        <button type="button" id="btn_create_question" class="btn btn-info">Create</button>
                                    </div>
                                </div>

                            @else

                                <div id="show_question1" class="col-md-12 m-b" style="display: none;">

                                    <div class="col-lg-12">
                                        <h5><b>แบบทดสอบคำถามปรนัย</b></h5>
                                    </div>

                                    <hr>

                                    <div class="col-lg-2">
                                        <select name="amount_question" id="amount_question" class="form-control">
                                            <option value="">Amount Question</option>
                                            <?php for($i=1;$i<=30;$i++){?>
                                            <option value="<?php echo $i;?>"><?php echo $i;?></option>
                                            <?php } ?>
                                        </select>
                                    </div>

                                    <div class="col-lg-2">
                                        <select name="amount_choice" id="amount_choice" class="form-control">
                                            <option value="">Amount Choice</option>
                                            <?php for($i=1;$i<=4;$i++){?>
                                            <option value="<?php echo $i;?>"><?php echo $i;?></option>
                                            <?php } ?>
                                        </select>
                                    </div>

                                    <div class="col-lg-2">
                                        <button type="button" id="btn_create_question" class="btn btn-info">Create</button>
                                    </div>

                                </div>

                            @endif

                            <!-- show question จากการเพิ่มใหม่เท่านั้น -->
                            <div id="show_question_amount"></div>

                            {{-- @if($data['action']=='Edit')

                                <h4 class="text-center"><b>Edit Question</b></h4>

                            @if($data['question'])

                                @php
                                    $i = 1;
                                    $nn = 0;
                                @endphp

                                @foreach($data['question'] as $key => $value)

                                    <input type="hidden" name="question_id[]" value="{{$value->question_id}}">

                                    <div class="col-lg-6 alert alert-success" id="mytbl">

                                        <div class="form-group col-sm-12">
                                            <label class="text-info">
                                                <h5><b>Question&nbsp;<?php echo $i++;?></b></h5>
                                            </label>
                                            <input name="question_update[]" type="text" class="form-control" placeholder="Question" value="{{$value->question}}" required>
                                            <button type="button" class="btn btn-danger" onclick="doRemoveItem(this);"><i class="fa fa-trash-o"></i></button>
                                        </div>

                                        <div class="clearfix"></div>

                                        @if(count($data['choice'])>0)

                                        @php $n = 1; @endphp

                                            @foreach($data['choice'][$key] as $key2 => $value2)

                                            <input type="hidden" name="choice_id[{{$nn}}][]" value="{{$value2->choice_id}}">

                                            <div class="form-group col-sm-10">
                                                <label>
                                                    <h6><b>Choice&nbsp;<?php echo $n++;?></b>&nbsp;</h6>
                                                </label>
                                                <input name="choices_update[{{$nn}}][]" type="text" class="form-control" placeholder="Choice" value="{{$value2->choice}}" required>
                                            </div>

                                            <div class="form-group col-sm-2">
                                                <button type="button" class="btn btn-danger btn-xs" onclick="doRemoveItem2(this);"><i class="fa fa-trash-o"></i></button>
                                            </div>

                                        @endforeach
                                        @endif

                                        <div class="form-group col-sm-6">

                                            <label>
                                                <h6><b>Answer</b>&nbsp;</h6>
                                            </label>

                                            <select name="answers_update[{{$nn}}][]" class="form-control">
                                                @foreach($data['choice'][$key] as $key3 => $value3)
                                                <option value="{{$key3}}" @if($value3->answer=='true'){{'selected'}}@endif>Choice{{$key3+1}}</option>
                                                @endforeach
                                            </select>

                                        </div>

                                    </div>

                                <?php $nn++;?>

                                @endforeach
                            @else

                                @include('page.member.data_not_found')

                            @endif

                            @endif --}}


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

                        <br>

                        <div class="col-lg-12 text-right">
                            <button type="button" class="btn btn-primary"
                                onclick="btn_create_lesson('Create','{{$data['lesson']['document_file']}}','{{$data['detail']['course_id']}}','{{$data['lesson']['lesson_id']}}');"><i
                                    class="fa fa-plus"></i> Create</button>
                        </div>
                        <br><br><br>

                        <form action="{{url('admin/course/'.'course'.'/edit/'.$data['id'])}}" method="post"
                            enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="search" value="true">

                            <div class="col-sm-5 m-b-xs">
                                <div class="col-sm-6">
                                    <div class="input-group">
                                        <input type="text" name="date_start"
                                            class="input-sm form-control datepicker-input" placeholder="Start Date">
                                        <span class="input-group-btn">
                                            <button class="btn btn-sm btn-default" type="button"><i
                                                    class="fa fa-calendar"></i></button>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="input-group">
                                        <input type="text" name="date_end" id="date_end"
                                            class="input-sm form-control datepicker-input" placeholder="End Date">
                                        <span class="input-group-btn">
                                            <button class="btn btn-sm btn-default" type="button"><i
                                                    class="fa fa-calendar"></i></button>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-5 m-b-xs">
                                <div class="col-sm-5">
                                    <select name="status" class="input-sm form-control ">
                                        <option value="">=======Status========</option>
                                        <option value="1">Activate</option>
                                        <option value="0">Draft</option>
                                    </select>
                                </div>
                                <div class="col-sm-7">
                                    <div class="input-group">
                                        <input name="txt_search" type="text" class="input-sm form-control"
                                            placeholder="Search">
                                        <span class="input-group-btn">
                                            <button class="btn btn-sm btn-default" type="button">Search</button>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-2">
                                <button type="submit" class="btn btn-sm btn-info">Apply Filter</button>
                                <button type="reset" class="btn btn-sm btn-warning">Reset Filter</button>
                            </div>

                        </form>

                        <div class="row">
                            <div class="col-lg-12">
                                <br>
                                <table class="table table-striped b-t b-light" cellspacing="0" width="100%">
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
                                                <?php $lesson_file[] = $value2->lesson_file; ?>
                                                <a target="_blank"
                                                    href="{{url('upload/member/lesson/file/'.$value2->lesson_file)}}"><U>Download</U></a><br>
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


                                                <a href="javascript:void();" class="btn btn-success" onclick="btn_create_lesson('Edit','{{json_encode($lesson_file)}}','{{$value->course_id}}','{{$value->lesson_id}}','{{$value->lesson_name}}','{{$value->lesson_vdo_url}}','{{$value->lesson_content}}','{{$textcontent}}');" title="Edit"><i class="fa fa-edit"></i></a>

                                                <a href="#" class="btn btn-danger" onclick="confirm_delete('{{url('admin/course/delete/Lesson/')}}','{{$value->lesson_id}}');" title="Delete"><i class="fa fa-trash-o"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                        @else
                                        <tr>
                                            <td colspan="10" class="text-danger">
                                                <div align="center">{{trans('other.data_not_found')}}</div>
                                            </td>
                                        </tr>
                                        @endif
                                    </tbody>
                                </table>

                                <footer class="panel-footer">
                                    <div class="row">
                                        <div class="col-sm-2 text-left">
                                            <small
                                                class="text-muted inline m-t-sm m-b-sm">@if(count($data['lesson'])>10){{'Showing 1-10 of'.count($data['lesson']).'items'}}@else{{'Showing '.count($data['lesson']).' items'}}@endif</small>
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

                        <br>

                        <form action="{{url('admin/course/'.$data['page'])}}" method="post"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="col-sm-5 m-b-xs">
                                <div class="col-sm-6">
                                    <div class="input-group">
                                        <input type="text" name="date_start"
                                            class="input-sm form-control datepicker-input" placeholder="Start Date">
                                        <span class="input-group-btn">
                                            <button class="btn btn-sm btn-default" type="button"><i
                                                    class="fa fa-calendar"></i></button>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="input-group">
                                        <input type="text" name="date_end" id="date_end"
                                            class="input-sm form-control datepicker-input" placeholder="End Date">
                                        <span class="input-group-btn">
                                            <button class="btn btn-sm btn-default" type="button"><i
                                                    class="fa fa-calendar"></i></button>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-5 m-b-xs">
                                <div class="col-sm-5">
                                    <select name="status" class="input-sm form-control ">
                                        <option value="0">=======Status========</option>
                                        <option value="1">Wait</option>
                                        <option value="2">False</option>
                                        <option value="3">Pass</option>
                                    </select>
                                </div>
                                <div class="col-sm-7">
                                    <div class="input-group">
                                        <input name="txt_search" type="text" class="input-sm form-control"
                                            placeholder="Search">
                                        <span class="input-group-btn">
                                            <button class="btn btn-sm btn-default" type="button">Search</button>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-2">
                                <button type="submit" class="btn btn-sm btn-info">Apply Filter</button>
                                <button type="reset" class="btn btn-sm btn-warning">Reset Filter</button>
                            </div>

                        </form>

                        <div class="row">
                            <div class="col-lg-12">
                                <br>
                                <table class="table table-striped b-t b-light" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Student Name</th>
                                            <th>Start Date</th>
                                            <th>Finish Date</th>
                                            <th>Total Score</th>
                                            <th>Grade Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(count($data['gradebook'])>0)
                                        <?php $i = 1;?>
                                        @foreach($data['gradebook'] as $value)
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{$value->first_name.' '.$value->last_name}}</a></td>
                                            <td>{{$value->total_score}}</td>
                                            <td>{{date("d-m-Y",strtotime($value->start_date))}}</td>
                                            <td>{{date("d-m-Y",strtotime($value->finish_date))}}</td>
                                            <td>
                                                @if($value->user_course_status==0)
                                                <span class="badge badge-warning">Wait</span>
                                                @elseif($value->user_course_status==1)
                                                <span class="badge badge-success">Pass</span>
                                                @else
                                                <span class="badge badge-danger">False</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="#" class="btn btn-danger"
                                                    onclick="confirm_delete('{{url('admin/course/delete/Gradebook/')}}','{{$value->user_course_id}}');"
                                                    title="Delete"><i class="fa fa-trash-o"></i></a>
                                            </td>

                                        </tr>
                                        @endforeach
                                        @else
                                        <tr>
                                            <td colspan="10" class="text-danger">
                                                <div align="center">{{trans('other.data_not_found')}}</div>
                                            </td>
                                        </tr>
                                        @endif
                                    </tbody>
                                </table>

                                <footer class="panel-footer">
                                    <div class="row">
                                        <div class="col-sm-2 text-left">
                                            <small
                                                class="text-muted inline m-t-sm m-b-sm">@if(count($data['gradebook'])>10){{'Showing 1-10 of'.count($data['gradebook']).'items'}}@else{{'Showing '.count($data['gradebook']).' items'}}@endif</small>
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

    </div>
</div>

