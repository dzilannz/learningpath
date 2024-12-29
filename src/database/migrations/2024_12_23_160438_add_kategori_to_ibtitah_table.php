<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('ibtitah', function (Blueprint $table) {
            $table->string('kategori')->after('mahasiswa_id'); // Tambahkan kolom kategori
        });
    }

    public function down()
    {
        Schema::table('ibtitah', function (Blueprint $table) {
            $table->dropColumn('kategori');
        });
    }
};
