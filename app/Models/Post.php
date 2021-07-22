<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $fillable = [
        'title','content'
    ];
    // protected $with = ['comments'];

    public function comments(){
        return $this->hasMany(Comment::class);
    }
    
    public function thePost(){
        return $this->belongsTo(Comment::class);
    }
}
