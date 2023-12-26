<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Coupon extends Model
{
    use HasFactory , SoftDeletes;
    protected $fillable = [
        'session_id',
        'user_id',
        'name',
        'discount'
    ];

    public function user()
    {
        return $this->belongsto('App\Models\User','user_id','id');
    }
    public function session()
    {
        return $this->belongsto('App\Models\Session','session_id','id');
    }
}
