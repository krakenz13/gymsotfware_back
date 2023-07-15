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
        Schema::table('estudiantes_mentorias', function (Blueprint $table) {
            $table->foreign('mentoria_id')->references('id')->on('mentorias');
            

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('estudiantes_mentorias', function($table) {
            $table->dropForeign('mentoria_id');    
        });
    }
};
