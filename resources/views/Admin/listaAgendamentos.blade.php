@extends('adminlte::page')

@section('title', 'Agendamentos')

@section('content_header')
<h1>Agendamentos</h1>
@stop

@section('content')

<head>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="http://tcc.test/assets/js/confirmDelete.js" type="text/javascript"></script>
    <script src="http://tcc.test/assets/js/concluiAgendamento.js" type="text/javascript"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script type="text/javascript" src="http://tcc.test/assets/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
</head>

<script>
    $(document).ready(function() {
        $('#table-solicitado').DataTable();
        $('#table-agendado').DataTable();
        $('#table-concluido').DataTable();

    });
</script>



<!-- Tabela de Agendamentos -->
<section class="content">
    <!-- Solicitações -->
    <div class="card"><!-- Collapsed fechado:class="collapsed-card"-->
        <div class="card-header">
            <h3 class="card-title">Solicitações</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="card-body p-0"><!-- Collapsed fechado: style="display: none;"-->
            <div class="card-body">
                <table class="display table table-striped projects" id="table-solicitado">
                    <thead>
                        <tr>
                            <th style="width: 1%">
                                ID
                            </th>
                            <th style="width: 20%">
                                Cliente
                            </th>
                            <th>
                                Serviço
                            </th>
                            <th>
                                Data
                            </th>
                            <th style="width: 8%" class="text-center">
                                Status
                            </th>
                            <th style="width: 20%">
                            </th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($agendamentos as $agendamento)
                        @if($agendamento->status == 'solicitado')
                        <tr>
                            <td>
                                {{$agendamento->id}}
                            </td>
                            <td>
                                <a>
                                    @foreach($users as $user)
                                    @if($agendamento->user_id == $user->id)
                                    {{$user->name}}
                                    @endif
                                    @endforeach
                                </a>
                                <br>
                                <small>
                                    @foreach($veiculos as $veiculo)
                                    @if($agendamento->veiculo_id == $veiculo->id)
                                    {{$veiculo->Modelo}}
                                    @endif
                                    @endforeach
                                </small>
                            </td>
                            <td>
                                {{$agendamento->servico}}
                            </td>
                            <td>
                                <div>
                                    {{$agendamento->horario}}
                                </div>
                                <div>
                                    @php
                                    $data=$agendamento->date;
                                    echo implode("/",array_reverse(explode("-",$data)));
                                    @endphp
                                </div>
                            </td>
                            <td class="project-state">
                                <span class="badge bg-warning">{{$agendamento->status}}</span>
                            </td>
                            <td class="project-actions text-right">
                                <form action="{{route('admin.confirmaAgendamentos',$agendamento->id)}}" method="post" id="FormSolicitacao">
                                    @method("put")
                                    @csrf
                                    <button type="button" class="btn bg-lime btn-sm" onclick="ConfirmaSolicitacao()">
                                        <ion-icon name="checkbox-outline" style="font-size: 22px;"></ion-icon>
                                    </button>
                                </form>
                            </td>
                            <td>
                                <form action="{{route('admin.destroyAgendamentos',$agendamento->id)}}" method="post" id='FormDeleteSolicitacao'>
                                    @method("delete")
                                    @csrf
                                    <button type="button" class="btn btn-danger btn-sm" onclick="ConfirmDeleteSolicitacao()">
                                        <ion-icon name="close-circle-outline" style="font-size: 22px;"></ion-icon>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
    <!-- Agendados -->
    <div class="card card"> <!-- Collapsed fechado:class="collapsed-card"-->
        <div class="card-header">
            <h3 class="card-title">Agendados</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <div class="card-body p-0"><!-- Collapsed fechado: style="display: none;"-->
                <table class="display table table-striped projects" id="table-agendado">
                    <thead>
                        <tr>
                            <th style="width: 1%">
                                #
                            </th>
                            <th style="width: 20%">
                                Cliente
                            </th>
                            <th>
                                Serviço
                            </th>
                            <th>
                                Data
                            </th>
                            <th style="width: 8%" class="text-center">
                                Status
                            </th>
                            <th style="width: 20%">
                            </th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($agendamentos as $agendamento)
                        @if($agendamento->status == 'agendado')
                        <tr>
                            <td>
                                {{$agendamento->id}}
                            </td>
                            <td>
                                <a>
                                    @foreach($users as $user)
                                    @if($agendamento->user_id == $user->id)
                                    {{$user->name}}
                                    @endif
                                    @endforeach
                                </a>
                                <br>
                                <small>
                                    @foreach($veiculos as $veiculo)
                                    @if($agendamento->veiculo_id == $veiculo->id)
                                    {{$veiculo->Modelo}}
                                    @endif
                                    @endforeach
                                </small>
                            </td>
                            <td>
                                {{$agendamento->servico}}
                            </td>
                            <td>
                                <div>
                                    {{$agendamento->horario}}
                                </div>
                                <div>
                                    @php
                                    $data=$agendamento->date;
                                    echo implode("/",array_reverse(explode("-",$data)));
                                    @endphp
                                </div>
                            </td>
                            <td class="project-state">
                                <span class="badge badge-success">{{$agendamento->status}}</span>
                            </td>
                            <td class="project-actions text-right">
                                <form action="{{route('admin.concluiAgendamentos',$agendamento->id)}}" method="post" id='FormAgendado'>
                                    @method("put")
                                    @csrf
                                    <button type="button" class="btn bg-lime btn-sm" onclick="ConcluiAgendamento()">
                                        <ion-icon name="checkbox-outline" style="font-size: 22px;"></ion-icon>
                                    </button>
                                </form>
                            </td>
                            <td>
                                <form action="{{route('admin.destroyAgendamentos',$agendamento->id)}}" method="post" id='FormDeleteAgendado'>
                                    @method("delete")
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="ConfirmDeleteAgendado()">
                                        <ion-icon name="close-circle-outline" style="font-size: 22px;"></ion-icon>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Concluídos-->
    <div class="card"><!-- Collapsed fechado:class="collapsed-card"-->
        <div class="card-header">
            <h3 class="card-title">Concluídos</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <div class="card-body p-0"><!-- Collapsed fechado: style="display: none;"-->
                <table class=" display table table-striped projects" id="table-concluido">
                    <thead>
                        <tr>
                            <th style="width: 1%">
                                ID
                            </th>
                            <th style="width: 20%">
                                Cliente
                            </th>
                            <th>
                                Serviço
                            </th>
                            <th>
                                Data
                            </th>
                            <th style="width: 8%" class="text-center">
                                Status
                            </th>
                            <th style="width: 20%">
                            </th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($agendamentos as $agendamento)
                        @if($agendamento->status == 'concluido')
                        <tr>
                            <td>
                                {{$agendamento->id}}
                            </td>
                            <td>
                                <a>
                                    @foreach($users as $user)
                                    @if($agendamento->user_id == $user->id)
                                    {{$user->name}}
                                    @endif
                                    @endforeach
                                </a>
                                <br>
                                <small>
                                    @foreach($veiculos as $veiculo)
                                    @if($agendamento->veiculo_id == $veiculo->id)
                                    {{$veiculo->Modelo}}
                                    @endif
                                    @endforeach
                                </small>
                            </td>
                            <td>
                                {{$agendamento->servico}}
                            </td>
                            <td>
                                <div>
                                    {{$agendamento->horario}}
                                </div>
                                <div>
                                    @php
                                    $data=$agendamento->date;
                                    echo implode("/",array_reverse(explode("-",$data)));
                                    @endphp
                                </div>
                            </td>
                            <td class="project-state">
                                <span class="badge bg-primary">{{$agendamento->status}}</span>
                            </td>
                            <td></td>
                            <td></td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</section>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
@stop

@section('js')
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
@stop
