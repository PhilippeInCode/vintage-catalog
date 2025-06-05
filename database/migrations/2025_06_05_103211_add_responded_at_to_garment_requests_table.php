<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('garment_requests', function (Blueprint $table) {
            $table->timestamp('responded_at')->nullable()->after('status');
        });
    }

    public function down()
    {
        Schema::table('garment_requests', function (Blueprint $table) {
            $table->dropColumn('responded_at');
        });
    }
};
