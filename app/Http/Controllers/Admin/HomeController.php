<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Course;
use App\Orders;
use App\Lesson;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('session_login_admin');
    }


    public function index()
    {

        $customer = User::all()->count();
        $order = Orders::all()->count();
        $course = Course::all()->where('course_status' , '=', 1)->count();
        $lesson = Lesson::all()->where('lesson_status' , '=', 1)->count();

        $data = ['customer' => $customer, 'order' => $order, 'course' => $course, 'lesson' => $lesson];

        return view('page.admin.index', ['data' => $data, 'userinfo' => $this->userinfo()]);
    }
}
