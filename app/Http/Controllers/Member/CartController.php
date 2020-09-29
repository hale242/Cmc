<?php

namespace App\Http\Controllers\Member;

use App\Course;
use App\Http\Controllers\Controller;
use App\OrderDetail;
use App\Orders;
use App\PrePostTest;
use App\PrePostTestSave;
use App\SendMail;
use App\User;
use Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{

    public function __construct()
    {
        $this->middleware('session_login_user');
    }

    public function index()
    {

        $this->middleware('session_login_user');

        //seo
        $seo = $this->Seo(
            asset('upload/admin/logo_web/images/' . $this->LogoWeb()),
            'Cart',
            'Cart',
            'Cart',
            'Cart',
            url('cart')
        );

        $data = array('seo' => $seo);

        return view('page.member.cart', ['data' => $data]);
    }

    public function addtocart(Request $request, $id)
    {
        $course = Course::find($id);
        $cardall = Cart::getContent();

        $data = [
            'id' => $course->course_id,
            'name' => $course->course_name,
            'quantity' => 1,
            'price' => $course->course_price,
        ];

        foreach ($cardall as $value) {
            if ($value['id'] == $course->course_id) {
                return back()->with('warning', 'This course is already in your cart!');
            }
        }

        $addcart = Cart::add($data);

        if ($addcart) {
            return back()->with('success', 'Course added to cart successfully.');
        } else {
            return back()->with('error', 'Course added to cart no successfully!');
        }
    }

    public function updatecart(Request $request)
    {

        foreach (Cart::getContent() as $key => $value) {

            $data = ['quantity' => array(
                'relative' => false,
                'value' => $request->qty[$key],
            )];

            Cart::update($value->id, $data);
        }

        return back()->with('success', 'Update cart successfully.');
    }

    public function removecart($id)
    {
        Cart::remove($id);

        if (Cart::isEmpty()) {
            return redirect('cart');
        }
        return redirect()->back()->with('success', 'Course removed from cart successfully.');
    }

    public function clearcart()
    {
        Cart::clear();

        return redirect('cart');
    }

    public function checkout()
    {

        $detail = User::find(session('session_id'));

        //seo
        $seo = $this->Seo(
            asset('upload/admin/logo_web/images/' . $this->LogoWeb()),
            'Checkout',
            'Checkout',
            'Checkout',
            'Checkout',
            url('checkout')
        );

        $data = array('detail' => $detail, 'seo' => $seo);

        return view('page.member.checkout', ['data' => $data]);
    }


    public function transfer_payment(Request $request)
    {

            if ($request->ajax()) {

                $path_folder = 'upload/payment';

                if($request->slip_file!='' && $_FILES['slip_file']['name']!=''){

                    $file_type = strrchr($_FILES['slip_file']['name'], ".");

                    if ($file_type != '.jpg' and $file_type != '.jpeg' and $file_type != '.png' and $file_type != '.PNG' and $file_type != '.JPG'  and $file_type != '.JPEG') {
                        $result = ['result' => false, 'message' => 'Please upload files type only jpg,jpeg,png!'];
                        return response()->json($result);
                        exit;
                    }

                    if ($_FILES['slip_file']['size'] > 1048576) {
                        $result = ['result' => false, 'message' => 'Please upload files only size 1 mb!'];
                        return response()->json($result);
                        exit;
                    }

                    if ($request->slip_file == null) {
                        $slip_file = null;
                    } else {
                        $file_upload = ['filename' => $_FILES['slip_file']['name'], 'tmp_name' => $_FILES['slip_file']['tmp_name'], 'folder' => $path_folder, 'width' => 0, 'height' => 0];
                        $slip_file = $this->Upload_File($file_upload);
                    }

                    $order_status = 2;
                    $payment_type = 2;

                }else{

                    $slip_file = "-";
                    $order_status = 3;
                    $payment_type = 3;

                }

                $qty = 0;
                $total = 0;
                foreach(json_decode($request->cart_data) as $item){
                    $qty += $item->quantity;
                    $total += $item->price;
                }

                $order_number = date('dmYHis'); //create order

                $result = new Orders;
                $result->order_number = $order_number;
                $result->order_qty = $qty;
                $result->order_total = $total;
                $result->user_id = $request->user_id;
                $result->order_date = now();
                $result->order_status = $order_status;
                $result->order_payment_type = $payment_type;
                $result->order_payment_date = $request->payment_date;
                $result->order_payment_time = $request->payment_time;
                $result->order_bank_transfer = $request->bank_transfer;
                $result->order_slip_file = $slip_file;
                $result->created_at = now();
                $result->updated_at = now();
                $result->save();

                if ($result) {

                    foreach (json_decode($request->cart_data) as $value) {

                        $result = new OrderDetail;
                        $result->order_id = Orders::max('order_id');
                        $result->course_id = $value->id;
                        $result->course_name = $value->name;
                        $result->course_price = $value->price;
                        $result->qty = $value->quantity;
                        $result->created_at = now();
                        $result->updated_at = now();
                        $result->save();

                        $prestest_posttest = PrePostTest::select('test_id')->where('course_id', $value->id)->first();

                        if ($prestest_posttest != null) {
                            $test_id = $prestest_posttest->test_id;
                        } else {
                            $test_id = null;
                        }

                        $result = new PrePostTestSave;
                        $result->test_id = $test_id;
                        $result->user_id = $request->user_id;
                        $result->course_id = $value->id;
                        $result->created_at = now();
                        $result->updated_at = now();
                        $result->save();

                        $datalist[] = array(
                            'id'        => $value->id,
                            'name'      => $value->name,
                            'quantity'  => $value->quantity,
                            'price'     => $value->price
                        );

                    }

                    if ($result) {

                        $result = ['result' => true, 'message' => 'Transfer payment success'];
                        $this->send_mail($datalist);

                    } else {

                        $result = ['result' => false, 'message' => 'Transfer payment no success!'];
                        $this->send_mail($datalist);

                    }
                } else {

                    $result = ['result' => false, 'message' => 'Checkout error!'];
                }

                return response()->json($result);
                exit;

            } else {

                $result = ['result' => false, 'message' => 'Access denied save data!'];

                return response()->json($result);
                exit;
            }
        // }

    }

    public function credit_card(Request $request)
    {

        if ($request->ajax()) {

            $order_number = date('dmYHis'); //create order

            if ($request->slip_file == null) {
                $slip_file = null;
            } else {
                $file_upload = ['filename' => $_FILES['slip_file']['name'], 'tmp_name' => $_FILES['slip_file']['tmp_name'], 'folder' => 'upload/member/payment/images', 'width' => 0, 'height' => 0];
                $slip_file = $this->Upload_File($file_upload);
            }

            $result = new Orders;
            $result->order_number = $order_number;
            $result->user_id = session('session_id');
            $result->order_date = now();
            $result->order_payment_type = $request->payment_type;
            $result->order_payment_date = $request->payment_date;
            $result->order_slip_file = $slip_file;
            $result->created_at = now();
            $result->updated_at = now();
            $result->save();

            if ($result) {

                foreach (Cart::getContent() as $value) {

                    $result = new OrderDetail;
                    $result->order_id = Orders::max('order_id');
                    $result->course_id = $value->id;
                    $result->qty = $value->quantity;
                    $result->created_at = now();
                    $result->updated_at = now();
                    $result->save();
                }

                if ($result) {

                    Cart::clear();

                    $result = ['result' => true, 'message' => 'Transfer payment success'];
                } else {

                    $result = ['result' => false, 'message' => 'Transfer payment no success!'];
                }
            } else {

                $result = ['result' => false, 'message' => 'Checkout error!'];
            }

            return response()->json($result);
            exit;

        } else {

            $result = ['result' => false, 'message' => 'Access denied save data!'];

            return response()->json($result);
            exit;
        }
    }

    public function send_mail($param)
    {

        $order = DB::table('email_template')->where('type', 0)->first();

        $data = array(
            'email_from' => $this->SettingWeb()->email_web,
            'subject' => $order->subject,
            'page' => 'page.member.mail.order',
            'content' => $order,
            'input' => $param,
            'email' => session('session_username')
        );

        // Mail::to($this->SettingWeb()->email_web)->send(new SendMail($data));

        if($order->send_to_admin==1){
            Mail::to($this->SettingWeb()->email_web)->send(new SendMail($data));
            // Mail::to(session('session_username'))->send(new SendMail($data));
        }
        // if($order->send_to_teacher==1){
        //     Mail::to(session('session_username'))->send(new SendMail($data));
        // }
        if($order->send_to_user==1){
            Mail::to(session('session_username'))->send(new SendMail($data));
        }


        if (Mail::failures()) {
            return back()->with('error', 'ไม่สามารถส่งข้อมูลการติดต่อได้!');
        } else {
            return back()->with('success', 'ส่งข้อมูลการติดต่อเรียบร้อย!');
        }
    }


    /* ======= GBPAY ======== */
    public function payment_by_gateway(Request $request){

        $qty = 0;
        $total = 0;
        foreach(json_decode($request->cart_data) as $item){
            $qty += $item->quantity;
            $total += $item->price;
        }

        $order_number = date('dmYHis'); //create order

        $result = new Orders;
        $result->order_number = $order_number;
        $result->order_qty = $qty;
        $result->order_total = $total;
        $result->user_id = $request->user_id;
        $result->order_date = now();
        $result->order_status = 2;
        $result->order_payment_type = 1;
        $result->created_at = now();
        $result->updated_at = now();
        $result->save();

        if ($result) {

            foreach (json_decode($request->cart_data) as $value) {

                $result = new OrderDetail;
                $result->order_id = Orders::max('order_id');
                $result->course_id = $value->id;
                $result->course_name = $value->name;
                $result->course_price = $value->price;
                $result->qty = $value->quantity;
                $result->created_at = now();
                $result->updated_at = now();
                $result->save();

                $prestest_posttest = PrePostTest::select('test_id')->where('course_id', $value->id)->first();

                if ($prestest_posttest != null) {
                    $test_id = $prestest_posttest->test_id;
                } else {
                    $test_id = null;
                }

                $result = new PrePostTestSave;
                $result->test_id = $test_id;
                $result->user_id = $request->user_id;
                $result->course_id = $value->id;
                $result->created_at = now();
                $result->updated_at = now();
                $result->save();

                $datalist[] = array(
                    'id'        => $value->id,
                    'name'      => $value->name,
                    'quantity'  => $value->quantity,
                    'price'     => $value->price
                );

            }

            // When Add Order To Backend
            if ($result) {

                //seo
                $seo = $this->Seo(asset('upload/admin/logo_web/images/' . $this->LogoWeb()),'','','','',url('cart'));

                $data = array(
                    'seo' => $seo,
                    'order_number' => $order_number,
                    'amount' => $request->order_price,
                    'order_price' => $request->amount,
                    'paypublic_k' => '1sHhkixXYKnhn9jJBGHiVDMW7QuC0O8t'
                );

                // Credit Card GBPAY
                if($request->payment_type == "creditgbpay"){

                    return view('page.member.tranfer_payment', ['data' => $data]);

                // QR Code GBPAY
                }else if($request->payment_type == "qrgbpay"){

                    $paytoken = 'AYZ8ndjb9rq9kd2jvYpepLLzXOsW05EVXxKNPCDr29vszP4fGIcAwSIs2TEZCCIvyIWgrbeDDyqPk2dBHV2RV3vR4WYAK6mrSIwU9w3Qp97ycCeXldaB64rQxTzPakodYUfmhNmMmyQHpWYYJ6SP86U+Wm7H+bqIXjCM5ySsCwJl4vWx';

                    $orders = Orders::where('order_number',$order_number)->get();
                    $ordersdetail = OrderDetail::where('order_id',$orders[0]->order_id)->get();
                    $users = User::where('user_id',$orders[0]->user_id)->get();

                    foreach($ordersdetail as $key=>$orderitems){
                        $buyitemstext[] = $orderitems['course_name'];
                    }
                    $textBuyItems = implode(', ',$buyitemstext);

                    $params = array();
                    $params['amount'] = $orders[0]->order_total;
                    $params['referenceNo'] = $orders[0]->order_number;
                    $params['detail'] = "Course name : ".$textBuyItems;
                    $params['customerName'] = $users[0]->first_name." ".$users[0]->last_name;
                    $params['customerEmail'] = $users[0]->email;
                    $params['merchantDefined1'] = "EZLEARN";
                    $params['merchantDefined2'] = "customerMobileNo. ".$users[0]->phone_number;
                    $params['token'] = $paytoken;
                    $params['payType'] = "F";

                    // $params['responseUrl'] = "https://ezlearn.cmcbiotech.co.th//checkout/gbpayclientresult";
                    // $params['backgroundUrl'] = "https://ezlearn.cmcbiotech.co.th/checkout/gbpaybackproresult_qrcode";

                    $params['responseUrl'] = url("/checkout/gbpayclientresult");
                    $params['backgroundUrl'] = url("/checkout/gbpaybackproresult_qrcode");

                    $curl = curl_init();
                    curl_setopt_array($curl, array(
                        CURLOPT_URL => 'https://api.gbprimepay.com/gbp/gateway/qrcode/text',
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_ENCODING => '',
                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                        CURLOPT_CUSTOMREQUEST => 'POST',
                        CURLOPT_POSTFIELDS => $params,
                        CURLOPT_HTTPHEADER => [
                        'Cache-Control: no-cache',
                        ]
                    ));
                    $response = curl_exec($curl);
                    $info = curl_getinfo($curl);
                    $err = curl_error($curl);
                    curl_close($curl);
                    $req = array();
                    $req = json_decode($response,true);
                    $req['paramssend'] = $params;
                    // $base->set('req',$req);
                    // return response()->json($result);

                    return view('page.member.tranfer_qr_payment', ['data' => $data, 'req' => $req]);

                }

                // $result = ['result' => true, 'message' => 'Transfer payment success'];
                // $this->send_mail($datalist);

            } else {

                $result = ['result' => false, 'message' => 'Transfer payment not success!'];
                // $this->send_mail($datalist);

            }
        } else {

            $result = ['result' => false, 'message' => 'Checkout error!'];
        }

    }

    public function payment_by_gateway_again(Request $request){

        //seo
        $seo = $this->Seo(asset('upload/admin/logo_web/images/' . $this->LogoWeb()),'','','','',url('cart'));

        $data = array(
            'seo' => $seo,
            'order_number' => $request->order_number,
            'amount' => $request->order_price,
            'order_price' => $request->amount,
            'paypublic_k' => '1sHhkixXYKnhn9jJBGHiVDMW7QuC0O8t'
        );

        return view('page.member.tranfer_payment', ['data' => $data]);
    }

    // GB Pay Credit Card
    public function paynowcredit_gbpay(Request $request){

        // return $request->referenceNo;

        $referenceNo = $request->referenceNo;
        $gbToken = $request->gbToken;
        $gbRememberCard = $request->gbRememberCard;


        $orders = Orders::where('order_number',$referenceNo)->get();
        $ordersdetail = OrderDetail::where('order_id',$orders[0]->order_id)->get();
        $users = User::where('user_id',$orders[0]->user_id)->get();

        foreach($ordersdetail as $key=>$orderitems){
            $buyitemstext[] = $orderitems['course_name'];
        }
        $detail = implode(', ',$buyitemstext);


        $Oinfo = Orders::where('order_number',$referenceNo)->first();
        $minfo = User::where('user_id',$Oinfo->user_id)->first();
        $order_price = $Oinfo->order_total;
        $amount = (double)$order_price;
        $customerName = $minfo->first_name." ".$minfo->last_name;
        $customerMobile = $minfo->phone_number;
        $customerEmail = $minfo->email;


        if(!empty($gbToken) && !empty($referenceNo)){

            $publicKey = '1sHhkixXYKnhn9jJBGHiVDMW7QuC0O8t';
            $secretKey = 'RFsjH0Oj0rGdVPYhicZ3NA8LkpGLeJ61';

            $BasicAuth = base64_encode($publicKey.":");
            $BasicAuthPrivate = base64_encode($secretKey.":");
            // GF::print_r($gateway);
            // die;
            $params = array();
            $params['amount'] = (double)$amount;
            $params['referenceNo'] = $referenceNo;
            $params['detail'] = $detail;
            $params['customerName'] = $customerName;
            $params['customerEmail'] = $customerEmail;
            $params['merchantDefined1'] = "CusMobile".$customerMobile;
            $params['card']['token'] = $gbToken;
            $params['otp'] = "Y";
            $params['responseUrl'] = url("/checkout/gbpayclientresult");
            $params['backgroundUrl'] = url("/checkout/gbpaybackproresult");

            $fieldPOST = json_encode($params);
            $curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.gbprimepay.com/v1/tokens/charge',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => $fieldPOST,
            CURLOPT_HTTPHEADER => [
                'Cache-Control: no-cache',
                'Content-Type: application/json',
                'Authorization: Basic '.$BasicAuthPrivate
            ],
            ));
            $response = curl_exec($curl);
            $info = curl_getinfo($curl);
            $err = curl_error($curl);
            curl_close($curl);
            $req = array();
            $req = json_decode($response,true);
            if($req['resultCode'] == "00" && !empty($req['gbpReferenceNo'])){
                $gbpReferenceNo = $req['gbpReferenceNo'];
                $curl = curl_init();
                curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://api.gbprimepay.com/v1/tokens/3d_secured',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS =>  "publicKey=$publicKey&gbpReferenceNo=$gbpReferenceNo",
                CURLOPT_HTTPHEADER =>['Content-Type: application/x-www-form-urlencoded'],
                ));
                $response = curl_exec($curl);
                $info = curl_getinfo($curl);
                $err = curl_error($curl);
                curl_close($curl);
                print $response;
                exit();
            }else{
                echo "Sorry! Error token charge. Auto go back Home Page";
                $redirect_path = url();
                echo '<META HTTP-EQUIV="Refresh" CONTENT="5;URL='.$redirect_path.'">';
                exit();
            }

        }else{

            echo "Sorry! Error token. Auto go back Home Page";
            $redirect_path = url();
            echo '<META HTTP-EQUIV="Refresh" CONTENT="5;URL='.$redirect_path.'">';
            exit();

        }
        exit();
        //GB Call Back ClientArray ( [referenceNo] => EC-2019060023 [gbpReferenceNo] => gbp09031731980 [amount] => 250.00 [currencyCode] => [resultCode] => 55 )
    }

    public function gbpayclientresult(Request $request){

        $order_number = $request->referenceNo;
        $resultCode = $request->resultCode;
        if($resultCode == "00" && !empty($order_number)){

            DB::table('orders')
            ->where('order_number', $order_number)
            ->update(['order_status' => 1, 'order_bank_transfer' => 'Credit Card', 'order_payment_date' => date('Y-m-d'), 'order_payment_time' => date('H:i:s')]);

            $redirect_path = url("/myorder");
            echo "<script>window.location='$redirect_path'</script>";
            exit();

        }else{

            echo "Sorry! Payment process failed Code ".$resultCode." -> Auto go back Home Page in 10s.";
            $redirect_path = url();
            echo '<META HTTP-EQUIV="Refresh" CONTENT="10;URL='.$redirect_path.'">';
            exit();

        }
    }

    public function get_payment_status(Request $request){

        $order_number = $request->order_id;

        if(!empty($order_number)){
           $data = Orders::where('order_number', $order_number)->first();
        //    ->update(['order_status' => 1, 'order_bank_transfer' => 'QR Code', 'order_payment_date' => date('Y-m-d'), 'order_payment_time' => date('H:i:s')]);
           if($data->order_status==1){
               return json_encode(array("status"=>"done","order_status"=>"payment_complate"));
           }else{
               return json_encode(array("status"=>"fail","order_status"=>"not_order"));
           }

        }else{
            return json_encode(array("status"=>"fail","order_status"=>"not_order"));
        }

    }



}
