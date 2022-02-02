<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQualityControlsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quality_controls', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->time('jam_pagi');
            $table->time('jam_sore');
            $table->string('tds_airbaku_pagi');
            $table->string('tds_setengahjadi_pagi');
            $table->string('tds_jadi_pagi');
            $table->string('tds_airbaku_sore');
            $table->string('tds_setengahjadi_sore');
            $table->string('tds_jadi_sore');
            $table->string('ph_airbaku_pagi');
            $table->string('ph_setengahjadi_pagi');
            $table->string('ph_jadi_pagi');
            $table->string('ph_airbaku_sore');
            $table->string('ph_setengahjadi_sore');
            $table->string('ph_jadi_sore');
            $table->string('kekeruhan');
            $table->string('rasa');
            $table->string('bau');
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
        Schema::dropIfExists('quality_controls');
    }
}
