<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use  App\Models\kelas;
use  App\Models\meetingname;
use Image;
use File;
use App\Models\meeting;

class kelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$data = kelas::whereNotIn('level_id', [1, 5])->get();
		$data = kelas::all();
        return view('kelas.index', compact('data'));
    }

    public function create()
    {
        $data = kelas::all();
        return view('kelas.add', compact('data'));
    }


	public function store(Request $req)
    {
       
            $simpan=new kelas;
            $simpan->name = $req -> input('name');

            $simpan->save();

            $pertemuans=meeting::all();
            $idx = "$simpan->name - PERTEMUAN 01";
            foreach($pertemuans as $pertemuan) {
           
                $data = new meetingname;
                $data->name = $idx++;
                $data->pertemuan_id = $pertemuan->id;
                $data->class_id = $simpan->id;
                $data->status = 0;

                $data->save();
            }

		return redirect()->route('kelas.index')->with('alert-success', 'Berhasil Menambahkan Data!');
    }
    

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $data = kelas::findOrFail($id);
        return view('kelas.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = kelas::findOrFail($id);
        $data->name = $request->name;

          $data->save();
        return redirect()->route('kelas.index')->with('alert-success', 'Berhasil Update Data!');
    }

    public function destroy($id)
    {
        $data = kelas::findOrFail($id);
        $data->delete();
        return redirect()->route('kelas.index')->with('alert-success', 'Berhasil Hapus Data!');
    }
}
