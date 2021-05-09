<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Package;

class PackageController extends Controller
{
    public function view(){
       $packages= Package::all();
       $title="Package List";
       return view('backend.layouts.packages.pview',compact('packages','title'));
    }
    public function packageadd(Request $request){
        $cool=Package::create([
            'name'=>$request->package_name,
            'description'=>$request->description,
            'price'=>$request->package_price,
            'status'=>$request->status,
            'numberofposts'=>$request->postNo

        ]);
        return redirect()->back();
    }

    public function packageDelete($id)
    {
        $delete=Package::find($id);
        $delete->delete();
        return redirect()->route('package.view');
    }

}
