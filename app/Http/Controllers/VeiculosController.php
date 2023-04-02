<?php

namespace App\Http\Controllers;

use App\Models\Veiculo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class VeiculosController extends Controller
{
    public function teste()
    {
        return view('teste');
    }




    public function index()
    {
        $veiculos = Veiculo::all();
        return view('Veiculos.index', compact('veiculos'));
    }


    public function create()
    {
        return view('Veiculos.create');
    }

    public function store(Request $request)
    {

        $veiculos = new Veiculo;
        $veiculos->Modelo = $request->Modelo;
        $veiculos->Marca = $request->Marca;
        $veiculos->Ano = $request->Ano;
        $veiculos->Cor = $request->Cor;
        $veiculos->Placa = $request->Placa;
        $veiculos->user_id = Auth::user()->id;
        $veiculos->save();

        return Redirect::route('veiculos.index')->with('Criado com sucesso!');
    }

    public function show($id)
    {
        $veiculos = Veiculo::find($id);
        return view('Veiculos.show');
    }

    public function edit($id)
    {
        $veiculos = Veiculo::find($id);
        return view('Veiculos.edit', compact('veiculos'));
    }


    public function update(Request $request, $id)
    {
        $veiculos = Veiculo::find($id);
        $veiculos->update($request->all());
        return Redirect::route('veiculos.index')->with('Alterado com sucesso!');
    }


    public function destroy($id)
    {
        $veiculos = Veiculo::find($id);
        $veiculos->delete();
        return Redirect::route('veiculos.index')->with('Deletado com sucesso!');
    }
}
