<?php

namespace App\Http\Controllers\Member;

use App\Contact;
use App\Http\Controllers\Controller;
use App\SendMail;
use App\Subscribe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {

        $detail = Contact::first();

        if (empty($detail)) {
            $meta_title = $detail->meta_title;
            $meta_description = $detail->meta_description;
            $meta_keyword = $detail->meta_keyword;
        } else {
            $meta_title = 'Contact Us';
            $meta_description = 'Contact Us';
            $meta_keyword = 'Contact Us';
        }

        //seo
        $seo = $this->Seo(asset('upload/admin/logo_web/images/' . $this->LogoWeb()),
            $meta_title,
            $meta_description,
            $meta_keyword,
            $meta_keyword,
            url('about'));

        $data = array('detail' => $detail, 'seo' => $seo);

        return view('page.member.contact', ['data' => $data]);
    }

    public function send_mail(Request $request)
    {

        $response = $_POST["g-recaptcha-response"];

        $url = 'https://www.google.com/recaptcha/api/siteverify';
        $data = array(
            'secret' => '6Lfpm-IUAAAAABMxSBtRF8YITZ428BdAITPaluCq',
            'response' => urlencode($_POST["g-recaptcha-response"])
        );
        $query = http_build_query($data);
        $options = array(
            'http' => array (
                'header' => "Content-Type: application/x-www-form-urlencoded\r\n"."Content-Length: ".strlen($query)."\r\n"."User-Agent:MyAgent/1.0\r\n",
                'method' => 'POST',
                'content' => http_build_query($data)
            )
        );
        $context  = stream_context_create($options);
        $verify = file_get_contents($url, false, $context);
        $captcha_success=json_decode($verify);

        if ($captcha_success->success==false) {

            return  back()->with('error', 'กรุณากดยืนยันว่าคุณไม่ใช่ robot!');

        } else if ($captcha_success->success==true) {

            $data = array(
                // 'email_from' => $request->email,
                'email_from' => $this->SettingWeb()->email_web,
                'subject' => "How can we help?",
                'page' => 'page.member.mail.contact',
                'input' => $request->all(),
            );

            Mail::to($this->SettingWeb()->email_web)->send(new SendMail($data));
            Mail::to($request->email)->send(new SendMail($data));

            if (Mail::failures()) {
                return back()->with('error', 'ไม่สามารถส่งข้อมูลการติดต่อได้!');
            } else {
                return back()->with('success', 'ส่งข้อมูลการติดต่อเรียบร้อย!');
            }
        }

    }

    public function subscribe(Request $request)
    {

        $subscribe = Subscribe::where('email', $request->email)->first();

        if($subscribe!=null){
            return 1;
        }else{
            $res = Subscribe::insertGetId([
                'email' => $request->email,
                'created_at' => date('y-m-d H-i-s'),
                'updated_at' => date('y-m-d H-i-s')
                ]);

                $subscription = DB::table('email_template')->where('type', 1)->first();

                $data = array(
                    // 'email_from' => $request->email,
                    'email_from' => $this->SettingWeb()->email_web,
                    'subject' => $subscription->subject,
                    'page' => 'page.member.mail.subscribe',
                    'content' => $subscription,
                    'input' => $request->all(),
                );

                // Mail::to($this->SettingWeb()->email_web)->send(new SendMail($data));
                // Mail::to($request->email)->send(new SendMail($data));

                $register = DB::table('email_template')->where('email_id',2)->get();

                if($register[0]->send_to_admin==1){
                    Mail::to($this->SettingWeb()->email_web)->send(new SendMail($data));
                }

            // if($order->send_to_teacher==1){
                //     Mail::to(session('session_username'))->send(new SendMail($data));
            // }

            if($register[0]->send_to_user==1){
                Mail::to($request->email)->send(new SendMail($data));
            }

            return 2;

        }

    }

}
