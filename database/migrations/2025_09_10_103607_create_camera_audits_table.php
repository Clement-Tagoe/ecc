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
        Schema::create('camera_audits', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->time('time');
            $table->string('camera_name');
            $table->string('camera_status');
            $table->json('observation');
            $table->foreignId('user_id');
            $table->string('image(s)');
            $table->string('created_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('camera_audits');
    }
};
