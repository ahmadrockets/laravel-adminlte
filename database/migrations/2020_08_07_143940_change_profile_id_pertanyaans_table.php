<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeProfileIdPertanyaansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pertanyaans', function (Blueprint $table) {
            $table->unsignedBigInteger('jawaban_tepat_id')->nullable()->change();
            $table->unsignedBigInteger('profile_id')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pertanyaans', function (Blueprint $table) {
            $table->unsignedBigInteger('jawaban_tepat_id')->change();
            $table->unsignedBigInteger('profile_id')->change();
        });
    }
}
