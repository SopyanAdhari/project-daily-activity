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
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('role_id')->after('email')->required();
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('restrict');
            $table->unsignedBigInteger('division_id')->after('role_id')->required();
            $table->foreign('division_id')->references('id')->on('divisions')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['role_id']);
            $table->dropColumn('role_id');
            $table->dropForeign(['division_id']);
            $table->dropColumn('division_id');
        });
    }
};
