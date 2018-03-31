@extends('layouts.app')

@section('title', 'ENTRAR')

@section('content')

<div class="col-md-4 " style="margin-left: 18%;margin-top:10%;">
  <div class="card shadow">
    <div class="card-header bg-info">Entrar</div>
    <div class="card-body">
      <form class="" action="{{ route('login') }}" method="post">
        <div class="form-group row">
          @csrf
          <label class="col-md-3 text-md-right" for="cpf">CPF:</label>
          <div class="col-md-9">
            <input class="form-control cpf" type="text" name="cpf" value="{{ old('cpf') }}" id="cpf" required>
            @if ($errors->has('cpf'))
                <span class="text-danger">
                    <strong>{{ $errors->first('cpf') }}</strong>
                </span>
            @endif
          </div>
        </div>
        <div class="form-group row">
          <label class="col-md-3 text-md-right" for="password">Senha:</label>
          <div class="col-md-9">
            <input class="form-control" type="password" name="password" value="" id="password" maxlength="12" required>
            @if ($errors->has('password'))
                <span class="text-danger">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
          </div>
        </div>
        <div class="text-center">
          <button class="btn btn-info btn-sm" type="submit" id="entrar">Entrar</button>
        </div>
      </form>
    </div>
  </div>
</div>

@endsection
