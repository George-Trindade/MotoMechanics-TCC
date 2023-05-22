@extends('adminlte::page')

@section('title', 'Orçamentos')

@section('content_header')
<h1>Orçamentos</h1>
@stop

@section('content')

<head>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://motomechanics.online/public/assets/js/confirmDelete.js" type="text/javascript"></script>
    <script src="https://motomechanics.online/public/assets/js/concluiAgendamento.js" type="text/javascript"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script type="text/javascript" src="https://motomechanics.online/public/assets/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
    <link rel="stylesheet" href="https://motomechanics.online/public/assets/css/loading.css" type="text/css">
</head>

<script>
    $(document).ready(function() {
        $('#table-solicitado').DataTable();
        $('#table-atendido').DataTable();

    });
</script>


<section id=geral class="content">

    <div class="card"><!-- Collapsed fechado:class="collapsed-card"-->
        <div class="card-header">
            <h3 class="card-title">Solicitações</h3>
            <div class="card-tools">
                <button type="button" class="btn bg-orange btn-sm" onclick="AtualizaSolicitacao()">
                    <ion-icon name="reload-circle-outline" style="font-size: 22px;"></ion-icon>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <span>
            <div class="body-loader" id="div-carregamento"><span class="loader" id="carregamento"></span></div>
        </span>
        <div id="tabela" class="card-body p-0"><!-- Collapsed fechado: style="display: none;"-->
            <div class="card-body" id="cardSolicitado">
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
                            <th class="text-center">
                                Valor Total
                            </th>
                            <th class="text-center" style="width: 20%">
                                Ações
                            </th>

                        </tr>
                    </thead>
                    <tbody id="tbody">
                        @foreach($orcamentos as $orcamento)
                        @if($orcamento->valor_total == '0.00')
                        <tr>
                            <td>
                                {{$orcamento->id}}
                            </td>
                            <td>
                                <a>
                                    @foreach($users as $user)
                                    @if($orcamento->user_id == $user->id)
                                    {{$user->name}}
                                    @endif
                                    @endforeach
                                </a>
                                <br>
                                <small>
                                    @foreach($veiculos as $veiculo)
                                    @if($orcamento->veiculo_id == $veiculo->id)
                                    {{$veiculo->Modelo}}
                                    @endif
                                    @endforeach
                                </small>
                            </td>
                            <td>
                                {{$orcamento->servico}}
                            </td>
                            <td class="project-state">
                                <span class="badge bg-warning">Aguardando</span>
                            </td>
                            <td class="project-actions text-right">
                                <button type="button" class="btn bg-blue btn-sm">
                                    <a href="{{ route('admin.showOrcamentos', $orcamento->id) }}">Visualizar</a>
                                </button>
                                <button type="button" class="btn bg-danger btn-sm" onclick="ConfirmaSolicitacao()">
                                    Cancelar
                                </button>

                            </td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="card"><!-- Collapsed fechado:class="collapsed-card"-->
        <div class="card-header">
            <h3 class="card-title">Atendidos</h3>
            <div class="card-tools">
                <button type="button" class="btn bg-orange btn-sm" onclick="AtualizaSolicitacao()">
                    <ion-icon name="reload-circle-outline" style="font-size: 22px;"></ion-icon>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <span>
            <div class="body-loader" id="div-carregamento"><span class="loader" id="carregamento"></span></div>
        </span>
        <div id="tabela" class="card-body p-0"><!-- Collapsed fechado: style="display: none;"-->
            <div class="card-body" id="cardSolicitado">
                <table class="display table table-striped projects" id="table-atendido">
                    <thead>
                        <tr>
                            <th>
                                ID
                            </th>
                            <th>
                                Cliente
                            </th>
                            <th>
                                Serviço
                            </th>
                            <th class="text-center">
                                Valor Total
                            </th>
                        </tr>
                    </thead>
                    <tbody id="tbody">
                        @foreach($orcamentos as $orcamento)
                        @if($orcamento->valor_total != '0.00')
                        <tr>
                            <td>
                                {{$orcamento->id}}
                            </td>
                            <td>
                                <a>
                                    @foreach($users as $user)
                                    @if($orcamento->user_id == $user->id)
                                    {{$user->name}}
                                    @endif
                                    @endforeach
                                </a>
                                <br>
                                <small>
                                    @foreach($veiculos as $veiculo)
                                    @if($orcamento->veiculo_id == $veiculo->id)
                                    {{$veiculo->Modelo}}
                                    @endif
                                    @endforeach
                                </small>
                            </td>
                            <td>
                                {{$orcamento->servico}}
                            </td>
                            <td class="project-state">
                                <span class="badge bg-lime"> R$ {{$orcamento->valor_total}}</span>
                            </td>
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
<script>
    $(document).ready(function() {
        $('#table-atendido').DataTable({
            destroy: true,
            language: {
                "url": "https://motomechanics.online/public/assets/js/pt-BR.json"
            }
        });

        $('#table-solicitado').DataTable({
            destroy: true,
            language: {
                "url": "https://motomechanics.online/public/assets/js/pt-BR.json"
            }
        });
    });
</script>
@stop