<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\masuk;
use App\Models\persediaan;
use App\Models\barangmasuk;
use App\Models\keluar;
use App\Models\barangkeluar;
use Image;
use File;
use Auth;
use PDF;


use Carbon\Carbon;
use App\Models\User;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExportExcel;

class persediaanController extends Controller
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
        $data=persediaan::all();
        $barangmasuk=barangmasuk::where("tanggal",">", Carbon::now()->subMonths(3))->groupBy('tanggal')->get();
        $barangmasuktd=[];
        $barangkeluar=barangkeluar::where("tanggal",">", Carbon::now()->subMonths(3))->groupBy('tanggal')->get();
        $barangkeluartd=[];

        foreach($barangmasuk as $b) {
            $barangmasuktd[$b->tanggal] = null;
        }
        foreach($barangmasuktd as $key => $value) {
            $currentDateItems = barangmasuk::where('tanggal', $key)->get();
            foreach($currentDateItems as $cur) {
                $barangmasuktd[$key]["key_" . $cur->barang_id] = $cur->masuk;
            }
        }
        foreach($barangkeluar as $c) {
            $barangkeluartd[$c->tanggal] = null;
        }
        foreach($barangkeluartd as $keys => $value) {
            $currentDateItemss = barangkeluar::where('tanggal', $keys)->get();
            foreach($currentDateItemss as $curs) {
                $barangkeluartd[$keys]["key_" . $curs->barang_id] = $curs->keluar;
            }
        }

        
        // dd($barangmasuktd["2022-04-28"]["key_1"]);
        return view('persediaan.index',compact('data','barangmasuk', 'barangmasuktd','barangkeluar','barangkeluartd'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		return view('persediaan.create');
		
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		
        
        $data = new persediaan;
		$data->nama = $request->nama;
        $data->tipe =  $request->tipe;
        $data->max =  $request->max;
        $data->satuan =  $request->satuan;
        $data->harga =  $request->harga;
        $data->jumlah = 0;
       
        $data -> save();

       
       


        // dd($anu);

        //request()->pic->move(public_path('assets/images'), $imageName);
        //return redirect('persediaan');
		
		return redirect()->route('persediaan.index')->with('alert-success', 'Berhasil Menambahkan Data!');
           
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $data['persediaan'] = persediaan::where('id', $id)->get();
	   return view('persediaan.lihat', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = persediaan::findOrFail($id);
        $soal = soal::where('persediaan_id',$id);
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
        $data = persediaan::where('id', $id)->first();

    

		$data->nama = $request->nama;
        $data->tipe = $request->tipe;
        $data->max = $request->max;
		$data->jumlah = $request->jumlah;
		$data->harga = $request->harga;
        $data->satuan = $request->satuan;
        $data->jumlah = $request->jumlah;


       

	
        $data -> save();

    
    
		return redirect()->route('persediaan.index')->with('alert-success', 'Data berhasil diubah!');
		
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = persediaan::where('id', $id)->first();
		/**$picture = $data->pic;
        File::delete('images/'.$picture);
		*/
		persediaan::find($id)->delete();
        return back();
    }
    public function export_excel()
	{
		return Excel::download(new ExportExcel, 'data.xlsx');
	}

    public function exportPDF() {

        $data=persediaan::all();
        $barangmasuk=barangmasuk::where("tanggal",">", Carbon::now()->subMonths(3))->groupBy('tanggal')->get();
        $barangmasuktd=[];
        $barangkeluar=barangkeluar::where("tanggal",">", Carbon::now()->subMonths(3))->groupBy('tanggal')->get();
        $barangkeluartd=[];

        foreach($barangmasuk as $b) {
            $barangmasuktd[$b->tanggal] = null;
        }
        foreach($barangmasuktd as $key => $value) {
            $currentDateItems = barangmasuk::where('tanggal', $key)->get();
            foreach($currentDateItems as $cur) {
                $barangmasuktd[$key]["key_" . $cur->barang_id] = $cur->masuk;
            }
        }
        foreach($barangkeluar as $c) {
            $barangkeluartd[$c->tanggal] = null;
        }
        foreach($barangkeluartd as $keys => $value) {
            $currentDateItemss = barangkeluar::where('tanggal', $keys)->get();
            foreach($currentDateItemss as $curs) {
                $barangkeluartd[$keys]["key_" . $curs->barang_id] = $curs->keluar;
            }
        }
        
        $pdf_doc = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('exportt_pdf', array('data' => $data,'barangmasuk' => $barangmasuk, 'barangmasuktd' => $barangmasuktd,'barangkeluar' => $barangkeluar,'barangkeluartd' => $barangkeluartd))->setPaper('a4', 'landscape');

        return $pdf_doc->download('persediaan.pdf');
        // return PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('reports.invoiceSell')->stream();
    }    
}
