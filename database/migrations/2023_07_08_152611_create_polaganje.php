<?php

use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Date;
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
        Schema::create('polaganjes', function (Blueprint $table) {
            $table->id();
            $table->integer('Id_Polaznika')->nullable(false);
            $table->integer('Id_Kursa')->nullable(false);
            $table->date('Datum_Polaganja')->default(Carbon::now())->nullable(false);
            $table->float('Rezultat')->nullable(true);
            $table->integer("Ocena")->default(5);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('polaganje');
    }
};
