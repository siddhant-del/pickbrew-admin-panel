<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('merchants', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('status')->nullable();
            $table->string('address')->nullable();
            $table->boolean('pw_protected')->default(false);
            $table->boolean('active_square')->default(false);
            $table->boolean('apple_pay')->default(false);
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
        Schema::dropIfExists('merchants');
    }
};
