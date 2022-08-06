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
        Schema::create('books', function (Blueprint $table) {
            $table->increments('book_id');
            $table->string('book_name');
            $table->longText('book_description');

            $table->string('book_format');
            $table->integer('book_pages');
            $table->integer('book_weight');
            $table->integer('book_publishing_year');

            $table->integer('book_price')->nullable();
            $table->integer('book_price_sale')->nullable();

            $table->integer('menu_id');
            $table->integer('publisher_id');
            $table->integer('author_id');

            $table->string('book_thumb');
            $table->integer('book_active');
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
        Schema::dropIfExists('books');
    }
};
