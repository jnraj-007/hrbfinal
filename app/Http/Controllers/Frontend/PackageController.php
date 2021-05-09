<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\Userpackage;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function viewPackages()
    {
        $userpurchase=Userpackage::where('userId',auth('user')->user()->id)->orderBy('created_at','DESC')->where('status','pending')->orWhere('status','Approved')->get();

        $packages=Package::all();
        return view('frontend.layouts.user.dashboard.userpackages',compact('packages','userpurchase'));
    }

    public function purchaseForm($id)
    {
//        dd($id);
        $data= Package::where('id',$id)->first();
        return view('frontend.layouts.user.dashboard.purchase',compact('data'));
    }

    public function packagePurchase(Request $request)
    {
        Userpackage::create([
            'userId'=>auth('user')->user()->id,
            'package_id'=>$request->packageId,
            'package_price'=>$request->packagePrice,
            'numberOfPosts'=>$request->numberofposts,
            'transactionId'=>$request->transactionId,
            'amountToPay'=>$request->pricePaid,
            'packageName'=>$request->packageName


        ]);
        return redirect()->route('user.package.view');

    }

}
