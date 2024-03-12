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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_no');
            $table->date('order_date');
            $table->enum('pritnig_price_type',['print_bind','design_print_bind']);
            $table->unsignedBigInteger('pritnig_price')->default(0);
            $table->enum('payment_status', ['pending', 'paid', 'credit'])->default('pending');
            $table->enum('order_status', ['pending', 'processing', 'completed', 'cancel'])->default('pending');
            $table->unsignedBigInteger('user_id');
            $table->foreignId('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreignId('product_orientation_id')->references('id')->on('productorientations')->onDelete('cascade');
            $table->foreignId('product_size_id')->references('id')->on('product_sizes')->onDelete('cascade');
            $table->foreignId('product_sheet_id')->references('id')->on('productsheets')->onDelete('cascade');
            $table->foreignId('productpapers_id')->references('id')->on('productpapers')->onDelete('cascade');
            $table->foreignId('productcovers_id')->references('id')->on('productcovers')->onDelete('cascade');
            $table->enum('cover_type', ['img_option_colors', 'option_colors', 'both_img']);
            $table->unsignedBigInteger('coversupgrades_id')->nullable(null);
            $table->unsignedBigInteger('coverupgradecolors_id')->nullable();
            $table->text('coverfrontimg')->nullable();
            $table->text('coverbacksideimg')->nullable();
            $table->unsignedBigInteger('boxsleeve_id')->nullable();
            $table->enum('boxsleeve_type', ['img_option_colors', 'option_colors', 'both_img']);
            $table->unsignedBigInteger('boxsleeveupgrades_id')->nullable();
            $table->unsignedBigInteger('boxsleevecolors_id')->nullable();
            $table->text('boxsleevefrontimg')->nullable();
            $table->text('boxsleevebacksideimg')->nullable();
            $table->unsignedBigInteger('page_qty');
            $table->foreignId('zone_id')->references('id')->on('countryzones')->onDelete('cascade');
            $table->unsignedBigInteger('sheetValue');
            $table->unsignedBigInteger('album_book_copy_qty')->default(null);
            $table->unsignedBigInteger('album_book_copy_price')->default(null);
            $table->boolean('is_album_book_copy');
            $table->boolean('is_sample');
            $table->unsignedBigInteger('paperValue');
            $table->unsignedBigInteger('coverValue');
            $table->unsignedBigInteger('boxSleeveValue');
            $table->unsignedBigInteger('productValue');
            $table->unsignedBigInteger('shippingValue');
            $table->unsignedBigInteger('order_total');
            $table->unsignedBigInteger('discount')->nullable();
            $table->text('delivery_address')->nullable();
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
        Schema::dropIfExists('orders');
    }
};
