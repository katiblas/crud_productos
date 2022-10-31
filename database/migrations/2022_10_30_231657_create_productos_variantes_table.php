<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosVariantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos_variantes', function (Blueprint $table) {
            $table->id();
            $table->foreignId("producto_id")->constrained()->onDelete("cascade");
            $table->string("referencia");
            $table->string("descripcion");
            $table->float("precio");
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
        Schema::dropIfExists('productos_variantes');
    }
}
