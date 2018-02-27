<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTopicCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('topic_comments', function (Blueprint $table) {
            $table->integer('reply_to_id')->unsigned()->nullable();
            $table->string('reply_to_type')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('topic_comments', function (Blueprint $table) {
            $table->dropColumn(['reply_to_id', 'reply_to_type']);
        });
    }
}
