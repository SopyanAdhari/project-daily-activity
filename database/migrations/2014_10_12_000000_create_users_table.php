<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name',100)->required();
            $table->string('email',100)->unique()->required();
            // $table->unsignedBigInteger('role_id')->required();
            // $table->foreign('role_id')->references('id')->on('roles')->onDelete('restrict');
            // $table->unsignedBigInteger('division_id')->required();
            // $table->foreign('division_id')->references('id')->on('divisions')->onDelete('restrict');
            $table->string('password');
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
