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
        Schema::create('cards', function (Blueprint $table) {
            $table->increments('id');
            $table->string('api_id');
            $table->string('mana_cost')->nullable();
            $table->string('name');
            $table->json('names')->nullable();
            $table->double('cmc')->nullable();
            $table->json('colors');
            $table->string('type');
            $table->json('types');
            $table->json('supertypes')->nullable();
            $table->json('subtypes')->nullable();
            $table->string('rarity');
            $table->string('set');
            $table->string('set_name');
            $table->text('text')->nullable();
            $table->string('artist');
            $table->string('number');
            $table->integer('power')->nullable();
            $table->integer('toughness')->nullable();
            $table->string('layout');
            $table->string('image_url')->nullable();
            $table->json('rulings')->nullable();
            $table->json('foreign_names')->nullable();
            $table->json('printings');
            $table->text('original_text')->nullable();
            $table->string('original_type')->nullable();
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
