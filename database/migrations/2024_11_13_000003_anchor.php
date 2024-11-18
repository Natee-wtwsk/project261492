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
        Schema::create('anchor_location', function (Blueprint $table) {
            $table->foreignId('anchor')->primary()->references('id')->on('entities');
            $table->string('location', 64);
        });

        Schema::create('controller_have_anchors', function (Blueprint $table) {
            $table->foreignId('controller')->references('id')->on('entities');
            $table->foreignId('have_anchor')->references('id')->on('entities');
            $table->unsignedInteger('on_port');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('controller_have_anchors');
        Schema::dropIfExists('anchor_location');
    }
};
