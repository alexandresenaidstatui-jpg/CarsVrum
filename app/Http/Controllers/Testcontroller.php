<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CarroModel;

class Testcontroller extends Controller
{   
    public function envia_teste(Request $request){

    $data = [

        'Palmeiras'=> '51',
        'numero'=> $request->numero
    ];

     return response()->json($data,200);
    }


        public function soma(Request $request){

    $data = [

        'soma' => $request->numero + $request->numero_dois,
    ];

     return response()->json($data,200);
    }

    public function salva_carro (Request $request)
    {$request ->validate ([

    'modelo' => 'required',
    'ano' => 'required',
    'cor' => 'required',
    'placa' => 'required',
    'dono' => 'required',
    'valor' => 'required',
    'potencia' => 'required',
    'fabricante' => 'required',
    'tipo_gasolina' => 'required',
    
    

    ]);

    try {
        $carro = new CarroModel();
        $carro->modelo = $request->modelo;
        $carro->ano = $request->ano;
        $carro->cor = $request->cor;
        $carro->placa = $request->placa;
        $carro->dono = $request->dono;
        $carro->valor = $request->valor;
        $carro->potencia = $request->potencia;
        $carro->fabricante = $request->fabricante;
        $carro->tipo_gasolina = $request->tipo_gasolina;
        $carro->save();


        $data = [
            "erro" => 'n',
            'carro' => $carro,
        ];

        return response()->json($data,200);

    } catch (\Throwable $th) {
        //throw $th;
    }



    }
    public function exibe_carro($id)
    {
        $carro = CarroModel::find($id);

        $data = [
            "erro" => 'n',
            'carro' => $carro,
        ];

        return response()->json($data,200);


    }


    public function todos_carros(Request $request){


        $carro = CarroModel::get()->all();

        $data = [
            "erro" => 'n',
            'carro' => $carro,
        ];

        return response()->json($data,200);



    }
}
