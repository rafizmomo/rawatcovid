<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BuatTabelReviseUntukPenyimpananKasus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tabel_revise', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kategori_gejala_id')
                ->constrained('kategori_gejala_covid')
                ->onDelete('cascade');
            $table->integer('persentase_kecocokan');
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
        Schema::dropIfExists('tabel_revise');
    }
}
