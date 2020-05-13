<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGasolinerasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gasolineras', function (Blueprint $table) {
            
            $table->increments('id');
            $table->string('CP', 255)->nullable();
            $table->string('Direccion', 255)->nullable();
            $table->string('Horario', 255)->nullable();
            $table->string('Latitud', 255)->nullable();
            $table->string('Localidad', 255)->nullable();
            $table->string('Longitud', 255)->nullable();
            $table->string('Margen', 255)->nullable();
            $table->string('Municipio', 255)->nullable();
            $table->string('PrecioBiodiesel', 255)->nullable();
            $table->string('PrecioBioetanol', 255)->nullable();
            $table->string('PrecioGasNaturalComprimido', 255)->nullable();
            $table->string('PrecioGasNaturalLiquado', 255)->nullable();
            $table->string('PrecioGasesNaturalesLiquadosPetroleo', 255)->nullable();
            $table->string('PrecioGasoleoA', 255)->nullable();
            $table->string('PrecioGasoleoB', 255)->nullable();
            $table->string('PrecioGasolina95', 255)->nullable();
            $table->string('PrecioGasolina98', 255)->nullable();
            $table->string('PrecioNuevoGasoleoA', 255)->nullable();
            $table->string('Provincia', 255)->nullable();
            $table->string('Remision', 255)->nullable();
            $table->string('Rotulo', 255)->nullable();
            $table->string('TipoVenta', 255)->nullable();
            $table->string('Bioetanol', 255)->nullable();
            $table->string('EsterMetilico', 255)->nullable();
            $table->string('IDEESS', 255)->nullable();
            $table->string('IDMunicipio', 255)->nullable();
            $table->string('IDProvincia', 255)->nullable();
            $table->string('IDCCAA', 255)->nullable();
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
        Schema::dropIfExists('gasolineras');
    }
}
