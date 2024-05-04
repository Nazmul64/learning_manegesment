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
}
