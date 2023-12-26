<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class UserSurvey extends Model
{
    use HasFactory , SoftDeletes;
    protected $fillable = [
        'question_id',
        'answer_id',
        'user_id'
    ];
    
    public function question()
    {
        return $this->belongsTo('App\Models\Survey','question_id','id');
    }
    public function answer()
    {
        return $this->belongsTo('App\Models\Answer','answer_id','id');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id','id');
    }
}
