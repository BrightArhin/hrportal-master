<?php

namespace App\Models;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SupervisorComment extends Model
{
    //
    use SoftDeletes;

    public $table = 'supervisor_comments';

    public $fillable = [
        'comment_id',
        'development_prospects',
        'require_training'
    ];

    public $dates = ['deleted_at'];

    public function comment(){
        return $this->belongsTo(Comment::class);
    }
}
