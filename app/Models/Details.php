<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Details extends Model
{
    protected $table = 'details';
    public function products_details()
    {
        return $this->belongsTo('App\Models\Product', 'product_id', 'id');
    }
}