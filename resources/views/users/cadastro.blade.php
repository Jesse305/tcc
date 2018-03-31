@extends('layouts.app')

@section('title', 'CADASTRO  DE USUÁRIO')

@section('content')
<div class="col-md-6 " style="margin-left: 10%;">
  <div class="card shadow">
    <div class="card-header bg-info">Cadastrar</div>
    <div class="card-body">
      <form class="" action="{{ route('users.cadastrar') }}" method="post">
        @include('users.form')
      </form>
    </div>
  </div>
</div>
@endsection
