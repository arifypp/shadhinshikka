<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseResourcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_resources', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->unsignedBigInteger('crcourse_id')->nullable();
            $table->foreign('crcourse_id')->references('id')->on('courses')->onDelete('cascade');
            $table->enum('status', ['Active', 'Inactive'])->default('Active');
            $table->timestamps();
        });

        Schema::create('course_resources_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('video_url')->nullable();
            $table->string('document_url')->nullable();
            $table->text('text_describe')->nullable();
            $table->string('video_duration')->nullable();
            $table->enum('resourcetype', ['free', 'paid'])->default('paid');
            $table->unsignedBigInteger('resource_id');
            $table->foreign('resource_id')->references('id')->on('course_resources')->onDelete('cascade');
            $table->enum('type', ['video', 'document', 'text']);
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
        Schema::dropIfExists('course_resources');
        Schema::dropIfExists('course_resources_items');
    }
}
