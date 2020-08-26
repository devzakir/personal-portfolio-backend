<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_videos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('slug');
            $table->double('video_time')->nullable();
            $table->string('type')->nullable();
            $table->string('video')->nullable();
            $table->string('download_url')->nullable();
            $table->integer('download_count')->nullable();
            $table->boolean('coming_soon')->default(false);
            $table->unsignedBigInteger('course_id');
            $table->unsignedBigInteger('section_id');
            $table->timestamps();
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
            $table->foreign('section_id')->references('id')->on('course_sections')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('course_videos');
    }
}
