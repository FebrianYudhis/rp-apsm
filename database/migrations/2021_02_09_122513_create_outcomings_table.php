<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOutcomingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('outcomings', function (Blueprint $table) {
            $table->id();
            $table->date("tanggal_surat");
            $table->string("nomor_surat");
            $table->text("tujuan");
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
        Schema::dropIfExists('outcomings');
    }
}
