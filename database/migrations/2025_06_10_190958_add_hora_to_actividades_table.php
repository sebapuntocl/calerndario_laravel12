<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('actividades', function (Blueprint $table) {
            $table->time('hora')->nullable()->after('fecha');
        });
    }

    public function down()
    {
        Schema::table('actividades', function (Blueprint $table) {
            $table->dropColumn('hora');
        });
    }
};
