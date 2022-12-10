<?php

namespace App\Http\Controllers;

use App\Exports\PromExport;
use App\Imports\ProductsImport;
use App\Imports\SilaImport;
use App\Imports\XMLImport;
use App\Models\Product;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ProductsController extends Controller
{
    public function index()
    {
    }

    public function create(Request $request)
    {
        $product = new Product();
        $product->product_code = $request->product_code;
        $product->product_name_ru = $request->product_name_ru;
        $product->product_name_uk = $request->product_name_uk;
        $product->search_query_ru = $request->search_query_ru;
        $product->search_query_uk = $request->search_query_uk;
        $product->description_ru = $request->description_ru;
        $product->description_uk = $request->description_uk;
        $product->published =  $request->published;
        $product->auto_price =  $request->auto_price;
        $product->unit =  $request->unit;
        $product->price = (float)str_replace(',','.', $request->price);
        $product->retail_price =  $product->auto_price ? $product->price *  1.2 : $product->retail_price;
        $product->save();

      return response($product);
    }

    public function store(Request $request)
    {
    }

    public function show(Product $product)
    {
    }

    public function edit(Product $product)
    {
    }
    public function silaImport(){
        ini_set('memory_limit', '-1');
        Excel::import(new SilaImport(), public_path('exel/file.xlsx'));
    }
    public function import(){
        ini_set('memory_limit', '-1');
        Excel::import(new ProductsImport(), public_path('exel/catalog.xlsx'));
    }
    public function xmlimport(){
        ini_set('memory_limit', '-1');
//
            (new XMLImport)->import(public_path('exel/all_products.xml'), null, \Maatwebsite\Excel\Excel::XML);


    }
    public function promExport(){
        ini_set('memory_limit', '-1');
       return Excel::download(new PromExport, 'prom.xlsx');
    }


    public function update(Request $request, Product $product, $id)
    {
        $data=$request->all();

        Product::where('product_code', $data['product_code'])
            ->update($data);
        return response('SAVED');
    }

    public function destroy(Product $product)
    {
    }
    public function getProducts(Request $request){

         $productsList = Product::all();
         return response(['products_list' =>$productsList]);

    }
    public function getOneProduct(Request $request, $id){


        return Product::where('id', $id)->firstOrFail();
    }
}
