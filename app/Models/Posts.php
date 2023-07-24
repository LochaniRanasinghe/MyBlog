<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Posts extends Model
{
    use HasFactory;
    //protected $table = "posts";
    protected $fillable = [
        "title",
        "description",
    ];

    //Creating the relationship between the user and the post
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}