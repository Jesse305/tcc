@extends('layouts.app')

@section('title', 'CADASTRO DE CLIENTE')

@section('content')

<div class="col-md-6 mx-auto">
  <div class="card shadow">
    <div class="card-header bg-info text-light">
      <h4>Cadastro de Cliente</h4>
    </div>
    <div class="card-body">
      <form class="formulario" action="{{ route('clientes.cadastrar') }}" method="post">
        @include('clientes.form')
      </form>
    </div>
  </div>
</div>

@endsection
