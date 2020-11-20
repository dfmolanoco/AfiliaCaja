<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAfiliacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('afiliaciones', function (Blueprint $table) {
            $table->id();
            $table->string("ndi");
            $table->string("nombre");
            $table->string("apellido");
            $table->string("email")->unique();
            $table->enum("genero", ["M", "F"]);
            $table->bigInteger("salario");
            $table->boolean("aprobado")->nullable();
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
        Schema::dropIfExists('afiliacions');
    }
}
