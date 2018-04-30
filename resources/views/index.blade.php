@extends('layouts.app')

@section('title', 'ENTRAR')

@section('content')

<div class="col-md-4 mx-auto" style="margin-top:100px;">
  <div class="card shadow">
    <div class="card-header bg-info">Entrar</div>
    <div class="card-body">
      <form class="" action="{{ route('logar') }}" method="post" id="form_entrar">
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
          <button class="btn btn-info btn-sm" type="submit" form="form_entrar" id="entrar">Entrar</button> <br>
          <button class="btn btn-link" type="button" data-toggle="modal" data-target="#modal_senha" id="btn_modal_senha">Esqueci minha senha</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- The Modal -->
<div class="modal fade" id="modal_senha">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header bg-info text-light">
        <h4 class="modal-title">Resetar senha</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form class="formulario" action="{{ route('users.recupera_senha') }}" method="post" id="form_senha">
          @csrf
          <div class="form-group">
            <input class="form-control" type="text" name="email" value="{{ old('email') }}" placeholder="informe seu e-mail" maxlength="200" required>
            @if($errors->has('email'))
              <span class="text-danger">
                <strong>{{ $errors->first('email') }}</strong>
              </span>
            @endif
          </div>
        </form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-info btn-sm" data-dismiss="modal">Cancelar</button>
        <button type="submit" form="form_senha" class="btn btn-info btn-sm" name="button" id="btn_enviar">Enviar</button>
      </div>

    </div>
  </div>
</div>

@endsection

@push('script')
<script type="text/javascript">
  var btn_modal_senha = $('#btn_modal_senha');
  var modal_senha = $('#modal_senha');
  var form_senha = $('#form_senha');
  @if($errors->has('email'))
    btn_modal_senha.click();
  @endif
  form_senha.on('submit', function(){
    modal_senha.hide();
  });
</script>
@endpush
