<?php

namespace App\Http\Controllers;

use App\Models\Masakan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MasakanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $masak = Masakan::orderBy('created_at', 'desc')->paginate(20);
        $data = array('title' =>'Data Masakan',
                        'masak' => $masak);
        return view('masakan.index',$data)->with('no', ($request->input('page', 1) - 1) * 20);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('masakan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([

            'nama_masakan' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'deskripsi' => 'required',
            'harga' => 'required|numeric',
        ]);
        $user = $request->user();
        $image = $request->file('gambar');
        $image->storeAs('public/posts/', $image->hashName());

        $create = Masakan::create([
            'nama_masakan' => $request->nama_masakan,
            'gambar' => $image->hashName(),
            'deskripsi'  => $request->deskripsi,
            'harga' => $request->harga,
            'status_masakan' => 'tersedia',
        ]);
        if ($create) {
            return redirect()->route('masakan.index')->with('success', 'anjay mabar');

        }
        else {
            return redirect()->route('masakan.index')->with('error', 'timdak epik');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $masak = Masakan::findorfail($id);
        $data = array(
            'title' => 'ubah masakan',
            'masak' => $masak,
        );
        return view('masakan.edit', $data);
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
        $request->validate([
            
            'nama_masakan' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required|numeric',
        ]);
        $masak = Masakan::findorfail($id);
        if($request->file('gambar') == "") {
            $masak->update([
                'nama_masakan'     => $request->nama_masakan,
                'deskripsi'   => $request->deskripsi,
                'harga' => $request->harga,
            ]);
        }
        else{
            Storage::disk('local')->delete('public/posts'. $masak->gambar);
            $image = $request->file('gambar');
            $image->storeAs('public/posts/', $image->hashName());
            $masak->update([
                'nama_masakan' => $request->nama_masakan,
                'gambar' => $image->hashName(),
                'deskripsi'  => $request->deskripsi,
                'harga' => $request->harga,
            ]);
        }
        if ($masak) {
            return redirect()->route('masakan.index')->with('success','yes sir');
        }
        else{
            return redirect()->route('masakan.index')->with('error','no sir');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $masak = Masakan::findorfail($id);
        if($masak->delete()){
            return back()->with('success','masakan dihapus');

        }
        else{
            return back()->with('error','masakan gagal dihapus');
        }
    }
}
