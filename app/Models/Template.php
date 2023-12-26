<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Template extends Model
{
    use HasFactory , SoftDeletes;
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'image'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id','id');
    }
    public function session()
    {
        return $this->hasMany('App\Models\Session','template_id','id');
    }
}
