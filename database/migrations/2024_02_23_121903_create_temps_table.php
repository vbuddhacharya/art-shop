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
        Schema::create('temps', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            // $table->foreignId('cart_id')->constrained()->onDelete('cascade');
            // $table->foreignId('art_id')->constrained()->onDelete('cascade');
            $table->unsignedBigInteger('art_id');
            $table->unsignedBigInteger('cart_id')->nullable()->default(NULL);
            $table->foreign('art_id')->references('id')->on('arts');
            $table->foreign('cart_id')->references('id')->on('carts');
            $table->string('pay_id')->nullable();
            $table->string('location');
            $table->string('contact');
            $table->unsignedBigInteger('quantity');
            $table->unsignedBigInteger('total');
            $table->string('artist_status')->default('Waiting');
            $table->string('status')->default('Pending');
            $table->string('payment')->default('Incomplete');
            $table->string('payment_method');
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
        Schema::dropIfExists('temps');
    }
};
