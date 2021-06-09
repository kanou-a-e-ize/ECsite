<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = ['c_name', 'c_name_kana', 'c_phone', 'c_mail', 'postcode', 'address'];

    public function orders() {
        return $this->belongsToMany('App\Models\Order')->withTimestamps();           
    }
}


