<?php

namespace App\Http\Controllers\Member;

use App\Category;
use App\Course;
use App\Orders;
use App\OrderDetail;
use App\PrePostTest;
use App\Question;
use App\Lesson;
use App\Skills;
use App\User;
use App\LastWatch;
use App\ReviewCourse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{

    public function index(Request $request)
    {

         //seo
        $seo = $this->Seo(
            asset('upload/admin/logo_web/images/' . $this->LogoWeb()),
            'Training Course',
            'Training Course',
            'Training Course',
            'Training Course',
            url('course')
        );

        $category = Category::orderby('category_id', 'asc')->get();
        $skill = Skills::where('status',1)->orderby('id', 'asc')->get();
        $min_price = Course::where('course_status', 1)->min('course_price');
        $max_price = Course::where('course_status', 1)->max('course_price');

        if($request->sort==''){
            $sort = 'desc';
        }else{
            $sort = $request->sort;
        }

        if($request->id!=''){
            $category_id = array('0' => $request->id);
        }else if($request->category_id != ''){
            $category_id = explode(',',$request->category_id);
        }else{
            $category_id = '';
        }

        if($request->skill != ''){
            $skill_id = explode(',',$request->skill);
        }else{
            $skill_id = '';
        }


        if ($request->minimum_range != 0 || $request->maximum_range != '' && $request->maximum_range != $max_price) {

            if ($category_id != '' && $skill_id != '') {

                $detail = Course::join('user', 'user.user_id', '=', 'course.course_teacher_id')
                    ->join('course_category', 'course_category.category_id', '=', 'course.course_cat_id')
                    ->join('skills', 'course.skilllevel', '=', 'skills.id')
                    ->where('course.course_price', '>=', $request->minimum_range)
                    ->where('course.course_price', '<=', $request->maximum_range)
                    ->where('course.course_status', 1)
                    ->whereIn('course.course_cat_id', $category_id)
                    ->whereIn('course.skilllevel', $skill_id)
                    ->orderby('course.updated_at', $sort)
                    ->paginate(12);

            } else if ($category_id != '' && $skill_id == '') {

                $detail = Course::join('user', 'user.user_id', '=', 'course.course_teacher_id')
                    ->join('course_category', 'course_category.category_id', '=', 'course.course_cat_id')
                    ->join('skills', 'course.skilllevel', '=', 'skills.id')
                    ->where('course.course_price', '>=', $request->minimum_range)
                    ->where('course.course_price', '<=', $request->maximum_range)
                    ->where('course.course_status', 1)
                    ->whereIn('course.course_cat_id', $category_id)
                    ->orderby('course.updated_at', $sort)
                    ->paginate(12);

            } else if ($category_id == '' && $skill_id != '') {

                $detail = Course::join('user', 'user.user_id', '=', 'course.course_teacher_id')
                    ->join('course_category', 'course_category.category_id', '=', 'course.course_cat_id')
                    ->join('skills', 'course.skilllevel', '=', 'skills.id')
                    ->where('course.course_price', '>=', $request->minimum_range)
                    ->where('course.course_price', '<=', $request->maximum_range)
                    ->where('course.course_status', 1)
                    ->whereIn('course.skilllevel', $skill_id)
                    ->orderby('course.updated_at', $sort)
                    ->paginate(12);

            } else {

                $detail = Course::join('user', 'user.user_id', '=', 'course.course_teacher_id')
                    ->join('course_category', 'course_category.category_id', '=', 'course.course_cat_id')
                    ->join('skills', 'course.skilllevel', '=', 'skills.id')
                    ->where('course.course_price', '>=', $request->minimum_range)
                    ->where('course.course_price', '<=', $request->maximum_range)
                    ->where('course.course_status', 1)
                    ->orderby('course.updated_at', $sort)
                    ->paginate(12);
            }

        } else {

            if ($category_id != '' && $skill_id != '') {

                $detail = Course::join('user', 'user.user_id', '=', 'course.course_teacher_id')
                    ->join('course_category', 'course_category.category_id', '=', 'course.course_cat_id')
                    ->join('skills', 'course.skilllevel', '=', 'skills.id')
                    ->where('course.course_status', 1)
                    ->whereIn('course.course_cat_id', $category_id)
                    ->whereIn('course.skilllevel', $skill_id)
                    ->orderby('course.updated_at', $sort)
                    ->paginate(12);

            } else if ($category_id != '' && $skill_id == '') {

                $detail = Course::join('user', 'user.user_id', '=', 'course.course_teacher_id')
                    ->join('course_category', 'course_category.category_id', '=', 'course.course_cat_id')
                    ->join('skills', 'course.skilllevel', '=', 'skills.id')
                    ->where('course.course_status', 1)
                    ->whereIn('course.course_cat_id', $category_id)
                    ->orderby('course.updated_at', $sort)
                    ->paginate(12);

            } else if ($category_id == '' && $skill_id != '') {

                $detail = Course::join('user', 'user.user_id', '=', 'course.course_teacher_id')
                    ->join('course_category', 'course_category.category_id', '=', 'course.course_cat_id')
                    ->join('skills', 'course.skilllevel', '=', 'skills.id')
                    ->where('course.course_status', 1)
                    ->whereIn('course.skilllevel', $skill_id)
                    ->orderby('course.updated_at', $sort)
                    ->paginate(12);

            } else {
                $detail = Course::join('user', 'user.user_id', '=', 'course.course_teacher_id')
                    ->join('course_category', 'course_category.category_id', '=', 'course.course_cat_id')
                    ->join('skills', 'course.skilllevel', '=', 'skills.id')
                    ->where('course.course_status', 1)
                    ->orderby('course.updated_at', $sort)
                    ->paginate(12);
            }

        }


        if(isset($detail)){
            if (count($detail) > 0 || $detail != null) {

                $data = [
                    'category' => $category,
                    'skill' => $skill,
                    'detail' => $detail,
                    'seo' => $seo,
                    'minimum_range' => $request->minimum_range,
                    'maximum_range' => $request->maximum_range,
                    'min_price' => $min_price,
                    'max_price' => $max_price,
                ];

                if ($request->ajax()) {
                    return view('page.member.ajax.course.detail', ['data' => $data, 'useridx' => $request->userxx]);
                }

            } else {

                $data = null;
                // return view('page.member.data_not_found', ['data' => $data]);
                return view('page.member.course', ['data' => $data]);
            }
        }

        return view('page.member.course', ['data' => $data]);
    }

    public function search_course(Request $request)
    {

        if ($request->post()) {

            $seo = $this->Seo(
                asset('upload/admin/logo_web/images/' . $this->LogoWeb()),
                $request->txt_search,
                $request->txt_search,
                $request->txt_search,
                $request->txt_search,
                url('search')
            );

            $detail = Course::where('course_name', 'like', '%' . $request->txt_search . '%')
                ->orWhere('course_price', 'like', '%' . $request->txt_search . '%')
                ->orWhere('course_short_description', 'like', '%' . $request->txt_search . '%')
                ->paginate(12);

            $data = ['detail' => $detail, 'keyword' => $request->txt_search, 'seo' => $seo];

            return view('page.member.search', ['data' => $data]);
        } else {
            return redirect('/');
        }
    }

    public function category(Request $request, $id = null, $title = null)
    {

        //seo
        $seo = $this->Seo(
            asset('upload/admin/logo_web/images/' . $this->LogoWeb()),
            'Training Course',
            'description',
            'keywords',
            'robots',
            url('course')
        );

        if($request->sort==''){
            $sort = 'desc';
        }else{
            $sort = $request->sort;
        }

        $category = Category::orderby('category_id', 'desc')->get();

        $detail = Course::join('user', 'user.user_id', '=', 'course.course_teacher_id')
        // ->where('course.course_cat_id', $request->category_id)
            ->whereIn('course.course_cat_id', [$request->category_id])
            ->where('course.course_status', 1)
            ->orderby('course.updated_at', $sort)
            ->paginate(12);

        $data = [
            'category' => $category, 'detail' => $detail,
            'seo' => $seo,
            'minimum_range' => null,
            'maximum_range' => null,
            'category_id' => $id,
        ];

        if ($request->ajax()) {
            return view('page.member.ajax.course.detail', ['data' => $data]);
        }

        return view('page.member.category', ['data' => $data]);
    }

    public function view_course($id, $title)
    {

        if(session('session_id')!=null){
            $mycourse = OrderDetail::join('orders', 'orders.order_id', 'order_detail.order_id')
                        ->where('user_id',session('session_id'))->get();
            $arr = array();
            foreach($mycourse as $value){
                $arr[] = $value['course_id'];
            }

            if(in_array($id, $arr)){
                $course['has'] = "Y";
            }else{
                $course['has'] = "N";
            }

            $checklast = LastWatch::where('user_id',session('session_id'))->where('course_id',$id)->count();
            $last = json_decode(LastWatch::where('user_id',session('session_id'))->where('course_id',$id)->first());
            // $last->last_watch_id

            // Customer Lastwatch
            if($checklast>0){
                LastWatch::where('last_watch_id',$last->last_watch_id)->update(['updated_at' => now()]);
            }else{
                LastWatch::insert([
                    'course_id'  => $id,
                    'user_id'    => session('session_id'),
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }

        }else{
            $course['has'] = "N";
        }

        $detail = Course::join('course_category', 'course_category.category_id', '=', 'course.course_cat_id')
            ->join('user', 'user.user_id', '=', 'course.course_teacher_id')
            ->join('skills', 'skills.id', '=', 'course.skilllevel')
            ->where('course.course_id', $id)
            ->first();

        if ($detail != null) {
            $this->AddViewCourse($id);
        }

        $chktest = PrePostTest::select('test_id')->where('course_id','=',$id)->get();
        $quizzes = Question::where('test_id',$chktest[0]->test_id)->count();
        $lesson = Lesson::where('course_id','=',$id)->count();
        $student = OrderDetail::where('course_id','=',$id)->count();
        $category = Category::orderby('category_id', 'desc')->get();
        $course['last'] = Course::where('course_id', '!=', $id)->where('course_status',1)->orderby('course_id', 'desc')->limit(6)->get();
        $course['reccommend'] = Course::select('course.course_id', 'course.course_cat_id', 'course.course_name', 'course.course_short_description', 'course.course_curriculum', 'course.course_instructor', 'course.course_price', 'course.course_image', 'course.course_view', 'course.created_at as date_create', 'user.first_name', 'user.last_name')
            ->join('course_category', 'course_category.category_id', '=', 'course.course_cat_id')
            ->join('user', 'user.user_id', '=', 'course.course_teacher_id')
            ->where('course_cat_id', $detail->course_cat_id)
            ->where('course_id', '!=', $id)
            ->orderby('course_id', 'desc')->limit(3)->get();

        $course['review'] = ReviewCourse::where('course_id', $id)->join('user','user.user_id','=','review_course.user_id')->get();

        if(count($course['review'])>0){
            foreach($course['review'] as $item){
                $datax[] = $item['rating'];
            }
        }else{
            $datax = array(0);
        }

        $course['rating'] = collect($datax)->avg();
        $course['count'] = ReviewCourse::where('course_id', $id)->count();

        //seo
        $seo = $this->Seo(
            asset('upload/member/course/images/' . $detail->course_image),
            $detail->course_name,
            $detail->course_name,
            $detail->course_name,
            $detail->course_name,
            url('course/detail/' . $detail->course_id . '/' . $detail->course_name)
        );

        $data = array('detail' => $detail, 'seo' => $seo, 'category' => $category, 'course' => $course, 'quizzes' => $quizzes, 'lesson' => $lesson, 'student' => $student);

        return view('page.member.view_course', ['data' => $data]);
    }

    public function AddViewCourse($id)
    {
        $result = Course::find($id);
        $result->course_view = ($result->course_view) + 1;
        $result->save();
    }

    public function course_favorite($id)
    {

        $result = DB::table('course_favorite')->where(['Cou_ID' => $id, 'Use_ID' => session('session_id')])->get();

        if (count($result) > 0) {

            $result = ['result' => false, 'message' => 'คุณได้ทำการบันทึกคอร์สนี้แล้ว!'];
        } else {

            $timeout = $this->NextDate(date('Y-m-d'), 30, 'D');

            $data = [
                'Cou_ID' => $id,
                'Use_ID' => session('session_id'),
                'Cof_Timeout' => $timeout,
                'created_at' => now(),
                'updated_at' => now(),
            ];

            $result = DB::table('course_favorite')->insert($data);

            if ($result) {
                $result = ['result' => true, 'message' => 'บันทึกคอร์สของคุณเรียบร้อย'];
            } else {
                $result = ['result' => false, 'message' => 'บันทึกคอร์สไม่สำเร็จ!'];
            }
        }

        return response()->json($result);
    }

    public function review_course(Request $request)
    {

        $action = $request->action;

        if($action=='add'){

            $result = DB::table('review_course')->where(['course_id' => $request->course_id, 'user_id' => $request->user_id])->get();

            if (count($result) > 0) {

                $result = ['result' => false, 'message' => 'คุณได้ทำการรีวิวคอร์สนี้แล้ว ไม่สามารถรีวิวซ้ำได้!'];

            } else {

                $data = [
                    'course_id' => $request->course_id,
                    'user_id' => $request->user_id,
                    'rating' => $request->rating_create,
                    'review' => $request->comment,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];

                $result = DB::table('review_course')->insert($data);

                if ($result) {
                    $result = ['result' => true, 'message' => 'ขอบคุณสำหรับการรีวิวของท่าน'];
                } else {
                    $result = ['result' => false, 'message' => 'ไม่สามารถรีวิวได้!'];
                }
            }

            // return response()->json($result);
            header( "location: ".url("/course/detail\\/").$request->course_id."/".$request->course_name);
            exit(0);

        }else if($action=='edit'){

            $result = ReviewCourse::where('review_id',$request->comment_id_edit)
                                    ->update(['rating' => $request->rating_edit, 'review' => $request->comment_edit, 'updated_at' => now()]);

            // return $request;

            if ($result) {
                header( "location: ".url("/course/detail\\/").$request->course_id_edit."/".$request->course_name_edit);
                exit(0);
            }
        }

    }

    public function comment_delete($id,$course_id,$title)
    {
        $result = ReviewCourse::find($id);
        $result->delete();
        header( "location: ".url("/course/detail\\/").$course_id."/".$title);
        exit(0);
    }
}
