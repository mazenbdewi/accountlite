<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Product ;

use App\Category ;

use DB;

class ProductStoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $products = DB::table('products')->select('id','productCode','productName','productQuntity','productUnit')->orderBy('id','desc');
             $categories=Category::lists('categoryName', 'id');

             $products=$products->Paginate(20);

         return view('store.products.index')->with('products',$products)->with('categories', $categories);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          $products = Product::all();
         $categories=Category::lists('categoryName', 'id');
        return view('store.products.index')->with('categories', $categories)->with('products',$products);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category_id=$request->input('category_id');
        $productCode=$request->input('productCode');
        $productName=$request->input('productName');
        $productDescription=$request->input('productDescription');
        $productQuntity=$request->input('productQuntity');
        $productUnit=$request->input('productUnit');
        $allQuantity=$request->input('allQuantity');


        $product = New Product ;
       
        $product->category_id=$category_id;
        $product->productCode=$productCode;
        $product->productName=$productName;
        $product->productDescription=$productDescription;
        $product->productQuntity=$productQuntity;
        $product->productUnit=$productUnit;
        $product->allQuantity=$allQuantity;
        $product->save();


        return redirect ('/store/products/create') ;
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
    public function edit($id  , Product $product)
    {
        $product = $product->find($id);
        $categories=Category::lists('categoryName', 'id');

        return view('store.products.edit')->with('product',$product)->with('categories', $categories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id ,Product $product)
    {
        $category_id=$request->input('category_id');
        $productCode=$request->input('productCode');
        $productName=$request->input('productName');
        $productDescription=$request->input('productDescription');
        $productQuntity=$request->input('productQuntity');
        $productUnit=$request->input('productUnit');
        $allQuantity=$request->input('allQuantity');

        $product = Product::find($id) ;
        $product->category_id=$category_id;
        $product->productCode=$productCode;
        $product->productName=$productName;
        $product->productDescription=$productDescription;
        $product->productQuntity=$productQuntity;
        $product->productUnit=$productUnit;
        $product->allQuantity=$allQuantity;
        $product->save();


        return redirect ('/store/products');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id ,Product $product)
    {
       
    }

    public function printPreview()  
    {  
       

     $products = DB::table('products')->select('id','productCode','productName','productQuntity','productUnit')->orderBy('id','ASC');

     $products=$products->Paginate(20);
          
      return view ('store.products.printProduct')->with('products',$products)  ;
    }  

}
