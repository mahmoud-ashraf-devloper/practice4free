<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('room_user', function (Blueprint $table){
            $table->unsignedBigInteger('user_id')->unique()->index();
            $table->foreign('user_id')->references('id')->on('users');

            $table->string('room_id');
            $table->foreign('room_id')->references('id')->on('rooms');

            $table->boolean('is_co_owner')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('room_user');
    }
};
