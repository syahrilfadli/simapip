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
        Schema::create('riwayat_pendidikan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pegawai_id');
            $table->unsignedBigInteger('ref_strata_pendidikan_id');
            $table->string('gelar_depan', 10)->nullable();
            $table->string('gelar_belakang', 10)->nullable();
            $table->string('nomor_ijazah', 30);
            $table->date('tanggal_ijazah');
            $table->string('file_ijazah', 250);
            $table->string('perguruan_tinggi', 250);
            $table->string('program_studi', 250);

            $table->integer('created_by')->unsigned()->nullable();
            $table->integer('updated_by')->unsigned()->nullable();
            $table->integer('deleted_by')->unsigned()->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('pegawai_id')->references('id')->on('pegawai');
            $table->foreign('ref_strata_pendidikan_id')->references('id')->on('ref_strata_pendidikan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('riwayat_pendidikan');
    }
};
