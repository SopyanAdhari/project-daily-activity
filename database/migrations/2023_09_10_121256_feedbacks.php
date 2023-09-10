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
        Schema::create('feedbacks', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('activity_id');
            // $table->foreign('activity_id')->references('id')->on('activities')->onDelete('restrict');
            $table->text('comment');
            // $table->unsignedBigInteger('mentor_id');
            // $table->foreign('mentor_id')->references('id')->on('activities')->onDelete('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feedbacks');
    }
};
