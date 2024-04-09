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
        Schema::create('ordercustomdetails', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->enum('event_type', ["Wedding", "others", "Pre-Wedding", "Engagement", "Birthdav", "Sweet 16", "Bar Mitzvah", "Bat Mitzvah", "Puberty Ceremony", "Baby Shower", "Portfolio", "Guestbook",])->default('wedding');
            $table->text('other_event_type')->nullable();
            $table->string('event_name');
            $table->date('event_date');
            $table->string('customizeMessage');
            $table->string('fonts');
            $table->enum('Imprinting', ['Laser Imprinting', 'Foil Imprinting'])->nullable();
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
        Schema::dropIfExists('ordercustomdetails');
    }
};
