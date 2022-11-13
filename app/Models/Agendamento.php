<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Agendamento extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable=[
        'veiculo_id',
        'user_id',
        'servico',
        'date',
        'horario',
        'deleted_at',
    ];
    public function veiculo(){
        return $this->belongsTo(Veiculo::class,'veiculo_id');
    }
    public function user(){
        return $this->belongsTo(Users::class,'user_id');
    }

}
