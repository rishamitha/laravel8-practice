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
            $table->string('title', 50);
            $table->string('description', 500);
            $table->string('password')->nullable();
            $table->string('image', 50);
            $table->timestamps(); //add created_at and updated_at columns
            $table->softDeletes(); //add deleted_at column

            // $table->unsignedBigInteger('user_id')->references('id')->on('users');
            //the code above can be rewritten as below
            $table->foreignId('user_id')
                  ->nullable()
                  ->constrained() //column modifiers must be written before this
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
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
