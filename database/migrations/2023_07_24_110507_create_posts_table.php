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
            //unsigned means that the value must be positive
            $table->bigInteger("user_id")->unsigned();
            $table->string("title");
            $table->text("description");
            $table->timestamps();
            //Creating the relationship between the user and the post
            //onDelete("cascade") means that if the user is deleted, all the posts of that user will be deleted
            $table->foreign("user_id")->references("id")->on("users")->onDelete("cascade");
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