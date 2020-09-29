<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Language;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class languageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('session_login_admin');
    }

     public function page($page)
    {

        $session_search = array(
            'language_status' => '',
            'language_name' => ''
        );

        $detail = Language::orderby('language_id', 'desc')->paginate(10);
        $data = ['page' => 'Main', 'detail' => $detail, 'type' => 'view', 'session_search'=>$session_search];

        return view('page.admin.language', ['data' => $data, 'userinfo' => $this->userinfo()]);

    }

    public function search($page, Request $request)
    {

        $query = Language::query();

        $language_status = '';
        $language_name = '';

        if ($request->language_status != null) {
            $detail = $query->where('language_status', 'like', '%' . $request->language_status . '%');
            $language_status = $request->language_status;
        }

        if ($request->language_name != null) {
            $detail = $query->where('language_name', $request->language_name);
            $language_name = $request->language_name;
        }

        $session_search = array(
            'language_status' => $language_status,
            'language_name' => $language_name
        );

        $detail = $query->orderby('language_id', 'desc')->paginate(10);

        $data = ['page' => 'Main', 'detail' => $detail, 'type' => 'view', 'session_search'=>$session_search];

        return view('page.admin.language', ['data' => $data, 'userinfo' => $this->userinfo()]);

    }

    public function form_add($page)
    {

        $detail = null;
        $data = ['page' => 'Main', 'detail' => $detail, 'type' => 'form', 'action' => 'Create'];

        return view('page.admin.language', ['data' => $data, 'userinfo' => $this->userinfo()]);

    }

    public function form_edit($page, $id)
    {

        $detail = Language::where('language_id', $id)->first();
        $data = ['page' => 'Main', 'detail' => $detail, 'type' => 'form', 'action' => 'Edit', 'id' => $id];

        return view('page.admin.language', ['data' => $data, 'userinfo' => $this->userinfo()]);

    }

    public function action($page, Request $request)
    {

        if ($request->post()) {

            $this->validate(request(), [
                'img' => 'mimes:jpeg,jpg,png|max:2048',
            ]);

            if ($request->type_action == 'Create') {

                $result = new Language;
                $result->language_name = $request->language_name;
                $result->language_details = $request->language_details;
                $result->language_code = $request->language_code;
                $result->language_main = $request->language_main;
                $result->language_status = $request->language_status;
                $result->created_at = now();
                $result->updated_at = now();
                $result->save();
                $alert_success = 'add_success';
                $alert_not_success = 'add_not_success';

            } else if ($request->type_action == 'Edit') {

                $data = [
                    'language_name' => $request->language_name,
                    'language_details' => $request->language_details,
                    'language_code' => $request->language_code,
                    'language_main' => $request->language_main,
                    'language_status' => $request->language_status,
                    'updated_at' => now(),
                ];
                $result = Language::where('language_id', $request->id)->update($data);
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

    public function delete($page, $id)
    {

        $result = Language::where('language_id', $id)->delete();

        if (isset($result)) {
            return back()->with('success', trans('other.delete_success'));
        } else {
            return back()->with('error', trans('other.delete_not_success'));
        }

    }
}
