<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\VisitWeb;
use App\Course;
use App\Category;
use App\News;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    public function __construct()
    {

    }

    public function index()
    {

        // $device = $this->DeviceDetect();

        $date_today = date('Y-m-d');

        $course['course_new'] = Course::select('course.course_id','course.course_name','course.course_short_description','course.course_price','course.created_at as date_create')
        ->join('user', 'user.user_id', '=', 'course.course_teacher_id')
        ->join('course_category', 'course_category.category_id', '=', 'course.course_cat_id')
        ->where('course.course_status',1)
        ->orderBy('course.course_id','desc')->limit(3)->get();

        $course['course_poppular'] = Course::select('course.course_id','course.course_cat_id','course.course_name','course.course_short_description','course.course_price','course.course_image','course.course_view','course.created_at as date_create','user.first_name','user.last_name','user.image','skills.skill_name')
        ->join('user', 'user.user_id', '=', 'course.course_teacher_id')
        ->join('course_category', 'course_category.category_id', '=', 'course.course_cat_id')
        ->join('skills', 'course.skilllevel', '=', 'skills.id')
        ->where('course.course_status',1)
        ->orderBy('course.course_view','desc')->limit(8)->get();

        $category = Category::where('category_status',1)->get();

        $news = News::where('news_status',1)->orderby('updated_at','desc')->limit(9)->get();

        // seo
        $seo = $this->Seo(asset('upload/admin/logo_web/images/'.$this->SettingWeb()->logo_web),
            $this->SettingWeb()->seo_description,
            $this->SettingWeb()->seo_keywords,
            $this->SettingWeb()->seo_keywords,
            $this->SettingWeb()->seo_keywords,
            url('/'));

        $data = array('course' => $course,'category' => $category,'news' => $news,'seo' => $seo);

        return view('page.member.index',['data' => $data]);
    }

    // Return Back Response Credit Card
    public function gbpaybackproresult(Request $request){

        $json_str = file_get_contents('php://input');
        $response = json_decode($json_str,true);

        $log_file = 'GBPayBackprocessReturn.txt';
        $log  =  "resultCode : ".$request->resultCode."\n";
        $log .=  "amount : ".$request->amount."\n";
        $log .=  "referenceNo : ".$request->referenceNo."\n";
        $log .=  "gbpReferenceNo : ".$request->gbpReferenceNo."\n";
        $log .=  "detail : ".$request->detail."\n";
        $log .=  "customerName : ".$request->customerName."\n";
        $log .=  "customerEmail : ".$request->customerEmail."\n";
        $log .=  "merchantDefined1 : ".$request->merchantDefined1."\n";
        $log .=  "currencyCode : ".$request->currencyCode."\n";
        $log .=  "date : ".$request->date."\n";
        $log .=  "time : ".$request->time."\n";
        $log .=  "cardNo : ".$request->cardNo."\n";
        $log .= "-----------------------------------------------------------------------------------------------\n";
        if(error_log(date('[Y-m-d H:i e] '). $log, 3, base_path('paymentlog/').date("Y-m-d")."-".$log_file)){}
        exit;

    }

    // Return Back Response QR Code
    public function gbpaybackproresult_qrcode(Request $request){

        $json_str = file_get_contents('php://input');
        $response = json_decode($json_str,true);

        $log_file = 'GBPayBackprocessReturnQR.txt';
        $log  = "-----------------------------------------------------------------------------------------------\n";
        $log .=  "DataResult : " . print_r($response,true) . "\n";
        if(error_log(date('[Y-m-d H:i e] '). $log, 3, base_path('paymentlog/').date("Y-m-d")."-".$log_file)){

            if(!empty($request->referenceNo)){
                DB::table('orders')
                ->where('order_number', $request->referenceNo)
                ->update(['order_status' => 1, 'order_bank_transfer' => 'QR Code', 'order_payment_date' => date('Y-m-d'), 'order_payment_time' => date('H:i:s')]);

                return json_encode(array("status"=>"done","order_status"=>"payment_complate"));
            }else{
                return json_encode(array("status"=>"fail","order_status"=>"not_order"));
            }

        }
        exit;
    }

}
