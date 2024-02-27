<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{
    product,

    productorientation,
    productSize,
    productcovers,
    productboxsleeve,
    productsheet,
    productpapperprice,
    productboxsleeveprice,
    productsheetprice,
    productcoverprice,
    productpaper
};


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
        return response(
            [
                'success' => true,
                'message' => 'Product List',
                'data' => product::all()
            ],
            200
        );
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
        $products->save();

        return response([
            'success' => true,
            'message' => 'Product Created successfully'
        ], 200);
    }

    public function createProductResource(Request $request, $id)
    {

        // create product orientation
        foreach ($request->toArray() as $value) {
            $orientation = new productorientation();
            $orientation->product_id = $id;
            $orientation->orientation_id = $value['orientation_id'];
            $orientation->save();

            // create product size
            foreach ($value['sizeData'] as $size) {
                $sizes = new productSize();
                $sizes->productorientation_id  = $orientation->id;
                $sizes->size_id  = $size['size_id'];
                $sizes->save();

                // create product sheet
                if (isset($size['sheetData'])) {
                    foreach ($size['sheetData'] as $sheetData) {
                        $sheets = new productsheet();
                        $sheets->product_size_id = $sizes->id;
                        $sheets->sheet_id = $sheetData['sheet_id'];
                        $sheets->save();

                        // create product sheet price
                        foreach ($sheetData['sheetprice'] as $sheetPrice) {
                            // dd($size['size_id']);
                            $sheetPrices = new productsheetprice();
                            $sheetPrices->productsheet_id = $sheets->id;
                            $sheetPrices->countryzone_id = $sheetPrice['zone_id'];
                            $sheetPrices->price = $sheetPrice['price'];
                            $sheetPrices->save();
                        }
                    }
                }

                // create product paper
                if (isset($size['paperData'])) {
                    foreach ($size['paperData'] as $paperData) {
                        $sheets = new productpaper();
                        $sheets->product_size_id = $sizes->id;
                        $sheets->paper_id = $paperData['paper_id'];
                        $sheets->save();
                    }
                }

                // create product cover
                if (isset($size['coverData'])) {
                    foreach ($size['coverData'] as $cover) {
                        $covers = new productcovers();
                        $covers->product_size_id = $sizes->id;
                        $covers->cover_id = $cover['cover_id'];
                        $covers->save();

                        // create product sheet price
                        foreach ($cover['coverprice'] as $coverprice) {
                            $coverprices = new productcoverprice();
                            $coverprices->productcover_id = $covers->id;
                            $coverprices->countryzone_id = $coverprice['zone_id'];
                            $coverprices->price = $coverprice['price'];
                            $coverprices->save();
                        }
                    }
                }

                // create product box & sleeve
                if (isset($size['boxSleeveData'])) {
                    foreach ($size['boxSleeveData'] as $boxSleeve) {
                        // dd($boxSleeve['boxSleeve_id']);
                        $boxsleeves = new productboxsleeve();
                        $boxsleeves->product_size_id = $sizes->id;
                        $boxsleeves->boxsleeve_id = $boxSleeve['boxSleeve_id'];
                        $boxsleeves->save();

                        // create product sheet price
                        foreach ($boxSleeve['boxSleeveprice'] as $boxSleeveprice) {
                            $boxsleevep = new productboxsleeveprice();
                            $boxsleevep->productboxsleeve_id = $boxsleeves->id;
                            $boxsleevep->countryzone_id = $boxSleeveprice['zone_id'];
                            $boxsleevep->price = $boxSleeveprice['price'];
                            $boxsleevep->save();
                        }
                    }
                }
            }
        }

        return response([
            'success' => true,
            'message' => 'Product Resource Created successfully'
        ], 200);
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
    public function update(Request $request, product $product, $id)
    {
        //
        $product->find($id)->update([
            'name' => $request->name,
            'min_page' => $request->min_page,
        ]);

        if ($request->hasFile('img')) {
            $product->find($id)->update([
                'img' => storeFile($request, 'img', '/img/products/'),
            ]);
        }

        return response([
            'success' => true,
            'message' => 'Product Updated successfully'
        ], 200);
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

        return response([
            'success' => true,
            'message' => 'Product Deleted successfully'
        ], 200);
    }
}
