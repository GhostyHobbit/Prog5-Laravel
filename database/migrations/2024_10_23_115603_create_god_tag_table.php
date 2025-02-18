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
        Schema::create('god_tag', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('god_id')->nullable()->constrained();
            $table->foreignId('tag_id')->nullable()->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('god_tag');
    }
};
