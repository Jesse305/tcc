function toast(titulo, texto){

  $.toast({
      heading: titulo,
      text: texto,
      icon: 'info',
      position: 'top-right',
      loader: false,
  });
}

function carregandoOn(){
  $('#loading').show();
  $('#over_loading').show();
}

function carregandoOff(){
  $('#loading').fadeOut('slow');
  $('#over_loading').fadeOut('slow');
}

var formulario = $('.formulario');
formulario.on('submit', function(){
  carregandoOn();
});

$('.excluir').click(function(){
  var url = $(this).data('url');
  swal({
    title: 'Tem Certeza?',
    text: "Deseja realmente excluir o cadastro!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Sim, excluir!',
    cancelButtonText: 'Não, cancelar'
  }).then((result) => {
    if (result.value) {
      window.location.href = url;
    }
  });
});

$(document).ready(function(){

  $('.dataTable').dataTable({
     "language": {
         "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Portuguese-Brasil.json",
     }
  });

  $('.cpf').mask('000.000.000-00');
  $('.telefone').mask('(00) 00000-0000');
  $('.placa').mask('AAA-0000');

  $('.back').click(function(){
    history.back();
  });

  $('.slc_chosen').chosen({no_results_text: "Nenhum resultado para "});

  carregandoOff();

});
