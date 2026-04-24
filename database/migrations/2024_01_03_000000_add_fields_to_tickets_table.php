<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('tickets', function (Blueprint $table) {
            // Technical fields
            $table->string('accepted_by')->nullable();
            $table->date('date_accepted')->nullable();
            $table->time('time_accepted')->nullable();

            // Arrangement fields
            $table->string('followup_by')->nullable();
            $table->enum('division', ['servicing', 'installation'])->nullable();
            $table->date('date_followup')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('tickets', function (Blueprint $table) {
            $table->dropColumn(['accepted_by', 'date_accepted', 'time_accepted', 'followup_by', 'division', 'date_followup']);
        });
    }
};
