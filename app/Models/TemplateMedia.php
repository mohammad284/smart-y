<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class TemplateMedia extends Model
{
    use HasFactory , SoftDeletes;
    protected $fillable = [
        'template_id',
        'media'
    ];

    public function template()
    {
        return $this->belongsTo('App\Models\Template','template_id','id');
    }
}
