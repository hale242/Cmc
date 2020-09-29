<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Register;
use App\SendMail;
use App\Terms;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{

    public function index(Request $request)
    {

        if($request->has('evcode')){
            $evcode =  $request->evcode;
        }else{
            $evcode =  '-';
        }
        $category = Category::orderby('category_id', 'asc')->get();

        //seo
        $seo = $this->Seo(asset('upload/admin/logo_web/images/' . $this->LogoWeb()),
            'Register',
            'Register',
            'Register',
            'Register',
            url('register'));

        $terms = Terms::first();

        $data = ['seo' => $seo, 'evcode' => $evcode, 'terms' => $terms, 'category' => $category];

        return view('page.member.register', ['data' => $data]);
    }

    public function create(Request $request)
    {

        if ($request->post()) {

            $this->validate(request(), [
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'password' => 'required|string|min:8|confirmed',
                'email' => 'required|string|email|max:255',
                'company' => 'required|string|max:255',
            ]);

            $input = $request->all();

            $token = md5($this->TokenPassword());

            $result = Register::ChkRegisterUser($input, $token);

            $register = DB::table('email_template')->where('type', 2)->first();

            if ($result == 'success') {

                $data = array(
                    'email_from' => $this->SettingWeb()->email_web,
                    'subject' => $register->subject,
                    'page' => 'page.member.mail.register',
                    'content' => $register,
                    'input' => $request->all(),
                );

                // Mail::to($input['email'])->send(new SendMail($data));

                if($register->send_to_admin==1){
                    Mail::to($this->SettingWeb()->email_web)->send(new SendMail($data));
                }
                // if($order->send_to_teacher==1){
                //     Mail::to(session('session_username'))->send(new SendMail($data));
                // }
                if($register->send_to_user==1){
                    Mail::to($input['email'])->send(new SendMail($data));
                }

                return back()->with('success', 'Register success');

            } else if ($result == trans('register.register_email_duplicate')) {

                return back()->with('error', trans('register.register_email_duplicate'));

            } else if ($result == 'error') {

                return back()->with('error', 'Error register!');

            }

        }

    }

}
