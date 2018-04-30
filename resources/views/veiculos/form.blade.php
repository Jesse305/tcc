@csrf
<div class="form-group row">
  <label class="col-md-3 text-md-right" for="modelo">Modelo:</label>
  <div class="col-md-9">
    <input class="form-control" type="text" name="modelo" value="{{ old('modelo', isset($veiculo) ? $veiculo->modelo : '') }}" id="modelo" maxlength="200" required autofocus>
    @if ($errors->has('modelo'))
        <span class="text-danger">
            <strong>{{ $errors->first('modelo') }}</strong>
        </span>
    @endif
  </div>
</div>

<div class="form-group row">
  <label class="col-md-3 text-md-right" for="ano">Ano:</label>
  <div class="col-md-9">
    <select class="form-control" name="ano" id="ano" required>
      @for($i = 2030; $i > 1970; $i--)
        <option value="{{ $i }}"  {{ (date('Y') == $i || old('ano') == $i || (isset($veiculo) && $veiculo->ano == $i)) ? 'selected' : '' }}> {{ $i }} </option>
      @endfor
    </select>
    @if ($errors->has('ano'))
        <span class="text-danger">
            <strong>{{ $errors->first('ano') }}</strong>
        </span>
    @endif
  </div>
</div>

<div class="form-group row">
  <label class="col-md-3 text-md-right" for="placa">Placa:</label>
  <div class="col-md-9">
    <input class="form-control placa" type="text" name="placa" value="{{ old('placa', isset($veiculo) ? $veiculo->placa : '') }}" id="placa" maxlength="8" onkeyup="maiuscula(this);" required>
    @if ($errors->has('placa'))
        <span class="text-danger">
            <strong>{{ $errors->first('placa') }}</strong>
        </span>
    @endif
  </div>
</div>

<div class="form-group row">
  <label class="col-md-3 text-md-right" for="cor">Cor:</label>
  <div class="col-md-9">
    <input class="form-control" type="text" name="cor" value="{{ old('cor', isset($veiculo) ? $veiculo->cor : '') }}" id="cor" maxlength="150" required>
    @if ($errors->has('cor'))
        <span class="text-danger">
            <strong>{{ $errors->first('cor') }}</strong>
        </span>
    @endif
  </div>
</div>

<div class="form-group row">
  <label class="col-md-3 text-md-right" for="cliente_id">Dono:</label>
  <div class="col-md-9">
    <select class="form-control slc_chosen" name="cliente_id" id="cliente_id" required>
      <option value="">Selecione</option>
      @if(isset($lista_clientes))
        @foreach($lista_clientes as $cliente)
          <option value="{{ $cliente->id }}" {{ (old('cliente_id') == $cliente->id || (isset($veiculo) && $veiculo->cliente->id == $cliente->id)) ? 'selected' : '' }} > {{ $cliente->nome }} </option>
        @endforeach
      @endif
    </select>
    @if ($errors->has('user_id'))
        <span class="text-danger">
            <strong>{{ $errors->first('user_id') }}</strong>
        </span>
    @endif
  </div>
</div>

<div class="text-center">
  <button type="button" class="btn btn-info btn-sm back">Voltar</button>
  <button type="submit" class="btn btn-info btn-sm " id="salvar">Salvar</button>
</div>

@push('script')
<script type="text/javascript">
  function maiuscula(campo){
      var m = campo.value.toUpperCase();
      campo.value = m;
  }

  var salvar = $('#salvar');
  var user_id = $('#user_id');

  salvar.click(function(){
    if(user_id.val() == ""){
      toast('Atenção', 'Selecione o dono do veículo.');
      user_id.trigger('chosen:activate');
    }
  });
</script>
@endpush
