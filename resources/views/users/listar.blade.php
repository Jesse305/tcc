@extends('layouts.app')

@section('title', 'USUÁRIOS')

@section('content')

<div class="row">
    <table class="table table-bordered table-hover table-condensed dataTable">
      <thead>
        <tr>
          <th>Nome</th>
          <th>CPF</th>
          <th>Telefone</th>
          <th>E-mail</th>
          <th>Perfil</th>
          <th>Ações</th>
        </tr>
      </thead>
      <tbody>
        @foreach($users as $user)
          <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->cpf }}</td>
            <td>{{ $user->phone }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->getPerfil->perfil }}</td>
            <td class="text-center">
              @if($user->perfil_id == 3)
                <a href="{{ route('users.veiculos', $user) }}" class="btn btn-link" title='ver veículo(s)'> <i class="material-icons text-primary">directions_car</i> </a>
              @endif
              <a href="{{ route('users.edicao', $user) }}" class="btn btn-link" title="editar"> <i class="material-icons text-warning">mode_edit</i> </a>
              <button type="button" class="btn btn-link excluir" title="excluir" data-url="{{ route('users.excluir', $user) }}">
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
