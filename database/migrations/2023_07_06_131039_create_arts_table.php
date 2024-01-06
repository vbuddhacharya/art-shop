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
        Schema::create('arts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image');
            $table->string('size');
            $table->string('material');
            $table->string('category');
            $table->text('description');
            $table->text('time');
            $table->boolean('hasFrame');
            $table->unsignedBigInteger('price');
            $table->unsignedBigInteger('stock');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('arts');
    }
};
