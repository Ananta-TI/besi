<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Article extends Model
{
    protected $fillable = ['title', 'content', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
