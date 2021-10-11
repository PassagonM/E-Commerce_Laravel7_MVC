<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\productitem;
use App\basket;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
class basketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::id();
        $data = basket::where('user_id', $user_id)->get();
        $countbasket = basket::where('user_id', $user_id)->count();
        // dd($data , $countbasket);
        return view('basket.index', compact(['data' , 'countbasket']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $user_id = Auth::id();
        // dd($user_id,$request);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user_id = Auth::id();

        basket::create([
            'user_id'=>$user_id,
            'product_id'=>$id,
            'number'=>1,
            'timestamps'=>false,
        ]);
        return redirect()->back()->with('success', 'เพิ่มไปยังตะกร้าแล้ว');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        basket::find($id)->delete();
        return redirect('/basket');
    }

    public function deletebasketitem($id)
    {
        basket::find($id)->delete();
        return redirect('/basket');
    }
}
