<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFollowersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('followers', function (Blueprint $table) {
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('followed_id');
            $table->primary(['user_id', 'followed_id']);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('followed_id')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('followers', function (Blueprint $table){
            $table->dropForeign('followers_user_id_foreign');
            $table->dropForeign('followers_followed_id_foreign');
            $table->dropIfExists('followers');
        });
    }
}
