<?php

namespace App\Http\Controllers;

use App\User;
use App\Useradd;
use Faker\Provider\ar_JO\Text;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::all();
        $my_id = \Illuminate\Support\Facades\Auth::id();
        $myorder = \App\orderlist::where('user_id', $my_id)->where('orderstatus', 522)->count();
        $myordercheck = \App\orderlist::where('user_id', $my_id)->where('orderstatus', 423)->count();
        $toadmin = \App\orderlist::where('orderstatus', 423)->count();
        $myshipping = \App\orderlist::where('user_id', $my_id)->where('orderstatus', 365)->count();
        $useraddress = User::find($my_id);
        $test = count($useraddress->user_address);
        $addressstring = " ";
        $addboolean = false;
        $usermenubar = Auth::user()->status_user;
        $usermenubarbut = Auth::user()->status_user;
        for($num=0;$num<$test;$num++){
            if($useraddress->user_address[$num]->active==$useraddress->address){
               $addressstring= $useraddress->user_address[$num];
            //    dd($sss ,$addboolean);
                $addboolean = true;
                // dd($addressstring ,$addboolean);
            }
        }
        return view('profile.index', compact(['data' ,'myorder' ,'myordercheck' ,'toadmin' ,'myshipping' ,'addressstring', 'addboolean', 'usermenubar', 'usermenubarbut']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'address' => 'required',
        ]);
        $useraddress = User::find(Auth::User()->id);
        $activeaddress = $useraddress->user_address->max('active');
        $activeaddress = $activeaddress+1;
        $data = [
            [
                'user_id'=>$useraddress->id,
                'textaddress'=>$request->address,
                'active'=>$activeaddress,
            ]
        ];
        Useradd::insert($data);
        return redirect()->back()->with('success', 'เพิ่มที่อยู่เสร็จสิ้น');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $useraddress = User::find($id);
        return view('profile.addressmanage', compact(['useraddress']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = User::find($id);
        return view('profile.edit', compact(['data']));
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
        if($request->file!=null){
            $request->validate([
                'username' => 'required',
                'name'=>'required',
                'lastname'=>'required',
                'tel'=>'required',
                'email' => 'required|email',
                'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $image = User::find(Auth::user()->id);;
            if ($request->file('file')) {
                $imagePath = $request->file('file');
                $imageName = $imagePath->getClientOriginalName();

                $path = $request->file('file')->storeAs('images', $imageName, 'public');
            }
            $image->user_image = $imageName;
            $image->user_image_path = '/storage/'.$path;
            $image->save();

            User::find($id)->update([
                'username'=>$request->username,
                'name'=>$request->name,
                'lastname'=>$request->lastname,
                'tel'=>$request->tel,
                'email'=>$request->email,
            ]);
            return redirect('/profile')->with('success', 'ทำการบันทึกข้อมูลเสร็จสิ้น');
        } else if($request->file==null){
            $request->validate([
                'username' => 'required',
                'name'=>'required',
                'lastname'=>'required',
                'tel'=>'required',
                'email' => 'required|email',
            ]);

            User::find($id)->update([
                'username'=>$request->username,
                'name'=>$request->name,
                'tel'=>$request->tel,
                'lastname'=>$request->lastname,
                'email'=>$request->email,
            ]);
            return redirect('/profile')->with('success', 'ทำการบันทึกข้อมูลเสร็จสิ้น');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function editaddress($id){

        // dd($id);
        Useradd::find($id)->delete();
        return redirect()->back()->with('success', 'ลบที่อยู่เสร็จสิ้น');
    }

    public function usecheckaddress($id){
        $adresscheck = Useradd::find($id);
        // dd($id, $adresscheck->active);
        User::find(Auth::User()->id)->update([
            'address'=>$adresscheck->active,
        ]);
        return redirect()->back()->with('success', 'เลือกที่อยู่สำหรับใช้งานใหม่แล้ว');
    }
}
