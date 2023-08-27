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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('Ime');
            $table->string('Prezime');
            $table->string('password')->unique();
            $table->string('Pol');
            $table->string('DrzavaR')->default('');
            $table->string('DatumR')->default('');
            $table->string('JMBG')->unique();
            $table->string('BrojT');
            $table->string('Eadresa')->unique();
            $table->string('Slika')->nullable();
            $table->string('TipP');
            $table->string('Odobren')->default('Ne');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
