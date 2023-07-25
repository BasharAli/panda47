<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTwinAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('twin_ads', function (Blueprint $table) {
            $table->id();
            $table->string('ad_name')->nullable();
            $table->string('title')->nullable();
            $table->string('short_desc')->nullable();
            $table->text('image')->nullable();
            $table->longText('link')->nullable();
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
        Schema::dropIfExists('twin_ads');
    }
}
