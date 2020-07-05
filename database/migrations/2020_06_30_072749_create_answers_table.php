<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answers', function (Blueprint $table) {
            $table->id();
            $table->integer('question_id')->unsigned();
            $table->text('content');
            $table->timestamps();

            $table->foreign('question_id')->references ('id')->on('questions')->onDelete('cascade');//on table
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //in case we need to drop the table, drop the FK key first
        Schema::table('answers', function (Blueprint $table){
            $table->dropForeign('answers_id_foreign');
        });

        Schema::dropIfExists('answers');
    }
}
