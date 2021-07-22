<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\HomeController;

class Comment extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';

    public function post(){
        return $this->belongsTo(Post::class);
    }

    public function theComment(){
        return $this->hasOne(Post::class);
    }
}