<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\exam;
use App\Models\kelas;
use App\Models\answer;
use Image;
use File;
use Auth;
use Carbon\Carbon;
use App\Models\User;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExportExcel;

class examController extends Controller
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
        $data=exam::all();
        $student=Auth::User()->class_id;
        $students=exam::where('class_id', $student)->get();
        $kelas=kelas::all();
      

        // dd($list);
        return view('exam.index',compact('data','kelas','students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		return view('exam.create');
		
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$this->validate($request, [
			'file' => 'required||mimes:docx,doc,pptx,ppt,pdf|max:100048',
            // |file|max:1000000|mimes:mov,ogg,flv,avi,ts,wmv,mkv,docx,pptx,mp4s,mp4,qt
			'class_id' => 'required',
		]);
        $tujuan_upload = 'data_file';

		$file = $request->file('file');
		$nama_file = time()."_".$file->getClientOriginalName();
      	        // isi dengan nama folder tempat kemana file diupload
		$file->move($tujuan_upload,$nama_file);
        
        $data = new exam;
        $data->file = $nama_file;
        $data->name = $request->name;
        $data->class_id = $request->class_id;
        $data->types =  $request->types;
        $data->status = 1;

        $data -> save();

        $users=User::where('class_id',$data->class_id)->get();

        foreach($users as $user) {
            $answer = new answer;
            $answer->status = 0;
            $answer->nilai = null;
            $answer->file = null;
            $answer->user_id = $user->id;
            $answer->exam_id = $data->id;
            $answer->save();
        }

       


        // dd($anu);

        //request()->pic->move(public_path('assets/images'), $imageName);
        //return redirect('exam');
		
		return redirect()->route('exam.index')->with('alert-success', 'Berhasil Menambahkan Data!');
           
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $data['exam'] = exam::where('id', $id)->get();
	   return view('exam.lihat', $data);
    }

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

        if ($request->file('files')) {
        $file = $request->file('files');
 
		$nama_file = time()."_".$file->getClientOriginalName();
 
      	        // isi dengan nama folder tempat kemana file diupload
		$tujuan_upload = 'data_file';
		$file->move($tujuan_upload,$nama_file);

        $data->class_id = $request->class_id;
        $data->file = $nama_file;
        $data->types =  $request->types;
        $data->name =  $request->name;

        $data -> save();

        
    } else {
        $data->class_id = $request->class_id;
        $data->file = $request->file;
        $data->types =  $request->types;
        $data->name =  $request->name;

	
        $data -> save();
    }
		return redirect()->route('exam.index')->with('alert-success', 'Data berhasil diubah!');
		
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
