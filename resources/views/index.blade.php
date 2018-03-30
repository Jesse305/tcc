@extends('layouts.app')

@section('title', 'ENTRAR')

@section('content')

<div class="col-md-4 " style="margin-left: 18%;margin-top:10%;">
  <div class="card shadow">
    <div class="card-header bg-info">Entrar</div>
    <div class="card-body">
      <form class="" action="" method="post">
        <div class="form-group">
          <label for="cpf">CPF:</label>
          <input class="form-control cpf" type="text" name="cpf" value="" id="cpf" required>
          @if (!$errors->has('cpf'))
              <span class="text-danger">
                  <strong>{{ $errors->first('cpf') }}</strong>
              </span>
          @endif
        </div>
        <div class="form-group">
          <label for="password">Senha:</label>
          <input class="form-control" type="password" name="password" value="" id="password" maxlength="12" required>
          @if (!$errors->has('password'))
              <span class="text-danger">
                  <strong>{{ $errors->first('password') }}</strong>
              </span>
          @endif
        </div>
        <div class="text-center">
          <button class="btn btn-info btn-sm" type="submit" name="entrar" id="entrar">Entrar</button>
        </div>
      </form>
    </div>
  </div>
</div>

@endsection
