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
            $table->enum('pritnig_price_type', ['print_bind', 'design_print_bind']);
            $table->unsignedBigInteger('pritnig_price')->default(0);
            $table->enum('payment_status', ['pending', 'paid', 'credit'])->default('pending');
            $table->enum('order_status', ['pending', 'processing', 'completed', 'cancel', 'dispatch'])->default('pending');
            $table->unsignedBigInteger('user_id');
            $table->foreignId('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreignId('orientation_id')->references('id')->on('orientations')->onDelete('cascade');
            $table->foreignId('size_id')->references('id')->on('sizes')->onDelete('cascade');
            $table->foreignId('sheet_id')->references('id')->on('sheets')->onDelete('cascade');
            $table->foreignId('papers_id')->references('id')->on('papers')->onDelete('cascade');
            $table->foreignId('covers_id')->references('id')->on('covers')->onDelete('cascade');
            $table->enum('cover_type', ['img_option_colors', 'option_colors', 'both_img'])->nullable();
            $table->unsignedBigInteger('coversupgrades_id')->nullable();
            $table->unsignedBigInteger('coverupgradecolors_id')->nullable();
            $table->text('coverfrontimg')->nullable();
            $table->text('coverbacksideimg')->nullable();
            $table->unsignedBigInteger('boxsleeve_id')->nullable();
            $table->enum('boxsleeve_type', ['img_option_colors', 'option_colors', 'both_img'])->nullable();
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
            $table->text('delivery_partner_link')->nullable();
            $table->text('delivery_tracking_no')->nullable();

            $table->unsignedBigInteger('album_qty')->default(1);
            $table->unsignedBigInteger('album_cost')->nullable();
            $table->unsignedBigInteger('album_discount_amountCost')->default(0);
            $table->unsignedBigInteger('album_after_discount_cost')->default(0);
            $table->unsignedBigInteger('album_total_cost')->nullable();
            $table->unsignedBigInteger('subtotale')->nullable();
            // $table->unsignedBigInteger('order_total')->nullable();

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
