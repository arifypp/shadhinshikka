<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentTransictionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_transictions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('amount');
            $table->unsignedBigInteger('courses_id');
            $table->unsignedBigInteger('users_id');
            $table->unsignedBigInteger('adm_id');
            $table->string('traxid');
            $table->string('phone');
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('adm_id')->references('id')->on('admissions')->onDelete('cascade');
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
        Schema::dropIfExists('payment_transictions');
    }
}
