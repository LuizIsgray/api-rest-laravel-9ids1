<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('detalle_venta', function (Blueprint $table) {
            $table->id();
            //Se declaran sin asignar las llaves foraneas
            $table->integer('idventa')->unsigned();
            $table->integer('idproducto')->unsigned();
            $table->integer('cantidad');
            $table->decimal('precio');

            //Llaves foraneas
            $table->foreign('idventa')->references('id')->on('venta');
            $table->foreign('idproducto')->references('id')->on('producto');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_venta');
    }
};
