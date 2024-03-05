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
        Schema::create('ref_obyek', function (Blueprint $table) {
            $table->id();
            $table->string('kode', 30);
            $table->string('nama', 100);
            $table->text('alamat');
            $table->string('no_telp', 20)->unique();
            $table->string('email', 100)->unique();
            $table->string('website', 255);
            $table->string('pimpinan', 100);
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
        Schema::dropIfExists('ref_obyek');
    }
};
