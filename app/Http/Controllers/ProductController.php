<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{product};


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
        return success('Retrieved successfully', product::all());
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
        $products = new product;
        $products->name = $request->name;
        $products->img = storeFile($request, 'img', '/img/products/');
        $products->min_page = $request->min_page;
        if ($request->boxandsleeve == "true") {
            # code...
            $products->boxandsleeve = true;
        } else {
            $products->boxandsleeve = false;
            # code...
        }

        $products->save();

        return created('Created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, product $products, $id)
    {
        //
        $products->find($id)->update([
            'name' => $request->name,
            'min_page' => $request->min_page,
        ]);


        return created('Updated successfully');
    }

    public function updateImg(Request $request, product $products, $id)
    {
        if ($request->hasFile('img')) {
            $products->find($id)->update([
                'img' => storeFile($request, 'img', '/img/products/'),
            ]);
        }
        return created('Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(product $products, $id)
    {
        //
        $products->find($id)->destroy($id);

        return created('Deleted successfully');
    }

    public function statusChange(Request $request, $id)
    {
        product::find($id)->update([
            "status" => $request->status
        ]);

        return success('Status Change Successfully');
    }
}
