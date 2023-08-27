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
        Schema::create('vests', function (Blueprint $table) {
            $table->id();
            $table->string('Naslov');
            $table->longText('Opis');
            $table->timestamp('Vreme_isteka')->default(now()->addWeek());
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
        Schema::dropIfExists('vesti');
    }
};
