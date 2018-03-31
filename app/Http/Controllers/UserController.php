<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\EnvioEmail;

class UserController extends Controller
{
    public function __contruct()
    {
      $this->middleware('auth');
    }

    public function listar()
    {

      return view('users.listar', [
        'users' => User::all(),
      ]);
    }

    public function cadastro()
    {

      return view('users.cadastro');
    }

    public function validaForm($dados, $operacao)
    {

      if($operacao === 1){
        $valida_cpf = 'required|min:14|unique:users';
        $valida_email = 'required|email|unique:users';
      }else if($operacao === 2){
        $valida_cpf = 'required|min:14';
        $valida_email = 'required|email';
      }

      $validation = Validator::make($dados->all(), [
        'name' => 'required|min:3',
        'cpf' => $valida_cpf,
        'phone' => 'required|min:14',
        'email' => $valida_email,
      ]);

      return $validation->validate();

    }

    public function cadastrar(Request $request)
    {

      $this->validaForm($request, 1);

      $password = str_random(8);

      $user = new User([
        'name' => $request->name,
        'cpf' => $request->cpf,
        'phone' => $request->phone,
        'email' => $request->email,
        'password' => bcrypt($password),
      ]);

      $user_send = [
        'name' => $request->name,
        'cpf' => $request->cpf,
        'password' => $password,
      ];

      $send_email = Mail::to($request->email)
      ->send(new EnvioEmail($user_send));

      if($user->save()){

        return redirect()
        ->route('users.listar')
        ->with('alert', [
          'type' => 'success',
          'text' => 'Usuário cadastrado com sucesso.'
        ]);
      }

    }

    public function edicao(User $user)
    {

      return view('users.edicao',[
        'user' => $user
      ]);
    }

    public function editar(User $user, Request $request)
    {

      $this->validaForm($request, 2);

      if($user->update($request->all())){
        return redirect()
        ->route('users.listar')
        ->with('alert', [
          'type' => 'success',
          'text' => 'Usuário editado com sucesso.'
        ]);
      }
    }

    public function trocarSenha(User $user, Request $request){

      Validator::make($request->all(), [
        'password' => 'required|min:6|confirmed',
        'password_confirmation' => 'required|min:6|same:password'
      ])->validate();

      $password = [
        'password' => bcrypt($request->password),
      ];

      if($user->update($password)){
        return redirect()
        ->back()
        ->with('alert', [
          'type' => 'success',
          'text' => 'Senha editada com sucesso.'
        ]);
      }

    }

    public function excluir(User $user)
    {

      if(Auth::user()->id !== $user->id){
        $user->delete();
        return redirect()
        ->back()
        ->with('alert', [
          'type' => 'success',
          'text' => 'Cadastro excluído com sucesso.'
        ]);
      }else{
        return redirect()
        ->back()
        ->with('alert', [
          'type' => 'error',
          'text' => 'Não é possível excluir o próprio cadastro.'
        ]);
      }
    }
}
