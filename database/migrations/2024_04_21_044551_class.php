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
        Schema::create('class', function (Blueprint $table) {
            $table->id('id_kelas');
            $table->enum('tingkat_kelas', [
                10,
                11,
                12,
                13
            ]);
            $table->string('alphabet');
            $table->integer('jurusan'); // id jurusan
            $table->integer('wali_kelas'); // id guru
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
