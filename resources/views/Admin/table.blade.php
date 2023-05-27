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
                <tbody id="tbody">
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

                            <form action="{{ route('admin.confirmaAgendamentos', $agendamento->id) }}" method="post" id="FormSolicitacao{{ $agendamento->id }}">
                                @method("put")
                                @csrf
                                <button type="button" class="btn bg-lime btn-sm" onclick="ConfirmaSolicitacao('FormSolicitacao{{ $agendamento->id }}')">
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