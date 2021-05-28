<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $primaryKey = 'p_id';

    protected $table = "products";
    protected $fillable = ['p_name', 'p_detail', 'p_price', 'image1', 'image2', 'image3'];

}
