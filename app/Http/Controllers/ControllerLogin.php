<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Validator;
use Hash;
use Auth;
use Illuminate\Http\Request;

class ControllerLogin extends Controller
{
    
    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        //dd($request);
        if (empty($request)) {
            return view('login')
                ->with('false', 'Dados vazio invalido !!!')
                ->withInput();
        }

        //So aceita se o request estiver preenchido
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|min:5|max:100',
            'pwd' => 'required|min:6|max:36'
        ]);

        if ($validator->fails()) {
            return redirect('login')
                ->with('false', 'Dados passados não valido, verifique e tente novamente !!!')
                ->withInput();
        }

        $credentials = [
            'email' => $request->get('email'), 
            'password' => $request->get('pwd')
        ];

        if (auth()->guard('web')->attempt($credentials))
        {
            //Chama a rota para verificar o concurso
            return redirect()->route('verificaAPI');
        } else {
            return view('login')
                ->with('false', 'E-mail ou senha invalido, tente novamente !!!')
                ->withInput([$request->email, $request->pwd]);
        }
        
        //Autenticando o usuário logado na session
        //$eduzzAPI = new Eduzz();
        //$dadosToken = $eduzzAPI->autenticandoAPI();

    }

    public function logout()
    {
        auth()->guard('web')->logout();
        return redirect('/');
    }

}
