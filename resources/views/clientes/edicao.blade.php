@extends('layouts.app')

@section('title', 'EDITAR CLIENTE')

@section('content')

<div class="col-md-6 mx-auto">
  <div class="card shadow">
    <div class="card-header bg-info text-light">
      <h4>Editar Cliente</h4>
    </div>
    <div class="card-body">
      <form class="formulario" action="{{ route('clientes.editar', $cliente) }}" method="post">
        @include('clientes.form')
      </form>
    </div>
  </div>
</div>

@endsection
