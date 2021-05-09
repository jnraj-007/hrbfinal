<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function viewcategory(){

        $title="View Categories";
        $categories=Category::all();
//        dd($categories);
        return view("backend.layouts.categories",compact('categories','title'));

    }
    public function createcategory(Request $request){
        Category::create([
            'title'=>$request->category_name,
        'description'=>$request->description,
        'status'=>$request->status]);
        return redirect()->back();
    }

    public function deleteCategory($id)
    {
 $delete= Category::find($id);
 $delete->delete();
 return redirect()->route('category.view');

    }
}
