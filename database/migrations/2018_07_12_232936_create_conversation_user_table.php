<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConversationUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conversation_user', function (Blueprint $table) {
            $table->unsignedInteger('conversation_id');
            $table->unsignedInteger('user_id');

            $table->primary(['conversation_id', 'user_id']);

            $table->foreign('conversation_id')->references('id')->on('conversations');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('conversation_user', function (Blueprint $table){
            $table->dropForeign('conversation_user_conversation_id_foreign');
            $table->dropForeign('conversation_user_user_id_foreign');
            $table->dropIfExists('conversation_user');
        });
    }
}
