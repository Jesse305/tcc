@csrf
<div class="form-group row">
  <label class="col-md-3 text-md-right" for="name">Nome:</label>
  <div class="col-md-9">
    <input class="form-control" type="text" name="name" value="{{ old('name') }}" id="name" maxlength="200" required autofocus>
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
    <input class="form-control cpf" type="text" name="cpf" value="{{ old('cpf') }}" id="cpf" required>
    @if ($errors->has('cpf'))
        <span class="text-danger">
            <strong>{{ $errors->first('cpf') }}</strong>
        </span>
    @endif
  </div>
</div>
<div class="form-group row">
  <label class="col-md-3 text-md-right" for="email">E-mail:</label>
  <div class="col-md-9">
    <input class="form-control" type="text" name="email" value="{{ old('email') }}" id="email" maxlength="200" required>
    @if ($errors->has('email'))
        <span class="text-danger">
            <strong>{{ $errors->first('email') }}</strong>
        </span>
    @endif
  </div>
</div>
<div class="text-center">
  <button type="button" class="btn btn-info btn-sm back">Voltar</button>
  <button class="btn btn-success btn-sm" type="submit" id="salvar">Salvar</button>
</div>

@push('script')
<script type="text/javascript">
  $('#salvar').click(function(){
    $(this).attr('disabled', true);
  });
</script>
@endpush
