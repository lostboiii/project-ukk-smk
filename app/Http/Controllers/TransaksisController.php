<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\DetailOrder;
use Illuminate\Http\Request;

class TransaksisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = DetailOrder::where('status_detail', 'dipesan')->get();
        $data = array(
            'title' => 'transaksi',
            'orders' => $orders,
        );
        return view('transaksis.index',$data)->with('no', 1);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function selesai()
    {
        $orders = Order::all();
        $data = array(
            'title' => 'transaksi',
            'orders' => $orders,
        );
        return view('transaksis.selesai',$data)->with('no', 1);
    }
    public function sukses($id)
    {
        $order = Order::findOrFail($id);
        $order->update([
            'status_order' => 'selesai',
        ]);
        return back()->with('success', 'mantap geming');
    }
    public function laporan()
    {
        $orders = Order::where('status_order', 'selesai')->get();
        $data = array(
            'title' => 'transaksi',
            'orders' => $orders,
        );
        return view('transaksis.laporan',$data)->with('no', 1);
    }
    public function print($id)
    {
        $orders = Order::findOrFail($id);
        $data = array(
            'title' => 'struk',
            'orders' => $orders,
        );
        return view('transaksis.print',$data);
    }
}
