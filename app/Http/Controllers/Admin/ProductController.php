<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File; 


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.product.add', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product();
        $id = Str::random(15);
        $product->id = $id;
        $product->category_id = $request->category_id;
        $product->slug = $request->slug_product;
        $product->name = $request->name_product;
        $product->small_description = $request->small_description_product;
        $product->original_price = $request->original_price_product;
        $product->selling_price = $request->selling_price_product;
        $product->description = $request->description_product;
        $product->status = $request->status_product == true ? "1" : "0";
        $product->trending = $request->trending_product == true ? "1" : "0";
        $product->meta_title = $request->meta_title_product;
        $product->meta_descrip = $request->meta_descrip_product;
        $product->meta_keywords = $request->meta_keywords_product;
        if ($request->hasFile('image_product')) {
            $file = $request->file('image_product');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('assets/uploads/product', $filename);
            $product->image = $filename;
        }
        $product->save();
        return redirect('product/create')->with('success', 'Added successfully');
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
        $product = Product::find($id);
        $categories = Category::all();
        return view('admin.product.edit', compact('product','categories'));
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
        $product = Product::find($id);
        if($request->hasFile('image_product')){
            $path = 'assets/uploads/product/' . $product->image;
            if(File::exists($path)){
                File::delete($path);
            }
            $file = $request->file('image_product');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('assets/uploads/product', $filename);
            $product->image = $filename;
        }
        $product->category_id = $request->category_id;
        $product->slug = $request->slug_product;
        $product->name = $request->name_product;
        $product->small_description = $request->small_description_product;
        $product->original_price = $request->original_price_product;
        $product->selling_price = $request->selling_price_product;
        $product->description = $request->description_product;
        $product->status = $request->status_product == true ? "1" : "0";
        $product->trending = $request->trending_product == true ? "1" : "0";
        $product->meta_title = $request->meta_title_product;
        $product->meta_descrip = $request->meta_descrip_product;
        $product->meta_keywords = $request->meta_keywords_product;
        $product->update();
        return redirect('product')->with('status','Updated success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        if($product->image){
            $path = 'assets/uploads/product/' . $product->image;
            if(File::exists($path)){
                File::delete($path);
            }
        }
        $product->delete();
        return redirect('product')->with('status','Deleted success');
    }
}
