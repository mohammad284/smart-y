<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class SessionUser extends Model
{
    use HasFactory , SoftDeletes;
    protected $fillable = [
        'user_id',
        'session_id'
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
