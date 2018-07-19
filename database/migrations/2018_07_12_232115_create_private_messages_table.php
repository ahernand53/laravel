<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrivateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('private_messages', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('conversation_id');
            $table->unsignedInteger('user_id');
            $table->string('message');
            $table->timestamps();

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
        Schema::table('private_messages', function (Blueprint $table){
            $table->dropForeign('private_messages_conversation_id_foreign');
            $table->dropForeign('private_messages_user_id_foreign');
            $table->dropIfExists('private_messages');
        });
    }
}
