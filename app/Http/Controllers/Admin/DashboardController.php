<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;

class DashboardController extends Controller
{
     /**
     * Display a listing of the resource in Auth.
     *
     * @return void
     */
    public function showUser(){
    	if(Auth::user()->hasRole('admin')) {
        // Do admin stuff here
            echo 'admin';
        } else {
            // Do nothing
            echo 'Su';
        }

    }
}
