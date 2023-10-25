<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserkasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        {
            $user = User::orderBy('created_at', 'desc')->paginate(20);
            $data = array('title' =>'Data User',
                            'user' => $user);
            return view('userkas.index',$data)->with('no', ($request->input('page', 1) - 1) * 20);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('userkas.create');

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
            'name' => 'required',
            'email' => 'required:unique',
            'password' => 'required',
            'role' => 'required',
        ]);

    $create = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'role' => $request->role,
    ]);
    if ($create) {
        return redirect()->route('userkas.index')->with('success','brhasil masbro');
    }
    else {
        return redirect()->route('userkas.index')->with('error','gagal masbro');
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
        $user = User::findorfail($id);
        $data = array(
            'title' => 'ubah user',
            'user' => $user,
        );
        return view('userkas.edit', $data);
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
        $user = User::findorfail($id);
        $user->update([
            'name'     => $request->name,
            'email'   => $request->email,
            'password' =>  Hash::make($request->password),
            'role'  => $request->role,
        ]);
        if($user){
            return redirect()->route('userkas.index')->with('success','brhasil masbro');
        }
        else{
            return redirect()->route('userkas.index')->with('error','gagal masbro');
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
        $user = User::findOrFail($id);
        if ($user->delete()) {
            return back()->with('success', 'berasil dihapus');
        }
        else{
            return back()->with('error', 'gagal dihapus');
        }
    }
}
