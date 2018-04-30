@extends('layouts.app')

@section('title', 'CLIENTES')

@section('content')
<div class="row">
  <table class="table table-hover table-bordered table-condensed dataTable">
    <thead>
      <tr>
        <th>Nome</th>
        <th>CPF</th>
        <th>Telefone</th>
        <th>E-mail</th>
        <th>Ações</th>
      </tr>
    </thead>
    <tbody>
      @foreach($clientes as $cliente)
      <tr>
        <td>{{ $cliente->nome }}</td>
        <td>{{ $cliente->cpf }}</td>
        <td>{{ $cliente->telefone }}</td>
        <td>{{ $cliente->email }}</td>
        <td class="text-center">
          @if($cliente->isVeiculo())
          <a href="#" class="btn btn-link" title="veiculos"> <i class="material-icons text-primary">directions_car</i> </a>
          @endif
          <a href="#" class="btn bt-link" title="editar"> <i class="material-icons text-warning"> mode_edit </i> </a>
          @if(Auth::user()->perfil_id == 1)
          <button type="button" class="btn btn-link excluir" title="excluir" data-url="{{ route('clientes.excluir', $cliente) }}"> <i class="material-icons text-danger">remove_circle</i> </button>
          @endif
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
<div class="row">
  <button type="button" class="btn btn-info btn-sm back">Voltar</button>
</div>
@endsection
