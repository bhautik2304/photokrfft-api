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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->unsignedBigInteger("country_code");
            $table->unsignedBigInteger("phone_no");
            $table->text("email");
            $table->text("password");
            $table->text("address")->nullable();
            $table->string("state")->nullable();
            $table->string("country")->nullable();

            $table->text("compunys_name");
            $table->text("compunys_logo");
            $table->text("social_link_1")->nullable();
            $table->text("social_link_2")->nullable();

            $table->text("avtar")->nullable();
            $table->boolean("email_veryfi")->default(false);
            $table->boolean("phone_veryfi")->default(false);
            $table->boolean("status")->default(false);
            $table->boolean("approved")->default(false);
            $table->unsignedBigInteger("zone")->nullable();
            $table->unsignedBigInteger("discount")->default(0);
            $table->text('token')->nullable();
            $table->text('access_token')->nullable();
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
        Schema::dropIfExists('customers');
    }
};
