<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
   public function index(){
     return view('frontend.index');
   }
   public function userprofile(){
     $id =Auth::user()->id;
     $profileData =User::find($id);
     return view('frontend.dashboard.edit_profile',compact('profileData'));

   }

    public function userprofileupdate(Request $request)
    {

        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->name;
        $data->username = $request->username;
        $data->email  = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;

        if ($request->file('photo')) {
            @unlink(public_path('upload/admin_images/' . $data->photo));
            $file = $request->file('photo');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'), $filename);
            $data['photo'] = $filename;
        }

        $data->save();
        $notifacation = array(
            'message' => 'User Profile Updated Successfully',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notifacation);
    }
    public function userlogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
    public function userchagnepassword(){
        // $request->validate([
        //     'name'=>'required',
        //     'username' => 'required',
        //     'name' => 'required',
        //     'name' => 'required',
        //     'name' => 'required',
        //     'name' => 'required',
        //     'name' => 'required',
        // ]);
        $id=Auth::user()->id;
        $profileData =User::find($id);
        return view('frontend.dashboard.change_password',compact('profileData'));
    }



    public function adminpasswordupdate(Request $request){
        //// VALIDATEION
        $request->validate(['old_password' => 'required',
            'old_password' => 'required',
            'new_password' => 'required|min:8', // Adjust minimum length as needed
            'new_password_confirmation' => 'required|same:new_password',
        ]);
        if (!Hash::check($request->old_password, auth::user()->password)) {
            $notifacation = array(
                'message' => 'Old Password Does Not Match',
                'alert-type' => 'error',
            );

            return redirect()->back()->with($notifacation);
        }
        /// udate the new password
        User::whereId(auth::user()->id)->update([
            'password' => Hash::make($request->new_password),
        ]);
    }
    }

