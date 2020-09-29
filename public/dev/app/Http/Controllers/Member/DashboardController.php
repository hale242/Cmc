<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Charts;
use App\User;
use App\Wishlist;
use App\LastWatch;
use App\Course;
use App\Orders;
use App\OrderDetail;
use App\PrePostTestSave;
use App\Category;

class DashboardController extends Controller
{

  public function __construct()
    {
        $this->middleware('session_login_user');
    }


    public function index() {

      $data['user'] = User::where(['user_id' => session('session_id')])->first();

      $data['wishlist'] = Wishlist::select('course.course_id','course.course_teacher_id','course.course_cat_id','course.course_name','course.course_short_description','course.course_price','course.course_image','course.course_view','course.created_at as date_create','user.first_name','user.last_name','skills.skill_name','wishlist.wishlist_id')
      ->join('user', 'user.user_id', '=', 'wishlist.user_id')
      ->join('course', 'course.course_id', '=', 'wishlist.course_id')
      ->join('skills', 'course.skilllevel', '=', 'skills.id')
      ->where('wishlist.user_id',session('session_id'))
      ->orderby('wishlist.updated_at','desc')
      ->limit(12)
      ->get();


      $data['last_watch'] = LastWatch::select('course.course_id','course.course_teacher_id','course.course_cat_id','course.course_name','course.course_short_description','course.course_price','course.course_image','course.course_view','course.created_at as date_create','user.first_name','user.last_name','skills.skill_name')
      ->join('user', 'user.user_id', '=', 'last_watch.user_id')
      ->join('course', 'course.course_id', '=', 'last_watch.course_id')
      ->join('skills', 'course.skilllevel', '=', 'skills.id')
      ->where('last_watch.user_id',session('session_id'))
      ->orderby('last_watch.updated_at','desc')
      ->limit(12)
      ->get();


      $data['mycourse'] = Orders::select('orders.order_id', 'orders.order_number', 'orders.order_status', 'orders.created_at as date_create', 'course.course_id', 'course.course_name', 'course.course_view', 'course.course_teacher_id', 'user.first_name', 'user.last_name', 'course_category.category_name')
      ->join('order_detail', 'order_detail.order_id', '=', 'orders.order_id')
      ->join('course', 'course.course_id', '=', 'order_detail.course_id')
      ->join('course_category', 'course.course_cat_id', '=', 'course_category.category_id')
      ->join('user', 'user.user_id', '=', 'orders.user_id')
      ->where('orders.user_id', session('session_id'))
      ->orderby('orders.order_id', 'desc')
    //   ->dd();
      ->limit(5)
      ->get();

      $preposttest_result = [];

        foreach ($data['mycourse'] as $value) {

            $result = PrePostTestSave::select('test_save_id', 'course_id', 'pretest_score', 'posttest_score', 'pretest_status', 'created_at as date_create', 'updated_at as date_end')
                ->where('course_id', $value->course_id)
                ->where('user_id', session('session_id'))
                ->first();

            $preposttest_result[] = $result;

        }

      $teacher = User::where('user_type', 3)->get();

    //   foreach($data['last_watch'] as $itemlast){
    //     $res[] = User::where('user_id',$itemlast['course_teacher_id'])->first();
    //   }

    //   $data['last_watch']['teacher'] = $res;

      if(isset($data['user']->image)){
        $logo = asset('upload/member/profile/images/'.$data['user']->image);
      }
      else{
        $logo = asset('assets/member/images/no-image.png');
      }

        //seo
        $seo = $this->Seo(
            $logo,
            'Dashboard',
            'Dashboard',
            'Dashboard',
            'Dashboard',
            url('dashboard'));

        $all_id = Orders::where('user_id',session('session_id'))->where('order_status',1)->orwhere('order_status',3)->get();

        $orderid = array();
        if(count($all_id)!=0){
            foreach($all_id as $item){
                $orderid[] = $item['order_id'];
            }
        }else{
            $orderid = array(0);
        }

      $course_count = OrderDetail::whereIn('order_id',$orderid)->count();
      $course_test_complete = PrePostTestSave::where('user_id',session('session_id'))->where('pretest_status',2)->count();
      $course_test_not_complete = PrePostTestSave::where('user_id',session('session_id'))->where('pretest_status','<>',2)->count();
      $course_test_done = PrePostTestSave::where('user_id',session('session_id'))->where('pretest_status',0)->count();

      if($course_test_complete==0){
        $course_complete = 0;
      }else{
        $course_complete = number_format(($course_test_complete / $course_count) * 100,0);
      }


      if($course_test_not_complete!=0){
        $course_done = number_format(($course_test_done / $course_test_not_complete) * 100,0);
      }else{
        $course_done = 0;
      }



      $chart['course_complete'] = $course_complete;
      $chart['course_complete_count'] = $course_count;

      $chart['course_done'] = $course_done;
      $chart['course_done_count'] = $course_test_not_complete;


      //create chart
    //   $chart['course_complete'] = Charts::database(null, 'donut', 'morris')
    //         ->title(false)
    //         ->labels(['Course Complete','Course Not Complete'])
    //         ->values([0,100])
    //         ->colors(['#f05f78','#d7d7d7'])
    //         ->dimensions(500, 500)
    //         ->responsive(true);

    //   $chart['course_done'] = Charts::database(null, 'donut', 'morris')
    //         ->title(false)
    //         ->labels(['Course Not Done','Course To Be Done'])
    //         ->values([95,5])
    //         ->colors(['#20b6ef','#d7d7d7'])
    //         ->dimensions(500, 500)
    //         ->responsive(true);

    //   $chart['course_go'] = Charts::database(null, 'donut', 'morris')
    //         ->title(false)
    //         ->labels(['Course Not Go','Course To Go'])
    //         ->values([72,28])
    //         ->colors(['#ffb626','#d7d7d7'])
    //         ->dimensions(500, 500)
    //         ->responsive(true);

      $data = array('detail' => $data, 'preposttest_result' => $preposttest_result, 'seo' => $seo,'chart' => $chart, 'teacher' => $teacher);
      return view('page.member.dashboard',['data' => $data]);

    }

}
