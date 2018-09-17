<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.simplo7.net/static/17741/configuracao/favicon.png" type="image/x-icon" rel="shortcut icon" />
<!-- <link rel="stylesheet" href="{{URL::asset('bootstrap/css/bootstrap.min.css')}}"> -->
    <!-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" rel="stylesheet"> -->
    <link href="/css/app.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
    <!-- <script src="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"></script> -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
    <!-- <link rel="stylesheet" type="text/css" href="/css/personal.css"> -->

    <meta name="viewport" content="width=device-width">

    <title>Controle de Estoque Purchase Store</title>
</head>
<body>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{action('ProdutoController@listar')}}">Controle de Estoque</a>
        </div>
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" (click)="sidebarToggle()">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="{{ route('register') }}">
                        <p>Cadastre-se</p>
                    </a>
                </li>
                    <ul class="dropdown-menu">
                        <li><a href="{{action('ProdutoController@listar')}}">Listar Produtos</a></li>
                        <li class="divider"></li>
                        <li><a href="{{action('CategoriaController@listar')}}">Listar Categorias</a></li>
                        <li class="divider"></li>
                        <li><a href="{{action('EntradaController@listarEntrada')}}">Listar Entradas de Produtos</a></li>
                        <li><a href="{{action('SaidaController@listarSaida')}}">Listar Saídas de Produtos</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

@yield('conteudo')

</body>
</html>