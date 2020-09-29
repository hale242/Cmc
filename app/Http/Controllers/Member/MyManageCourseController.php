<?php

namespace App\Http\Controllers\Member;

use App\Choice;
use App\Http\Controllers\Controller;
use App\Lesson;
use App\LessonFile;
use App\PrePostTest;
use App\PrePostTestSave;
use App\Question;
use App\Course;
use App\Wishlist;
use App\User;
use App\Orders;
use App\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MyManageCourseController extends Controller
{

    public function __construct()
    {
        // $this->middleware('session_login_user');
    }

    public function index()
    {

        //seo
        $seo = $this->Seo(asset('upload/admin/logo_web/images/' . $this->LogoWeb()),
            'Manage Course',
            'Manage Course',
            'Manage Course',
            'Manage Course',
            url('managecourse'));

        $detail = Course::where('course_teacher_id',session('session_id'))->paginate(10);

        $wishlist = DB::select('SELECT course_id, count(course_id) as counter FROM wishlist GROUP BY course_id');

        $data = array('seo' => $seo, 'detail' => $detail, 'wishlist' => $wishlist);

        return view('page.member.mymanagecourse', ['data' => $data]);
    }

    public function getgradebook($id){

        //seo
        $seo = $this->Seo(asset('upload/admin/logo_web/images/' . $this->LogoWeb()),
            'Gradebook',
            'Gradebook',
            'Gradebook',
            'Gradebook',
            url('gradebook'));

        $detail = PrePostTestSave::where('course_id',$id)
                                    ->join('user','user.user_id','pre_post_test_save.user_id')
                                    ->get();

         $data = array('seo' => $seo, 'detail' => $detail);

        return view('page.member.mygradebook', ['data' => $data]);
    }

}
