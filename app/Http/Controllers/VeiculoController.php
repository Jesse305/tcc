<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\User;
use App\Models\Veiculo;
use App\Models\Cliente;

class VeiculoController extends Controller
{
    public function __contrusct()
    {

      $this->middleware('auth');
    }

    public function listar()
    {

      $veiculos = Veiculo::all();

      return view('veiculos.listar', [
        'veiculos' => $veiculos
      ]);
    }

    public function cadastro()
    {
      $lista_clientes = Cliente::orderBy('nome')
      ->get();

      return view('veiculos.cadastro', [
        'lista_clientes' => $lista_clientes,
      ]);
    }

    public function validaForm($operacao, $dados)
    {

        if($operacao === 1){
          $placa = 'required|min:8|unique:veiculos';
        }else if($operacao === 2){
          $placa = 'required|min:8';
        }

        $validacao = Validator::make($dados->all(), [
          'modelo' => 'required|min:2',
          'ano' => 'required|min:4|integer',
          'cor' => 'required|min:4',
          'placa' => $placa,
          'cliente_id' => 'required|integer',
        ],[
          'placa.min' => 'Informe uma placa válida.'
        ]);

        return $validacao->validate();
    }

    public function cadastrar(Request $request)
    {

      $this->validaForm(1, $request);

      $veiculo = new Veiculo($request->all());

      if($veiculo->save()){

        return redirect()
        ->route('veiculos.listar')
        ->with('alert', [
          'type' => 'success',
          'text' => 'veículo cadastrado com sucesso.'
        ]);
      }
    }

    public function edicao(Veiculo $veiculo)
    {

      $lista_clientes = Cliente::orderBy('nome')
      ->get();

      return view('veiculos.edicao', [
        'lista_clientes' => $lista_clientes,
        'veiculo' => $veiculo,
      ]);
    }

    public function editar(Veiculo $veiculo, Request $request)
    {

      $this->validaForm(2, $request);

      if($veiculo->update($request->all())){

        return redirect()
        ->route('veiculos.listar')
        ->with('alert', [
          'type' => 'success',
          'text' => 'Cadastro editado com sucesso.',
        ]);
      }
    }

    public function excluir(Veiculo $veiculo)
    {

      if($veiculo->delete()){

        return redirect()
        ->back()
        ->with('alert', [
          'type' => 'success',
          'text' => 'Cadastro excluído com sucesso.',
        ]);
      }
    }
}
