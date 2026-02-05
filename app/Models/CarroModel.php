<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarroModel extends Model
{
    protected $table ='carro';



    protected $fillable = [
        'modelo',
        'email',
        'cor',
        'placa',
        'dono',
        'valor',
        'potencia',
        'potencia',
        'tipo_gasolina'
    ];
}
