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
        Schema::create('authors', function (Blueprint $table) {
            $table->increments('author_id');
            $table->string('author_name', 255);
            $table->string('author_thumb');
            $table->longText('author_description')->nullable();
            $table->integer('author_active');
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
        Schema::dropIfExists('authors');
    }
};
$table->increments('new_id');
            $table->string('new_title', 255);
            $table->string('new_thumb');
            $table->text('new_description');
            $table->longText('new_content');
            $table->integer('new_active');
            $table->timestamps();