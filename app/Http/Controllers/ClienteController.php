<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;

class ClienteController extends Controller
{
    public function __construnct()
    {

      $this->middleware('auth');
    }

    public function listar()
    {

      $clientes = Cliente::all();

      return view('clientes.listar', [
        'clientes' => $clientes,
      ]);
    }

    public function cadastro()
    {

      return view('clientes.cadastro');
    }

    public function cadastrar(Request $request)
    {

      $request->validate([
        'nome' => 'required|min:3',
        'cpf' => 'required|min:14|unique:clientes',
        'telefone' => 'required|min:14',
        'email' => 'email|unique:clientes',
      ]);

      $cliente = new Cliente($request->all());

      if($cliente->save()){
        return redirect()
        ->route('clientes.listar')
        ->with('alert', [
          'type' => 'success',
          'text' => 'Cliente salvo com sucesso.',
        ]);
      }
    }

    public function excluir(Cliente $cliente)
    {

      if($cliente->isVeiculo()){

        return redirect()
        ->back()
        ->with('alert', [
          'type' => 'warning',
          'text' => 'Não é possível excluir, cliente possui veiculo(s) vinculados.',
        ]);
      }

      if($cliente->delete()){

        return redirect()
        ->back()
        ->with('alert', [
          'type' => 'success',
          'text' => 'Cadastro excluído com sucesso.',
        ]);
      }
    }

    public function edicao(Cliente $cliente)
    {

      return view('clientes.edicao', [
        'cliente' => $cliente,
      ]);
    }

    public function validaCpf(Cliente $cliente, string $cpf)
    {

      return Cliente::where('id', '<>', $cliente->id)
      ->where('cpf', $cpf)
      ->count();
    }

    public function validaEmail(Cliente $cliente, string $email)
    {

      return Cliente::where('id', '<>', $cliente->id)
      ->where('email', $email)
      ->count();
    }

    public function editar(Cliente $cliente, Request $request)
    {

      $request->validate([
        'nome' => 'required|min:3',
        'cpf' => 'required|min:14',
        'telefone' => 'required|min:14',
        'email' => 'email',
      ]);

      $alert = '';

      if($this->validaCpf($cliente, $request->cpf)){
        $alert = 'O cpf já foi utilizado em outro cadastro';
      }

      if($this->validaEmail($cliente, $request->email)){
        $alert = 'O e-mail já foi utilizado em outro cadastro';
      }

      if($alert != ''){
        return redirect()
        ->back()
        ->withInput()
        ->with('alert', [
          'type' => 'info',
          'text' => $alert
        ]);
      }

      if($cliente->update($request->all())){
        return redirect()
        ->route('clientes.listar')
        ->with('alert', [
          'type' => 'success',
          'text' => 'Cadastro alterado com sucesso',
        ]);
      }
    }
}
