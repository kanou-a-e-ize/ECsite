<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;

class Customer extends Model
{
    use HasFactory;
    protected $primaryKey = 'customer_id';

    protected $table = "customers";
    protected $fillable = ['customer_id', 'c_name', 'c_name_kana', 'postcode', 'prefecture', 'city', 'street', 'c_phone', 'c_mail'];

    public function orders() {
        return $this->belongsToMany('App\Models\Order', 'customer_order', 'customer_id', 'order_id');

    }
}


