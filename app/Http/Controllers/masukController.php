<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\masuk;
use App\Models\persediaan;
use App\Models\barangmasuk;
use Image;
use File;
use Auth;
use Carbon\Carbon;
use App\Models\User;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExportExcel;

class masukController extends Controller
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
        $data=masuk::all();
        $barangs=persediaan::all();

        return view('masuk.index',compact('data','barangs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		return view('masuk.create');
		
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $admin=Auth::User()->id;

        $tujuan_upload = 'data_file';

        $file = $request->file('file');
		$nama_file = time()."_".$file->getClientOriginalName();
		$file->move($tujuan_upload,$nama_file);
        
        $data = new masuk;
		$data->tanggal = $request->tanggal;
        $data->user_id = $admin;
        $data->file = $nama_file;

       
        $data -> save();

        $barangs = $request->input('barang');
        $jumlahs = $request->input('jumlah');

        foreach($barangs as $key => $barang_id) {
            $datas = persediaan::find($barang_id);
            $ada = $datas->jumlah;
            $datas->jumlah = $ada+$jumlahs[$key];
            $datas->save();

            $dataz = new barangmasuk;
            $dataz->barang_id = $barang_id;
            $dataz->masuk_id = $data->id;
            $dataz->masuk = $jumlahs[$key];
            $dataz->save();

        }
       

        


       


        // dd($anu);

        //request()->pic->move(public_path('assets/images'), $imageName);
        //return redirect('masuk');
		
		return redirect()->route('masuk.index')->with('alert-success', 'Berhasil Menambahkan Data!');
           
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $data['masuk'] = masuk::where('id', $id)->get();
	   return view('masuk.lihat', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = masuk::findOrFail($id);
        $soal = soal::where('masuk_id',$id);
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
        $data = masuk::where('id', $id)->first();

    

		$data->name = $request->name;
        $data->class_id = $request->class_id;
        $data->types = $request->types;
       

	
        $data -> save();

    
    
		return redirect()->route('masuk.index')->with('alert-success', 'Data berhasil diubah!');
		
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = masuk::where('id', $id)->first();
		/**$picture = $data->pic;
        File::delete('images/'.$picture);
		*/
		masuk::find($id)->delete();
        return back();
    }
    public function export_excel()
	{
		return Excel::download(new ExportExcel, 'data.xlsx');
	}
}
