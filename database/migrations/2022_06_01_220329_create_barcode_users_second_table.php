<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarcodeUsersSecondTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barcode_users_second', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('barcode_id')->constrained('barcodes')->onUpdate('cascade')->onDelete('cascade');
            $table->string('attachment')->nullable();
            $table->string('selfie')->nullable();
            $table->string('deskripsi')->nullable();
            $table->integer('range')->nullable();
            $table->enum('status',['IN RANGE','OUT OF RANGE']);
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
        Schema::dropIfExists('barcode_users_second');
    }
}
