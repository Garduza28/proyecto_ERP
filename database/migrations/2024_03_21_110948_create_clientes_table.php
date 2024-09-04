<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('direccion')->nullable();
            $table->string('numtel')->nullable();
            $table->string('email')->unique();
            $table->string('name_empresa')->nullable();
            $table->string('cargo_empresa')->nullable();
            $table->string('direccion_empresa')->nullable();
            $table->string('num_empresa')->nullable();
            $table->string('email_empresa')->nullable();
            $table->string('preferencia_contacto')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('clientes');
    }
}
