<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agendamento;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class AgendamentosController extends Controller
{
    public function index()
    {
        $agendamentos = Agendamento::all();
        return view('Agendamentos.index',compact('agendamentos'));
    }
    public function create()
    {
        $horarios = DB::table('horarios')->get();
        $agendamentos = Agendamento::all();
        return view('Agendamentos.create', compact('horarios','agendamentos'));

    }
    public function store(Request $request)
    {

        $agendamendos = new Agendamento;
        $agendamendos->servico = $request->servico;
        $agendamendos->date = $request->date;
        $agendamendos->horario = $request->horario;
        $agendamendos->save();

        return Redirect::route('agendamentos.index')->with('Criado com sucesso!');
    }
}
