<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Validator;
use Illuminate\Support\Facades\Auth;

class LogarController extends Controller
{

    public function logar(Request $request)
    {

      $request->validate([
        'cpf' => 'required|min:14',
        'password' => 'required|min:6',
      ]);

      if(Auth::attempt(['cpf' => $request->cpf, 'password' => $request->password, 'status' => 1])){

        return redirect()
        ->route('users.listar');
      }

      if (Auth::attempt(['cpf' => $request->cpf, 'password' => $request->password, 'status' => 0])) {
        Auth::logout();
        return redirect()
        ->back()
        ->with('alert', [
          'type' => 'error',
          'text' => 'Usuário desabilitado, contate o  administrador.',
        ]);
      }

      if (!Auth::attempt(['cpf' => $request->cpf, 'password' => $request->password])) {

        return redirect()
        ->back()
        ->withInput()
        ->with('alert', [
          'type' => 'error',
          'text' => 'Usuário ou senha incorreto.',
        ]);
      }
    }
}
