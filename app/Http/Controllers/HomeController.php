<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\pertemuan;
use App\Models\kehadiran;
use App\Models\kelas;
use App\Models\tugas;
use App\Models\User;
use App\Models\quiz;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $student=Auth::User()->id;
        $studentclass=Auth::User()->class_id;
       
        if (Auth::User()->role<>'0') {
             return view('adm.index');
        }else {
            return view('auth.login');
        }
    }
}
