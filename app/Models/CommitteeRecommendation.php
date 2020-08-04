<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CommitteeRecommendation extends Model
{
    //
    //
    use SoftDeletes;

    public $table = 'committee_recommendations';

    public $fillable = [
        'comment_id',
        'recommendation',
    ];

    public $dates = ['deleted_at'];

    public function comment(){
        return $this->belongsTo(Comment::class);
    }
}
