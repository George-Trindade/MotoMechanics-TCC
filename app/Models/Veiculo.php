<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Veiculo extends Model
{
    use HasFactory;

    protected $fillable = [
        'Modelo',
        'Marca',
        'Ano',
        'Cor',
        'Placa',
        'fotoveiculo',
        'user_id'

    ];
    public function user()
    {
        return $this->belongsTo(Users::class, 'user_id');
    }
}
