<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kurs', function (Blueprint $table) {
            $table->id();
            $table->string('ImeKursa');
            $table->string('ImeProfesora');
            $table->longText('OpisKursa');
            $table->string('PrilozeniMaterijal')->nullable()->default(null);
            $table->integer('Id_Profesora')->nullable(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kursevi');
    }
};
