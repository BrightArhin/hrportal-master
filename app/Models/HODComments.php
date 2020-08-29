<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HODComments extends Model
{
    use SoftDeletes;

    public $table = 'h_o_d_comments';

    public $fillable = [
        'comment_id',
        'message'
    ];

    public $dates = ['deleted_at'];

    public function comment()
    {
        return $this->belongsTo(Comment::class);
    }
}
