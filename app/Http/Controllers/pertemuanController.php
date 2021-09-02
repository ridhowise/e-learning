<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\pertemuan;
use App\Models\kelas;
use App\Models\tugas;
use App\Models\kehadiran;
use Image;
use File;
use Auth;
use Carbon\Carbon;
use App\Models\User;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExportExcel;

class pertemuanController extends Controller
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
        $data=pertemuan::all();
        $student=Auth::User()->class_id;
        $students=pertemuan::where('class_id', $student)->get();
        $kelas=kelas::all();
        // dd($list);
        return view('pertemuan.index',compact('data','kelas','students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		return view('pertemuan.create');
		
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
			// 'file' => 'required|file|max:1000000|mimes:mov,ogg,flv,avi,ts,wmv,mkv,docx,pptx,mp4s,mp4,qt',
			'class_id' => 'required',
            'name' => 'required',
		]);
 
		// menyimpan data file yang diupload ke variabel $file
		$file = $request->file('file');
 
		$nama_file = time()."_".$file->getClientOriginalName();
 
      	        // isi dengan nama folder tempat kemana file diupload
		$tujuan_upload = 'data_file';
		$file->move($tujuan_upload,$nama_file);
        
        $data = new pertemuan;
		$data->name = $request->name;
        $data->class_id = $request->class_id;
        $data->file = $nama_file;
        $data->description = $request->description;
        $data->assignment = $request->assignment;
        $data->desc = $request->desc;
        $data->deadline = $request->deadline;
    
        $now = Carbon::now()->timezone('Asia/Makassar');
        $tommorow = $now->addDays(1);
        $data->tommorow = $tommorow;
        $data -> save();

        $users=User::where('class_id',$data->class_id)->get();

        foreach($users as $user) {
            $tugas = new tugas;
            $tugas->status = 0;
            $tugas->file = null;
            $tugas->user_id = $user->id;
            $tugas->meeting_id = $data->id;
            $tugas->save();

            $kehadiran = new kehadiran;
            $kehadiran->status = 0;
            $kehadiran->user_id = $user->id;
            $kehadiran->meeting_id = $data->id;
           
            $kehadiran->save();
        }

       


        // dd($anu);

        //request()->pic->move(public_path('assets/images'), $imageName);
        //return redirect('pertemuan');
		
		return redirect()->route('pertemuan.index')->with('alert-success', 'Berhasil Menambahkan Data!');
           
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $data['pertemuan'] = pertemuan::where('id', $id)->get();
	   return view('pertemuan.lihat', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = pertemuan::findOrFail($id);
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
        $data = pertemuan::where('id', $id)->first();

        if ($request->file('files')) {
        $file = $request->file('files');
 
		$nama_file = time()."_".$file->getClientOriginalName();
 
      	        // isi dengan nama folder tempat kemana file diupload
		$tujuan_upload = 'data_file';
		$file->move($tujuan_upload,$nama_file);

		$data->name = $request->name;
        $data->class_id = $request->class_id;
        $data->file = $nama_file;
        $data->assignment = $request->assignment;
        $data->description = $request->description;
        $data->desc = $request->desc;
        $data->deadline = $request->deadline;

	
        $data -> save();

    } else {
        $data->name = $request->name;
        $data->class_id = $request->class_id;
        $data->file = $request->file;
        $data->description = $request->description;
        $data->assignment = $request->assignment;
        $data->desc = $request->desc;
        $data->deadline = $request->deadline;

	
        $data -> save();
    }
		return redirect()->route('pertemuan.index')->with('alert-success', 'Data berhasil diubah!');
		
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = pertemuan::where('id', $id)->first();
		/**$picture = $data->pic;
        File::delete('images/'.$picture);
		*/
		pertemuan::find($id)->delete();
        return back();
    }
    public function export_excel()
	{
		return Excel::download(new ExportExcel, 'data.xlsx');
	}
}
