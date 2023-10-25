<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
   protected $fillable = [
    'meja',
    'tanggal',
    'user_id',
    'description',
    'total_harga',
    'status_order',
   ];
   public function user() {
    return $this->belongsTo('App\Models\User','user_id');
}

public function detail() {
    return $this->hasMany('App\Models\DetailOrder', 'order_id');
}
}
