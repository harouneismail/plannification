<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('niveauplanification_id');
            $table->foreign('niveauplanification_id')->references('id')->on('niveauplanifications');
            $table->unsignedBigInteger('directioncentrale_id');
            $table->foreign('directioncentrale_id')->references('id')->on('directioncentrales');
            $table->unsignedBigInteger('sousdirection_id')->nullable();
            $table->foreign('sousdirection_id')->references('id')->on('sousdirections');
            $table->unsignedBigInteger('service_id')->nullable();
            $table->foreign('service_id')->references('id')->on('services');
            $table->enum('is_admin',['Admin','Utilisateur']);
            $table->enum('niveau',['DG','DR','Chef'])->nullable();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
