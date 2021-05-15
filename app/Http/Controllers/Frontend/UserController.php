<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Middleware\Interest;
use App\Models\Post;
use App\Models\User;
use App\Models\Userpackage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;


class UserController extends Controller
{
    public function userRegistration()
    {
        return view('frontend.layouts.usersignup');
    }

    public function doReg(Request $request)
    {


        $request->validate([
            'name'=>'required',
            'password'=>'required|min:6',
            'email'=>'required|email|unique:users',

        ]);
        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password)
        ]);
        return redirect()->route('frontend.user.reg')->with('success','Registration is successful');
    }

    public function loginForm()
    {
        return view('frontend.layouts.userlogin');
    }

    public function doLogin(Request $request)
    {
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:6'
        ]);
        $user_auth=$request->only('email','password');
        if (Auth::guard('user')->attempt($user_auth)){

            $request->session()->regenerate();
            return redirect()->route('home.view');
        }
        return back()->withErrors([
            'email'=>'Invalid credentials']);
    }
    public function userLogout()
    {
        Auth::guard('user')->logout();
        return redirect()->route('home.view');
    }

    public function userDashboard()
    {

//        dd($updateuserpackage);
        $noOfPosts=Post::where('authorId',auth('user')->user()->id)->get();
        $noOfInterestedPosts=\App\Models\Interest::where('userId',auth('user')->user()->id)->get();
        $noOfInterestsUsers=\App\Models\Interest::where('postAuthorId',auth('user')->user()->id)->get();
        $noOfPackages=Userpackage::where('userId',auth('user')->user()->id)->where('status','expired')->orWhere('status','Approved')->get();

        return view('frontend.layouts.user.dashboard.dashboard',compact('noOfPosts','noOfInterestedPosts','noOfInterestsUsers','noOfPackages'));
    }

    public function userProfile()
    {
        return view('frontend.layouts.user.dashboard.profile');
    }

    public function editProfileForm()
    {
        return view('frontend.layouts.user.dashboard.profileupdate');
    }

    public function updateUser(Request $request)
    {
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:6'
        ]);
        $user_auth=$request->only('email','password');
        if (Auth::guard('user')->attempt($user_auth)){

            $request->validate([
                'name' => 'required',
                'address' => 'required',
                'contact' => 'required|min:11|numeric',
                'role' => 'required',
                'newPassword' => 'required',
                'photo' => 'required'
            ]);
            $image = "";

            if ($request->hasFile('photo')) {
                $file = $request->file('photo');
                if ($file->isValid()) {

                    $image = date('Ymdhms') . '.' . $file->getClientOriginalExtension();
                    $file->storeAs('users', $image);


                }
            }
            $updateUser = User::where('id', auth('user')->user()->id)->update([

                'name' => $request->name,
                'address' => $request->address,
                'contact' => $request->contact,
                'role' => $request->role,
                'password' => bcrypt($request->newPassword),
                'image' => $image

            ]);


            return redirect()->route('frontend.user.profile')->with('success', 'Profile updated Successfully');
        }

else{    return redirect()->back()->with('success', 'Password Not Matched.');

     }
}





}
