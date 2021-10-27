<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\exam;
use App\Models\kelas;
use App\Models\answer;
use App\Models\kehadiran;
use Image;
use File;
use Auth;
use App\Models\User;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExportExcel;

class answerController extends Controller
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
	 
    public function index($id)
    {
        $data=exam::findOrFail($id);
        $kelas=kelas::all();
        $answer = answer::where('exam_id', $id)->get();
        $mahasiswa = Auth::User()->id;

        $selesai = answer::select('*')
                ->where('exam_id', '=', $id)
                ->where('user_id', '=', $mahasiswa)
                ->first();


        // dd($answer);
        return view('answer.index',compact('data','kelas','answer','selesai'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $data=exam::findOrFail($id);
        $answer = answer::where('exam_id', $id)->get();
        $kelas=kelas::all();
		return view('answer.create',compact('data','kelas'));
		
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {

		$this->validate($request, [
			'file' => 'required||mimes:docx,doc,pptx,ppt,pdf|max:100048',

		]);
 
		// menyimpan data file yang diupload ke variabel $file
		$file = $request->file('file');
 
		$nama_file = time()."_".$file->getClientOriginalName();
 
      	        // isi dengan nama folder tempat kemana file diupload
		$tujuan_upload = 'data_file';
		$file->move($tujuan_upload,$nama_file);
        
        $exam=exam::findOrFail($id);

        $mahasiswa = Auth::User()->id;
        $data = answer::select('*')
        ->where('exam_id', '=', $id)
        ->where('user_id', '=', $mahasiswa)
        ->first();
       
        $data->file = $nama_file;
        $data->status =$request->status;
        
	
        $data -> save();

        

            
        


        //request()->pic->move(public_path('assets/images'), $imageName);
        //return redirect('exam');
		
        return back();
           
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = exam::findOrFail($id);
        return response()->json([
            'data' => $data,
    
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
        $data = exam::where('id', $id)->first();

	
		$data->nilai = $request->nilai;
       



	
        $data -> save();
		return redirect()->route('exam.index')->with('alert-success', 'Data berhasil diubah!');
		
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function kehadiran($id)
    {
        $hadir     = kehadiran::find($id);
        $hadir->status = 1;
        $hadir->save();
    
    
        return back()->with('style', 'warning')->with('alert', '')->with('msg', 'Anda telah hadir di exam ini');
    }
    public function destroy($id)
    {
        $data = exam::where('id', $id)->first();
		/**$picture = $data->pic;
        File::delete('images/'.$picture);
		*/
		exam::find($id)->delete();
        return back();
    }
    public function export_excel()
	{
		return Excel::download(new ExportExcel, 'data.xlsx');
	}
}
