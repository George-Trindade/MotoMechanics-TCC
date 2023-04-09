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
                    <div class="card-header">Novo Veículo</div>

                    <div class="card-body">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <form action="{{ route('veiculos.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                            <div class="form-group">
                                <label for="modelo">Modelo:</label>
                                <input type="text" class="form-control" id="modelo" name="Modelo" value="{{ old('Modelo') }}" required>
                            </div>

                            <div class="form-group">
                                <label for="marca">Marca:</label>
                                <input type="text" class="form-control" id="marca" name="Marca" value="{{ old('Marca') }}" required>
                            </div>

                            <div class="form-group">
                                <label for="ano">Ano:</label>
                                <input type="text" class="form-control" id="ano" name="Ano" value="{{ old('Ano') }}" required>
                            </div>

                            <div class="form-group">
                                <label for="cor">Cor:</label>
                                <input type="text" class="form-control" id="cor" name="Cor" value="{{ old('Cor') }}" required>
                            </div>

                            <div class="form-group">
                                <label for="placa">Placa:</label>
                                <input type="text" class="form-control" id="placa" name="Placa" value="{{ old('Placa') }}" required>
                            </div>

                            <div class="form-group">
                                <label for="fotoveiculo">Foto:</label>
                                <input type="file" class="form-control" id="fotoveiculo" name="fotoveiculo">
                            </div>

                            <button type="submit" class="btn btn-primary">Salvar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>