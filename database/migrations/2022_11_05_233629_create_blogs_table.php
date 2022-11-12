<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->string('blog_name');
            $table->string('blog_slug');
            $table->longText('blog_desc');
            $table->string('blog_cover', 255)->default('default.jpg');
            $table->enum('status', ['Publish', 'Unpublish'])->default('Publish');
            $table->dateTime('publish_date')->nullable();
            $table->dateTime('unpublish_date')->nullable();
            $table->string('publish_by')->nullable();
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
        Schema::dropIfExists('blogs');
    }
}
