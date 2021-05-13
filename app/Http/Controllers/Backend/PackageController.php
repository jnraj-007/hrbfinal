<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\Userpackage;
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

    public function purchaseRequest()
    {    $title="Purchase Request";
        $purchaseRequest=Userpackage::with('userdata')->where('status','pending')->get();
        return view('backend.layouts.purchase.purchaserequest',compact('purchaseRequest','title'));
    }

    public function approveRequest($id,$username)
    {
        $approve=Userpackage::find($id);
        $approve->update([
            'status'=>'Approved',
            'current_package_status'=>'active'

        ]);
        $paymenthistory=Userpackage::find($id);
        Payment::create([

            'userId'=>$paymenthistory->userId,
            'userName'=>$username,
            'packageId'=>$paymenthistory->package_id,
            'packageName'=>$paymenthistory->packageName,
            'approvedBy'=>auth('admin')->user()->name,
            'purchaseId'=>$paymenthistory->id,
            'amount'=>$paymenthistory->amountToPay,
            'paymentDate'=>$paymenthistory->created_at
        ]);
        return redirect()->back()->with('success','Request Approved');

}


}
