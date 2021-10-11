<?php

namespace App\Http\Controllers;

use App\productitem;
use Illuminate\Http\Request;

class ProductitemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = productitem::all();
        return view('productitem.index', compact(['data']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('productitem.create');
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
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'product_name'=>'required',
            'detail'=>'required',
            'itemquantity'=>'required',
            'price'=>'required',

        ]);
        // dd($request->file('file'));
        if ($request->file('file')) {
            $imagePath = $request->file('file');
            $imageName = $imagePath->getClientOriginalName();

            $path = $request->file('file')->storeAs('product_images', $imageName, 'public');
        }
        $product_image_path = '/storage/'.$path;
        productitem::create([
            'product_name'=>$request->product_name,
            'detail'=>$request->detail,
            'itemquantity'=>$request->itemquantity,
            'price'=>$request->price,
            'product_image'=>$product_image_path,
        ]);
        return redirect('/product');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=productitem::find($id);
        return view('productitem.edit', compact(['data']));
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
        $request->validate([
            'product_name'=>'required',
            'detail'=>'required',
            'itemquantity'=>'required',
            'price'=>'required',
        ]);

        if($request->file!=null){
            $request->validate([
                'product_name'=>'required',
                'detail'=>'required',
                'itemquantity'=>'required',
                'price'=>'required',
                'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $image = productitem::find($id);;
            if ($request->file('file')) {
                $imagePath = $request->file('file');
                $imageName = $imagePath->getClientOriginalName();

                $path = $request->file('file')->storeAs('product_images', $imageName, 'public');
            }
            $image->product_image = '/storage/'.$path;
            $image->save();

            productitem::find($id)->update([
                'product_name'=>$request->product_name,
                'detail'=>$request->detail,
                'itemquantity'=>$request->itemquantity,
                'price'=>$request->price,
            ]);
            return redirect('/product')->with('success', 'ทำการบันทึกข้อมูลเสร็จสิ้น');
        } else if($request->file==null){
            $request->validate([
                'product_name'=>'required',
                'detail'=>'required',
                'itemquantity'=>'required',
                'price'=>'required',
            ]);

            productitem::find($id)->update([
                'product_name'=>$request->product_name,
                'detail'=>$request->detail,
                'itemquantity'=>$request->itemquantity,
                'price'=>$request->price,
            ]);
            return redirect('/product')->with('success', 'ทำการบันทึกข้อมูลเสร็จสิ้น');
        }
        // productitem::find($id)->update($request->all());
        // return redirect('/product');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        productitem::find($id)->delete();
        return redirect('/product');
    }
}
