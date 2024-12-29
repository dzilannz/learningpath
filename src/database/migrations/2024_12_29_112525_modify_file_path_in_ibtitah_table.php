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
        Schema::table('ibtitah', function (Blueprint $table) {
            $table->text('file_path')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ibtitah', function (Blueprint $table) {
            $table->string('file_path')->nullable()->change(); // Kembalikan ke `string` jika rollback
        });
    }
};