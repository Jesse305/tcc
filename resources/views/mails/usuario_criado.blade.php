<style media="screen">
  .table {
    width: 500px;
    margin-top: 50px;
    border: 1px solid gray;
    margin-left: auto;
    margin-right: auto;
  }

  .table tr, td, th {
    border: 1px solid gray;
  }

  .table th {
    background-color: #17a2b8 !important;
    color: #ffffff;
  }
</style>
<table class="table">
  <tr>
    <th>Seus dados Para Login SISCAR</th>
  </tr>
  <tr>
    <td> <b>Usuário:</b> {{ isset($user) ? $user['name'] : 'erro!' }} </td>
  </tr>
  <tr>
    <td> <b>Login:</b> {{ isset($user) ? $user['cpf'] : 'erro!' }} </td>
  </tr>
  <tr>
    <td> <b>Senha:</b> {{ isset($user) ? $user['password'] : 'erro!' }} </td>
  </tr>
  <tr>
    <td> <b>Acessar:</b> <a href="#">siscar.com.br</a> </td>
  </tr>
</table>
