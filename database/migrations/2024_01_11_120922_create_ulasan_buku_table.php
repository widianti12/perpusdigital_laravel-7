<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUlasanBukuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ulasan_buku', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('UserID');
            $table->bigInteger('BukuID');
            $table->text('ulasan');
            $table->string('rating',11);
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
        Schema::dropIfExists('ulasan_buku');
    }
}
