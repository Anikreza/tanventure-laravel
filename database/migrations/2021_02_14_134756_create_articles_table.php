<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('title_en')->unique();
            $table->string('title_bn')->unique();
            $table->string('slug_en')->unique();
            $table->string('slug_bn')->unique();
            $table->longText('description_en');
            $table->longText('description_bn');
            $table->text('excerpt_en')->nullable();
            $table->text('excerpt_bn')->nullable();
            $table->string('image')->nullable();
            $table->string('image_disk')->nullable();
            $table->string('meta_title')->nullable();
            $table->boolean('published')->default(1);
            $table->boolean('featured')->default(0);
            $table->integer('viewed')->default(0);
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
        Schema::dropIfExists('articles');
    }
}
