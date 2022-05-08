<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Validator;
use Hash;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('guest')->except('logout');
    }

    public function store(Request $request)
    {

        if (empty($request)) {
            return redirect('login')
                ->with('false', 'Dados vazio invalido !!!')
                ->withInput();
        }

        //So aceita se o request estiver preenchido
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|min:5',
            'pwd' => 'required|min:6|max:36'
        ]);

        if ($validator->fails()) {
            return redirect('login')
                ->with('false', 'Dados passados não valido, verifique e tente novamente !!!')
                ->withInput();
        }

        echo "autenticado";

            /*
        if (Auth::attempt(['email' => $request->email, 'password' => $request->pwd]))
        {
            echo "autenticado";
        } else {
            echo "nao autenticado";
            return view('login')
                ->with('false', 'E-mail ou senha invalido, tente novamente !!!')
                ->withInput([$request->email, $request->pwd]);
        }
    */
        
        //Autenticando o usuário logado na session
        //$eduzzAPI = new Eduzz();
        //$dadosToken = $eduzzAPI->autenticandoAPI();

        //Chama a rota para verificar o concurso
        //return redirect()->route('verificaAPI');


    }

}
