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
        $user = Auth::id();

        $agendamentoUser = DB::table('agendamentos')->where('status', 'LIKE', 'solicitado')->where('user_id', 'LIKE', $user)->get();
        if (($agendamentoUser->count()) > 0)
            foreach ($agendamentoUser as $user) {
                foreach ($horarios as $key => $horario) {
                    if ($user->date == $datadigitada && $user->horario == $horario->hora) {
                        unset($horariosDisponiveis[$key]);
                    }
                }
            }
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
    }
    public function verificaHorario(Request $request, $datadigitada, $horario)
    {
        $status = "agendado";
        $user = Auth::id();
        $agendamentoUser = DB::table('agendamentos')->where('date', 'LIKE', $datadigitada)->where('horario', 'LIKE', $horario)->where('status', 'LIKE', 'solicitado')->where('user_id', 'LIKE', $user)->get();
        $ContAgendamentosUser = $agendamentoUser->count();
        $agendamentos = DB::table('agendamentos')->where('date', 'LIKE', $datadigitada)->where('horario', 'LIKE', $horario)->where('status', 'LIKE', $status)->get();
        $ContAgendamentos = $agendamentos->count();
        $horarios = DB::table('horarios')->get();
        $horariosDisponiveis = $horarios;
        $cont = 0;
        if ($ContAgendamentosUser > 0) {
            foreach ($agendamentoUser as $agendamento) {
                foreach ($horarios as $key => $horario) {
                    if ($agendamento->horario == $horario->hora) {
                        unset($horariosDisponiveis[$key]);
                    }
                }
            }
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
        } else if ($ContAgendamentos > 0) {
            $contTest = 0;
            foreach ($agendamentos as $agendamento) {
                foreach ($horarios as $key => $horario) {
                    if ($agendamento->status == "agendado" && $agendamento->horario == $horario->hora) {
                        $contTest++;
                    }
                }
            }
            if ($contTest > 0) {
                foreach ($agendamentos as $agendamento) {
                    foreach ($horarios as $key => $horario) {
                        if ($agendamento->status == "agendado" && $agendamento->horario == $horario->hora) {
                            unset($horariosDisponiveis[$key]);
                        }
                    }
                }
                if ($ContAgendamentosUser > 0) {
                    foreach ($agendamentoUser as $agendamento) {
                        foreach ($horarios as $key => $horario) {
                            if ($agendamento->horario == $horario->hora) {
                                unset($horariosDisponiveis[$key]);
                            }
                        }
                    }
                }
                return response()->json($horariosDisponiveis);
            } else {
                return response()->json(['success' => false]);
            }
        } else {
            return response()->json(['success' => false]);
        }
    }
}
