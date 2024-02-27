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
        Schema::create('productboxsleeves', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_size_id')->constrained()->onDelete('cascade');
            $table->foreignId('boxsleeve_id')->constrained('boxsleeves');
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
        Schema::dropIfExists('productboxsleeves');
    }
};
