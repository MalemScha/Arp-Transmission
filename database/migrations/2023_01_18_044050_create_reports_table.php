<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tower_id');
            $table->unsignedBigInteger('user_id');
            $table->string('image');
            $table->unsignedBigInteger('location_id');
            $table->unsignedBigInteger('q3');
            $table->unsignedBigInteger('q6');
            $table->unsignedBigInteger('q11')->nullable();
            $table->unsignedBigInteger('q12')->nullable();
            $table->unsignedBigInteger('q13')->nullable();
            $table->unsignedBigInteger('q14')->nullable();
            $table->unsignedBigInteger('q15')->nullable();
            $table->unsignedBigInteger('q16')->nullable();
            $table->unsignedBigInteger('q17')->nullable();
            $table->unsignedBigInteger('q18')->nullable();
            $table->unsignedBigInteger('q19')->nullable();
            $table->unsignedBigInteger('q20')->nullable();
            $table->boolean('q1');
            $table->boolean('q2');
            $table->boolean('q4');
            $table->boolean('q5');
            $table->boolean('q7');
            $table->boolean('q8');
            $table->boolean('q9');
            $table->boolean('q10');
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
        Schema::dropIfExists('reports');
    }
}
