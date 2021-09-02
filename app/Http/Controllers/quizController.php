<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\quiz;
use App\Models\kelas;
use App\Models\tugas;
use App\Models\kehadiran;
use App\Models\soal;
use App\Models\nilai;
use App\Models\jawaban;
use Image;
use File;
use Auth;
use Carbon\Carbon;
use App\Models\User;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExportExcel;

class quizController extends Controller
{
	
	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	 
	public function __construct(){
    	$this -> middleware('auth');    	
    	//$this -> middleware('akses:2');
    } 
	 
    public function index()
    {
        $data=quiz::all();
        $student=Auth::User()->class_id;
        $students=quiz::where('class_id', $student)->get();
        $kelas=kelas::all();
        // dd($list);

        return view('quiz.index',compact('data','kelas','students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		return view('quiz.create');
		
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		
        
        $data = new quiz;
		$data->name = $request->name;
        $data->class_id = $request->class_id;
        $data->types =  $request->types;
        $data->status = 1;
       
        $data -> save();

        $soals = $request->input('soal');
        foreach($soals as $soal) {
            $datas = new soal;
            $datas->soal = $soal;
            $datas->quiz_id = $data->id;
            $datas->save();
        }
        $answers = soal::where('quiz_id',$data->id)->get();
        $users=User::where('class_id',$data->class_id)->get();

        

        foreach($users as $user) {
           
            $nilai = new nilai;
            $nilai->nilai = "Belum dinilai";
            $nilai->user_id = $user->id;
            $nilai->quiz_id = $data->id;

            $nilai->save();

            foreach($answers as $answer) {
                $jawaban = new jawaban;
                $jawaban->user_id = $user->id;
                $jawaban->soal_id = $answer->id;
                $jawaban->quiz_id = $data->id;
                $jawaban->save();
            }
        }

       


        // dd($anu);

        //request()->pic->move(public_path('assets/images'), $imageName);
        //return redirect('quiz');
		
		return redirect()->route('quiz.index')->with('alert-success', 'Berhasil Menambahkan Data!');
           
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $data['quiz'] = quiz::where('id', $id)->get();
	   return view('quiz.lihat', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = quiz::findOrFail($id);
        $soal = soal::where('quiz_id',$id);
        return response()->json([
            'data' => $data,
            'soal' => $soal,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = quiz::where('id', $id)->first();

    

		$data->name = $request->name;
        $data->class_id = $request->class_id;
        $data->types = $request->types;
       

	
        $data -> save();

    
    
		return redirect()->route('quiz.index')->with('alert-success', 'Data berhasil diubah!');
		
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = quiz::where('id', $id)->first();
		/**$picture = $data->pic;
        File::delete('images/'.$picture);
		*/
		quiz::find($id)->delete();
        return back();
    }
    public function export_excel()
	{
		return Excel::download(new ExportExcel, 'data.xlsx');
	}
}
