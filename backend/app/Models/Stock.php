<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;
    protected $primaryKey = 'stock_id';

    protected $table = "stocks";
    protected $fillable = ['stock_id', 'stock_p_id', 'stock_p_name', 'stock_p_price', 'stock_number'];
}
