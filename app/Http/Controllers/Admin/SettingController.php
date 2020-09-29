<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Institution;
use App\Language;
use App\Setting;
use App\SlideBanner;
use Illuminate\Http\Request;

class SettingController extends Controller
{

    public function __construct()
    {
        $this->middleware('session_login_admin');
    }

    public function page($page)
    {

        if ($page == 'website') {
            $detail_setting = Setting::all();
            $data = ['page' => 'Website', 'setting' => $detail_setting, 'type' => 'view'];
            return view('page.admin.setting', ['data' => $data, 'userinfo' => $this->userinfo()]);
        }

    }

    public function action($page, Request $request)
    {

        if ($request->post()) {

            if ($page == 'Website') {

                $data = [
                    'title_web'         => $request->titleweb,
                    'footer_web'        => $request->footerweb,
                    'phone_web'         => $request->phoneweb,
                    'email_web'         => $request->emailweb,
                    'seo_description'   => $request->descriptionweb,
                    'status_web'        => $request->statusweb
                ];

                $result = Setting::where('setting_id', '1')->update($data);
                $alert_success = 'edit_success';
                $alert_not_success = 'edit_not_success';

            }

            if ($result) {
                return back()->with('success', trans('other.' . $alert_success));
            } else {
                return back()->with('error', trans('other.' . $alert_not_success));
            }

        }
    }

}
