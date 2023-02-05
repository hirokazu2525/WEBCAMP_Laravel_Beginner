<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('_user_id', function (Blueprint $table) {
            $table->string('name', 128);
            $table->string('email', 254)->unique();
            $table->string('password', 74);
        });
        //
            $table->collation = 'utf8mb4_bin';
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('_user_id');
    }
}
