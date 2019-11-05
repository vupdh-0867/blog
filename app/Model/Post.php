<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\User;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;

    protected $table = 'posts';
    protected $fillable = [
        'title', 'content', 'user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function scopeNewest($query){
        return $query->orderBy('created_at', 'desc');
    }
}
