<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('candidates', function (Blueprint $table) {
            $table->timestamp('activation_sent_at')->nullable()->after('status');
            $table->timestamp('activated_at')->nullable()->after('activation_sent_at');
        });
    }

    public function down(): void
    {
        Schema::table('candidates', function (Blueprint $table) {
            $table->dropColumn([
                'activation_sent_at',
                'activated_at',
            ]);
        });
    }
};
