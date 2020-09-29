<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\MenuSystem;
use App\MenuSystemLang;
use App\Language;
use App\Http\Controllers\Controller;

class MenuSystemController extends Controller
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
            'menu_system_status' => '',
            'menu_system_name' => ''
        );
        $Language = Language::select()->where('language_status','1')->get();
        $detail = MenuSystem::orderby('menu_system_id', 'desc')->with('MenuSystemLang')->where('menu_system_main_menu','0')->paginate(10);
        $data = ['page' => 'Main', 'detail' => $detail,'Language' => $Language, 'type' => 'view', 'session_search' => $session_search];

        return view('page.admin.menusystem', ['data' => $data, 'userinfo' => $this->userinfo()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search($page, Request $request)
    {

        $query = MenuSystem::query();

        $menu_system_status = '';
        $menu_system_name = '';

        if ($request->menu_system_status != null) {
            $detail = $query->where('menu_system_status', 'like', '%' . $request->menu_system_status . '%');
            $menu_system_status = $request->menu_system_status;
        }

        if ($request->menu_system_name != null) {
            $detail = $query->where('menu_system_name', $request->menu_system_name);
            $menu_system_name = $request->menu_system_name;
        }

        $session_search = array(
            'menu_system_status' => $menu_system_status,
            'menu_system_name' => $menu_system_name
        );

        $detail = $query->orderby('menu_system_id', 'desc')->paginate(10);

        $data = ['page' => 'Main', 'detail' => $detail, 'type' => 'view', 'session_search' => $session_search];

        return view('page.admin.menusystem', ['data' => $data, 'userinfo' => $this->userinfo()]);
    }

    public function form_add($page)
    {

        $detail['Language'] = Language::select()->where('language_status','1')->get();
        $data_detail = '';
        $Language = '';
        $data = ['page' => 'Main', 'detail' => $detail,'Language' => $Language,'type' => 'form', 'action' => 'Create'];

        return view('page.admin.menusystem', ['data' => $data,'data_detail' => $data_detail, 'userinfo' => $this->userinfo()]);
    }

    public function form_edit($page, $id)
    {
        $detail['Language'] = Language::select()->get();

        $data_detail = MenuSystem::where('menu_system_id', $id)->with('MenuSystemLang')->first();

        $data = ['page' => 'Main', 'detail' => $detail, 'data_detail' => $data_detail, 'type' => 'form', 'action' => 'Edit', 'id' => $id];

        return view('page.admin.menusystem', ['data' => $data, 'userinfo' => $this->userinfo()]);
    }

    public function action($page, Request $request)
    {

        
         $menu_system = $request->menu_system;
         $menu_system_detail = $request->lag;
        
        if ($request->post()) {
            if ($request->type_action == 'Create') {
                $menu_system_id = '';

                if ($menu_system) {
                    $MenuSystem = new MenuSystem;
                    foreach ($menu_system as $key => $val) {
                        $MenuSystem->{$key} = $val;
                    }
                    $MenuSystem->save();
                    $menu_system_id = $MenuSystem->getKey();
                    $alert_success = 'add_success';
                    $alert_not_success = 'add_not_success';
                }
                if ($menu_system_detail) {
                    foreach ($menu_system_detail as $val1) {
                        $MenuSystemLang = new MenuSystemLang;
                        foreach ($val1 as $key => $val) {
                            $MenuSystemLang->{$key} = $val;
                            $MenuSystemLang->menu_system_id = $menu_system_id;
                            $MenuSystemLang->save();
                        }
                    }
                }
            } else if ($request->type_action == 'Edit') {

                $menu_system_id = '';

                if ($menu_system) {
                    $MenuSystem = MenuSystem::find($request->id);
                    foreach ($menu_system as $key => $val) {
                        $MenuSystem->{$key} = $val;
                        if (!isset($menu_system['menu_system_status'])) {
                            $MenuSystem->menu_system_status = 0;
                        }
                    }
                    $MenuSystem->save();
                    $menu_system_id = $MenuSystem->getKey();
                    $alert_success = 'add_success';
                    $alert_not_success = 'add_not_success';
                }
                if ($menu_system_detail) {
                    foreach ($menu_system_detail as $val1) {
                        $MenuSystemLang = MenuSystemLang::where('menu_system_id', $menu_system_id)->where('language_id', $val1)->first();
                        foreach ($val1 as $key => $val) {
                            $MenuSystemLang->{$key} = $val;
                            $MenuSystemLang->menu_system_id = $menu_system_id;
                            if (!isset($val1['menu_system_lang_status'])) {
                                $MenuSystem->menu_system_lang_status = 0;
                            }
                            $MenuSystemLang->save();
                        }
                    }
                }
            }

            if ($menu_system) {
                return back()->with('success', trans('other.' . $alert_success));
            } else {
                return back()->with('error', trans('other.' . $alert_not_success));
            }
        }
    }

    public function delete($page, $id)
    {
        $result = MenuSystem::where('menu_system_id', $id)->delete();
        MenuSystemLang::where('menu_system_id',$id)->delete();
        if (isset($result)) {
            return back()->with('success', trans('other.delete_success'));
        } else {
            return back()->with('error', trans('other.delete_not_success'));
        }
    }
    public function submenu($id)
    {

        $content = MenuSystem::where('menu_system_main_menu',$id)->with('MenuSystemLang')->get();

        $return['content'] = $content;

        return $return;
    }
    public function getdatasubmenu($id)
    {

        $content = MenuSystem::where('menu_system_id',$id)->with('MenuSystemLang')->first();

        $return['content'] = $content;

        return $return;
    }
}
