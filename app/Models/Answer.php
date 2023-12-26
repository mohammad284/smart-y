<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Answer extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'question_id',
        'answer'
    ];

    public function question()
    {
        return $this->belongsto('App\Models\Survey','question_id','id');
    }
}
