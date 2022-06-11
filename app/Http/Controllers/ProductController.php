<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Product;
use App\Models\Seller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function pdf()
    {
        $product = Product::all();
       
        //$user=auth()->user()->seller->id_usuario;

        $pdf = PDF::loadView('report.product',['product'=>$product]);
        //$pdf->loadHTML('<h1>Test</h1>');
        return $pdf->stream();
    }
    public function seller()
    {
        $seller = Seller::all();
       
        //$user=auth()->user()->seller->id_usuario;

        $pdf = PDF::loadView('report.seller',['seller'=>$seller]);
        //$pdf->loadHTML('<h1>Test</h1>');
        return $pdf->stream();
    }
    public function productid($id)
    {

        $product = Product::join("sellers","seller.id_seller","=","products.fk_seller")
        ->where("products.fk_seller","=",$id)
        ->get();

        dd($product);
       
        //$user=auth()->user()->seller->id_usuario;

        //$pdf = PDF::loadView('report.seller',['seller'=>$seller]);
        //$pdf->loadHTML('<h1>Test</h1>');
        //return $pdf->stream();
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
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
