<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\productitem;
use App\basket;
use App\orderlist;
use App\ordertransaction;
use Facade\Ignition\QueryRecorder\Query;
use Illuminate\Support\Facades\Auth;

class MakeOrderController extends Controller
{
    public function edit($order_id){
        $orderl = orderlist::find($order_id);
        $ordertran = $orderl->view_transaction;
        for($num = 0; $num < count($ordertran); $num++){ //ตักสต๊อก
            $productid[$num] = $ordertran[$num]->product_id;
            $productquantity[$num] = $ordertran[$num]->quantity;
            $productdata = productitem::find($productid[$num]);
            $test = $productdata->itemquantity - $productquantity[$num];
            $productdata->itemquantity = $test;
            $productdata->save();
        }
        orderlist::find($order_id)->update(['orderstatus'=> 365]); // orderstatus => 365 สถานะยืนยันจากแอดมินแล้ว
        return redirect()->action('OrderController@index')->with('success', 'ทำการบันทึกข้อมูลเสร็จสิ้น');
    }

    public function store(Request $request){
        if($request->addressinorder==null){
            return redirect()->back()->with('success', 'กรุณาตรวจสอบความถูกต้อง');
        }
        $count = count($request->basketidvalue);
        $basket_id =$request->basketidvalue[0];
        $user_id = Auth::id();
        orderlist::create([
            'user_id'=>$user_id,
            'orderstatus'=>522,  // orderstatus => 522 สถานะ:รอการชำระเงิน
            'message_byCustomer'=>'ด่วนที่สุด',
            'sendtoaddress'=>$request->addressinorder,
            'basket_id'=>$basket_id,
        ]);
        for($i=0; $i<$count; $i++){
            $basket_data = basket::find($request->basketidvalue[$i]);
            $saveprice = $basket_data->user_productitem;
            $saveprice1 = $saveprice[0]->price;
            $order_data = orderlist::where('basket_id', $basket_id)->get();
            $product_id = $basket_data->product_id;
            $number = $basket_data->number;
            foreach ($order_data as $order_data){
            }
            ordertransaction::create([
                'order_id'=> $order_data->id,
                'product_id'=> $product_id,
                'quantity'=> $number,
                'price'=> $saveprice1,
            ]);

        basket::find($request->basketidvalue[$i])->delete();
        }

        return redirect()->route('profile.index')->with('success', 'กรุณาชำระเงิน');;
    }

    public function updatebycustomer($id) //ยืนยันการรับสินค้าจากลูกค้า
    {
        orderlist::find($id)->update(['orderstatus'=> 8829]);
        return redirect()->route('profile.index')->with('success', 'ยืนยันการรับสินค้าแล้ว');;
    }
}
