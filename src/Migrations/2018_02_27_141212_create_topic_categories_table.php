<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTopicCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('topic_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->integer('topic_category_id')->unsigned()->nullable();
            $table->tinyInteger('level')->unsigned();

            $table->timestamps();
        });

        Schema::table('topic_categories', function (Blueprint $table) {
            $table->foreign('topic_category_id')->references('id')->on('topic_categories')->onDelete('cascade');
        });

        Schema::create('topics_to_topic_categories', function (Blueprint $table) {
            $table->integer('topic_category_id')->unsigned();
            $table->bigInteger('topic_id')->unsigned();

            $table->primary(['topic_id', 'topic_category_id']);

            $table->foreign('topic_category_id')->references('id')->on('topic_categories')->onDelete('cascade');
            $table->foreign('topic_id')->references('id')->on('topics')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('topics_to_topic_categories');
        Schema::dropIfExists('topic_categories');
    }
}
