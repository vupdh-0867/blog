<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\User;

class Post extends Model
{
    protected $fillable = [
        'title', 'content',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
