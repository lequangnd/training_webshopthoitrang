<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $table = 'bill';
    public function users()
    {
        return $this->belongsTo('App\Models\User', 'users_id', 'id');
    }

    public function details()
    {
        return $this->hasMany('App\Models\Details', 'bill_id', 'id');
    }
}