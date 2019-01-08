<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cards', function (Blueprint $table) {
            $table->increments('id');
            $table->string('api_id');
            $table->integer('multiverseid');
            $table->string('manacost');
            $table->double('cmc');
            $table->json('colors');
            $table->string('colorIdentity');
            $table->string('type');
            $table->string('supertype')->nullable();
            $table->string('types');
            $table->string('rarity');
            $table->string('set');
            $table->string('set_name');
            $table->text('text');
            $table->string('artist');
            $table->string('number');
            $table->integer('power')->nullable();
            $table->integer('toughness')->nullable();
            $table->string('layout');
            $table->string('image_url')->nullable();
            $table->string('watermark');
            $table->json('rulings')->nullable();
            $table->json('foreign_names')->nullable();
            $table->json('printings');
            $table->string('original_text');
            $table->string('original_type');
            $table->json('legalities');
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
        Schema::drop('cards');
    }
}
