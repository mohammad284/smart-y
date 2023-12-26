<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Session extends Model
{
    use HasFactory , SoftDeletes;
    protected $fillable = [
        'template_id',
        'start_date',
        'end_date',
        'max_members',
        'price'
    ];

    public function template()
    {
        return $this->belongsto('App\Models\Template','template_id','id');
    }
}
