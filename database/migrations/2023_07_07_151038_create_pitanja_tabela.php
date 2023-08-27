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
        Schema::create('pitanjes', function (Blueprint $table) {
            $table->id();
            $table->string('Pitanje')->nullable(false);
            $table->string('Odgovor1')->nullable(false);
            $table->string('Odgovor2')->nullable(false);
            $table->string('Odgovor3')->nullable(false);
            $table->string('Odgovor4')->nullable(false);
            $table->integer('TacanOdgovor')->nullable(false);
            $table->integer('Id_Kursa')->nullable(false);
            $table->integer('Tezina')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pitanja_tabela');
    }
};
