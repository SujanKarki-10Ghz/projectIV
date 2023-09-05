<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Order;
use App\Models\Orderitem;
use App\Models\Products;
use App\User;
use http\Env\Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class CheckoutController extends Controller
{
    public function index()
    {
        $cookie_data = (Cookie::get('shopping_cart'));
        $cart_data = json_decode($cookie_data, true);
        return view ('frontend.checkout.index')
            ->with('cart_data',$cart_data)
            ;
    }
    public function storeorder(Request $request)
    {
        if(isset($_POST['place_order_btn']))
        {
            //User Data Update
            $user_id=Auth::id();
            $user = User::find($user_id);
            $user->name =$request->input('first_name');
            $user->lname =$request->input('last_name');

            $user->phone =$request->input('phone');
            $user->alternate_phone =$request->input('alternate_phone');

            $user->address1=$request->input('address1');
            $user->address2=$request->input('address2');

            $user->city = $request->input('city');
            $user->state = $request->input('state');
            $user->pincode =$request->input('pincode');
            $user->save();
            //Placing Order
            /*
             Payment Status  =
            0 (pending)
            1 (cash accepted)
            2(Cancelled)
            3(Continue for online)
             */
            $trackno =rand(1111,9999);
            $order = new Order;
            $order->user_id = $user_id;
            $order->tracking_no = 'HamroStore'.$trackno;
            //$order->tracking_msg= " ";
            $order->payment_mode="Cash on Delivery";
            $order->payment_status="0";
            $order->order_status="0";
            $order->notify = "0";
            $order->save();

            $last_order_id = $order->id;

            //Ordered /Cart Items
            $cookie_data =(Cookie::get('shopping_cart'));
            $cart_data = json_decode($cookie_data, true);
            $items_in_cart =$cart_data;

            foreach ($items_in_cart as $itemdata)
             {
                 $products = Products::find($itemdata['item_id']);
                 $pric_value=$products->offered_price;
                 $tax_amt=$products->tax_amt;
                    Orderitem::create(
                [
                    'order_id'=>$last_order_id,
                    'product_id'=>$itemdata['item_id'],
                    'price'=>$pric_value,
                    'tax_amt'=>$tax_amt,
                    'quantity'=>$itemdata['item_quantity'],

                 ]);
             }
            Cookie::queue(Cookie::forget('shopping_cart'));
            return redirect('/thank-you')->with('status','Order has been placed Successfully');
        }
    }
    public function checkamount(Request $request)
    {
        if(Cookie::get('shopping_cart'))
        {
            $cookie_data =(Cookie::get('shopping_cart'));
            $cart_data =json_decode($cookie_data, true);
            $items_in_cart =$cart_data;
            $total="0";
            foreach ($items_in_cart as $itemdata)
            {
                $products = Products::find($itemdata['item_id']);
                $pric_value=$products->offered_price;
                $total =$total+($itemdata["item_quantity"]* $pric_value);
            }
            return response()->json(
                [
                    'first_name'=> $request->first_name,
                    'last_name'=> $request->last_name,
                    'phone'=>$request->phone,
                    'alternate_phone'=>$request->alternate_phone,
                    'address1'=>$request->address1,
                    'address2'=>$request->address2,
                    'city'=>$request->city,
                    'state'=>$request->state,
                    'pincode'=>$request->pincode,
                    'email'=>Auth::user()->email,
                    'total_price'=>$total,
                ]);
        }
        else
        {
         return response()->json([
             'status_code'=>'no_data_in_cart',
             'status'=>'Your cart is empty',
         ]);
        }

    }
}
