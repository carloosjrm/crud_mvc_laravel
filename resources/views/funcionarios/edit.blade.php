<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Editar formulario de Funcionario</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Editar Funcionario</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('funcionarios.index') }}" enctype="multipart/form-data">
                        Voltar</a>
                </div>
            </div>
        </div>
        @if(session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
        @endif
        <form action="{{ route('funcionarios.update',$funcionario->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Nome do Funcionario:</strong>
                        <input type="text" name="nome" value="{{ $funcionario->nome }}" class="form-control"
                            placeholder="Nome do Funcionario">
                        @error('nome')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Email do Funcionario:</strong>
                        <input type="email" name="email" class="form-control" placeholder="Email do Funcionario"
                            value="{{ $funcionario->email }}">
                        @error('email')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Endereco do Funcionario:</strong>
                        <input type="text" name="endereco" value="{{ $funcionario->endereco }}" class="form-control"
                            placeholder="Endereco do Funcionario">
                        @error('endereco')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-primary ml-3">Enviar</button>
            </div>
        </form>
    </div>
</body>

</html>