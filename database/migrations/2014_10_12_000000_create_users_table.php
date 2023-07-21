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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('nip')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            // $table->string('nomor_unit')->nullable();
            $table->string('password');
            $table->enum('role', ['superadmin', 'kepala_bpom', 'plt_plh_kepala_bpom',
                                    'sestama', 'plt_plh_sestama', 'irtama', 'plt_plh_irtama', 'deputi_1', 'plt_plh_deputi_1',
                                    'deputi_2', 'plt_plh_deputi_2', 'deputi_3', 'plt_plh_deputi_3', 'deputi_4', 'plt_plh_deputi_4',
                                    'tu_kepala', 'protokol', 'dsp', 'humas',
                                    'tu_sestama', 'tu_irtama', 'tu_deputi_1',
                                    'tu_deputi_2', 'tu_deputi_3', 'tu_deputi_4',
                                    'staf_tu_kepala', 'staf_protokol', 'staf_dsp', 'staf_humas',
                                    'adm_sestama', 'adm_irtma', 'adm_deputi_1', 'adm_deputi_2', 'adm_deputi_3', 'adm_deputi_4'])->nullable();
            $table->string('status', 100)->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
