<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    public function index() {
        $products = Product::all();
        return view('home',compact('products'));
    }

    public function add(Request $request, $id){
        $items = array();

        if($request->session()->has('items')){
            $items = $request->session()->get('items');
//            echo json_encode($items);

            if(!in_array($id, $items)){
                array_push($items, $id);
            }
        } else{
            array_push($items, $id);
        }

        $request->session()->put('items',$items);

//        $request->session()->flush();

        $products = Product::all();
        return view('home',compact('products'));
    }

    public function show(Request $request) {
        $carts = $request->session()->get('items');
        $products = array();

        for ($i = 0; $i < count($carts); $i++){
            $product = Product::find($carts[$i]);
            array_push($products, $product);
        }

        return view('cart',compact('products'));
    }
}
