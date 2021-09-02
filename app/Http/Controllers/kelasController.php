<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use  App\Models\kelas;
use Image;
use File;

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
        $input = $request->all();
        

        if ($request->hasFile('image')){
            $image_path = public_path("/images".$data->images);
            if (File::exists($image_path)) {
                File::delete($image_path);
            }
            $bannerImage = $request->file('image');
            $imgName = $bannerImage->getClientOriginalName();
            $destinationPath = public_path('/images');
            $bannerImage->move($destinationPath, $imgName);
          } else {
            $imgName = $data->images;
          }
          $data->update($input);
          $data->images = $imgName;
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
