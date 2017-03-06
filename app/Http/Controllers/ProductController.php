<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Product ;

use App\Category ;
use DB;
use Datatables;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $sum=Product::select('id')->get();
         $products = Product::join('categories','categories.id','=','products.category_id')
                                 ->select('products.id','productCode','productName','productQuntity'
                                            ,'productUnit','productNetPrice'
                                            )->get();
           
             $categories=Category::lists('categoryName', 'id');
            
        return view('admin.products.index',compact('products','categories','sum'));

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
        return view('admin.products.index')->with('categories', $categories)->with('products',$products);
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
        $productNetSell=$request->input('productNetSell');
        $productSellPrice=$request->input('productSellPrice');
        $productQuntity=$request->input('productQuntity');
        $productUnit=$request->input('productUnit');
        $allQuantity=$request->input('allQuantity');
        $productTotalPrice=$request->input('productTotalPrice');

        $product = New Product ;
       
        $product->category_id=$category_id;
        $product->productCode=$productCode;
        $product->productName=$productName;
        $product->productDescription=$productDescription;
        $product->productNetPrice=$productNetPrice;
        $product->productSellPrice=$productSellPrice;
        $product->productNetSell=$productNetSell;
        $product->productQuntity=$productQuntity;
        $product->productUnit=$productUnit;
        $product->allQuantity=$allQuantity;
        $product->productTotalPrice=$productTotalPrice;
        $product->save();


        return redirect ('/adminpanel/products/create') ;
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

        return view('admin.products.edit')->with('product',$product)->with('categories', $categories);
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
        $productNetSell=$request->input('productNetSell');
        $productSellPrice=$request->input('productSellPrice');
        $productQuntity=$request->input('productQuntity');
        $productUnit=$request->input('productUnit');
        
        $allQuantity=$request->input('allQuantity');


        $productTotalPrice=$request->input('productTotalPrice');


        $product = Product::find($id) ;
        $product->category_id=$category_id;
        $product->productCode=$productCode;
        $product->productName=$productName;
        $product->productDescription=$productDescription;
        $product->productNetPrice=$productNetPrice;
        $product->productSellPrice=$productSellPrice;
        $product->productNetSell=$productNetSell;
        $product->productQuntity=$productQuntity;
        $product->productUnit=$productUnit;
        $product->allQuantity=$allQuantity;
        $product->productTotalPrice=$productTotalPrice;
        $product->save();


        return redirect ('/adminpanel/products');


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

        return redirect('/adminpanel/products');
    }

    public function printPreview()  
    {  
       

       $productcount = DB::table('products')->count();
       $products=DB::table('products')->select('id','productCode','productName','productQuntity','productUnit','productNetPrice','created_at')
                                    ->orderBy('id','ASC')
                                    ->get();
                                  // ->Paginate(20);

          
      return view ('admin.products.printProduct')->with('products',$products)->with('productcount',$productcount)  ;
    } 

     public function getproduct()
    {
         $products = Product::all();
             $categories=Category::lists('categoryName', 'id');
         return view('admin.products.getProduct',compact('products','categories'))->render();

    }

    

    public function get_product_info_by_search(Request $request) 
    {
        if($request->ajax())
        {
            $products=$this->data($request['search']);
            if(!(empty($request['search'])))
            {
            $search=$request['search'];
            $view = view('admin.products.getList',compact('products','search'))->render();
            return response($view) ;
            }
        }
    }

    public function getproductinfosearch(Request $request)
    {
        if($request->ajax())
        {
            $products=$this->data($request['search']);
            return view('admin.products.getList',compact('products'))->render();

        }
    }

   
    public function anyData()
    {
        $products=Product::join('categories','categories.id','=','products.category_id')
                             ->select('products.id','categoryName','productCode','productName','productQuntity'
                                            ,'productNetPrice','productNetSell',
                                            'productSellPrice');
        return Datatables::of($products)

        ->editColumn('action',function($model){
            
           
            return '<a href="/adminpanel/products/'.$model->id.'/edit" class="btn btn-info btn-circle"><i class="fa fa-edit">تعديل</i></a>';
        })
            

        ->make(true);
    }

}
