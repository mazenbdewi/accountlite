<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Product ;

use App\Category ;

class ProductAccountantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $products = Product::all();
             $categories=Category::lists('categoryName', 'id');
         return view('accountant.products.index')->with('products',$products)->with('categories', $categories);

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
        return view('accountant.products.index')->with('categories', $categories)->with('products',$products);
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
        $productNetPrice=$request->input('productNetPrice');
        $productQuntity=$request->input('productQuntity');
        $productUnit=$request->input('productUnit');
        $productTotalPrice=$request->input('productTotalPrice');

        $product = New Product ;
       
        $product->category_id=$category_id;
        $product->productCode=$productCode;
        $product->productName=$productName;
        $product->productDescription=$productDescription;
        $product->productNetPrice=$productNetPrice;
        $product->productQuntity=$productQuntity;
        $product->productUnit=$productUnit;
        $product->productTotalPrice=$productTotalPrice;
        $product->save();


        return redirect ('/accountant/products/create') ;
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

        return view('accountant.products.edit')->with('product',$product)->with('categories', $categories);
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
        $productNetPrice=$request->input('productNetPrice');
        $productQuntity=$request->input('productQuntity');
        $productUnit=$request->input('productUnit');
        $productTotalPrice=$request->input('productTotalPrice');

        $product = Product::find($id) ;
        $product->category_id=$category_id;
        $product->productCode=$productCode;
        $product->productName=$productName;
        $product->productDescription=$productDescription;
        $product->productNetPrice=$productNetPrice;
        $product->productQuntity=$productQuntity;
        $product->productUnit=$productUnit;
        $product->productTotalPrice=$productTotalPrice;
        $product->save();


        return redirect ('/accountant/products');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id ,Product $product)
    {
        $product->find($id)->delete();

        return redirect('/accountant/products');
    }

    public function printPreview()  
    {  
       

       $products = Product::all();

          
      return view ('accountant.products.printProduct')->with('products',$products)  ;
    }  

}
