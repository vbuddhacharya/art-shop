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
        Schema::create('features', function (Blueprint $table) {
            $table->id();
            $table->string('artist_name');
            $table->string('arts');
            $table->unsignedBigInteger('art_id');

            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreign('art_id')->references('id')->on('arts');
            $table->unsignedBigInteger('featureprice');


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
        Schema::dropIfExists('features');
    }
};
