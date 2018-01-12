<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTopicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('topics', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('subject');
            $table->mediumText('content');
            $table->integer('published')->unsigned();
            $table->string('status', 10);

            $table->integer('morphable_id')->unsigned();
            $table->string('morphable_type');

            $table->integer('author_id')->unsigned();
            $table->string('author_type');

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
        Schema::dropIfExists('topics');
    }
}
