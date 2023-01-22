<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->longText('q3');
            $table->longText('q6');
            $table->longText('q11');
            $table->longText('q12');
            $table->longText('q13');
            $table->longText('q14');
            $table->longText('q15');
            $table->longText('q16');
            $table->longText('q17');
            $table->longText('q18');
            $table->longText('q19');
            $table->longText('q20');
            $table->longText('q1');
            $table->longText('q2');
            $table->longText('q4');
            $table->longText('q5');
            $table->longText('q7');
            $table->longText('q8');
            $table->longText('q9');
            $table->longText('q10');
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
        Schema::dropIfExists('questions');
    }
}
