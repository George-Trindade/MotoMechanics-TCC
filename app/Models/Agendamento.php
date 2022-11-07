<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agendamento extends Model
{
    use HasFactory;
    protected $fillable=[
        'veiculo_id',
        'servico',
        'date',
        'horario',
    ];
    public function veiculo(){
        return $this->belongsTo(Veiculo::class,'veiculo_id');
    }

}
