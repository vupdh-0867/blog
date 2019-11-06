<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\User;
use App\Model\Post;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

class Comment extends Model
{
    use SoftDeletes;

    protected $table = 'comments';
    protected $fillable = [
        'content', 'user_id', 'post_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function post(){
        return $this->belongsTo(Post::class);
    }

    public function getCreatedAtAttribute($value)
    {
        return Carbon::createFromTimeStamp(strtotime($value))->diffForHumans();
    }
}
