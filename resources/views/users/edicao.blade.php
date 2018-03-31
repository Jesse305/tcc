@extends('layouts.app')

@section('title', 'EDIÇÃO DE CADASTRO')

@section('content')
<div class="col-md-6 " style="margin-left: 10%;">
  <div class="card shadow">
    <div class="card-header bg-info">Edição</div>
    <div class="card-body">
      <form class="" action="{{ route('users.editar', $user) }}" method="post">
        @include('users.form')
      </form>
    </div>
  </div>
</div>
@include('users.form_senha')
@endsection
