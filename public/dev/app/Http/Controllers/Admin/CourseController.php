<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Choice;
use App\Course;
use App\GradeBook;
use App\Http\Controllers\Controller;
use App\Lesson;
use App\LessonFile;
use App\PrePostTest;
use App\PrePostTestSave;
use App\Question;
use App\ReviewCourse;
use App\User;
use App\Skills;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{

    public function __construct(Request $request)
    {
        if (!$request->ajax()) {
            $this->middleware('session_login_admin');
        }
    }

    public function page($page)
    {

        $session_search = array(
            'date_start' => '',
            'date_end' => '',
            'status' => '',
            'txt_search' => ''
        );

        if ($page == 'main') {

            $detail = Course::select('user.first_name', 'user.last_name', 'course.course_id', 'course_category.category_name', 'course.course_name', 'course.course_price', 'course.created_at as date_create', 'course.updated_at as date_update', 'course.course_status')
                ->join('course_category', 'course_category.category_id', '=', 'course.course_cat_id')
                ->join('user', 'user.user_id', '=', 'course.course_teacher_id')
                ->where('course_category.category_status', 1)
                ->orderby('course.course_id', 'desc')
                ->paginate(10);

            $total_sub = [];
            $total_student = [];
            foreach ($detail as $value) {
                $total_sub[] = DB::table('wishlist')->where('course_id', $value->course_id)->count();
                // $total_student[] = DB::table('orders')->where('course_id',$value->course_id)->count();
            }

            $total_sub = (count($total_sub) > 0) ? $total_sub : null;
            // $total_student = (count($total_student)>0) ? $total_student : null;

            $data = ['page' => 'Main', 'detail' => $detail, 'total_sub' => $total_sub, 'type' => 'view','session_search'=>$session_search];

        } else if ($page == 'category') {

            $detail = Category::orderby('category_id', 'desc')->paginate(10);
            $data = ['page' => 'Category', 'detail' => $detail, 'type' => 'view','session_search'=>$session_search];

        } else if ($page == 'skill') {

            $detail = Skills::orderby('id', 'desc')->paginate(10);
            $data = ['page' => 'Skill', 'detail' => $detail, 'type' => 'view','session_search'=>$session_search];

        }

        return view('page.admin.course', ['data' => $data, 'userinfo' => $this->userinfo()]);

    }

    public function search($page, Request $request)
    {

        $start_date = '';
        $end_date = '';
        $status = '';
        $search = '';
        $conn = '';

            if ($page == 'Main') {

                $query = Course::query();

                if ($request->date_start != null && $request->date_end != null) {
                    $date_start = date("Y-m-d", strtotime($request->date_start));
                    $date_end = date("Y-m-d", strtotime($request->date_end));
                    $detail = $query->where(DB::raw("(DATE_FORMAT(course.created_at,'%Y-%m-%d'))"), ">=", $date_start);
                    $detail = $query->where(DB::raw("(DATE_FORMAT(course.created_at,'%Y-%m-%d'))"), "<=", $date_end);
                    $start_date = $request->date_start;
                    $end_date = $request->date_end;
                }elseif($request->date_start != null && $request->date_end == null){
                    $date_start = date("Y-m-d", strtotime($request->date_start));
                    $detail = $query->where(DB::raw("(DATE_FORMAT(course.created_at,'%Y-%m-%d'))"), "=", $date_start);
                    $start_date = $request->date_start;
                }elseif($request->date_start == null && $request->date_end != null){
                    $date_end = date("Y-m-d", strtotime($request->date_end));
                    $detail = $query->where(DB::raw("(DATE_FORMAT(course.created_at,'%Y-%m-%d'))"), "=", $date_end);
                    $end_date = $request->date_end;
                }

                if ($request->status != null) {
                    $detail = $query->where('course.course_status', $request->status);
                    $status = $request->status;
                }

                if ($request->txt_search != null) {
                    $detail = $query->where('course.course_name', 'like', '%' . $request->txt_search . '%')
                    ->orWhere('user.first_name', 'like', '%' . $request->txt_search . '%')
                    ->orWhere('user.last_name', 'like', '%' . $request->txt_search . '%')
                    ->orWhere('course.course_price', 'like', '%' . $request->txt_search . '%');
                    $search = $request->txt_search;
                }

                $detail = $query->select('user.first_name', 'user.last_name', 'course.course_id', 'course.course_name', 'course.course_price', 'course.created_at as date_create', 'course.updated_at as date_update', 'course.course_status')->join('user', 'user.user_id', '=', 'course.course_teacher_id')->orderby('course.course_id', 'desc')->paginate(10);

                $total_sub = [];
                // $total_student = [];
                foreach ($detail as $value) {
                    $total_sub[] = DB::table('wishlist')->where('course_id', $value->course_id)->count();
                }

                $total_sub = (count($total_sub) > 0) ? $total_sub : null;
                // $total_student = (count($total_student)>0) ? $total_student : null;

                $session_search = array(
                    'date_start' => $start_date,
                    'date_end' => $end_date,
                    'status' => $status,
                    'txt_search' => $search
                );

                $data = ['page' => 'Main', 'detail' => $detail, 'total_sub' => $total_sub, 'type' => 'view', 'session_search'=>$session_search];

                return view('page.admin.course', ['data' => $data, 'userinfo' => $this->userinfo()]);

            } else if ($page == 'Category') {

                $query = Category::query();

                if ($request->date_start != null && $request->date_end != null) {
                    $date_start = date("Y-m-d", strtotime($request->date_start));
                    $date_end = date("Y-m-d", strtotime($request->date_end));
                    $detail = $query->where(DB::raw("(DATE_FORMAT(created_at,'%Y-%m-%d'))"), ">=", $date_start);
                    $detail = $query->where(DB::raw("(DATE_FORMAT(created_at,'%Y-%m-%d'))"), "<=", $date_end);
                    $start_date = $request->date_start;
                    $end_date = $request->date_end;
                }elseif($request->date_start != null && $request->date_end == null){
                    $date_start = date("Y-m-d", strtotime($request->date_start));
                    $detail = $query->where(DB::raw("(DATE_FORMAT(created_at,'%Y-%m-%d'))"), "=", $date_start);
                    $start_date = $request->date_start;
                }elseif($request->date_start == null && $request->date_end != null){
                    $date_end = date("Y-m-d", strtotime($request->date_end));
                    $detail = $query->where(DB::raw("(DATE_FORMAT(created_at,'%Y-%m-%d'))"), "=", $date_end);
                    $end_date = $request->date_end;
                }

                if ($request->status != null) {
                    $detail = $query->where('category_status', $request->status);
                    $status = $request->status;
                }

                if ($request->txt_search != null) {
                    $detail = $query->where('category_name', 'like', '%' . $request->txt_search . '%');
                    $search = $request->txt_search;
                }

                $detail = $query->orderby('category_id', 'desc')->paginate(10);

                $session_search = array(
                    'date_start' => $start_date,
                    'date_end' => $end_date,
                    'status' => $status,
                    'txt_search' => $search
                );

                $data = ['page' => 'Category', 'detail' => $detail, 'type' => 'view','session_search'=>$session_search];

                return view('page.admin.course', ['data' => $data, 'userinfo' => $this->userinfo()]);

            } else if ($page == 'Skill') {

                $query = Skills::query();

                if ($request->date_start != null && $request->date_end != null) {
                    $date_start = date("Y-m-d", strtotime($request->date_start));
                    $date_end = date("Y-m-d", strtotime($request->date_end));
                    $detail = $query->where(DB::raw("(DATE_FORMAT(created_at,'%Y-%m-%d'))"), ">=", $date_start);
                    $detail = $query->where(DB::raw("(DATE_FORMAT(created_at,'%Y-%m-%d'))"), "<=", $date_end);
                    $start_date = $request->date_start;
                    $end_date = $request->date_end;
                }elseif($request->date_start != null && $request->date_end == null){
                    $date_start = date("Y-m-d", strtotime($request->date_start));
                    $detail = $query->where(DB::raw("(DATE_FORMAT(created_at,'%Y-%m-%d'))"), "=", $date_start);
                    $start_date = $request->date_start;
                }elseif($request->date_start == null && $request->date_end != null){
                    $date_end = date("Y-m-d", strtotime($request->date_end));
                    $detail = $query->where(DB::raw("(DATE_FORMAT(created_at,'%Y-%m-%d'))"), "=", $date_end);
                    $end_date = $request->date_end;
                }

                if ($request->status != null) {
                    $detail = $query->where('status', $request->status);
                    $status = $request->status;
                }

                if ($request->txt_search != null) {
                    $detail = $query->where('skill_name', 'like', '%' . $request->txt_search . '%');
                    $search = $request->txt_search;
                }

                $detail = $query->orderby('id', 'desc')->paginate(10);

                $session_search = array(
                    'date_start' => $start_date,
                    'date_end' => $end_date,
                    'status' => $status,
                    'txt_search' => $search
                );

                $data = ['page' => 'Skill', 'detail' => $detail, 'type' => 'view','session_search'=>$session_search];

                return view('page.admin.course', ['data' => $data, 'userinfo' => $this->userinfo()]);


            }


    }

    public function form_add($page)
    {

        if ($page == 'main') {

            $detail = null;
            $course_is_required = Course::where('course_status', 1)->get();
            $category = Category::all();
            $teacher = User::where('user_type', 3)->get();
            $skilllist = Skills::where('status', 1)->get();
            $pre_post_test = null;
            $question = null;
            $pre_test_count = null;

            $lesson = Lesson::select('lesson.lesson_id', 'lesson.lesson_name', 'lesson.lesson_vdo_url', 'lesson.lesson_content', 'lesson.lesson_status', 'lesson.created_at as date_create', 'lesson.updated_at as date_update')->join('course', 'course.course_id', '=', 'lesson.course_id')->paginate(10);

            $gradebook = GradeBook::select('user_course.user_course_id', 'user.first_name', 'user_course.start_date', 'user_course.finish_date', 'lesson.user_course_status', 'lesson.total_score')->join('orders', 'orders.order_id', '=', 'user_course.order_id')->join('user', 'user.user_id', '=', 'orders.user_id')->paginate(10);

            $data = ['page' => 'Main', 'detail' => $detail, 'course_is_required' => $course_is_required, 'category' => $category, 'teacher' => $teacher, 'pre_post_test' => $pre_post_test, 'question' => $question, 'lesson' => $lesson, 'gradebook' => $gradebook, 'type' => 'form', 'action' => 'Create', 'id' => null, 'skills' => $skilllist, 'pre_test_count' => $pre_test_count];

        } else if ($page == 'category') {

            $detail = null;
            $gra = array();
            $les = array();
            $data = ['page' => 'Category','lesson' => $les, 'gradebook' => $gra, 'detail' => $detail, 'type' => 'form', 'action' => 'Create', 'id' => null];

        } else if ($page == 'skill') {

            $detail = null;
            $gra = array();
            $les = array();
            $data = ['page' => 'Skill','lesson' => $les, 'gradebook' => $gra, 'detail' => $detail, 'type' => 'form', 'action' => 'Create', 'id' => null];

        }

        return view('page.admin.course', ['data' => $data, 'userinfo' => $this->userinfo()]);

    }

    public function form_edit($page, $id, Request $request)
    {
        $skilllist = Skills::where('status', 1)->get();

        if ($page == 'course') {

            if ($request->search == 'true') {

                $query = Lesson::query();

                if ($request->date_start != null) {
                    $date_start = date("Y-m-d", strtotime($request->date_start));
                    $lesson = $query->where(DB::raw("(DATE_FORMAT(lesson.created_at,'%Y-%m-%d'))"), ">=", $date_start);
                }

                if ($request->date_end != null) {
                    $date_end = date("Y-m-d", strtotime($request->date_end));
                    $lesson = $query->where(DB::raw("(DATE_FORMAT(lesson.created_at,'%Y-%m-%d'))"), "<=", $date_end);
                }

                if ($request->status != null) {
                    $lesson = $query->where('lesson.lesson_status', $request->status);
                }

                if ($request->txt_search != null) {
                    $lesson = $query->where('lesson.lesson_name', 'like', '%' . $request->txt_search . '%');
                }

                $detail = Course::select('course.course_id', 'course.course_image', 'course.course_name', 'course.course_cat_id', 'course.course_teacher_id', 'course.course_vdo_url', 'course.duration', 'course.skilllevel', 'course.language', 'course.course_short_description', 'course.course_full_description', 'course.course_curriculum', 'course.course_instructor', 'course.course_is_required', 'course.course_status', 'course.course_price', 'course_category.category_name', 'course_category.category_status', 'user.first_name', 'user.last_name', 'course.created_at as date_create', 'course.updated_at as date_update', 'course.course_status')->join('user', 'user.user_id', '=', 'course.course_teacher_id')->join('course_category', 'course_category.category_id', '=', 'course.course_cat_id')->where('course_category.category_status', 1)->where('course.course_id', $id)->first();

                $course_is_required = Course::where('course_status', 1)->get();
                $category = Category::all();
                $teacher = User::where('user_type', 3)->get();

                $pre_post_test = PrePostTest::where('course_id', $id)->first();

                $choice = [];

                if (count($pre_post_test) > 0) {
                    $question = Question::where('test_id', $pre_post_test->test_id)->get();

                    if (count($question) > 0) {
                        foreach ($question as $value) {
                            $choice[] = Choice::where('question_id', $value->question_id)->orderBy('choice_id', 'asc')->get();
                        }
                    }

                } else {
                    $question = null;
                    $choice[] = null;
                }

                $lesson = $query->select('lesson.lesson_id', 'lesson.lesson_name', 'lesson.lesson_vdo_url', 'lesson.lesson_content', 'lesson.lesson_status', 'lesson.created_at as date_create', 'lesson.updated_at as date_update')->join('course', 'course.course_id', '=', 'lesson.course_id')->paginate(10);

                $file_lesson = [];

                foreach ($lesson as $value) {

                    $file_lesson[] = $query->where('lesson_id', $value->lesson_id)->get();

                }

                // $gradebook = GradeBook::select('user.first_name', 'user_course.start_date', 'user_course.finish_date', 'lesson.user_course_status', 'lesson.total_score')->join('orders', 'orders.order_id', '=', 'user_course.order_id')->join('user', 'user.user_id', '=', 'orders.user_id')->paginate(10);

                $gradebook = PrePostTestSave::where('course_id',$id)
                                            ->join('user', 'user.user_id', 'pre_post_test_save.user_id')
                                            ->paginate(25);

                $data = ['page' => 'Main', 'detail' => $detail, 'course_is_required' => $course_is_required, 'category' => $category, 'teacher' => $teacher, 'pre_post_test' => $pre_post_test, 'question' => $question, 'choice' => $choice, 'lesson' => $lesson, 'file_lesson' => $file_lesson, 'gradebook' => $gradebook, 'type' => 'form', 'action' => 'Edit', 'id' => $id];

            } else {

                $detail = Course::select('course.course_id', 'course.course_image', 'course.course_name', 'course.course_cat_id', 'course.course_teacher_id', 'course.course_vdo_url', 'course.duration', 'course.skilllevel', 'course.language', 'course.course_short_description', 'course.course_full_description', 'course.course_curriculum', 'course.course_instructor', 'course.course_is_required', 'course.course_status', 'course.course_price', 'course_category.category_name', 'course_category.category_status', 'user.first_name', 'user.last_name', 'course.created_at as date_create', 'course.updated_at as date_update', 'course.course_status')->join('user', 'user.user_id', '=', 'course.course_teacher_id')->join('course_category', 'course_category.category_id', '=', 'course.course_cat_id')->where('course_category.category_status', 1)->where('course.course_id', $id)->first();

                $course_is_required = Course::where('course_status', 1)->get();
                $category = Category::all();
                $teacher = User::where('user_type', 3)->get();

                $pre_post_test = PrePostTest::where('course_id', $id)->first();
                $pre_test_count = PrePostTest::where('course_id', $id)->count();

                $choice = [];

                // dd($pre_test_count);

                if ($pre_post_test) {
                    $question = Question::where('test_id', $pre_post_test->test_id)->orderBy('question_id','desc')->get();

                    if (count($question) > 0) {
                        foreach ($question as $value) {
                            $choice[] = Choice::where('question_id', $value->question_id)->orderBy('choice_id', 'asc')->get();
                        }
                    }

                } else {
                    $question = null;
                    $choice[] = null;
                }

                $lesson = Lesson::select('lesson.lesson_id', 'lesson.lesson_name', 'lesson.lesson_vdo_url', 'lesson.lesson_content', 'lesson.lesson_status', 'lesson.created_at as date_create', 'lesson.updated_at as date_update')
                    ->join('course', 'course.course_id', '=', 'lesson.course_id')
                    ->where('lesson.course_id', $id)
                    ->paginate(10);

                $file_lesson = [];

                foreach ($lesson as $value) {

                    $file_lesson[] = LessonFile::where('lesson_id', $value->lesson_id)->get();

                }

                // $gradebook = GradeBook::select('user.first_name', 'user_course.start_date', 'user_course.finish_date', 'lesson.user_course_status', 'lesson.total_score')->join('orders', 'orders.order_id', '=', 'user_course.order_id')->join('user', 'user.user_id', '=', 'orders.user_id')->paginate(10);

                $gradebook = PrePostTestSave::where('course_id',$id)
                                            ->join('user', 'user.user_id', 'pre_post_test_save.user_id')
                                            ->paginate(25);

                $data = ['page' => 'Main', 'detail' => $detail, 'course_is_required' => $course_is_required, 'category' => $category, 'teacher' => $teacher, 'pre_post_test' => $pre_post_test, 'question' => $question, 'choice' => $choice, 'lesson' => $lesson, 'file_lesson' => $file_lesson, 'gradebook' => $gradebook, 'type' => 'form', 'action' => 'Edit', 'id' => $id, 'skills' => $skilllist, 'pre_test_count' => $pre_test_count];

            }

        } else if ($page == 'category') {
            $detail = Category::where('category_id', $id)->first();
            $gra = array();
            $les = array();
            $data = ['page' => 'Category', 'detail' => $detail, 'lesson' => $les, 'gradebook' => $gra, 'type' => 'form', 'action' => 'Edit', 'id' => $id];
        } else if ($page == 'skill') {
            $detail = Skills::where('id', $id)->first();
            $gra = array();
            $les = array();
            $data = ['page' => 'Skill', 'detail' => $detail, 'lesson' => $les, 'gradebook' => $gra, 'type' => 'form', 'action' => 'Edit', 'id' => $id];
        }

        return view('page.admin.course', ['data' => $data, 'userinfo' => $this->userinfo()]);

    }

    public function action($page, Request $request)
    {

        if ($request->post() or $request->ajax()) {

            if ($page == 'Main') {

                $this->validate(request(), [
                    'img' => 'mimes:jpeg,jpg,png|max:2048',
                ]);

                if ($request->img == null) {
                    $img = $request->img_hidden;
                } else {
                    $file_upload = ['filename' => $_FILES['img']['name'], 'tmp_name' => $_FILES['img']['tmp_name'], 'folder' => 'upload/member/course/images', 'width' => 0, 'height' => 0];
                    $img = $this->Upload_File($file_upload);
                }

                if ($request->type_action == 'Create') {

                    $result = new Course;

                        $result->course_name = $request->course_name;
                        $result->course_cat_id = $request->category;
                        $result->course_teacher_id = $request->teacher;
                        $result->course_vdo_url = $request->video_url;
                        $result->course_price = $request->price;
                        $result->course_short_description = $request->short_description;
                        $result->course_full_description = $request->full_description;

                        $result->course_curriculum = $request->course_curriculum;
                        $result->course_instructor = $request->course_instructor;
                        $result->duration = $request->duration;
                        $result->skilllevel = $request->skilllevel;
                        $result->language = $request->language;

                        $result->course_is_required = $request->course_is_required;
                        $result->course_image = $img;
                        $result->course_status = ($request->status == 1) ? $request->status : 0;
                        $result->created_at = now();
                        $result->updated_at = now();

                        $result->save();

                    if ($result) {
                        $result = ['result' => true, 'message' => 'Add data complete', 'type' => 'add'];
                    } else {
                        $result = ['result' => false, 'message' => 'Add data not complete'];
                    }

                    return response()->json($result);
                    exit;

                } else if ($request->type_action == 'Edit') {

                    $data = [
                        'course_name' => $request->course_name,
                        'course_cat_id' => $request->category,
                        'course_teacher_id' => $request->teacher,
                        'course_vdo_url' => $request->video_url,
                        'course_price' => $request->price,
                        'course_short_description' => $request->short_description,
                        'course_full_description' => $request->full_description,
                        'course_curriculum' => $request->course_curriculum,
                        'course_instructor' => $request->course_instructor,
                        'duration' => $request->duration,
                        'skilllevel' => $request->skilllevel,
                        'language' => $request->language,
                        'course_is_required' => $request->course_is_required,
                        'course_image' => $img,
                        'course_status' => ($request->status == 1) ? $request->status : 0,
                        'updated_at' => now(),
                    ];
                    $result = Course::where('course_id', $request->id)->update($data);

                    if ($result) {
                        $result = ['result' => true, 'message' => 'Edit data complete', 'type' => 'edit'];
                    } else {
                        $result = ['result' => false, 'message' => 'Edit data not complete'];
                    }

                    return response()->json($result);
                    exit;

                }

            } else if ($page == 'Pretest') {

                if ($request->type_action == 'Create') {

                    // create pre post
                    $result = new PrePostTest;
                    $result->pretest_header = $request->pretest;
                    $result->posttest_header = $request->posttest;
                    $result->score_required = $request->score;
                    $result->course_id = $request->course_id;
                    $result->created_at = now();
                    $result->updated_at = now();
                    $result->save();

                    $test_id = PrePostTest::orderby('test_id', 'desc')->first();

                    if ($result) {
                        $result = ['result' => true, 'message' => 'Add data complete'];
                    } else {
                        $result = ['result' => false, 'message' => 'Add data not complete'];
                    }

                    return response()->json($result);
                    exit;

                } else if ($request->type_action == 'Edit') {

                    $data = [
                        'pretest_header' => $request->pretest,
                        'posttest_header' => $request->posttest,
                        'score_required' => $request->score,
                        'course_id' => $request->id,
                        'updated_at' => now(),
                    ];

                    if($request->test_id!=''){
                        $result = PrePostTest::where('test_id', $request->test_id)->update($data);
                    }else{
                        $result = new PrePostTest;
                        $result->pretest_header = $request->pretest;
                        $result->posttest_header = $request->posttest;
                        $result->score_required = $request->score;
                        $result->course_id = $request->id;
                        $result->created_at = now();
                        $result->updated_at = now();
                        $result->save();
                    }

                    if ($result) {
                        $result = ['result' => true, 'message' => 'Edit data complete'];
                    } else {
                        $result = ['result' => false, 'message' => 'Edit data not complete'];
                    }

                    return response()->json($result);
                    exit;

                }

            } else if ($page == 'Lesson') {

                if ($request->type_action == 'Create') {

                    $result = new Lesson;
                    $result->lesson_name = $request->lesson_name;
                    $result->lesson_vdo_url = $request->vdo_url;
                    $result->lesson_content = $request->detail;
                    $result->lesson_status = $request->status;
                    $result->course_id = $request->course_id;
                    $result->created_at = now();
                    $result->updated_at = now();
                    $result->save();

                    $path_tmp_file = 'upload/member/lesson/tmp_file/';
                    $path_file = 'upload/member/lesson/file/';

                    foreach ($request->input('document', []) as $file) {
                        if (file_exists($path_tmp_file . $file)) {
                            $result = new LessonFile;
                            $result->lesson_id = Lesson::max('lesson_id');
                            $result->lesson_file = $file;
                            $result->created_at = now();
                            $result->updated_at = now();
                            $result->save();
                            copy($path_tmp_file . $file, $path_file . $file);
                            unlink($path_tmp_file . $file);
                        }

                    }

                    if ($result) {
                        $result = ['result' => true, 'message' => 'Add data complete'];
                    } else {
                        $result = ['result' => false, 'message' => 'Add data not complete'];
                    }

                    return response()->json($result);
                    exit;

                } else if ($request->type_action == 'Edit') {

                    // return $request;

                    $data = [
                        'lesson_name' => $request->lesson_name,
                        'lesson_vdo_url' => $request->vdo_url,
                        'lesson_content' => $request->detail,
                        'lesson_status' => $request->status,
                        'updated_at' => now(),
                    ];
                    $result = Lesson::where('lesson_id', $request->lesson_id)->update($data);

                    $path_tmp_file = 'upload/member/lesson/tmp_file/';
                    $path_file = 'upload/member/lesson/file/';

                    foreach ($request->input('document', []) as $file) {
                        if (file_exists($path_tmp_file . $file)) {
                            $result = new LessonFile;
                            $result->lesson_id = $request->lesson_id;
                            $result->lesson_file = $file;
                            $result->created_at = now();
                            $result->updated_at = now();
                            $result->save();
                            copy($path_tmp_file . $file, $path_file . $file);
                            unlink($path_tmp_file . $file);
                        }

                    }

                    if ($result) {
                        $result = ['result' => true, 'message' => 'Edit data complete'];
                    } else {
                        $result = ['result' => false, 'message' => 'Edit data not complete'];
                    }

                    return response()->json($result);

                    exit;

                }

            } else if ($page == 'Category') {

                if ($request->type_action == 'Create') {

                    $result = new Category;
                    $result->category_name = $request->category;
                    $result->category_status = $request->status;
                    $result->created_at = now();
                    $result->updated_at = now();
                    $result->save();
                    $alert_success = 'add_success';
                    $alert_not_success = 'add_not_success';
                } else if ($request->type_action == 'Edit') {

                    $data = [
                        'category_name' => $request->category,
                        'category_status' => $request->status,
                        'updated_at' => now(),
                    ];
                    $result = Category::where('category_id', $request->id)->update($data);
                    $alert_success = 'edit_success';
                    $alert_not_success = 'edit_not_success';
                }

            } else if ($page == 'Skill') {
                if ($request->type_action == 'Create') {

                    // create pre post
                    $result = new Skills;
                    $result->skill_name = $request->skillname;
                    $result->sort = $request->sort;
                    $result->status = $request->status;
                    $result->created_at = now();
                    $result->updated_at = now();
                    $result->save();
                    $alert_success = 'add_success';
                    $alert_not_success = 'add_not_success';

                }else if ($request->type_action == 'Edit') {

                    if($request->status==''){
                        $status = 0;
                    }else{
                        $status = 1;
                    }

                    $data = [
                        'skill_name' => $request->skillname,
                        'sort' => $request->sort,
                        'status' => $status,
                        'updated_at' => now(),
                    ];
                    $result = Skills::where('id', $request->id)->update($data);
                    $alert_success = 'edit_success';
                    $alert_not_success = 'edit_not_success';

                }
            }



            if ($result) {
                return back()->with('success', trans('other.' . $alert_success));
            } else {
                return back()->with('error', trans('other.' . $alert_not_success));
            }

        }

    }

    public function upload_file_lesson(Request $request)
    {

        $path = 'upload/member/lesson/tmp_file';

        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        $file = $request->file('file');

        $name = uniqid().'_'.trim($file->getClientOriginalName());

        $file->move($path, $name);

        return response()->json([
            'name'          => $name,
            'original_name' => $file->getClientOriginalName(),
        ]);

    }

    public function loadlession($id)
    {
        $data = LessonFile::where('lesson_id', $id)->orderBy('lesson_file_id','asc')->get();
        return $data;
    }

    public function loadcontentlession($id)
    {
        $data = Lesson::where('lesson_id', $id)->first();
        return $data;
    }

    public function delete_upload_file_lesson(Request $request)
    {

        unlink('upload/member/lesson/tmp_file/' . $request->name);

    }

    public function delete($page, $id)
    {

        if ($page == 'Main') {

            $result = Course::where('course_id', $id)->delete();
            $result = Lesson::where('course_id', $id)->delete();
            $result = ReviewCourse::where('course_id', $id)->delete();

        } else if ($page == 'Category') {

            $result = Category::where('category_id', $id)->delete();

        } else if ($page == 'Lesson') {

            $result = DB::table('lesson')->where('lesson_id', $id)->delete();

        } else if ($page == 'Gradebook') {

            $result = Gradebook::where('user_course_id', $id)->delete();

        } else if ($page == 'LessonFileDelete') {

            $result = DB::table('lesson_file')->where('lesson_file', $id)->delete();
            unlink('upload/member/lesson/file/' . $id);
            return 'Y';

        }

        if (isset($result)) {
            return back()->with('success', trans('other.delete_success'));
        } else {
            return back()->with('error', trans('other.delete_not_success'));
        }

    }

    // Add & Edit Choice
    public function addquestion(Request $request)
    {

        // $cou = sizeof($request['ans_img']);
            // for($i=0;$i<$cou;$i++){
            //     if($request['ans_img'][$i]!="undefined"){
            //         $file = $request['ans_img'][$i];
            //         dd($file->getClientOriginalName());
            //     }
        // }


        $question = new Question;

        if($request->mode=='new'){

            $name = null;
            $namec = null;
            if(!empty($request->file('question_img'))){
                $path = 'upload/member/question';
                if (!file_exists($path)) {
                    mkdir($path, 0777, true);
                }
                $file = $request->file('question_img');
                $name = uniqid().'_'.trim($file->getClientOriginalName());
                $file->move($path, $name);
            }

            $question->question = htmlspecialchars($request->question);
            $question->test_id = $request->test_id;
            $question->question_img = $name;
            $question->save();

            if((int)$request->imglen > 0){

                $answer = explode(',', $request->ans);
                $answerchk = explode(',', $request->chek);

                for($i=0;$i<$request->imglen;$i++){

                    if($request['ans_img'][$i]!="undefined"){
                        $path = 'upload/member/choice';
                        if (!file_exists($path)) {
                            mkdir($path, 0777, true);
                        }
                        $filex = $request->file('ans_img');
                        $namec = uniqid().'_'.trim($filex[$i]->getClientOriginalName());
                        $filex[$i]->move($path, $namec);
                    }

                    $choice = new Choice;
                    $choice->question_id = $question->question_id;
                    $choice->choice = str_replace(";",",",$answer[$i]);
                    $choice->answer = $answerchk[$i];
                    $choice->choice_img = $namec;
                    $choice->created_at = now();
                    $choice->updated_at = now();
                    $choice->save();

                    $namec = null;
                }

            }

        }else if($request->mode=='edit'){

            $countwans = sizeof(explode(',', $request->ans));
            $countoldans = sizeof(explode(',', $request->oldans));

            $question_id = $request->question_id;
            $question = $request->question;
            $question_old_img = $request->question_old_img;

            $choice_id = explode(',', $request->oldans);
            $ans = explode(',', $request->ans);
            $answerchk = explode(',', $request->chek);
            $imgold = explode(',', $request->oldansimg);



            // Question Edit
            if(!empty($request->file('question_img'))){

                $path = 'upload/member/question/';
                if (!file_exists($path)) {
                    mkdir($path, 0777, true);
                }
                $file = $request->file('question_img');
                $question_new_img = uniqid().'_'.trim($file->getClientOriginalName());
                $file->move($path, $question_new_img);
                $result = Question::where('question_id', $request->question_id)->update(['question' => $request->question, 'question_img' => $question_new_img]);

                if($question_old_img!=''){
                    unlink($path . $question_old_img);
                }

            }else{

                $question_new_img = '';
                $result = Question::where('question_id', $request->question_id)->update(['question' => $request->question]);

            }
            // Question Edit

            // Answer Edit
            // === Old Ans
            for($i=0;$i<$countoldans;$i++){

                if($request['ans_img'][$i]!="undefined"){

                    $path = 'upload/member/choice/';
                    if (!file_exists($path)) {
                        mkdir($path, 0777, true);
                    }

                    if(!empty($imgold[$i]) && $imgold[$i] != 'null'){
                        unlink($path . $imgold[$i]);
                    }

                    $filex = $request->file('ans_img');
                    $nameo = uniqid().'_'.trim($filex[$i]->getClientOriginalName());
                    $filex[$i]->move($path, $nameo);

                    $result = Choice::where('choice_id', $choice_id[$i])->update(['choice' => str_replace(";",",",$ans[$i]),'choice_img' => $nameo,'answer' => $answerchk[$i]]);

                    $imgold[$i] = null;

                }else{

                    $result = Choice::where('choice_id', $choice_id[$i])->update(['choice' => str_replace(";",",",$ans[$i]),'answer' => $answerchk[$i]]);

                }

            }

            // === New Ans
            for($x=$countoldans;$x<$countwans;$x++){

                if($request['ans_img'][$x]!="undefined"){

                    $path = 'upload/member/choice';
                    if (!file_exists($path)) {
                        mkdir($path, 0777, true);
                    }
                    $filex = $request->file('ans_img');
                    $namec = uniqid().'_'.trim($filex[$x]->getClientOriginalName());
                    $filex[$x]->move($path, $namec);

                    $choice = new Choice;
                    $choice->question_id = $question_id;
                    $choice->choice = str_replace(";",",",$ans[$x]);
                    $choice->answer = $answerchk[$x];
                    $choice->choice_img = $namec;
                    $choice->created_at = now();
                    $choice->updated_at = now();
                    $choice->save();

                    $namec = null;

                }else{

                    $choice = new Choice;
                    $choice->question_id = $question_id;
                    $choice->choice = $ans[$x];
                    $choice->answer = $answerchk[$x];
                    $choice->created_at = now();
                    $choice->updated_at = now();
                    $choice->save();

                }

            }


        }//End Mode Edit

        return '';
    }

    // Load Question All
    public function loadquestion($id)
    {

        $data = array();

        if ($id) {

            $question = Question::where('test_id', $id)->orderBy('question_id','desc')->get();

            if (count($question) > 0) {
                foreach ($question as $value) {
                    $choice[] = Choice::where('question_id', $value->question_id)->orderBy('choice_id','asc')->get();
                }
            }else{
                // $question = null;
                $choice = null;
            }

        } else {
            $question = null;
            $choice = null;
        }

        $data = [ 'question' => $question, 'choice' => $choice, 'pre_post_test' => $id ];

        return view('page.admin.include.course.dataquestion', ['data' => $data, 'userinfo' => $this->userinfo()]);
    }

    // Load Question Edit
    public function loadquestionedit($id)
    {
        $data = Question::where('question_id', $id)->get();
        return $data;
    }

    // Load Choice
    public function loadchoice($id)
    {
        $data = Choice::where('question_id', $id)->orderBy('choice_id','asc')->get();
        return $data;
    }

    // Delete Question & Choice
    public function deletequestion(Request $request)
    {

        $result = Question::select('question_img')->where('question_id', $request->input('id'))->first();
        if($result->question_img!=null){
            unlink('upload/member/question/' . $result->question_img);
        }

        $result = Choice::select('choice_img')->where('question_id', $request->input('id'))->get();
        for($x=0;$x<sizeof($result);$x++){
            if($result[$x]->choice_img!=null){
                unlink('upload/member/choice/' . $result[$x]->choice_img);
            }
        }

        $result = Question::where('question_id', $request->input('id'))->delete();
        $result = Choice::where('question_id', $request->input('id'))->delete();
        return 'Y';
    }

    // Delete Choice
    public function deletechoice(Request $request)
    {
        $result = Choice::select('choice_img')->where('choice_id', $request->input('id'))->first();
        if($result->choice_img!=null){
            unlink('upload/member/choice/' . $result->choice_img);
        }

        $result = Choice::where('choice_id', $request->input('id'))->delete();
        return 'Y';
    }

    public function deleteimage(Request $request){

        if($request->type == 'choice'){

            $result = Choice::where('choice_id', $request->id)->update(['choice_img' => NULL]);

            if($request->img!=null){
                unlink('upload/member/choice/' . $request->img);
            }

            return 'Y';


        }else{

            $result = Question::where('question_id', $request->id)->update(['question_img' => NULL]);

            if($request->img!=null){
                unlink('upload/member/question/' . $request->img);
            }

            return 'Q';

        }

    }

}
