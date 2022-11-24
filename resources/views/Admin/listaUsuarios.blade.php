@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Usuários cadastrados</h1>
@stop

@section('content')

<head>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>

</head>

<script>
    $(document).ready(function() {
        $('#exemplo').DataTable();
        console.log("teste2");
    });
</script>

<section class="content">
    <!-- Tabela de Usuários-->

    <div class="card">
        <div class="card-body">
             <table id="exemplo" class="display " style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Telefone</th>
                <th>Perfil</th>
                <th>E-mail</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->phone}}</td>
                @if ($user->admin == '1')
                <td>Administrador</td>
                @else
                <td>Cliente</td>
                @endif
                <td>{{$user->email}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
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
