<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use  App\Models\User;
use  App\Models\Level;
use  App\Models\kelas;
use Image;
use File;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::where('level_id', 2 )->get();
		// $data = User::all();
        return view('user.index', compact('data'));
    }

    public function create()
    {
        $data = kelas::all();
        return view('user.add', compact('data'));
    }


	public function store(Request $req)
    {
        if ($req->file('image')) {
            $image = $req->file('image');

            $file_name = time(). rand(1111, 9999) . '.' .$image->getClientOriginalExtension();

            // $save_Path = 'images/'.$file_name;
            //$save_Path = public_path('images/'.$file_name);

            //Image::make($image->getRealPath())->resize(300, 236)->save($save_Path);
            $image->move('images',$file_name);
            \Image::make('images/'.$file_name)->save('images/'.$file_name);
        } else {
            $file_name = null;
        }

          
            $simpan=new User;
		    $simpan->level_id = 1;
            $simpan->class_id = $req->input('class_id');
            $simpan->name = $req -> input('name');
            $simpan->email = $req ->input('email');
            $simpan->password = hash::make($req->input('password'));
            $simpan->images = $file_name;

            $simpan->save();

		return redirect()->route('user.index')->with('alert-success', 'Berhasil Menambahkan Data!');
    }
    

    public function show($id)
    {
        $data = User::findOrFail($id);
        $class= kelas::get();
        return view('user.show', compact('data', 'class'));
    }

    public function edit($id)
    {
        $data = User::findOrFail($id);
        $class= kelas::get();
        $level = Level::get();
        return view('user.edit', compact('data', 'class','level'));
    }

    public function update(Request $request, $id)
    {
        $data = User::findOrFail($id);
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
        return redirect()->route('user.index')->with('alert-success', 'Berhasil Update Data!');
    }

    public function destroy($id)
    {
        $data = User::findOrFail($id);
        $data->delete();
        return redirect()->route('user.index')->with('alert-success', 'Berhasil Hapus Data!');
    }
}
