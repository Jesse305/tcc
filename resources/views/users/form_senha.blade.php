<!-- The Modal -->
<div class="modal fade" id="modal_senha">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header bg-info text-light">
        <h4 class="modal-title">Trocar Senha</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form class="" action="{{ route('users.trocar_senha', $user) }}" method="post" id="form_senha">
          @csrf
          <input class="form-control" type="password" name="password" value="" required maxlength="12" placeholder="Nova senha">
          @if ($errors->has('password'))
              <span class="text-danger">
                  <strong>{{ $errors->first('password') }}</strong>
              </span>
          @endif
          <input class="form-control" type="password" name="password_confirmation" value="" required maxlength="12" placeholder="Confirmação de  senha"
          style="margin-top: 10px;">
          @if ($errors->has('password_confirmation'))
              <span class="text-danger">
                  <strong>{{ $errors->first('password_confirmation') }}</strong>
              </span>
          @endif
        </form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-info btn-sm" data-dismiss="modal">Cancelar</button>
        <button type="submit" form="form_senha" class="btn btn-info btn-sm" id="salvar_senha">Salvar</button>
      </div>

    </div>
  </div>
</div>

@push('script')
  <script type="text/javascript">
    @if($errors->has('password') || $errors->has('password_confirmation'))
      $('#open_modal').click();
    @endif
    var form_senha = $('#form_senha');
    var modal_senha = $('#modal_senha');
    form_senha.on('submit', function(){
      modal_senha.hide();
      carregandoOn();
    });
  </script>
@endpush
