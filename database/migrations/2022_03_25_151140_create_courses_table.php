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
            $table->increments('id');
            $table->string('name');
            $table->string('slug');
            $table->integer('student_capacity')->default('0');
            $table->string('batch_no');
            $table->string('class_count');
            $table->unsignedBigInteger('teacher');
            $table->foreign('teacher')->references('id')->on('users');
            $table->string('start_on')->nullable();
            $table->string('end_on')->nullable();
            $table->string('class_location')->nullable();
            $table->string('price')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
        });

        Schema::create('courses_item', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('course_id');
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
            $table->string('name')->nullable();
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
        Schema::dropIfExists('courses');
        Schema::dropIfExists('courses_item');
    }
}
