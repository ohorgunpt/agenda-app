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
        Schema::create('agendas', function (Blueprint $table) {
            $table->id();
            $table->string('agenda');
            $table->string('kategori');
            $table->date('tanggal');
            $table->time('mulai');
            $table->time('selesai');
            $table->string('tempat');
            $table->string('keterangan');
            $table->string('status');
            $table->string('sifat');

            $table->foreignId('unit_id')->constraint();
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
        Schema::dropIfExists('agendas');
    }
};
