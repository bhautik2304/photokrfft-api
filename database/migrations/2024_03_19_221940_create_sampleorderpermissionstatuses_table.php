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
            $table->foreignId('customers_id')->constrained('customers')->onDelete('cascade');
            $table->foreignId('orders_id')->constrained('orders')->onDelete('cascade');
            $table->foreignId('products_id')->constrained('products')->onDelete('cascade');
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
