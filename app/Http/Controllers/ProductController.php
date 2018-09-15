<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use File;

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

        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'title' => 'required',
            'price' => 'required',
            'description' => 'required',
            'category_id' => 'required|integer',
            'image' => 'required|image|mimes:jpeg,jpg,png',
        ]);

        $products = new Product();

        $file = $data['image'];        
        $destination_path = 'uploads/images/';
        $filename = $file->getClientOriginalName();
        $file->move($destination_path, $filename);
        $products->image = $destination_path . $filename;

        $products->title = $data['title'];
        $products->price = $data['price'];
        $products->description = $data['description'];
        $products->category_id = $data['category_id'];
        $products->save();

        return redirect('/products')->with('status', 'Successfully Created Data!');
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
        $categories = Category::all();

        $products = Product::find($id);

        $categories_product = [];
        foreach ($categories as $category) {
            $categories_product[$category->id] = $products->category_id;
        }      

        return view('products.edit', compact('categories', 'products', 'categories_product'));
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
        $this->validate($request, [
            'title' => 'required',
            'price' => 'required',
            'description' => 'required',
            'category_id' => 'required|integer',
        ]);

        $products = Product::find($id);

       $product_name = (explode('uploads/images/', $products->image));

       if(!$request->hasFile('image')){
       
        $products->image = $products->image;       

       } else {
       
        $filepath = public_path() . '/' . $products->image;
        $newfilepath = public_path() . '/' . 'uploads/trash/' . $product_name[1];        
        File::move($filepath, $newfilepath);
       
       $file = $request->file('image');
       $destination_path = 'uploads/images/';
       $filename = $file->getClientOriginalName();
       $file->move($destination_path, $filename);
       $products->image = $destination_path . $filename;
       }

        $products->title = $request->input('title');
        $products->price = $request->input('price');
        $products->description = $request->input('description');
        $products->category_id = $request->input('category_id');
        $products->save();

        return redirect('/products')->with('status','Successfully Updated Data!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::find($id)->delete();

        return redirect('/products')->with('status','Successfully Delete Data!');
    }
}
