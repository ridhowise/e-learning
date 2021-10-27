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
use App\Models\User;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExportExcel;

class rekapController extends Controller
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
       
        $kehadiran = kehadiran::where('user_id', $id)->get();
        $user = kehadiran::where('user_id', $id)->first();

        $hadir=kehadiran::select('*')
        ->where('user_id', '=', $id)
        ->where('status', '=', 1)
        ->count();

        $totalhadir=kehadiran::where('user_id', $id)->count();

        $nilai = $hadir/$totalhadir*100;
        // dd($tugas);
        return view('rekap.index',compact('kehadiran','user','nilai','hadir','totalhadir'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $data=pertemuan::findOrFail($id);
        $tugas = tugas::where('meeting_id', $id)->get();
        $kelas=kelas::all();
		return view('detail.create',compact('data','kelas'));
		
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
        
        $meeting=pertemuan::findOrFail($id);

        $mahasiswa = Auth::User()->id;
        $data = tugas::select('*')
        ->where('meeting_id', '=', $id)
        ->where('user_id', '=', $mahasiswa)
        ->first();
       
        $data->file = $nama_file;
        $data->status =$request->status;
        
	
        $data -> save();

        

            
        


        //request()->pic->move(public_path('assets/images'), $imageName);
        //return redirect('pertemuan');
		
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

		if ($request->file('image')) {
            $image = $request->file('image');

            $file_name = time(). rand(1111, 9999) . '.' .$image->getClientOriginalExtension();

            // $save_Path = 'images/'.$file_name;
            //$save_Path = public_path('images/'.$file_name);

            //Image::make($image->getRealPath())->resize(300, 236)->save($save_Path);
            $image->move('images',$file_name);
            \Image::make('images/'.$file_name)->resize(300, 300)->save('images/'.$file_name);
        } else {
            $file_name = null;
        }
        
        $data = new pertemuan;
		$data->name = $request->name;
        $data->tanggal = $request->tanggal;
		$data->debit = $request->debit;
        $data->credit = $request->credit;
        $data->source = $request->source;
        $data->balance = $request->balance;
        $data->pic = $file_name;



	
        $data -> save();
		return redirect()->route('pertemuan.index')->with('alert-success', 'Data berhasil diubah!');
		
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
    
    
        return back()->with('style', 'warning')->with('alert', '')->with('msg', 'Anda telah hadir di pertemuan ini');
    }
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
