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
      \App\Models\Products::create($this->validateProduct());
      return redirect()->back()->with('success', 'Product added succesfully!');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(\App\Models\Products $update)
    {
      $update->update($this->validateProduct());
      return redirect()->back()->with('success', 'Product changed succesfully!');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(\App\Models\Products $destroy)
    {
        $destroy->delete(Request([
          'product_name' => 'product_name',
          'product_description' => 'product_description',
          'product_price' => 'product_price',
          'product_amount' => 'product_amount'
        ]));

        return redirect()->back()->with('success', 'Product successfully removed!');


    }


    public function validateProduct()
    {
      return Request()->validate([
        'product_name' => 'required|min:2',
        'product_description' => 'required',
        'product_price' => 'required',
        'product_amount' => 'required'
      ]);
    }

}
