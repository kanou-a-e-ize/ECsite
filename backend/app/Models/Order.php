<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $primaryKey = 'order_id';

    protected $table = "orders";
    protected $fillable = ['order_id', 'order_p_id', 'order_p_name', 'order_p_price', 'order_p_number'];
}
