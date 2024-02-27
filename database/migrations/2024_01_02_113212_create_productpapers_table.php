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
        Schema::create('productpapers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_size_id')->constrained()->onDelete('cascade');
            $table->foreignId('paper_id')->constrained('papers');
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
        Schema::dropIfExists('productpapers');
    }
};
