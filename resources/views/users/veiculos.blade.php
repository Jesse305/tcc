@extends('layouts.app')

@section('title', 'VEÍCULOS DO CLIENTE')

@section('content')
<div class="row">
  <div class="card" style="width: 95%;">
    <div class="card-header bg-info">
      Dados do Cliente
    </div>
    <div class="card-body">
      <p> <b>Nome do Cliente:</b> {{ $user->name }} </p>
      <p> <b>CPF:</b> {{ $user->cpf }} </p>
      <p> <b>E-mail:</b> {{ $user->email }} </p>
      <p> <b>Telefone:</b> {{ $user->phone }} </p>
      <p> <b>Data do Cadastro:</b> {{ date('d/m/Y', strtotime($user->created_at)) }} </p>
    </div>
  </div>
</div>
<div class="row">
  <div class="card" style="width: 95%; margin-top: 10px;">
    <div class="card-header bg-info">
      Dados do(s) Veículos(s)
    </div>
    <div class="card-body">
      @if($user->getVeiculos->count() > 0)
        @foreach($user->getVeiculos as $veiculo)
          @if($user->getVeiculos->count() > 1)
            <hr>
          @endif
          <p> <b>Modelo:</b> {{ $veiculo->modelo }} <a href="#" class="btn btn-link excluir" data-url="{{ route('veiculos.excluir', $veiculo) }}" title="ecluir veículo"><i class="material-icons text-danger">remove_circle</i></a> </p>
          <p> <b>Ano:</b> {{ $veiculo->ano }} </p>
          <p> <b>Placa:</b> {{ $veiculo->placa }} </p>
          <p> <b>Cor:</b> {{ $veiculo->cor }} </p>
          <p> <b>Data do Cadastro:</b> {{ date('d/m/Y', strtotime($veiculo->created_at)) }} </p>
        @endforeach
      @else
        <p> <b>Nenhum veículo cadastrado para o cliente.</b> </p>
      @endif
    </div>
  </div>
</div>

<div class="row" style="margin-top: 10px;">
  <button type="button" class="btn btn-info btn-sm back">Voltar</button>
</div>
@endsection
