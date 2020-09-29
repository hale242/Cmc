<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use App\Orders;
use App\OrderDetail;
use App\User;

class OrdersController extends Controller
{

    public function __construct()
    {
        $this->middleware('session_login_admin');
    }

    public function page($page)
    {
        $start_date = '';
        $end_date = '';
        $status = '';
        $search = '';
        $conn = '';

        $detail = Orders::join('user', 'user.user_id', '=', 'orders.user_id')->orderby('orders.order_id', 'desc')->paginate(25);

        $total_price_order = [];

        if (count($detail) > 0) {
            foreach ($detail as $value) {
                $result = OrderDetail::select('order_detail.order_id', 'course.course_price')
                    ->join('course', 'course.course_id', '=', 'order_detail.course_id')
                    ->where('order_detail.order_id', $value->order_id)
                    ->orderby('order_detail.order_detail_id', 'asc')->get();
                $total_price_order[] = $result;
            }
        }

        $session_search = array(
            'date_start' => $start_date,
            'date_end' => $end_date,
            'status' => $status,
            'txt_search' => $search
        );

        $teacher = User::where('user_type', 3)->get();

        $data = ['page' => 'Main', 'detail' => $detail, 'total_price_order' => $total_price_order, 'teacher' => $teacher, 'type' => 'view','session_search'=>$session_search];
        return view('page.admin.orders', ['data' => $data, 'userinfo' => $this->userinfo()]);
    }


    public function search($page, Request $request)
    {

        // dd($request);

        $start_date = '';
        $end_date = '';
        $status = '';
        $search = '';
        $conn = '';

        $query = Orders::query();

        if ($request->date_start != null && $request->date_end != null) {
            $date_start = date("Y-m-d", strtotime($request->date_start));
            $date_end = date("Y-m-d", strtotime($request->date_end));
            $detail = $query->where(DB::raw("(DATE_FORMAT(orders.created_at,'%Y-%m-%d'))"), ">=", $date_start);
            $detail = $query->where(DB::raw("(DATE_FORMAT(orders.created_at,'%Y-%m-%d'))"), "<=", $date_end);
            $start_date = $request->date_start;
            $end_date = $request->date_end;
        }elseif($request->date_start != null && $request->date_end == null){
            $date_start = date("Y-m-d", strtotime($request->date_start));
            $detail = $query->where(DB::raw("(DATE_FORMAT(orders.created_at,'%Y-%m-%d'))"), "=", $date_start);
            $start_date = $request->date_start;
        }elseif($request->date_start == null && $request->date_end != null){
            $date_end = date("Y-m-d", strtotime($request->date_end));
            $detail = $query->where(DB::raw("(DATE_FORMAT(orders.created_at,'%Y-%m-%d'))"), "=", $date_end);
            $end_date = $request->date_end;
        }

        if ($request->status != null) {
            $detail = $query->where('orders.order_status', $request->status);
            $status = $request->status;
        }

        if ($request->txt_search != null) {
            $detail = $query->where('orders.order_number', 'like', '%' . $request->txt_search . '%');
            $search = $request->txt_search;
        }

        $session_search = array(
            'date_start' => $start_date,
            'date_end' => $end_date,
            'status' => $status,
            'txt_search' => $search
        );

        $detail = $query->join('user', 'user.user_id', '=', 'orders.user_id')->orderby('orders.order_id', 'desc')->paginate(10);

        $teacher = User::where('user_type', 3)->get();

        $data = ['page' => 'Main', 'detail' => $detail, 'teacher' => $teacher, 'type' => 'view', 'session_search'=>$session_search];

        return view('page.admin.orders', ['data' => $data, 'userinfo' => $this->userinfo()]);


    }


    public function view_data($id)
    {

        $detail['order'] = Orders::join('user', 'user.user_id', '=', 'orders.user_id')
            ->where('orders.order_id', $id)
            ->first();

        $detail['order_detail'] = OrderDetail::select('order_detail.order_id', 'order_detail.course_name', 'course.course_short_description', 'order_detail.course_price', 'order_detail.qty')
            ->join('course', 'course.course_id', '=', 'order_detail.course_id')
            ->where('order_detail.order_id', $id)
            ->orderby('order_detail.order_detail_id', 'asc')
            ->get();

        $data = ['page' => 'Orders', 'type' => 'show', 'detail' => $detail, 'id' => $id];

        return view('page.admin.orders', ['data' => $data, 'userinfo' => $this->userinfo()]);
    }


    public function action($page, Request $request)
    {

        if ($request->post()) {

            if ($page == 'Status') {

                $data = [
                    'order_status' => $request->status,
                    'order_note' => $request->ordernote,
                    'updated_at' => now(),
                ];
                $result = Orders::where('order_id', $request->id)->update($data);
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


    public function delete($id)
    {

        $result = Orders::where('order_id', $id)->delete();
        $result2 = OrderDetail::where('order_id', $id)->delete();

        if (isset($result)) {
            return back()->with('success', trans('other.delete_success'));
        } else {
            return back()->with('error', trans('other.delete_not_success'));
        }
    }




}
