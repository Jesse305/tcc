@csrf
<div class="form-group row">
  <label class="col-md-3 text-md-right" for="name">Nome:</label>
  <div class="col-md-9">
    <input class="form-control" type="text" name="name" value="{{ old('name', isset($user) ? $user->name : '') }}" id="name" maxlength="200" required autofocus>
    @if ($errors->has('name'))
        <span class="text-danger">
            <strong>{{ $errors->first('name') }}</strong>
        </span>
    @endif
  </div>
</div>
<div class="form-group row">
  <label class="col-md-3 text-md-right" for="cpf">CPF:</label>
  <div class="col-md-9">
    <input class="form-control cpf" type="text" name="cpf" value="{{ old('cpf', isset($user) ? $user->cpf : '') }}" id="cpf" required>
    @if ($errors->has('cpf'))
        <span class="text-danger">
            <strong>{{ $errors->first('cpf') }}</strong>
        </span>
    @endif
  </div>
</div>
<div class="form-group row">
  <label class="col-md-3 text-md-right" for="phone">Telefone:</label>
  <div class="col-md-9">
    <input class="form-control telefone" type="text" name="phone" value="{{ old('phone', isset($user) ? $user->phone : '') }}" id="phone" required>
    @if ($errors->has('phone'))
        <span class="text-danger">
            <strong>{{ $errors->first('phone') }}</strong>
        </span>
    @endif
  </div>
</div>
<div class="form-group row">
  <label class="col-md-3 text-md-right" for="email">E-mail:</label>
  <div class="col-md-9">
    <input class="form-control" type="text" name="email" value="{{ old('email', isset($user) ? $user->email : '') }}" id="email" maxlength="200" required>
    @if ($errors->has('email'))
        <span class="text-danger">
            <strong>{{ $errors->first('email') }}</strong>
        </span>
    @endif
  </div>
</div>
@if(Auth::user()->perfil_id == 1)
<div class="form-group row">
  <label class="col-md-3 text-md-right" for="email">Perfil:</label>
  <div class="col-md-9">
    <label class="radio-inline"><input type="radio" name="perfil_id" value="2" checked {{ old('perfil_id') == 2 || (isset($user) && $user->perfil_id == 2) ? 'checked' : '' }}
      {{ isset($user) && $user->perfil_id == 1 ? ' disabled' : '' }}
      > Funcionário</label>
    <label class="radio-inline"><input type="radio" name="perfil_id" value="1" {{ old('perfil_id') == 1 || (isset($user) && $user->perfil_id == 1) ? 'checked disabled' : '' }}
      > Administrador</label>
  </div>
</div>
@endif
@if(isset($user) && $user->id == Auth::user()->id )
<div class="form-group row">
  <label class="col-md-3 text-md-right" for="alt_senha">Trocar Senha:</label>
  <div class="col-md-9">
    <button class="btn btn-info btn-sm" type="button" data-toggle="modal" data-target="#modal_senha" id="open_modal">******</button>
  </div>
</div>
@endif
<div class="text-center">
  <button type="button" class="btn btn-info btn-sm back">Voltar</button>
  <button class="btn btn-info btn-sm" type="submit" id="salvar">Salvar</button>
</div>
