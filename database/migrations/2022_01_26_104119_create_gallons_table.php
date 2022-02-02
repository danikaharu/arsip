<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGallonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gallons', function (Blueprint $table) {
            $table->id();
            $table->string('jumlah_produksi');
            $table->string('petugas_produksi');
            $table->string('staff_cuci');
            $table->string('staff_noxel');
            $table->string('staff_qc');
            $table->date('tanggal_produksi');
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
        Schema::dropIfExists('gallons');
    }
}
