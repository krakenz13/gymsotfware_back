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
        Schema::table('mentorias', function (Blueprint $table) {
            $table->dropColumn("mentoria_id");
            $table->string("mentoria")->after("id");

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('mentorias', function($table) {
            $table->string("mentoria_id")->after("telefono");
            $table->dropColumn("mentoria");
        });
    }
};
