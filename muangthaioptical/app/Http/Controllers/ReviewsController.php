<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\productitem;
use App\reviews;
use App\replyreviews;
use Illuminate\Support\Facades\Auth;

class ReviewsController extends Controller
{

    public function show(Request $request, $id)
    {
        $user_id = Auth::id();
        // dd($request, $id ,$user_id);
        $request->validate([
            // 'user_id'=>$user_id,
            // 'product_id'=>$id,
            'reviewtext'=>'required',
        ]);

        reviews::create([
            'user_id'=>$user_id,
            'product_id'=>$id,
            'message_Reviews'=>$request->reviewtext,
        ]);
        return redirect()->back()->with('success', 'ทำการรีวิวสินค้าเสร็จสิ้น');

    }

    public function index()
    {
        $datareviews = reviews::where('ansbyadmin', 0)->get();
        $datareply = reviews::where('ansbyadmin', 10)->get();
        // dd($datareviews);
        return view("profile.reviews_for_admin", compact(['datareviews', 'datareply']));
    }

    public function edit(Request $request, $id)
    {
        // dd($request, $id);
        $adminid = Auth::id();
        $request->validate([
            'replyreviewtext'=>'required',
        ]);

        replyreviews::create([
            'user_id'=>$adminid,
            'reply_reviews_message'=>$request->replyreviewtext,
            'reviews_id'=>$id,
        ]);

        reviews::find($id)->update(['ansbyadmin'=> 10]);

        // dd($request->replyreviewtext, $id);
        return redirect()->action('ReviewsController@index')->with('success', 'ตอบกลับเสร็จแล้ว');
    }
    
}
