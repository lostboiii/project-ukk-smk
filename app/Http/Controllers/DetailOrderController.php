<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Order;
use App\Models\Masakan;
use App\Models\DetailOrder;
use Illuminate\Http\Request;

class DetailOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       $user = $request->user();
       $order = Order::where('user_id', auth()->user()->id)
                        ->where('status_order', 'proses')
                        ->get();
        $order_detail = DetailOrder::all();
        $data = array(
            'title' => 'Order list',
            'order' => $order,
            'order_detail' => $order_detail,
        );
       return view('order.list',$data)->with('no', 1);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('order.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'masakan_id' => 'required',

        ]);
       $create = DetailOrder::create([

        'order_id' => $request->order_id,
        'masakan_id' => $request->masakan_id,
        'description' => $request->description,
       ]);
       if($create){
        $masakan = Masakan::findOrFail($request->masakan_id);
        $total = $create->order->total_harga;

        $total = $total + $masakan->harga;
        if ($create->order->update(['total_harga' => $total])) {
            return back()->with('success', 'Pesanan berhasil ditambahkan');
        } else {
            return back()->with('error', 'Pesanan gagal ditambahkan');
        }
       }
       else {
        return back()->with('error', 'Pesanan gagal ditambahkan');
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
}
