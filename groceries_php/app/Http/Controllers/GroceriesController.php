<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GroceriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
       return view('groceries', [
         'product' => \App\Models\Products::latest()->get()
       ]);
     }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      $product = new \App\Models\Products();

      $product->product_name = Request('product_name');
      $product->product_description = Request('product_description');
      $product->product_price = Request('product_price');
      $product->product_amount = Request('product_amount');

      $product->save();

      return redirect('/');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function edit($id)
    // {
    //     $edit_product = \App\Models\Products::find($id);
    //
    //     return view('groceries.edit', ['edit_product'=>$edit_product]);
    // }





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
}
