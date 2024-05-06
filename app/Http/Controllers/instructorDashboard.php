<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class instructorDashboard extends Controller
{
   public function instructorDashboard(){
    return view('instructor.index');
   }
    public function instructorlogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
    public function instructroprofile(){
        $id = Auth::user();
        $profileData = User::find($id);
      return view('instructor.instructor_profile',compact('profileData'));
    }
    public function instructroprofileupdate(Request $request)
    {

        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->name;
        $data->username = $request->username;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;

        if ($request->file('photo')) {
            @unlink(public_path('upload/instructor_images/' . $data->photo));
            $file = $request->file('photo');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/instructor_images'), $filename);
            $data['photo'] = $filename;
        }

        $data->save();
        $notifacation = array(
            'message' => 'Admin Profile Updated Successfully',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notifacation);
    }
}
