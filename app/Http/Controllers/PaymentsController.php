<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use Razorpay\Api\Api;
use Illuminate\Support\Facades\Session;

class PaymentsController extends Controller
{

    public function index(){
        return view("index");
    }

    public function payment(Request $request){
        $name= $request->name;
        $amount= $request->amount;

        $api = new Api("rzp_test_Y3BabS2kuePGlC", "YYX7Ej8EkGyutrrOCaWtrETV");
        $order = $api->order->create([
            'receipt' => '123',
            'amount' => $amount*100, // amount in the smallest currency unit
            'currency' => 'INR',
        ]);
        $orderId= $order->id;

        $user_pay=new Payment();
        $user_pay->name=$name;
        $user_pay->amount=$amount;
        $user_pay->payment_id=$orderId;
        $user_pay->save();

        Session::put('orderId',$orderId);
        Session::put('amount', $amount);

        return redirect('/');
    }

    public function pay(Request $request){
        $data= $request->all();
        $user=Payment::where('payment_id',$data['razorpay_order_id'])->first();
        $user->payment_status=true;
        $user->razorpay_payment_id=$data['razorpay_payment_id'];
        $user->save();

        return redirect()->route('success');
    }

    public function success(Request $request){
        return view('success');
    }



}
