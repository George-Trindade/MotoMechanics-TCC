<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Http\Controllers\AgendamentosController;
//use App\Models\Agendamento;
use Illuminate\Support\Facades\DB;

class HorariosController extends Controller
{
    public function horario(Request $request, $datadigitada){

        //$agendamentos = Agendamento::query();
        //$datadigitada=$request->query->get('data_capturada');
        $agendamentos = DB::table('agendamentos')->where('date','LIKE', $datadigitada)->get();
        $ContAgendamentos =$agendamentos->count();
        $horarios = DB::table('horarios')->get();
        $horariosDisponiveis=$horarios;
        if($ContAgendamentos>0){
            foreach ($agendamentos as $agendamento){
                foreach ($horarios as $key => $horario){
                    if($agendamento->status=="agendado" && $agendamento->horario == $horario->hora){
                        unset($horariosDisponiveis[$key]);
                    }
                }
            }
            return response()->json($horariosDisponiveis);
        }else{
            return response()->json($horarios);
        }



    }
}
