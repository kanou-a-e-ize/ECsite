<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $primaryKey = 'c_id';

    protected $table = "customers";
    protected $fillable = ['c_id', 'c_name', 'c_name_kana', 'postcode', 'prefecture', 'city', 'street', 'c_phone', 'c_mail'];
}
