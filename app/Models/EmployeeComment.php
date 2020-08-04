<?php

namespace App\Models;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmployeeComment extends Model
{
    //

    use SoftDeletes;

    public $table = 'employee_comments';

    public $fillable = [
        'appraisal_id',
        'message'
    ];

    public $dates = ['deleted_at'];

    public function comment()
    {
        return $this->belongsTo(Comment::class);
    }
}
