<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Agendamento;
use App\Models\Veiculo;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    public function index()
    {
        return view('Admin.dashboard');
    }
    public function listaUsuarios()
    {
        $users= User::All();
        return view('Admin.listaUsuarios', compact('users'));
    }
    public function listaAgendamentos()
    {
        $agendamentos= Agendamento::all();
        $users= User::All();
        $veiculos= Veiculo::all();
        return view('Admin.listaAgendamentos', compact('users','agendamentos','veiculos'));
    }
    public function editAgendamentos(Request $request, $id)
    {
        $agendamentos=Agendamento::find($id);
        return Redirect::route('admin.confirmaAgendamentos');
    }
    public function editDoneAgendamentos(Request $request, $id)
    {
        $agendamentos=Agendamento::find($id);
        return Redirect::route('admin.concluiAgendamentos');
    }

    public function confirmaAgendamentos(Request $request, $id)
    {
        $agendamentos=Agendamento::find($id);
        $data=$request->all();
        $data['status']="agendado";
        $agendamentos->update($data);

        return Redirect::route('admin.listaAgendamentos');
    }
    public function concluiAgendamentos(Request $request, $id)
    {
        $agendamentos=Agendamento::find($id);
        $data=$request->all();
        $data['status']="concluido";
        $agendamentos->update($data);

        return Redirect::route('admin.listaAgendamentos');
    }
    public function destroyAgendamentos($id)
    {
        $agendamentos=Agendamento::find($id);
        $agendamentos->delete();
        return Redirect::route('admin.listaAgendamentos')->with('Deletado com sucesso!');
    }


}
