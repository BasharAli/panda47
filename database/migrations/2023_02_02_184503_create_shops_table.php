<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->id();
            $table->string('shopname');
            $table->string('shop_slogan')->nullable();
            $table->string('shop_email')->nullable();
            $table->string('shop_phone')->nullable();
            $table->string('type')->nullable();
            $table->string('tckn')->nullable();
            $table->string('city')->nullable();
            $table->string('district')->nullable();
            $table->string('taxid')->nullable();
            $table->string('slug')->unique();
            $table->string('shop_logo')->nullable();
            $table->string('shop_cover')->nullable();
            $table->longText('shop_description')->nullable();
            $table->enum('shop_status', ['pending' , 'active'])->default('pending');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shops');
    }
}
