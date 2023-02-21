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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('category_id')->nullable(false)->default(12);
            $table->bigInteger('brand_id')->nullable(false)->default(12);
            $table->string('nombre', 250)->nullable(false);
            $table->string('descripcion',250)->nullable();
            $table->decimal('precio', 8, 2)->nullable(false)->default(0.0);
            $table->text('detalles')->nullable();
            $table->string('imagen', 250)->nullable(false);

            $table->decimal('alto', 8, 2)->nullable(false)->default(0.0);
            $table->decimal('ancho', 8, 2)->nullable(false)->default(0.0);            
            $table->decimal('largo', 8, 2)->nullable(false)->default(0.0);
            $table->decimal('peso', 4, 2)->nullable(false)->default(0.0);

            $table->enum('activo', ['si', 'no'])->nullable()->default('no');
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
        Schema::dropIfExists('products');
    }
};
