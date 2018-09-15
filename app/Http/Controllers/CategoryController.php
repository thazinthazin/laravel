<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('category.index', compact('categories'));
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'name' => 'required|unique:categories|min:2',
        ]);

        $categories = new Category();
        $categories->name = $data['name'];
        $categories->save();

        return redirect('/categories')->with('success','Create successfully');
    }

    public function edit($id)
    {
        $categories = Category::find($id);        

        return view('category.edit', compact('categories'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|unique:categories|min:2',
        ]);

        $categories = Category::find($id);
        $categories->name = $request->input('name');
        $categories->save();

        return redirect('/categories')->with('success','Updated successfully');
    }

    public function destroy($id)
    {
        Category::find($id)->delete();

        return redirect('/categories')->with('success','Deleted successfully');
    }
}
