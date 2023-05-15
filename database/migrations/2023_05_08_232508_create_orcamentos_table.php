<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrcamentosTable extends Migration
{
    public function up()
    {
        Schema::create('orcamentos', function (Blueprint $table) {
            $table->id();
            $table->string('servico');
            $table->decimal('valor_total', 10, 2);
            $table->json('fotos_problema');
            $table->string('arquivo_oficina')->nullable();
            $table->text('descricao_problema');
            $table->timestamps();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('veiculo_id')->constrained();
        });
    }

    public function down()
    {
        Schema::dropIfExists('orcamentos');
    }
}
