<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BuatTabelKasusCovid extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kasus_covid', function (Blueprint $table) {
            $table->foreignId('revise_covid_id')
                ->constrained('tabel_revise')
                ->onDelete('cascade');
            $table->foreignId('gejala_covid_id')
                ->constrained('gejala_covid')
                ->onDelete('cascade');
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
        Schema::dropIfExists('kasus_covid');
    }
}
