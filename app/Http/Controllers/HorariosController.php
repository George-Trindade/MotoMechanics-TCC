<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
//use App\Http\Controllers\AgendamentosController;
//use App\Models\Agendamento;
use Illuminate\Support\Facades\DB;

class HorariosController extends Controller
{
    public function horario(Request $request, $datadigitada)
    {

        //$agendamentos = Agendamento::query();
        //$datadigitada=$request->query->get('data_capturada');

        $agendamentos = DB::table('agendamentos')->where('date', 'LIKE', $datadigitada)->get();
        $ContAgendamentos = $agendamentos->count();
        $horarios = DB::table('horarios')->get();
        $horariosDisponiveis = $horarios;
        $cont = 0;

        if ($ContAgendamentos > 0) {
            foreach ($agendamentos as $agendamento) {
                foreach ($horarios as $key => $horario) {
                    if ($agendamento->status == "agendado" && $agendamento->horario == $horario->hora) {
                        unset($horariosDisponiveis[$key]);
                    }
                }
            }
            foreach ($agendamentos as $agendamento) {
                foreach ($horariosDisponiveis as $key => $horario) {
                    if ($agendamento->status == "solicitado" && $agendamento->horario == $horario->hora) {
                        $cont++;
                        if ($cont > 3) {
                            unset($horariosDisponiveis[$key]);
                        }
                    }
                }
            }

            return response()->json($horariosDisponiveis);
        } else {
            return response()->json($horarios);
        }
    }
    public function verificaHorario(Request $request, $datadigitada, $horario)
    {
        $status = "agendado";
        $user = Auth::id();
        $agendamentoUser = DB::table('agendamentos')->where('date', 'LIKE', $datadigitada)->where('horario', 'LIKE', $horario)->where('status', 'LIKE', 'solicitado')->where('user_id', 'LIKE', $user)->get()->count();
        //dd($agendamentoUser);
        $agendamentos = DB::table('agendamentos')->where('date', 'LIKE', $datadigitada)->where('horario', 'LIKE', $horario)->where('status', 'LIKE', $status)->get();
        $ContAgendamentos = $agendamentos->count();
        if ($agendamentoUser > 1) {
            return response()->json(['success' => true]);
        } else {
            if ($ContAgendamentos > 0) {
                return response()->json(['success' => true]);
            } else {
                return response()->json(['success' => false]);
            }
        }
    }
}
