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
        Schema::table('estudiantes', function (Blueprint $table) {
            $table->string("cedula")->after("foto");
            $table->string("telefono")->after("cedula");
            $table->string("mentoria")->after("telefono");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('estudiantes', function($table) {
            $table->dropColumn("cedula");
            $table->dropColumn("telefono");
            $table->dropColumn("mentoria");
        });
    }
};
