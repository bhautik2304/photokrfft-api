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
        Schema::create('adminusers', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger("studio_id")->nullable();
            $table->enum("role", ["masteradmin", "user"])->default("user");
            $table->string("name");
            $table->unsignedBigInteger("phone_no");
            $table->unsignedBigInteger("otp")->nullable();
            $table->text("profile_photo")->nullable();
            $table->text("email");
            $table->text("token")->nullable();
            $table->text("password")->nullable();
            $table->boolean("email_veryfi")->default(false);
            $table->boolean("phone_veryfi")->default(false);
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
        Schema::dropIfExists('adminusers');
    }
};
