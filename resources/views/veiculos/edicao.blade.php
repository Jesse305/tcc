@extends('layouts.app')

@section('title', 'EDIÇÃO DE CADASTRO VEÍCULO')

@section('content')
<div class="col-md-6 " style="margin-left: 10%;">
  <div class="card shadow">
    <div class="card-header bg-info">Editar Cadastro</div>
    <div class="card-body">
      <form class="" action="{{ route('veiculos.editar', $veiculo) }}" method="post">
        @include('veiculos.form')
      </form>
    </div>
  </div>
</div>
@endsection
