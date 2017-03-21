<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrdouctsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products_data = json_decode(file_get_contents('products.json'),true);
        //dd($products_data);
        return view('welcome', compact('products_data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('product-form');
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
        $product_data = array(
            'product_name' => $request->get('product-name'),
            'quantity' => $request->get('quantity'),
            'price_per_item' => $request->get('price-per-item'),
            'total_value' => $request->get('quantity')*$request->get('price-per-item'),
            'datetime_submitted' => date('Y-m-d h:i:s' )
            );

        $old_data = json_decode(file_get_contents('products.json'),true);

        $combine_data = array_push(
                                $old_data,
                                $product_data
                            );

        file_put_contents('products.json', json_encode($old_data,true));
        return json_encode($product_data);

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
}
