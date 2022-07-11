<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'user_posts';
    protected $fillable = ['user_id','text'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
