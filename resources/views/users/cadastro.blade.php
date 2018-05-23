@extends('layouts.app')

@section('title', 'CADASTRO  DE USUÁRIO')

@section('content')
<div class="col-md-6 mx-auto">
  <div class="card shadow">
    <div class="card-header bg-info">Cadastrar</div>
    <div class="card-body">
      <form class="" action="{{ route('users.cadastrar') }}" method="post" id="form_cadastro">
        @include('users.form')
      </form>
    </div>
  </div>
</div>
@endsection

@push('script')
<script type="text/javascript">
    var form_cadastro = $('#form_cadastro');
    form_cadastro.on('submit', function(){
      carregandoOn();
    });
</script>
@endpush
