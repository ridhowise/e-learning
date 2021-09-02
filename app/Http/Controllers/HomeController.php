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
        $pertemuana=pertemuan::all()->count();
        $mahasiswa=user::where('level_id', 2)->count();
        $pertemuan=pertemuan::where('class_id', $studentclass)->count();
        $pertemuans=kehadiran::select('*')
        ->where('user_id', '=', $student)
        ->where('status', '=', 1)
        ->count();
        $tugas=tugas::select('*')
        ->where('user_id', '=', $student)
        ->where('status', '=', 0)
        ->count();
        $ujian=quiz::where('class_id', $studentclass)->count();
        $ujiantotal=quiz::all()->count();
        if (Auth::User()->role<>'0') {
             return view('adm.index', compact('pertemuan','tugas','pertemuans','pertemuana','mahasiswa','ujian','ujiantotal'));
        }else {
            return view('auth.login');
        }
    }
}
