<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Customer;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['order_p_id', 'order_p_name', 'order_p_price', 'order_p_number'];

    public function customers() {
        return $this->belongsToMany('App\Models\Customer')->withTimestamps();

    }
}
