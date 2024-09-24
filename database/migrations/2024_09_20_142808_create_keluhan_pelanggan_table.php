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
        Schema::create('keluhan_pelanggan', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 50);
            $table->string('email', 100);
            $table->string('nomor_hp', 15)->nullable();
            $table->string('status_keluhan', 1)->default('0')->comment('0:Received, 1:In Process, 2:Done');
            $table->string('keluhan', 255);
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
        Schema::dropIfExists('keluhan_pelanggan');
    }
};
