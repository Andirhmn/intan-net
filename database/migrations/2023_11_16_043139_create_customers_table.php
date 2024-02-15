<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('customer_id');
            $table->string('name');
            $table->string('status')->default('active');
	    $table->unsignedBigInteger('service');
	    $table->foreign('service')->references('id')->on('services');
            $table->text('alamat');
            $table->string('pic');
            $table->string('phone');
            $table->unsignedBigInteger('tower');
            $table->foreign('tower')->references('id')->on('bts');
            $table->string('access_point');
            $table->string('radio');
            $table->string('ip_address_radio');
            $table->string('username_radio');
            $table->string('password_radio');
            $table->string('router');
            $table->string('ip_address_router');
            $table->string('username_router');
            $table->string('password_router');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
