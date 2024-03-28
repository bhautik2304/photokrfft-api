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
        Schema::create('sampleorderpermissionstatuses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customers_id');
            $table->unsignedBigInteger('orders_id');
            $table->unsignedBigInteger('products_id');
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
        Schema::dropIfExists('sampleorderpermissionstatuses');
    }
};
