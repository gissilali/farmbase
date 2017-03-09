<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ads', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('title');
            $table->integer('category_id')->nullable();
            $table->string('description')->nullable();
            $table->float('price')->nullable();
            $table->boolean('negotiable')->default(false)->nullable();
            $table->string('phone')->nullable();
            $table->string('location')->nullable();
            $table->string('image_url')->nullable();
            $table->boolean('public')->default(false)->nullable();
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
        Schema::dropIfExists('ads');
    }
}
