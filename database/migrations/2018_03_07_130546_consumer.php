<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Consumer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consumer', function (Blueprint $table) {
            $table->increments('consumerId');
            $table->integer('groupId')->unsigned();
            $table->foreign('groupId')
                ->references('groupId')->on('group')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('login');
            $table->string('password');
            $table->string('email');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('consumer');
    }
}
