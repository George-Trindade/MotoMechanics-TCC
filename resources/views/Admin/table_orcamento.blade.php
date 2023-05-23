 <div class="card"><!-- Collapsed fechado:class="collapsed-card"-->
     <div class="card-header">
         <h3 class="card-title">Solicitações</h3>
         <div class="card-tools">
             <button id='update' type="button" class="btn bg-orange btn-sm">
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
     <script>
         $(document).ready(function() {
             $('#update').on('click', function() {
                 $("#geral").css({
                     display: "none"
                 });
                 $("#div-loader").css({
                     display: "flex"
                 });
                 $("#loader").css({
                     display: "block"
                 });

                 $.ajax("/admin/orcamentos/get/ajaxorcamentos", {
                     dataType: "json",
                     success: function(data) {
                         $("#tabela-nova").html(data["html"]);
                         $("#table-solicitado").DataTable({});
                         $("#div-loader").css({
                             display: "none"
                         });
                         $("#loader").css({
                             display: "none"
                         });
                         $("#geral").css({
                             display: "block"
                         });
                     },
                 });
                 $.ajaxSetup({
                     headers: {
                         "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                     },
                 });
             });
         });
     </script>