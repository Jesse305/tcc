@extends('layouts.app')

@section('title', 'VEÍCULOS')

@section('content')

<div class="row">
  <table class="table table-hover table-bordered table-condensed dataTable">
    <thead>
      <tr>
        <th>Cliente</th>
        <th>Modelo</th>
        <th>Ano</th>
        <th>Placa</th>
        <th>Cor</th>
        <th>Ações</th>
      </tr>
    </thead>
    <tbody>
      @foreach($veiculos as $veiculo)
        <tr>
          <td>{{ $veiculo->cliente->nome }}</td>
          <td>{{ $veiculo->modelo }}</td>
          <td>{{ $veiculo->ano }}</td>
          <td>{{ $veiculo->placa }}</td>
          <td>{{ $veiculo->cor }}</td>
          <td class="text-center">
            <a href="{{ route('veiculos.edicao', $veiculo) }}" class="btn btn-link" title="editar"> <i class="material-icons text-warning">mode_edit</i> </a>
            <button type="button" class="btn btn-link excluir" title="excluir" data-url="{{ route('veiculos.excluir', $veiculo) }}">
              <i class="material-icons text-danger">remove_circle</i>
            </button>
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
