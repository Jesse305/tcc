$(document).ready(function(){

  $('.dataTable').dataTable({
     "language": {
         "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Portuguese-Brasil.json",
     }
  });

  $('.cpf').mask('000.000.000-00');
  $('.telefone').mask('(00) 00000-0000');

  $('.back').click(function(){
    history.back();
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

});
