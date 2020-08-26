<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('courses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->unique();
            $table->string('slug');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('user_id');
            $table->integer('price');
            $table->integer('sale_price')->nullable();
            $table->string('image')->nullable();
            $table->string('video')->nullable();
            $table->mediumText('short_description');
            $table->text('description');
            $table->text('highlight')->nullable();
            $table->boolean('coming_soon')->default(false);
            $table->integer('duration')->nullable();
            $table->integer('videos')->nullable();
            $table->integer('projects')->nullable();
            $table->string('level')->nullable();
            $table->integer('enrollment')->default(0);
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('course_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
}
