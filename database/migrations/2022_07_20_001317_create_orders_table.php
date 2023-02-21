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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->string("transaction_id",300)->nullable(true);
            $table->string('nombre', 250);
            $table->string('telefono', 100); 
            $table->string('correo', 250);
            $table->string('calle', 250);
            $table->string('noExterior', 10);
            $table->string('noInterior', 10)->nullable(true);
            $table->string('cp', 10);
            $table->string('colonia', 250);
            $table->string('municipioDelegacion',250);
            $table->string('estado', 250);
            $table->string('nombrePersonaRecibir', 250);
            $table->decimal('total', 8, 2)->nullable(false)->default(0.0);

            $table->enum('status', ['entregado', 'pendiente'])->nullable()->default('pendiente');
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
        Schema::dropIfExists('orders');
    }
};
