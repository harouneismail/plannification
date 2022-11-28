<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoughsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('moughs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('wilaya_id');
            $table->foreign('wilaya_id')->references('id')->on('wilayas');
            $table->string('nommough');
            $table->datetime('deleted_at')->nullable();

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
        Schema::dropIfExists('moughs');
    }
}
