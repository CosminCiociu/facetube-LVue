<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('video', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('imageUrl');
            $table->string('folderName');
            $table->string('videoUrl');
<<<<<<< HEAD
            $table->dateTime('dateCreated')->useCurrent();
            $table->integer('views')->nullable();
            $table->string('duration');
            $table->integer('likes')->nullable();
            $table->integer('category_id')->nullable();
=======
            $table->integer('views')->default(0);
            $table->string('duration')->nullable(true);
            $table->integer('likes')->default(0);
>>>>>>> main
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('video');
    }
}
