<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Lista de Veículos</div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Modelo</th>
                                    <th>Marca</th>
                                    <th>Ano</th>
                                    <th>Cor</th>
                                    <th>Placa</th>
                                    <th>Foto</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($veiculos as $veiculo)
                                <tr>
                                    <td>{{ $veiculo->id }}</td>
                                    <td>{{ $veiculo->Modelo }}</td>
                                    <td>{{ $veiculo->Marca }}</td>
                                    <td>{{ $veiculo->Ano }}</td>
                                    <td>{{ $veiculo->Cor }}</td>
                                    <td>{{ $veiculo->Placa }}</td>
                                    <td>
                                        @if ($veiculo->fotoveiculo)
                                        <img src="http://192.168.1.4:8000/storage/veiculos/{{$veiculo->fotoveiculo}}" alt="Foto do veículo" height="50">

                                        @else
                                        Sem foto
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('veiculos.edit', $veiculo->id) }}" class="btn btn-primary">Editar</a>
                                        <form action="{{ route('veiculos.destroy', $veiculo->id) }}" method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Excluir</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>