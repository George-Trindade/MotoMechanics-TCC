<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Orcamento;
use App\Models\Agendamento;
use App\Models\Veiculo;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        return view('Admin.dashboard');
    }

    public function listaUsuarios()
    {
        $users = User::All();
        return view('Admin.listaUsuarios', compact('users'));
    }
    public function listaAgendamentos()
    {
        $agendamentos = Agendamento::all();
        $users = User::All();
        $veiculos = Veiculo::all();
        return view('Admin.listaAgendamentos', compact('users', 'agendamentos', 'veiculos'));
    }
    public function listaOrcamentos()
    {
        $orcamentos = Orcamento::all();
        $users = User::All();
        $veiculos = Veiculo::all();
        return view('Admin.listaOrcamentos', compact('users', 'orcamentos', 'veiculos'));
    }

    public function showOrcamento($id)
    {
        $orcamento = Orcamento::findOrFail($id);
        $veiculos = Veiculo::all();
        // Verifica se o usuário autenticado é o dono do orçamento
        if ($orcamento->user_id !== auth()->user()->id) {
            return redirect()->back()->with('error', 'Você não tem permissão para acessar este orçamento.');
        }

        // Transforma as fotos do problema em um array de objetos
        $fotosProblema = json_decode($orcamento->fotos_problema);

        return view('admin.showOrcamento', compact('orcamento', 'fotosProblema', 'veiculos'));
    }


    public function editAgendamentos(Request $request, $id)
    {
        $agendamentos = Agendamento::find($id);
        return Redirect::route('admin.confirmaAgendamentos');
    }
    public function editDoneAgendamentos(Request $request, $id)
    {
        $agendamentos = Agendamento::find($id);
        return Redirect::route('admin.concluiAgendamentos');
    }

    public function confirmaAgendamentos(Request $request, $id)
    {
        $agendamentos = Agendamento::find($id);
        $data = $request->all();
        $data['status'] = "agendado";
        $agendamentos->update($data);

        return Redirect::route('admin.listaAgendamentos');
    }
    public function concluiAgendamentos(Request $request, $id)
    {
        $agendamentos = Agendamento::find($id);
        $data = $request->all();
        $data['status'] = "concluido";
        $agendamentos->update($data);

        return Redirect::route('admin.listaAgendamentos');
    }
    public function destroyAgendamentos($id)
    {
        $agendamentos = Agendamento::find($id);
        $agendamentos->delete();
        return Redirect::route('admin.listaAgendamentos')->with('Deletado com sucesso!');
    }

    public function ajaxAgendamento()
    {
        $users = User::All();
        $veiculos = Veiculo::all();
        $agendamentos = DB::table('agendamentos')->where('status', 'LIKE', 'solicitado')->get();
        $html = view('Admin/table', compact('users', 'agendamentos', 'veiculos'))->render();
        return response()->json(['html' => $html]);
    }
    public function ajaxOrcamento()
    {
        $users = User::All();
        $veiculos = Veiculo::all();
        $orcamentos = DB::table('orcamentos')->get();
        $html = view('Admin/table_orcamento', compact('users', 'orcamentos', 'veiculos'))->render();
        return response()->json(['html' => $html]);
    }
}
