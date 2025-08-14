<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
{
    Schema::create('stores', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('owner_name')->nullable();
        $table->string('email')->nullable();
        $table->string('phone')->nullable();
        $table->text('address')->nullable();
        $table->string('status')->default('inactive'); // active / inactive
        $table->boolean('pw_protected')->default(false);
        $table->boolean('active_square')->default(false);
        $table->boolean('apple_pay_active')->default(false);
        $table->boolean('apple_login')->default(false);
        $table->boolean('google_login_ios')->default(false);
        $table->boolean('google_login_android')->default(false);
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stores');
    }
};
