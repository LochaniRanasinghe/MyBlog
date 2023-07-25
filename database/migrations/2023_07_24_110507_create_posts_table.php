<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            //When the users table is deleted, all the listings associated with that user will be deleted as well.
            //constrained means that the foreign key is constrained by another table's primary key.
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            
            //unsigned means that the value must be positive
            // $table->bigInteger("user_id")->unsigned();
            $table->string("title");
            $table->text("description");
            $table->timestamps();
            //Creating the relationship between the user and the post
            //onDelete("cascade") means that if the user is deleted, all the posts of that user will be deleted
            // $table->foreign("user_id")->references("id")->on("users")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}