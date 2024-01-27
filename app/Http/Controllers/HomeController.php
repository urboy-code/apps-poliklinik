<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index (){

        if (Auth::id()){
            $usertype=Auth()->user()->usertype;

            if($usertype=='user'){
                return view ('pasienLayout.pasienDashboard');
            }else if($usertype=='admin'){
                return view ('adminDashboard');
            }else if($usertype=='dokter'){
                return view ('dokter.dokterDashboard');
            }else{
                return redirect()->back();
            }
        }



    }
}
