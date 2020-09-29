<?php

namespace App\Http\Controllers\Member;

use App\Choice;
use App\Http\Controllers\Controller;
use App\Lesson;
use App\LessonFile;
use App\Orders;
use App\PrePostTest;
use App\PrePostTestSave;
use App\Question;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MyCourseController extends Controller
{

    public function __construct()
    {
        // $this->middleware('session_login_user');
    }

    public function index()
    {

        //seo
        $seo = $this->Seo(asset('upload/admin/logo_web/images/' . $this->LogoWeb()),
            'My Course',
            'My Course',
            'My Course',
            'My Course',
            url('mycourse'));

        $detail = Orders::select('orders.order_id', 'orders.order_number', 'orders.order_status', 'orders.created_at as date_create', 'course.course_id', 'course.course_name', 'course.course_view', 'course.course_teacher_id', 'user.first_name', 'user.last_name', 'course_category.category_name')
            ->join('order_detail', 'order_detail.order_id', '=', 'orders.order_id')
            ->join('course', 'course.course_id', '=', 'order_detail.course_id')
            ->join('course_category', 'course.course_cat_id', '=', 'course_category.category_id')
            ->join('user', 'user.user_id', '=', 'orders.user_id')
            ->where('orders.user_id', session('session_id'))
            ->orderby('orders.order_id', 'desc')
            ->get();
            // ->paginate(10);

        $preposttest_result = [];

        foreach ($detail as $value) {

            $result = PrePostTestSave::select('test_save_id', 'course_id', 'pretest_score', 'posttest_score', 'pretest_status', 'created_at as date_create', 'updated_at as date_end')
                ->where('course_id', $value->course_id)
                ->where('user_id', session('session_id'))
                ->first();

            $preposttest_result[] = $result;

        }

        $teacher = User::where('user_type', 3)->get();
        // $teacher = User::all();
        // dd($teacher);

        $data = array('seo' => $seo, 'detail' => $detail, 'preposttest_result' => $preposttest_result, 'teacher' => $teacher);

        return view('page.member.mycourse', ['data' => $data]);
    }

    public function search(Request $request)
    {

        if ($request->post()) {

            $query = Orders::query();
            $query2 = PrePostTestSave::query();

            if ($request->date_start != null) {
                $date_start = date("Y-m-d", strtotime($request->date_start));
                $detail = $query->where(DB::raw("(DATE_FORMAT(orders.created_at,'%Y-%m-%d'))"), ">=", $date_start);
            }

            if ($request->date_end != null) {
                $date_end = date("Y-m-d", strtotime($request->date_end));
                $detail = $query->where(DB::raw("(DATE_FORMAT(orders.created_at,'%Y-%m-%d'))"), "<=", $date_end);
            }

            if ($request->status != null) {
                $result = $query->where('orders.order_status', $request->status);
            }

            if ($request->txt_search != null) {
                $detail = $query->where('orders.order_number', 'like', '%' . $request->txt_search . '%');
                $detail = $query->orWhere('user.first_name', 'like', '%' . $request->txt_search . '%');
                $detail = $query->orWhere('user.last_name', 'like', '%' . $request->txt_search . '%');
            }

            $detail = $query->select('orders.order_id', 'orders.order_number', 'orders.created_at as date_create', 'course.course_id', 'course.course_name', 'course.course_view', 'course.course_teacher_id', 'user.first_name', 'user.last_name')
                ->join('order_detail', 'order_detail.order_id', '=', 'orders.order_id')
                ->join('course', 'course.course_id', '=', 'order_detail.course_id')
                ->join('user', 'user.user_id', '=', 'orders.user_id')
                ->where('orders.user_id', session('session_id'))
                ->orderby('orders.order_id', 'desc')->paginate(10);

            $preposttest_result = [];

            foreach ($detail as $value) {

                $result = PrePostTestSave::select('test_save_id', 'course_id', 'pretest_score', 'posttest_score', 'pretest_status', 'created_at as date_create', 'updated_at as date_end')
                    ->where('course_id', $value->course_id)
                    ->where('user_id', session('session_id'))
                    ->first();

                $preposttest_result[] = $result;

            }

            $teacher = User::where('user_type', 3)->get();

            //seo
            $seo = $this->Seo(asset('upload/admin/logo_web/images/' . $this->LogoWeb()),
                'My Course',
                'My Course',
                'My Course',
                'My Course',
                url('mycourse'));

            $data = ['detail' => $detail, 'preposttest_result' => $preposttest_result, 'teacher' => $teacher, 'seo' => $seo];

            return view('page.member.mycourse', ['data' => $data]);

        }

    }

    public function testing_course($id, $title, $step, $lessonid='')
    {

        //seo
        $seo = $this->Seo(asset('upload/admin/logo_web/images/' . $this->LogoWeb()),
            'Testing Course',
            'Testing Course',
            'Testing Course',
            'Testing Course',
            url('mycourse/testing'));

        $detail['pretest_posttest_header'] = PrePostTest::where('course_id', $id)
            ->first();

        if ($detail['pretest_posttest_header']) {

            $check_duplicate_test = DB::table('pre_post_test_save')
                ->where(['test_id' => $detail['pretest_posttest_header']->test_id, 'user_id' => session('session_id')])
                ->first();

            if (empty($check_duplicate_test)) {
                return redirect()->back()->with('error', 'You have completed this pretest & posttest. Cannot be repeated!');
                exit;
            }

            $detail['question'] = Question::where('test_id', $detail['pretest_posttest_header']->test_id)
                ->orderby('question_id', 'asc')
                ->get();

            $detail['choice'] = [];

            foreach ($detail['question'] as $value) {

                $detail['choice_question'] = Choice::where('question_id', $value->question_id)
                    ->orderby('choice_id', 'asc')
                    ->get();

                if (count($detail['choice_question']) > 0) {

                    $detail['choice'][] = $detail['choice_question'];

                }

            }

            $detail['lesson'] = Lesson::where('course_id', $id)
                ->where('lesson_status', '1')
                ->get();

            $detail['file_lesson'] = [];

            if (count($detail['lesson']) > 0) {

                foreach ($detail['lesson'] as $value) {

                    $detail['lesson_file'] = LessonFile::where('lesson_id', $value->lesson_id)->get();

                    $detail['file_lesson'][] = $detail['lesson_file'];

                    $detail['lesson_comment'][] = DB::table('comment_lesson')
                                                    ->join('user','user.user_id','comment_lesson.user_id')
                                                    ->where('lesson_id',$value->lesson_id)
                                                    ->orderby('comment_id','desc')
                                                    ->get();

                    $detail['lesson_comment_count'][] =  DB::table('comment_lesson')->where('lesson_id',$value->lesson_id)->where('user_id',session('session_id'))->count();

                }

            }


            $detail['preposttest_save'] = PrePostTestSave::where(['course_id' => $id, 'user_id' => session('session_id')])->first();

            $data = array('seo' => $seo, 'detail' => $detail, 'id' => $id, 'title' => $title, 'step' => $step, 'lesson' => $lessonid);

            // dd($data);

            return view('page.member.testing_course', ['data' => $data]);

        } else {

            return redirect()->back()->with('error', "Don't have pretest & posttest in the course!");
        }

    }

    public function save_testing_course(Request $request)
    {

        // return $request->question_amount;

        //step1
        if ($request->step == 1) {

            // if($request->question_amount0){

            // }
            $score_pretest = 0;

            foreach ($request->choice_pretest as $value) {

                if ($value != null) {

                    $choice_question = Choice::where('choice_id', $value)
                        ->where('answer', 'true')
                        ->get();

                    if (count($choice_question) > 0) {

                        $score_pretest = $score_pretest + 1;

                    }

                }

            }

            $score_precent = round(($score_pretest / $request->question_amount) * 100);

            if ($score_precent < 80) {
                $status = 1;
                $status_text = '<h5><b class="text-danger">You Almost Done, Please try again.</b></h5>';
            } else {
                $status = 2;
                $status_text = '<h3><b class="text-success">Pass</b></h3>';
            }

            $data = [
                'pretest_score' => $score_pretest,
                'updated_at' => now(),
            ];

            $result = PrePostTestSave::where('test_save_id', $request->test_save_id)->update($data);

            if ($result) {
                $result = ['result' => true, 'message' => '<h4><b>Score Pretest</b><br><br><b class="text-primary">' . $score_pretest . '</b>/<b class="text-success">' . $request->question_amount . '</b><hr>' . $status_text . '</h4>', 'id' => $request->course_id, 'title' => $request->title, 'step' => $request->step + 1];
            } else {
                $result = ['result' => false, 'message' => '<b>Error save score pretest</b>'];
            }

            return response()->json($result);
            exit;

        }
        //end step1

        //step2
        if ($request->step == 2) {

            $result = ['result' => true, 'message' => '<h4><b>Next Step ></b></h4>', 'id' => $request->course_id, 'title' => $request->title, 'step' => $request->step + 1];

            return response()->json($result);
            exit;

        }
        //end step2

        //step3
        if ($request->step == 3) {

            $score_posttest = 0;

            foreach ($request->choice_posttest as $value) {

                if ($value != null) {

                    $choice_question2 = Choice::where('choice_id', $value)
                        ->where('answer', 'true')
                        ->get();

                    if (count($choice_question2) > 0) {

                        $score_posttest = $score_posttest + 1;

                    }

                }

            }

            $score_precent = round(($score_posttest / $request->question_amount) * 100);

            if ($score_precent < 80) {
                $status = 1;
                $status_text = '<h5><b class="text-danger">You Almost Done, Please try again.</b></h5>';
            } else {
                $status = 2;
                $status_text = '<h3><b class="text-success">Pass</b></h3>';
            }

            $data = [
                'posttest_score' => $score_posttest,
                'pretest_status' => $status,
                'updated_at' => now(),
            ];

            $result = PrePostTestSave::where('test_save_id', $request->test_save_id)->update($data);

            $score_pretest = PrePostTestSave::select('pretest_score')->where('test_save_id', $request->test_save_id)->first();

            if ($result) {
                $result = ['result' => true, 'message' => '<h4><b>Score Posttest</b><br><br><b class="text-primary">' . $score_posttest . '</b>/<b class="text-success">' . $request->question_amount . '</b><hr>' . $status_text . '</h4>', 'score_pretest' => $score_pretest->pretest_score, 'score_posttest' => $score_posttest, 'title' => $request->title, 'question_amount' => $request->question_amount, 'status' => $status, 'step' => $request->step + 1];
            } else {
                $result = ['result' => false, 'message' => '<b>Error save score posttest</b>'];
            }

            return response()->json($result);
            exit;

        }
        //end step3

    }

    public function testing_course_score($score_pretest, $score_posttest, $title, $question_amount, $status)
    {

        //seo
        $seo = $this->Seo(asset('upload/admin/logo_web/images/' . $this->LogoWeb()),
            'Testing Course Score',
            'Testing Course Score',
            'Testing Course Score',
            'Testing Course Score',
            url('mycourse/testing/score'));

        $data = array('seo' => $seo, 'score_pretest' => $score_pretest, 'score_posttest' => $score_posttest, 'title' => $title, 'question_amount' => $question_amount, 'status' => $status);

        return view('page.member.testing_course_success', ['data' => $data]);

    }

    public function addcomment($id, $lesson, $comment){
        // return "ID = ".$id." - Lesson = ".$lesson." - Comment = ".$comment;
        if($comment!=''){
            $res = DB::table('comment_lesson')->insertGetId([
                'user_id' => $id,
                'lesson_id' => $lesson,
                'comment' => $comment,
                'created_at' => date('Y-m-d H:i:s')
            ]);

            return $res;
        }
    }

    public function deletecomment($id){
        // return "Delete comment = ".$id;
        $res = DB::table('comment_lesson')->where('comment_id',$id)->delete();
        return $res;
    }

    public function delete($id)
    {

        $result = Orders::where('order_id', $id)->delete();

        if (isset($result)) {
            return back()->with('success', trans('other.delete_success'));
        } else {
            return back()->with('error', trans('other.delete_not_success'));
        }

    }
}
