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
        Schema::create('emergency_cases', function (Blueprint $table) {
            $table->id();
            $table->time('reporting_time');
            $table->date('reporting_date');
            $table->foreignId('agency_id')->constrained()->cascadeOnDelete();
            $table->foreignId('region_id')->constrained()->cascadeOnDelete();
            $table->string('location');
            $table->string('contact');
            $table->longText('description');
            $table->text('action_taken');
            $table->longText('feedback');
            $table->foreignId('user_id')->constrained();
            $table->string('created_by');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emergency_cases');
    }
};
