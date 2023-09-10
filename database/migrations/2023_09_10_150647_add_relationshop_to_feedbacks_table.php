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
        Schema::create('add_relationshop_to_feedbacks_table', function (Blueprint $table) {
           $table->unsignedBigInteger('activity_id')->after('id')->required();
           $table->foreign('activity_id')->references('id')->on('activities')->onDelete('restrict');
           $table->unsignedBigInteger('mentor_id')->after('comment')->required();
           $table->foreign('mentor_id')->references('id')->on('activities')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['activity_id']);
            $table->dropColumn('activity_id');
            $table->dropForeign(['mentor_id']);
            $table->dropColumn('mentor_id');
        });
    }
};
