<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComicVolumesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::create('comic_volumes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('comic_id')
                ->nullable()
                ->onUpdate('cascade')->onDelete('cascade');
            $table->string('volume_name');
            $table->string('volume_link');
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
        Schema::dropIfExists('comic_volumes');
    }
}
