<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class instructorDashboard extends Controller
{
   public function instructorDashboard(){
    return view('instructor.instructorDashboard');
   }
}
