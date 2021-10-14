<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePertandingansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pertandingans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('gambar_team1');
            $table->string('gambar_team2');
            $table->text('nama_team1');
            $table->text('nama_team2');
            $table->timestamp('tanggal_waktu');
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
        Schema::dropIfExists('pertandingans');
    }
}
