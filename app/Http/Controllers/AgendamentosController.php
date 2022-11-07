<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agendamento;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Models\Veiculo;
use Illuminate\Support\Facades\Auth;
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
        $veiculos = Veiculo::where(['user_id' => Auth::user()->id])->get();
        $agendamentos = Agendamento::all();
        return view('Agendamentos.create', compact('horarios','agendamentos','veiculos'));

    }
    public function store(Request $request)
    {

        $agendamentos = new Agendamento;
        $agendamentos->veiculo_id = $request->veiculo_id;
        $agendamentos->servico = $request->servico;
        $agendamentos->date = $request->date;
        $agendamentos->horario = $request->horario;
        $agendamentos->save();

        return Redirect::route('agendamentos.index')->with('Criado com sucesso!');
    }
}
