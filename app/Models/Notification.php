<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Notification extends Model
{
    use HasFactory , SoftDeletes;
    protected $fillable = [
        'nots',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsto('App\Models\User','user_id','id');
    }
}
