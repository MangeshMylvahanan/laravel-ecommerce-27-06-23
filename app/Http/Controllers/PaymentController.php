<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Payment;
use App\Models\Product;
use App\Models\Temporary;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Razorpay\Api\Api;

class PaymentController extends Controller
{
    public function store(Request $request)
    {
        $cart = Cart::all();
        $userId = Session::get('user')['id'];
        $products = DB::table('carts')
            ->join('products', 'carts.product_id', '=', 'products.id')
            ->where('carts.user_id', $userId)
            ->select('products.*', 'carts.id as cart_id')
            ->get();
        $orderPrefix = 'ORD';
        $timestamp = now()->format('YmdHis');
        $uniqueId = uniqid();

        $orderId = $orderPrefix . $timestamp . $uniqueId;

        // echo("haiiii". $products);
        foreach ($products as $items) {
            $payment = new Payment();
            $payment->user_id = $request->input('userId');
            $payment->payment_id = $orderId;
            $payment->name = $request->input('name');
            $payment->address = $request->input('address');
            $payment->phone = $request->input('phone');
            $payment->productname = $items->product_name;
            $payment->amount = $items->product_discountprice;
            $payment->save();
        }
        // $amount = $request->input('totalAmount');
        return view('Home.index',['orderId'=>$orderId]);
    }
    public function RazorPayStore(Request $request)
    {
        $input = $request->all();

        $api = new Api("rzp_test_zRyA7WHAPmrtQg", "x5lOO9VdfdOhdcWo1FfR8Xd1");

        $payment = $api->payment->fetch($input['razorpay_payment_id']);
        $userId = Session::get('user')['id'];

        if (count($input)  && !empty($input['razorpay_payment_id'])) {
            try {
                $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount' => $payment['amount']));
            } catch (Exception $e) {
                return  $e->getMessage();
                Session::put('error', $e->getMessage());
                Temporary::where('user_id', $userId)->delete();
                return redirect()->back();
            }
        }

        Session::put('success', 'Payment successful');
        $paymentid = $request->input('orderid');
        $payment = Payment::where('payment_id',$paymentid)->get();
        foreach($payment as $item)
        {
            $item->update(['payment_status' => true]);
        }
        Cart::where('user_id',$userId)->delete();
        return redirect('/invoice');
    }
    public function Invoice()
    {
        return view('Home.invoice');
    }
}
