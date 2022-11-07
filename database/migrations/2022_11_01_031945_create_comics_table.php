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

            $table->foreignId('comic_genre_id')->nullable()
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->string('comic_title', 100);
            $table->string('comic_slug', 100);
            $table->string('comic_author', 100);
            $table->string('comic_artist', 100);
            $table->string('comic_rating', 100);
            $table->date('comic_released');
            $table->string('comic_cover', 255)->nullable()->default('default.jpg');
            $table->longText('comic_alternative')->nullable();
            $table->longText('comic_sinopsis')->nullable();

            $table->enum('is_active', ['Publish', 'Unpublish']);

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
