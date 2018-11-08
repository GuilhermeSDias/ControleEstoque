@extends('layout.principal')
@section('conteudo')
<div class="container">
  <h2>Saídas de Produtos</h2>

  <button class="btn btn-default"><a href="{{action('SaidaController@novo')}}">Lançar Saídas</a></button>

  @if(session()->has('message.level'))
    <div class="alert alert-{{ session('message.level') }}"> 
      {!! session('message.content') !!}
    </div>
  @endif

  <table id="listagem" class="table table-bordered">
    <thead>
      <tr>
        <th>Código Produto</th>
        <th>Descrição</th>
        <th>Data</th>
        <th>Horário</th>
        <th>Quantidade</th>
        <th>Mostrar</th>
        <th>Excluir</th>
      </tr>
    </thead>
    <tbody>
      @foreach($produtos as $p)
        <tr>
          <td>{{ $p->codigo_produto }}</td>
          <td>{{ $p->descricao }}</td>
          <td>{{ date('d/m/Y', strtotime($p->created_at)) }}</td>
          <td>{{ date('H:i:s', strtotime($p->created_at)) }}</td>
          <td>{{ $p->quantidade }}</td>
          <td><a href="/ListarSaida/mostrar/{{ $p->id_saida }}"><span class="glyphicon glyphicon-eye-open"></span></a></td>
          <td><a href="/ListarSaida/remove/{{ $p->id_saida }}"><span class="glyphicon glyphicon-trash"></span></a></td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>
@stop