<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\DetailOrder;
use Illuminate\Http\Request;

class TransaksiController extends Controller
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
        return view('transaksi.index',$data)->with('no', 1);
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
    public function update($id)
    {
        $order = DetailOrder::findOrFail($id);
        $order->update([
            'status_detail' => 'selesai',
        ]);
        return back()->with('success', 'mantap geming');
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
        $cari = $request->query('key');
        $tot = Order::sum('total_harga');
        $data = array(
            'title' => 'transaksi',
            'orders' => $orders,
            'tot' => $tot,
        );
        return view('transaksi.selesai',$data)->with('no', 1);
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
        $tot = Order::sum('total_harga');
        $data = array(
            'title' => 'transaksi',
            'orders' => $orders,
            'tot' => $tot,
        );
        return view('transaksi.laporan',$data)->with('no', 1);
    }
    public function print($id)
    {
        $orders = Order::findOrFail($id);
        $order_detail = DetailOrder::all();
        $order = Order::where('user_id', auth()->user()->id)
        ->where('status_order', 'selesai')
        ->get();
        $data = array(
            'title' => 'struk',
            'orders' => $orders,
            'order_detail' => $order_detail,
            'order' => $order,
        );
        return view('transaksi.print',$data);
    }
}
