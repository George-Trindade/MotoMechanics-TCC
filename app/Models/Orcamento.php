<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orcamento extends Model
{
    protected $fillable = [
        'servico',
        'valor_total',
        'fotos_problema',
        'arquivo_oficina',
        'descricao_problema',
        'veiculo_id',
        'usuario_id',
    ];

    protected $casts = [
        'fotos_problema' => 'json',
    ];

    public function veiculo()
    {
        return $this->belongsTo(Veiculo::class, 'veiculo_id');
    }
    public function user()
    {
        return $this->belongsTo(Users::class, 'user_id');
    }
}
