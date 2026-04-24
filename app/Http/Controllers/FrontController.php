<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Payment;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class FrontController extends Controller
{
    public function shop()
    {
        //$items = Item::all();
        //$items = Item::orderBy('id','DESC')->get();
        $items = Item::orderBy('id','DESC')->paginate(12);
        //var_dump($items);
        return view('front.shops',compact('items'));
    }

    public function shopItem($id)
    {
        //echo ($id);
        $item = Item::find($id);
        //var_dump($item);
        return view('front.shop-item',compact('item'));
    }

    public function carts(){
        $payments = Payment::all();
        return view('front.carts',compact('payments'));
    }

    public function orderNow(Request $request){
        //echo "$request->data";
        //dd($request); ပါလာပီဆို dataထည့် orderItems ka string မို့ array change

        $dataArray = json_decode($request->orderItems);
        //var_dump($dataArray);
        //insert order table

        $voucher_no = time();
        //echo ($voucher_no);

        $file_name = time().'.'.$request->payment_slip->extension();  //234442222.jpg
        $upload = $request->payment_slip->move(public_path('/images/payment_slips/'),$file_name);

        foreach($dataArray as $data){
            $order = new Order();

            $order->voucher_no = $voucher_no;
            $order->total = $data->qty * ($data->price - ($data->price * ($data->discount/100)));
            $order->qty = $data->qty;
            $order->payment_slip =  '/images/payment_slips/'.$file_name;
            $order->status = 'Pending';
            $order->notes = $request->note;
            $order->item_id = $data->id;
            $order->payment_id =$request->payment_method;
            $order->user_id = Auth::id();
            $order->save();

        }

        return 'Your Order Successful';

    }
}
