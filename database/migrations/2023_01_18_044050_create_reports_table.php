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
            $table->unsignedBigInteger('line_id');
            $table->unsignedBigInteger('user_id');
            $table->string('image');
            $table->string('longitude');
            $table->string('latitude');
            $table->double('threshold')->nullable();
            $table->double('q3');
            $table->double('q6');
            $table->double('q11')->nullable();
            $table->double('q12')->nullable();
            $table->double('q13')->nullable();
            $table->double('q14')->nullable();
            $table->double('q15')->nullable();
            $table->double('q16')->nullable();
            $table->double('q17')->nullable();
            $table->double('q18')->nullable();
            $table->double('q19')->nullable();
            $table->double('q20')->nullable();
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
