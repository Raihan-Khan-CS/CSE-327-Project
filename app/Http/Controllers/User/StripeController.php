<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Mail\OrderMail;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class StripeController extends Controller
{
    //Stripe Store
    public function paymentStore(Request $request){

        if(Session::has('coupon')){
            $total_amount = Session::get('coupon')['total_amount'];
        }else {
            $total_amount = round(Cart::subtotal());
        }

        \Stripe\Stripe::setApiKey('sk_test_51I7dqILVjUl3jfbmGhFyPRnTQPBUWgfVyH2ilZdyekTFr6FmvLogrzvQmgiCBENwt8xoKIWSTnspzV1okEwF3ztv00YBa5rFia');
        $token = $_POST['stripeToken'];
        $charge = \Stripe\Charge::create([
        'amount' => $total_amount*100,
        'currency' => 'BDT',
        'description' => 'Payment From OSUD LAGBE',
        'source' => $token,
        'metadata' => ['order_id' => uniqid()],
        ]);
            $order_id = Order:: insertGetId([
                    'user_id' => Auth::id(),
                    'division_id' =>$request->division_id,
                    'district_id' =>$request->district_id,
                    'state_id' =>$request->state_id,
                    'name' =>$request->name,
                    'email' =>$request->email,
                    'phone' =>$request->phone,
                    'post_code' =>$request->post_code,
                    'notes' =>$request->notes,
                    'payment_type' =>'Stripe',
                    'payment_method' =>$charge->payment_method,
                    'transaction_id' =>$charge->balance_transaction,
                    'currency' =>$charge->currency,
                    'amount' =>$total_amount,
                    'order_number' =>$charge->metadata->order_id,
                    'invoice_no' =>'MR'.mt_rand(10000000,99999999),
                    'order_date' =>Carbon::now()->format('d F Y'),
                    'order_month' =>Carbon::now()->format('F'),
                    'order_year' =>Carbon::now()->format('Y'),
                    'status' =>'Pending',
                    'created_at'=> Carbon::now(),
            ]);
                /// Start Send Email
                $invoice = Order::findOrFail($order_id);

                $data =[
                    'invoice_no'=> $invoice->invoice_no,
                    'amount'=> $total_amount,
                    'name'=> $invoice->name,
                ];

                Mail::to($request->email)->send(new OrderMail($data));

                 /// End Send Email

            $carts = Cart::content();
            foreach ($carts as $cart) {
                OrderItem::insert([
                    'order_id'=>$order_id,
                    'product_id'=>$cart->id,
                    'color'=>$cart->options->color_en,
                    'size'=>$cart->options->size_en,
                    'qty'=>$cart->qty,
                    'price'=>$cart->price,
                    'created_at'=> Carbon::now(),
                ]);
            }

            // Product Stock Decrement
            foreach($carts as $pro){
                Product::where('id',$pro->id)->decrement('product_qty',$pro->qty);
            }
            if (Session::has('coupon')) {
                Session::forget('coupon');
            }
            Cart::destroy();
            $notification=array(
                'message'=>'Your Order Place Success',
                'alert-type'=>'success'
            );
            return Redirect()->route('home')->with($notification);
        }
    }




