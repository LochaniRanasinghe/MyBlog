<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Posts extends Model
{
    use HasFactory;
    //to avoid mass assignment error
    /*mass assignment error occurs when we try to insert data into the database using the create() method and the data 
    we are trying to insert is not in the fillable array in the model then we get the mass assignment error*/
    //mass assignment error is a security feature in laravel

    /*To avoid declaring fillable we can use "guarded property"
    We can simply unguard all the fields by "Model::unguard() method" in the AppServiceProvider.php file
    
    It means that we are allowing mass assignment and we need not to require to add the fillable*/
    
     
    protected $fillable = [
        "title",
        "description",
        "user_id",
    ];

    //Creating the relationship between the user and the post
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}