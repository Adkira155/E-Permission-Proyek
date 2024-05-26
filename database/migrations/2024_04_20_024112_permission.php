<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        schema::create('permission', function (Blueprint $table) {
            $table->id();
            $table->integer('id_siswa');
            $table->string('tanggal');
            $table->enum('status', [
                'waiting',
                'confirmed',
                'rejected'
            ]);
            $table->string('keterangan');
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
