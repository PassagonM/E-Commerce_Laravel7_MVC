<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\User;
use App\Useradd;
use App\basket;
use App\orderlist;
use App\ordertransaction;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $orderlist = orderlist::all()->where('orderstatus', 423);
        return view('order.index', compact(['orderlist']));
    }

    public function show($id)
    {
        $makeorder = basket::find($id);
        return view('order.makeorder', compact(['makeorder']));
    }

    public function store(Request $request)
    {
        $request->validate([
            'basketvalue' => 'required'
        ]);
        $count = count($request->basketvalue);
        $basketid = $request->basketvalue;
        for($i=0; $i<$count; $i++){
            $testarray[$i] = basket::find($request->basketvalue[$i]);
        }
        $useraddre[0] = " ";
        $addbooleanhas = false;
        $userid = User::find(Auth::user()->id);
        if($userid->address!=0){
            $useraddre = Useradd::where('user_id', $userid->id)
            ->where('active', $userid->address)->get();
            $useraddre = $useraddre[0];
            // dd($useraddre->textaddress);
            $addbooleanhas = true;
        }
        return view('order.makeorder', compact(['testarray' , 'count' ,'basketid' ,'useraddre' ,'addbooleanhas']));
    }

    public function edit($id) //หลังจาก อัพโหลดสลิปและทำการส่งค่ามาบันทึก
    {
        $order = orderlist::find($id);
        return view('profilemenubar.uploadslip', compact(['order']));
    }

    public function update(Request $request, $id) //บันทึก สลิปหลักฐานการชำระเงิน
    {
        // dd($request->file , $id);
            $request->validate([
                'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $image = orderlist::find($id);;
            if ($request->file('file')) {
                $imagePath = $request->file('file');
                $imageName = $imagePath->getClientOriginalName();

                $path = $request->file('file')->storeAs('slipupload_images', $imageName, 'public');
            }
            $image->slip_image_path = '/storage/'.$path;
            $image->save();

            orderlist::find($id)->update([
                'orderstatus'=> 423,
            ]);
            return redirect('/profile')->with('success', 'ทำการบันทึกข้อมูลเสร็จสิ้น');
    }

    public function destroy($id)
    {
        $idorderlist = orderlist::find($id);
        orderlist::find($id)->delete();
        ordertransaction::where('order_id', $idorderlist->id)->delete();
        return redirect()->action('OrderController@index');
    }
}
