<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class adminDashboard extends Controller
{
   public function adminDashboard(){
    return view('admin.index');
   }
public function adminlogin(){
  return view('admin.admin_login');
}
    public function adminlogout (Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
    public function adminprofile(){
      $id =Auth::user();
      $profileData =User::find($id);
      return view('admin.admin_profile_view',compact('profileData'));
    }
    public function adminprofilechange(Request $request){
        // $id = Auth::user()->id;
        // $data = User::find($id);
        // $data->name=$request->name;
        // $data->username = $request->username;
        // $data->email  = $request->email;
        // $data->phone = $request->phone;
        // $data->address = $request->address;
        // if($request->file('photo')){
        //     $file =$request->file('photo');
        //     $fileName =date('YmdHi').$file->getClientOriginalName();
        //     $file->move(public_path('uploads/admin_images'), $fileName);
        //     $data['photo']=$fileName;
        // }

        // $data->save();
        // return redirect()->back();


        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->name;
        $data->username = $request->username;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;

        if ($request->file('photo')) {
            @unlink(public_path('upload/admin_images/'.$data->photo));
            $file = $request->file('photo');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'), $filename);
            $data['photo'] = $filename;
        }

        $data->save();
        $notifacation =array(
            'message'=>'Admin Profile Updated Successfully',
            'alert-type'=>'success',
        );

        return redirect()->back()->with($notifacation);
    }
    public function adminchangepassword(){
        $id = Auth::user();
        $profileData = User::find($id);
        return view('admin.admin_change_password',compact('profileData'));
    }
}
