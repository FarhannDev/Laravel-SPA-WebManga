<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::create('comics', function (Blueprint $table) {
            $table->id();
            $table->string('comic_title', 255);
            $table->string('comic_genre', 255)->nullable();
            $table->string('comic_slug', 255)->unique();
            $table->string('comic_author', 100);
            $table->string('comic_artist', 100);
            $table->string('comic_rating', 100)->nullable();
            $table->dateTime('comic_released')->nullable();
            $table->enum('comic_status', ['Ongoing', 'Completed'])->default('Ongoing');
            $table->string('comic_cover', 255)->default('default.jpg');
            $table->string('comic_link_cover', 255)->nullable();
            $table->longText('comic_alternative')->nullable();
            $table->longText('comic_sinopsis')->nullable();
            $table->enum('status', ['Publish', 'Unpublish'])->default('Publish');
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
        Schema::dropIfExists('comics');
    }
}
