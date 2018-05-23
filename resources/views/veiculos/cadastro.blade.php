@extends('layouts.app')

@section('title', 'CADASTRO DE VEÍCULOS')

@section('content')
<div class="col-md-6 mx-auto">
  <div class="card shadow">
    <div class="card-header bg-info">Cadastrar</div>
    <div class="card-body">
      <form class="formulario" action="{{ route('veiculos.cadastrar') }}" method="post" id="form_cadastro">
        @include('veiculos.form')
      </form>
    </div>
  </div>
</div>
@endsection
