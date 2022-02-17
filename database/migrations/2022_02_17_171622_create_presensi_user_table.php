<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePresensiUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('presensi_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('presensi_id')->constrained('presensi')->onUpdate('cascade')->onDelete('cascade');
            $table->string('attachment')->nullable();
            $table->enum('status',['SKIP','ON TIME','LATE'])->default('SKIP');
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
        Schema::dropIfExists('presensi_user');
    }
}
