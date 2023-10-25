<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailOrder extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_id',
        'masakan_id',
        'description',
        'status_detail',

    ];
    /**
     * Get the user that owns the DetailOrder
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function order()
    {
        return $this->belongsTo('App\Models\Order', 'order_id');
    }
    public function masakan()
    {
        return $this->belongsTo('App\Models\Masakan', 'masakan_id');
    }
    
}
