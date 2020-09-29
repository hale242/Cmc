<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('session_login_admin');
    }

    public function page($page, Request $request)
    {

        if ($page == 'all') {
            $detail = User::select('*')->paginate(25);
            $data = ['page' => 'All', 'detail' => $detail, 'type' => 'view'];
            return view('page.admin.users', ['data' => $data, 'userinfo' => $this->userinfo()]);
        } else if ($page == 'admin') {
            $detail = User::where('user_type', 1)->paginate(25);
            $data = ['page' => 'Admin', 'detail' => $detail, 'type' => 'view'];
            return view('page.admin.users', ['data' => $data, 'userinfo' => $this->userinfo()]);
        } else if ($page == 'user') {
            $detail = User::where('user_type', 2)->paginate(25);
            $data = ['page' => 'User', 'detail' => $detail, 'type' => 'view'];
            return view('page.admin.users', ['data' => $data, 'userinfo' => $this->userinfo()]);
        } else if ($page == 'teacher') {
            $detail = User::where('user_type', 3)->paginate(25);
            $data = ['page' => 'Teacher', 'detail' => $detail, 'type' => 'view'];
            return view('page.admin.users', ['data' => $data, 'userinfo' => $this->userinfo()]);
        }
    }

    public function search($page, Request $request)
    {

            if ($page == 'All') {
                $type = 1;
            }

            else if ($page == 'Admin') {
                $type = 1;
            } else if ($page == 'User') {
                $type = 2;
            } else if ($page == 'Teacher') {
                $type = 3;
            }

            $query = User::query();

            if ($request->date_start != null && $request->date_end != null) {
                $date_start = date("Y-m-d", strtotime($request->date_start));
                $date_end = date("Y-m-d", strtotime($request->date_end));
                $detail = $query->whereBetween(DB::raw("(DATE_FORMAT(created_at,'%Y-%m-%d'))"), [$date_start, $date_end]);
            }else if ($request->date_start != null && $request->date_end == null) {
                $date_start = date("Y-m-d", strtotime($request->date_start));
                $detail = $query->where(DB::raw("(DATE_FORMAT(created_at,'%Y-%m-%d'))"), "=", $date_start);
            }else if ($request->date_start == null && $request->date_end != null) {
                $date_end = date("Y-m-d", strtotime($request->date_end));
                $detail = $query->where(DB::raw("(DATE_FORMAT(created_at,'%Y-%m-%d'))"), "=", $date_end);
            }

            if ($request->status != null) {
                $detail = $query->where('user_status', $request->status);
            }

            if ($request->txt_search != null) {
                $detail = $query->where('first_name', 'like', '%' . $request->txt_search . '%');
                $detail = $query->Orwhere('last_name', 'like', '%' . $request->txt_search . '%');
            }

            if ($request->sli_type != null) {
                $detail = $query->where('user_type', '=', $request->sli_type);
            }

            $detail = $query->orderby('first_name', 'asc')->paginate(25);

            $data = ['page' => $page, 'detail' => $detail, 'type' => 'view'];

            return view('page.admin.users', ['data' => $data, 'userinfo' => $this->userinfo()]);

    }

    public function form_add($page)
    {

        if ($page == 'all') {

            $detail = null;
            $data = ['page' => 'Users', 'detail' => $detail, 'type' => 'form', 'action' => 'Create'];
            return view('page.admin.users', ['data' => $data, 'userinfo' => $this->userinfo()]);

        } else if ($page == 'admin') {

            $detail = null;
            $data = ['page' => 'Admin', 'detail' => $detail, 'type' => 'form', 'action' => 'Create'];
            return view('page.admin.users', ['data' => $data, 'userinfo' => $this->userinfo()]);

        } else if ($page == 'user') {

            $detail = null;
            $data = ['page' => 'User', 'detail' => $detail, 'type' => 'form', 'action' => 'Create'];
            return view('page.admin.users', ['data' => $data, 'userinfo' => $this->userinfo()]);

        } else if ($page == 'teacher') {

            $detail = null;
            $data = ['page' => 'Teacher', 'detail' => $detail, 'type' => 'form', 'action' => 'Create'];
            return view('page.admin.users', ['data' => $data, 'userinfo' => $this->userinfo()]);

        }

    }

    public function form_edit($page, $id)
    {
        if ($page == 'all') {
            $detail = User::where(['user_id' => $id])->first();
            $data = ['page' => 'Users', 'detail' => $detail, 'type' => 'form', 'action' => 'Edit', 'id' => $id];
            return view('page.admin.users', ['data' => $data, 'userinfo' => $this->userinfo()]);
        } else if ($page == 'admin') {
            $detail = User::where(['user_id' => $id, 'user_type' => 1])->first();
            $data = ['page' => 'Admin', 'detail' => $detail, 'type' => 'form', 'action' => 'Edit', 'id' => $id];
            return view('page.admin.users', ['data' => $data, 'userinfo' => $this->userinfo()]);
        } else if ($page == 'user') {
            $detail = User::where(['user_id' => $id, 'user_type' => 2])->first();
            $data = ['page' => 'User', 'detail' => $detail, 'type' => 'form', 'action' => 'Edit', 'id' => $id];
            return view('page.admin.users', ['data' => $data, 'userinfo' => $this->userinfo()]);
        } else if ($page == 'teacher') {
            $detail = User::where(['user_id' => $id, 'user_type' => 3])->first();
            $data = ['page' => 'Teacher', 'detail' => $detail, 'type' => 'form', 'action' => 'Edit', 'id' => $id];
            return view('page.admin.users', ['data' => $data, 'userinfo' => $this->userinfo()]);
        }

    }

    public function action($page, Request $request)
    {

        if ($request->post()) {

            $path_folder = 'upload/profile';

            if (isset($request->img)) {

                if(isset($request->img_hidden)){
                    if(file_exists('upload/profile/' . $request->img_hidden)){
                        unlink('upload/profile/' . $request->img_hidden);
                    }
                }
                $file_upload = ['filename' => $_FILES['img']['name'], 'tmp_name' => $_FILES['img']['tmp_name'], 'folder' => $path_folder, 'width' => 0, 'height' => 0];
                $img = $this->Upload_File($file_upload);

            } else {

                $img = $request->img_hidden;

            }

            if ($request->type_action == 'Create') {

                $this->validate(request(), [
                    'img' => 'mimes:jpeg,jpg,png|max:2048',
                    'first_name' => 'required|string|max:255',
                    'last_name' => 'required|string|max:255',
                    'password' => 'required|string|min:8',
                    'email' => 'required|string|email|max:255',
                    'phone' => 'required',
                    'id_card' => 'digits:13|numeric',
                ]);

                $token = md5($this->TokenPassword());

                $result = new User;
                $result->first_name = $request->first_name;
                $result->last_name = $request->last_name;
                $result->email = $request->email;
                $result->password = md5($request->password) . $token;
                $result->sex = $request->sex;
                $result->birthday = $request->birthday;
                $result->address = $request->address;
                $result->phone_number = $request->phone;
                $result->id_card = $request->id_card;
                $result->occupation = $request->occupation;
                $result->company = $request->company;
                $result->image = $img;
                $result->user_status = $request->status;
                $result->user_type = $request->type;
                $result->created_at = now();
                $result->updated_at = now();
                $result->save();

                $alert_success = 'add_success';
                $alert_not_success = 'add_not_success';

            } else if ($request->type_action == 'Edit') {

                $this->validate(request(), [
                    'img' => 'mimes:jpeg,jpg,png|max:2048',
                    'first_name' => 'required|string|max:255',
                    'last_name' => 'required|string|max:255',
                    'email' => 'required|string|email|max:255',
                    'phone' => 'required',
                    'id_card' => 'digits:13|numeric',
                ]);

                $data = [
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'email' => $request->email,
                    'sex' => $request->sex,
                    'birthday' => $request->birthday,
                    'address' => $request->address,
                    'phone_number' => $request->phone,
                    'id_card' => $request->id_card,
                    'occupation' => $request->occupation,
                    'company' => $request->company,
                    'image' => $img,
                    'user_status' => $request->status,
                    'user_type' => $request->type,
                    'updated_at' => now(),
                ];
                $result = User::where('user_id', $request->id)->update($data);
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

        $result = User::where('user_id', $id)->delete();

        if (isset($result)) {
            return back()->with('success', trans('other.delete_success'));
        } else {
            return back()->with('error', trans('other.delete_not_success'));
        }

    }

}
