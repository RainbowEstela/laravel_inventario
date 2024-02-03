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
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string("codigo");
            $table->string("modelo");
            $table->string("fabricante");
            $table->string("descripcion");
            $table->string("imagen");
            $table->integer("stock");
            $table->string("estado");
            $table->unsignedBigInteger("location_id")->nullable();
            $table->foreign("location_id")->references('id')->on('locations')->onDelete('set null');
            $table->unsignedBigInteger("categoria_id")->nullable();
            $table->foreign("categoria_id")->references("id")->on("categorias")->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
