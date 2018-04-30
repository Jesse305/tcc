@csrf
<div class="form-group row">
  <label class="col-md-3 text-md-right" for="nome">Nome:</label>
  <div class="col-md-9">
    <input class="form-control" type="text" name="nome" id="nome" value="{{ old('nome') }}" maxlength="200" required>
    @if($errors->has('nome'))
      <span class="text-danger"> <p>{{ $errors->first('nome') }}</p> </span>
    @endif
  </div>
</div>

<div class="form-group row">
  <label class="col-md-3 text-md-right" for="cpf">CPF:</label>
  <div class="col-md-9">
    <input class="form-control cpf" type="text" name="cpf" id="cpf" value="{{ old('cpf') }}" required>
    @if($errors->has('cpf'))
      <span class="text-danger"> <p>{{ $errors->first('cpf') }}</p> </span>
    @endif
  </div>
</div>

<div class="form-group row">
  <label class="col-md-3 text-md-right" for="telefone">Telefone:</label>
  <div class="col-md-9">
    <input class="form-control telefone" type="text" name="telefone" id="telefone" value="{{ old('telefone') }}" required>
    @if($errors->has('telefone'))
      <span class="text-danger"> <p>{{ $errors->first('telefone') }}</p> </span>
    @endif
  </div>
</div>

<div class="form-group row">
  <label class="col-md-3 text-md-right" for="email">E-mail:</label>
  <div class="col-md-9">
    <input class="form-control" type="text" name="email" id="email" value="{{ old('email') }}">
    @if($errors->has('email'))
      <span class="text-danger"> <p>{{ $errors->first('email') }}</p> </span>
    @endif
  </div>
</div>

<div class="text-center">
  <button type="button" class="btn btn-info btn-sm back">Voltar</button>
  <button type="submit" class="btn btn-info btn-sm">Salvar</button>
</div>
