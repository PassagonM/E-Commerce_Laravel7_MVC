<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\productitem;
use App\reviews;

class showproductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = productitem::all();
        return view('showproduct.show', compact(['data']));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $thisproduct = productitem::find($id);
        $datareview = reviews::where('product_id',$thisproduct->id)->get();
        $cont_datareview = count($datareview);
        // dd($datareview[0]->reviews_to_user->name ,$cont_datareview);
        return view('showproduct.productdetail', compact(['thisproduct', 'datareview', 'cont_datareview']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    public function search()
    {
        $search_text = $_GET['search'];
        $productdata = productitem::where('product_name', 'LIKE', '%'.$search_text.'%')->get();

        return view('showproduct.search' ,compact(['productdata', 'search_text']));
    }
}
