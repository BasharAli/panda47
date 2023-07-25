<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSingleAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('single_ads', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('title');
            $table->text('img1');
            $table->text('img2');
            $table->string('short_desc_1');
            $table->string('short_desc_2');
            $table->longText('link');
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
        Schema::dropIfExists('single_ads');
    }
}
