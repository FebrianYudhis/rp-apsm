<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncomingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incomings', function (Blueprint $table) {
            $table->id();
            $table->integer("nomor_agenda");
            $table->date("tanggal_diterima");
            $table->string("nomor_surat");
            $table->text("pengirim");
            $table->date("tanggal_surat");
            $table->text("perihal");
            $table->string("lokasi_berkas");
            $table->string("url");
            $table->integer("tahun");
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('incomings');
    }
}
