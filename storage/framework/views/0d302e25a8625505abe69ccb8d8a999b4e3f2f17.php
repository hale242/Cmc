<div class="row">
    <div class="col-sm-12">

        <?php echo $__env->make('layouts.admin.flash-message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php if(count($errors)): ?>
        <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <div style="padding: 10px;">
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        </div>
        <?php endif; ?>

        
        <?php if($data['page']=='Main'): ?>

            <?php if(isset($data['detail']['course_name'])): ?>
            <?php $course = $data['detail']['course_name'];?>
            <?php else: ?>
            <?php $course = null;?>
            <?php endif; ?>

            <?php if(isset($data['detail']['course_cat_id'])): ?>
            <?php $category_id = $data['detail']['course_cat_id'];?>
            <?php else: ?>
            <?php $category_id = null;?>
            <?php endif; ?>

            <?php if(isset($data['detail']['course_teacher_id'])): ?>
            <?php $teacher_id = $data['detail']['course_teacher_id'];?>
            <?php else: ?>
            <?php $teacher_id = null;?>
            <?php endif; ?>

            <?php if(isset($data['detail']['course_vdo_url'])): ?>
            <?php $vdo_url = $data['detail']['course_vdo_url'];?>
            <?php else: ?>
            <?php $vdo_url = null;?>
            <?php endif; ?>

            <?php if(isset($data['detail']['course_price'])): ?>
            <?php $course_price = $data['detail']['course_price'];?>
            <?php else: ?>
            <?php $course_price = null;?>
            <?php endif; ?>

            <?php if(isset($data['detail']['course_short_description'])): ?>
            <?php $course_short_description = $data['detail']['course_short_description'];?>
            <?php else: ?>
            <?php $course_short_description = null;?>
            <?php endif; ?>

            <?php

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

            ?>



            <?php if(file_exists(public_path().'/upload/member/course/images/'.$data['detail']['course_image']) &&
            $data['detail']['course_image']!=null): ?>
            <?php $img = asset('upload/member/course/images/'.$data['detail']['course_image']);?>
            <?php else: ?>
            <?php $img = asset('assets/member/images/no-image.png');?>
            <?php endif; ?>

            <?php if(isset($data['detail']['course_is_required'])): ?>
            <?php $course_is_required_id = $data['detail']['course_is_required'];?>
            <?php else: ?>
            <?php $course_is_required_id = null;?>
            <?php endif; ?>

            <?php if(isset($data['pre_post_test']->pretest_header)): ?>
            <?php $pretest = $data['pre_post_test']->pretest_header;?>
            <?php else: ?>
            <?php $pretest = null;?>
            <?php endif; ?>

            <?php if(isset($data['pre_post_test']->posttest_header)): ?>
            <?php $posttest = $data['pre_post_test']->posttest_header;?>
            <?php else: ?>
            <?php $posttest = null;?>
            <?php endif; ?>

            <?php if(isset($data['pre_post_test']->score_required)): ?>
            <?php $score = $data['pre_post_test']->score_required;?>
            <?php else: ?>
            <?php $score = null;?>
            <?php endif; ?>

            <?php if(isset($data['pre_post_test']->question_type)): ?>
            <?php $question_type = $data['pre_post_test']->question_type;?>
            <?php else: ?>
            <?php $question_type = null;?>
            <?php endif; ?>

            <?php if(isset($data['detail']['course_status'])): ?>
            <?php $status = $data['detail']['course_status'];?>
            <?php else: ?>
            <?php $status = null;?>
            <?php endif; ?>



            <section class="panel panel-default">
                <header class="panel-heading">
                    <span class="h4"><?php echo e($data['action']); ?> Course</span>
                </header>

                <div class="panel-body">

                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item active">
                            <a class="nav-link" id="course-tab" data-toggle="tab" href="#course" role="tab" aria-controls="home" aria-selected="true">Course detail</a>
                        </li>
                        <?php if($data['action']=='Edit'): ?>
                            <li class="nav-item">
                                <a class="nav-link" id="pre-tab" data-toggle="tab" href="#pre" role="tab" aria-controls="profile" aria-selected="false">Pre & Post Test</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="lessons-tab" data-toggle="tab" href="#lessons" role="tab" aria-controls="contact" aria-selected="false">Lessons</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="gradebook-tab" data-toggle="tab" href="#gradebook" role="tab" aria-controls="contact" aria-selected="false">Gradebook</a>
                            </li>
                        <?php endif; ?>
                    </ul>
                    <div class="tab-content" id="myTabContent">

                        
                        <div class="tab-pane fade active in" id="course" role="tabpanel" aria-labelledby="course-tab">

                            <form id="form_course" name="form_course" class="form-horizontal" novalidate action="<?php echo e(url('admin/course/Main/action')); ?>" method="post" enctype="multipart/form-data" autocomplete="off">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="img_hidden" value="<?php echo e($data['detail']['course_image']); ?>">
                                <input type="hidden" name="type_action" id="type_action" value="<?php echo e($data['action']); ?>">
                                <input type="hidden" name="id" value="<?php if(isset($data['id'])): ?><?php echo e($data['id']); ?><?php else: ?><?php echo e(''); ?><?php endif; ?>">

                                <div class="col-sm-7">
                                    <?php if($data['pre_test_count']===0): ?>
                                        <div class="alert alert-warning m-t">Please create Pre & Post Test for complete course.</div>
                                    <?php endif; ?>
                                    <div class="form-group col-sm-12 m-t">
                                        <div class="col-sm-12">
                                            <label><b>Course Name</b> <small class="text-danger">*</small></label>
                                            <input name="course_name" id="course_name" type="text" class="form-control" placeholder="Course Name" value="<?php echo e($course); ?>" required>
                                            <span id="course_name_help" class="help-block text-danger hide">Please enter Course name</span>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <div class="col-sm-6">
                                            <label><b>Category</b> <small class="text-danger">*</small></label>
                                            <select name="category" id="category" class="form-control" required>
                                                <option value="">Select</option>
                                                <?php $__currentLoopData = $data['category']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($value->category_id); ?>" <?php if($category_id==$value->category_id): ?><?php echo e('selected'); ?><?php endif; ?>><?php echo e($value->category_name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <span id="category_help" class="help-block text-danger hide">Please select Category</span>
                                        </div>
                                        <div class="col-sm-6">
                                            <label><b>Teacher</b> <small class="text-danger">*</small></label>
                                            <select name="teacher" id="teacher" class="form-control" required>
                                                <option value="">Select</option>
                                                <?php $__currentLoopData = $data['teacher']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($value->user_id); ?>" <?php if($teacher_id==$value->user_id): ?><?php echo e('selected'); ?><?php endif; ?>><?php echo e($value->first_name.' '.$value->last_name); ?>

                                                </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <span id="teacher_help" class="help-block text-danger hide">Please select Teacher</span>
                                        </div>
                                    </div>

                                    <div class="form-group col-sm-12">
                                        <div class="col-sm-7">
                                            <label><b>Video Url</b></label>
                                            <input name="video_url" id="video_url" type="text" class="form-control" placeholder="Embed Video" value="<?php echo e($vdo_url); ?>">
                                        </div>
                                        <div class="col-sm-5">
                                            <label><b>Price Course</b> <small class="text-danger">*</small></label>
                                            <div class="input-group">
                                                <span class="input-group-addon">฿</span>
                                                <input name="price" id="price" type="text" class="form-control text-right" placeholder="Price Course" value="<?php echo e($course_price); ?>" required>
                                                <span class="input-group-addon">.00</span>
                                            </div>
                                            <span id="price_help" class="help-block text-danger hide">Please enter Course price</span>
                                        </div>
                                    </div>

                                    <div class="form-group col-sm-12">
                                        <div class="col-sm-4">
                                            <label><b>Duration</b></label>
                                            <div class="input-group">
                                                <input name="duration" id="duration" type="text" class="form-control text-right" placeholder="Duration" value="<?php echo e($duration); ?>">
                                                <span class="input-group-addon">Hour</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <label><b>Skill level</b></label>
                                            
                                            <select name="skilllevel" id="skilllevel" class="form-control">
                                                <?php $__currentLoopData = $data['skills']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($skill->id); ?>" <?php if($skilllevel == $skill->id){ echo "selected"; } ?>><?php echo e($skill->skill_name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                        <div class="col-sm-4">
                                            <label><b>Language</b></label>
                                            <input name="language" id="language" type="text" class="form-control" placeholder="Language" value="<?php echo e($language); ?>">
                                        </div>
                                    </div>


                                    <div class="form-group col-sm-12">
                                        <div class="col-sm-12">
                                            <label><b>Short Description</b> <small class="text-danger">*</small></label>
                                            <textarea name="short_description" id="short_description"  class="form-control" placeholder="Course Short Description" rows="6" required><?php echo e($course_short_description); ?></textarea>
                                            <span id="short_description_help" class="help-block text-danger hide">Please enter Short Description</span>
                                        </div>
                                    </div>

                                    <div class="form-group col-sm-12">
                                        <div class="col-sm-12">
                                            <label><b>Overview</b> <small class="text-danger">*</small></label>
                                            <input type="hidden" id="content_desc">
                                            <textarea name="full_description" id="full_description" class="form-control" placeholder="Course Full Description" required><?php echo e($course_full_description); ?></textarea>
                                            <span id="content_desc_help" class="help-block text-danger hide">Please enter Overview</span>
                                        </div>
                                    </div>

                                    <div class="form-group col-sm-12">
                                        <div class="col-sm-12">
                                            <label><b>Course Curriculum</b> <small class="text-danger">*</small></label>
                                            <textarea name="course_curriculum" id="course_curriculum" class="form-control" placeholder="Course Curriculum" required><?php echo e($course_curriculum); ?></textarea>
                                            <span id="course_curriculum_help" class="help-block text-danger hide">Please enter Course curriculum</span>
                                        </div>
                                    </div>

                                    <div class="form-group col-sm-12">
                                        <div class="col-sm-12">
                                            <label><b>Course Instructor</b> <small class="text-danger">*</small></label>
                                            <textarea name="course_instructor" id="course_instructor" class="form-control" placeholder="Course Instructor" required><?php echo e($course_instructor); ?></textarea>
                                            <span id="course_instructor_help" class="help-block text-danger hide">Please enter Course instructor</span>
                                        </div>
                                    </div>

                                    <div class="form-group col-sm-12">
                                        <div class="col-sm-12">
                                            <label><b>Course is required</b></label>
                                            <select name="course_is_required" class="form-control">
                                                <option value="">Select</option>
                                                <?php $__currentLoopData = $data['course_is_required']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($value->course_id); ?>" <?php if($course_is_required_id==$value->course_id): ?><?php echo e('selected'); ?><?php endif; ?>><?php echo e($value->course_name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>

                                </div>

                                <div class="col-sm-5 m-t">

                                    <?php if($data['action']=='Edit' && $data['pre_test_count']>0): ?>
                                        <div class="form-group col-sm-12 text-right">
                                            <span style="margin-right: 10px;">Active Status</span>
                                            <label class="switch switch-sm" title="Open | Close Status" style="margin-top: 8px;">
                                                <input name="status" type="checkbox" <?php if($status==1): ?><?php echo e('checked'); ?><?php endif; ?> value="1">
                                                <span style="padding-top: 5px; padding-right: 4px;">OFF</span>
                                            </label>
                                        </div>
                                    <?php endif; ?>

                                    <div class="form-group col-sm-12">

                                        <div class="text-center" style="padding:5px;border:1px solid #ccc">
                                            <a data-fancybox="gallery" href="<?php echo e($img); ?>" target="_blank" class="fancy-box">
                                                <img src="<?php echo e($img); ?>" class="img-responsive" style="margin: auto;">
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
                        

                        
                        <div class="tab-pane fade" id="pre" role="tabpanel" aria-labelledby="pre-tab">

                            <form id="form_pre_post" name="form_pre_post" class="form-horizontal" method="post" enctype="multipart/form-data" autocomplete="off">
                                <?php echo csrf_field(); ?>

                                <input type="hidden" name="type_action" value="<?php echo e($data['action']); ?>">

                                <input type="hidden" name="id" value="<?php if(isset($data['id'])): ?><?php echo e($data['id']); ?><?php else: ?><?php echo e(''); ?><?php endif; ?>">

                                <input type="hidden" name="test_id" id="test_id" value="<?php if(isset($data['pre_post_test']->test_id)): ?><?php echo e($data['pre_post_test']->test_id); ?><?php else: ?><?php echo e(''); ?><?php endif; ?>">

                                <div class="col-md-12 m-t">
                                    <div class="col-md-4">

                                        <div class="form-group col-sm-12">
                                            <label>Pretest header</label>
                                            <input name="pretest" type="text" class="form-control" placeholder="Pretest header" value="<?php echo e($pretest); ?>" required>
                                        </div>

                                    </div>

                                    <div class="col-md-4">

                                        <div class="form-group col-sm-12">
                                            <label>Posttest header</label>
                                            <input name="posttest" type="text" class="form-control" placeholder="Posttest header" value="<?php echo e($posttest); ?>" required>
                                        </div>

                                    </div>

                                    <div class="col-md-4">

                                        <div class="form-group col-sm-12">
                                            <label>Minimum score required</label>
                                            <input name="score" id="score" type="text" class="form-control text-center" maxlength="3" placeholder="Minimum score required" value="<?php echo e($score); ?>" required>
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
                                <?php if(isset($data['pre_post_test']->test_id)): ?>
                                    <?php
                                        $number = sizeof($data['question']);
                                    ?>
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


                                                            
                                                            <div class="show_ans alert m-t" style="/*background-color: #a0a0a0;*/border: 1px dotted #737373;max-height: 300px;overflow: auto;"></div>

                                                            
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

                                    
                                    <div class="question-all">
                                        <div class="form-group col-md-12 form-group">
                                            <div class="col-md-12 scroller">
                                                <div id="showall_item" class="show_question col-md-12">
                                                    <?php if($data['question']!=''): ?>
                                                        <?php $__currentLoopData = $data['question']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <div class="manage">
                                                            <i class="btn btn-sm btn-warning fa fa-pencil btn_edit_question" q-count="<?php echo e(sizeof($data['choice'][$key])); ?>" question-id="<?php echo e($item['question_id']); ?>" data-q="<?php echo e($item['question']); ?>" test-id="<?php echo e($data['pre_post_test']->test_id); ?>"></i>
                                                            <i class="btn btn-sm btn-danger fa fa-times btn_del_question" question-id="<?php echo e($item['question_id']); ?>" test-id="<?php echo e($data['pre_post_test']->test_id); ?>"></i>
                                                        </div>
                                                            <div class="alert alert-success">
                                                                <b>Question # <?php echo e($number--); ?> : <?php echo e($item['question']); ?></b>
                                                                <div class="m-t">
                                                                    <?php $__currentLoopData = $data['choice'][$key]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keyans => $ans): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <p style="margin-bottom:0px;">Ans # <?php echo e($keyans+1); ?> : <?php echo e($ans['choice']); ?> <b>(<?php if($ans['answer']=='true'){ echo 'Yes'; }else{ echo 'N'; } ?>)</b></p>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </div>
                                                            </div>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    

                                <?php endif; ?>



                                <div class="col-lg-12">

                                    <footer class="panel-footer text-right bg-light lter">
                                        <button type="submit" class="btn btn-success btn-s-xs">Save</button>
                                        <button type="reset" class="btn btn-danger btn-s-xs">Cancel</button>
                                    </footer>

                                </div>

                            </form>


                        </div>
                        

                        
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
                                            <button type="button" class="btn btn-primary" onclick="btn_create_lesson('Create','<?php echo e($data['lesson']['document_file']); ?>','<?php echo e($data['detail']['course_id']); ?>','<?php echo e($data['lesson']['lesson_id']); ?>');">
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
                                            <?php if(count($data['lesson'])>0): ?>

                                            <?php
                                                $i = 1;
                                                $lesson_file = [];
                                            ?>

                                            <?php $__currentLoopData = $data['lesson']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($i++); ?></td>
                                                <td><?php echo e($value->lesson_name); ?></td>
                                                <td>
                                                    <?php
                                                    // dd($data['file_lesson']);
                                                    ?>
                                                    <?php if(isset($data['file_lesson'])): ?>
                                                        <?php if($data['file_lesson'][$key]): ?>
                                                            <?php $__currentLoopData = $data['file_lesson'][$key]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                                <?php

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

                                                                ?>

                                                                <?php if(file_exists(public_path().'/upload/member/lesson/file/'.$value2->lesson_file) && $value2->lesson_file!=null): ?>
                                                                    <a target="_blank" href="<?php echo e(url('upload/member/lesson/file/'.$value2->lesson_file)); ?>" <?php if($extension[1]=='jpg'||$extension[1]=='jpeg'||$extension[1]=='gif'||$extension[1]=='png'||$extension[1]=='bmp'){ echo 'data-fancybox="Download"'; } ?> title="<?php echo e($extension[0]); ?>">
                                                                        <img src="<?php echo e(asset('mockup/'.$datafile)); ?>" alt="">
                                                                    </a>
                                                                <?php endif; ?>

                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <?php else: ?>
                                                            <?php echo e('-'); ?>

                                                        <?php endif; ?>
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <?php if($value->lesson_status==1): ?>
                                                    <span class="label label-success">Activate</span>
                                                    <?php else: ?>
                                                    <span class="label label-warning">Draft</span>
                                                    <?php endif; ?>
                                                </td>
                                                <td><?php echo e(date("d-m-Y",strtotime($value->date_create))); ?></td>
                                                <td><?php echo e(date("d-m-Y",strtotime($value->date_update))); ?></td>
                                                <td>

                                                    <?php
                                                        $textcontent = htmlspecialchars($value->lesson_status);
                                                    ?>


                                                    <a href="javascript:;" class="btn btn-success" onclick="btn_create_lesson('Edit','<?php echo e(json_encode($lesson_file)); ?>','<?php echo e($value->course_id); ?>','<?php echo e($value->lesson_id); ?>','<?php echo e($value->lesson_name); ?>','<?php echo e($value->lesson_vdo_url); ?>','','<?php echo e($textcontent); ?>');" title="Edit"><i class="fa fa-edit"></i></a>

                                                    <a href="#" class="btn btn-danger" onclick="confirm_delete('<?php echo e(url('admin/course/delete/Lesson/')); ?>','<?php echo e($value->lesson_id); ?>');" title="Delete"><i class="fa fa-trash-o"></i></a>
                                                </td>
                                            </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php else: ?>
                                            <tr>
                                                <td colspan="10" class="text-danger">
                                                    <div class="text-center"><?php echo e(trans('other.data_not_found')); ?></div>
                                                </td>
                                            </tr>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>

                                    <footer class="panel-footer">
                                        <div class="row">
                                            <div class="col-sm-2 text-left">
                                                <small class="text-muted inline m-t-sm m-b-sm"><?php if(count($data['lesson'])>10): ?><?php echo e('Showing 1-10 of'.count($data['lesson']).'items'); ?><?php else: ?><?php echo e('Showing '.count($data['lesson']).' items'); ?><?php endif; ?></small>
                                            </div>
                                            <div class="col-sm-8">
                                            </div>
                                            <div class="col-sm-3 text-right">
                                                <?php echo e($data['lesson']->links()); ?>

                                            </div>
                                        </div>
                                    </footer>

                                </div>
                            </div>

                        </div>
                        

                        
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
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            <?php if(count($data['gradebook'])>0): ?>

                                                
                                                <?php $i = 1; ?>
                                                <?php $__currentLoopData = $data['gradebook']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>

                                                        <td class="text-center"><?php echo e($i++); ?></td>
                                                        <td><?php echo e($value->first_name.' '.$value->last_name); ?></a></td>
                                                        <td class="text-center"><?php echo e(date("d-m-Y",strtotime($value->created_at))); ?></td>
                                                        <td class="text-center"><?php echo e(date("d-m-Y",strtotime($value->updated_at))); ?></td>
                                                        <td class="text-center"><?php echo e($value->posttest_score); ?></td>
                                                        <td class="text-center">
                                                            <?php if($value->pretest_status==0): ?>
                                                                <span class="badge bg-warning">Wait</span>
                                                            <?php elseif($value->pretest_status==1): ?>
                                                                <span class="badge bg-danger">False</span>
                                                            <?php elseif($value->pretest_status==2): ?>
                                                                <span class="badge bg-success">Pass</span>
                                                            <?php endif; ?>
                                                        </td>
                                                        

                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php else: ?>
                                                <tr>
                                                    <td colspan="10" class="text-danger">
                                                        <div class="text-center"><?php echo e(trans('other.data_not_found')); ?></div>
                                                    </td>
                                                </tr>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>

                                    <footer class="panel-footer">
                                        <div class="row">
                                            <div class="col-sm-2 text-left">
                                                <small class="text-muted inline m-t-sm m-b-sm">
                                                    <?php if(count($data['gradebook'])>25): ?><?php echo e('Showing 1-25 of'.count($data['gradebook']).'items'); ?><?php else: ?><?php echo e('Showing '.count($data['gradebook']).' items'); ?><?php endif; ?>
                                                </small>
                                            </div>
                                            <div class="col-sm-8">
                                            </div>
                                            <div class="col-sm-3 text-right">
                                                <?php echo e($data['gradebook']->links()); ?>

                                            </div>
                                        </div>
                                    </footer>
                                </div>
                            </div>

                        </div>
                        

                    </div>

                </div>

            </section>
        <?php endif; ?>

        
        <?php if($data['page']=='Category'): ?>

            <?php if(isset($data['detail']['category_name'])): ?>
            <?php $category = $data['detail']['category_name'];?>
            <?php else: ?>
            <?php $category = null;?>
            <?php endif; ?>

            <?php if(isset($data['detail']['category_status'])): ?>
            <?php $status = $data['detail']['category_status'];?>
            <?php else: ?>
            <?php $status = null;?>
            <?php endif; ?>

            <form class="form-horizontal" action="<?php echo e(url('admin/course/'.$data['page'].'/action')); ?>" method="post" enctype="multipart/form-data" autocomplete="off">
                <?php echo csrf_field(); ?>

                <input type="hidden" name="type_action" value="<?php echo e($data['action']); ?>">

                <input type="hidden" name="id" value="<?php if(isset($data['id'])): ?><?php echo e($data['id']); ?><?php else: ?><?php echo e(''); ?><?php endif; ?>">

                <section class="panel panel-default">
                    <header class="panel-heading">
                        <span class="h4"><?php echo e($data['action']); ?> Category</span>
                    </header>
                    <div class="panel-body">
                        <div class="form-group pull-in clearfix">
                            <div class="col-sm-6">
                                <label>Category Name</label>
                                <input name="category" type="text" class="form-control" placeholder="Category Name"
                                    value="<?php echo e($category); ?>" required>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-sm-5">
                                <div class="line line-dashed line-lg pull-in"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Status</label>
                                    <div class="col-sm-10">
                                        <label class="switch">
                                            <input name="status" type="checkbox" <?php if($status==1): ?><?php echo e('checked'); ?><?php endif; ?>
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

        <?php endif; ?>


        <?php if($data['page']=='Skill'): ?>

            <?php
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
            ?>


            <form class="form-horizontal" action="<?php echo e(url('admin/course/'.$data['page'].'/action')); ?>" method="post" enctype="multipart/form-data" autocomplete="off">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="type_action" value="<?php echo e($data['action']); ?>">
                <input type="hidden" name="id" value="<?php if(isset($data['id'])): ?><?php echo e($data['id']); ?><?php else: ?><?php echo e(''); ?><?php endif; ?>">

                <section class="panel panel-default">
                    <header class="panel-heading">
                        <span class="h4"><?php echo e($data['action']); ?> Skill</span>
                    </header>

                    <div class="panel-body">
                        <div class="col-sm-6">
                            <label for="">Skill name</label>
                            <input type="text" id="skillname" name="skillname" value="<?php echo e($skillname); ?>" class="form-control">
                        </div>

                        <div class="col-sm-3">
                            <label for="">Sort</label>
                            <input type="text" id="sort" name="sort" value="<?php echo e($sort); ?>" class="form-control">
                        </div>

                        <div class="col-sm-3">
                            
                            <div class="form-group" style="margin-top: 23px;">
                                <label class="col-sm-2 control-label">Status</label>
                                <div class="col-sm-10">
                                    <label class="switch">
                                        <input name="status" type="checkbox" <?php if($status=='1'): ?><?php echo e('checked'); ?><?php endif; ?> value="1">
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

        <?php endif; ?>

    </div>
</div>

<style>
    #Lesson_datatable_filter, #Gradbook_datatable_filter {
        display: none;
    }
</style>


<?php $__env->startSection('javascript'); ?>

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
                filebrowserUploadUrl: "<?php echo e(route('upload', ['_token' => csrf_token() ])); ?>",
                filebrowserUploadMethod: 'form'
            } );
            editor.on( 'change', function( evt ) {
                $('#full_description').val(evt.editor.getData());
            });

            var editor = CKEDITOR.replace( 'course_curriculum', {
                filebrowserUploadUrl: "<?php echo e(route('upload', ['_token' => csrf_token() ])); ?>",
                filebrowserUploadMethod: 'form'
            } );
            editor.on( 'change', function( evt ) {
                $('#course_curriculum').val(evt.editor.getData());
            });

            var editor = CKEDITOR.replace( 'course_instructor', {
                filebrowserUploadUrl: "<?php echo e(route('upload', ['_token' => csrf_token() ])); ?>",
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

<?php $__env->stopSection(); ?>

<?php /**PATH C:\xampp\htdocs\cmc\resources\views/page/admin/include/course/form.blade.php ENDPATH**/ ?>