<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classes\User;
use Validator;
use Auth;
use App\Models\UserBD;
use Hash;

class ControllerUsers extends Controller
{
	
	public function index()
	{
		return view('login');
	}

	public function usersList()
	{
		$users = new User();
	}

    public function encAlteraSenha()
    {
        return view('senha');
    }

	public function alteraSenha(Request $request)
    {
        
        if (empty($request->pwdN) || empty($request->pwdC)) {
            return view('senha')
                    ->with('false', 'Senha vazia invalida !!!');
        }

        $validator = Validator::make($request->all(), [
            'pwdN' => 'required|min:6',
            'pwdC' => 'required|min:6'
        ]);

        if ($validator->fails()) {
            return view('senha')
                    ->with('false', 'Senha deve conter no minimo 6 digitos !!!');
        }

        if ($request->pwdN != $request->pwdC) {
             return view('senha')
                    ->with('false', 'Senha nova e a confirmar senha deve ser a mesma !!!');
        }

        $senha = Hash::make($request->pwdN);
        //Pegar o id do usuário da session
        $idUser = Auth::user()->id;

        //Salva a nova senha
        $useDAO = new UserBD();
        $rec = $useDAO->salvaSenhaNova($senha, $idUser);

        if (empty($rec)) {
            return view('index')
                    ->with('true', 'Senha alterada com sucesso !!!');
        } else {

            return view('index')
                    ->with('false', 'Ocorreu um erro, favor tente mais tarde !!!');

        }

    }

    public function cadastrar(Request $request)
    {
    	
    	//So aceita se o request estiver preenchido
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|min:5',
            'nome' => 'required|min:3|max:36',
            'pwd' => 'required|min:6|max:36',
            'Cpwd' => 'required|min:6|max:36'
        ]);

        if ($validator->fails()) {
            return view('cadastro')
                ->with('false', 'Dados passados invalido, verifique e tente novamente !!!');
        } 

        if($request->pwd != $request->Cpwd){
        	return view('cadastro')
                ->with('false', 'Senha não confeir, tente novamente !!!');
        }

        $user = new User();
        $user->user = $request->nome;
        $user->email = $request->email;
        $user->password = $request->pwd;

        $useDAO = new UserBD();
        $validar = $useDAO->cadastrar($user);

        if (empty($validar)) {
        	return view('login')
                ->with('true', 'Cadastro realizado com sucesso !!!');
        }

        return view('cadastro')
                ->with('false', 'Não foi possivel fazer o cadastro, tente novamente mais tarde !!!');

    }

    public function fazCadastro()
    {
    	return view('cadastro');
    }

    public function encEmail()
    {
        return view('email\index');
    }

    public function recuperaSenhaPorEmail(Request $request)
    {
        
        //So aceita se o request estiver preenchido
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|min:5'
        ]);

        if ($validator->fails()) {
            return view('email\index')
                ->with('false', 'Dados passados invalido, verifique e tente novamente !!!');
        }

        $email = $request->get('email');

        $useDAO = new UserBD();
        $verificar = $useDAO->validaEmail($email);

        if (empty($verificar)) {
            return view('email\index')
                ->with('false', 'E-mail não cadastro no sistema');
        }

        $novaSenha = Hash::make('lotecArrebenta@2020');

        echo "Nova senha enviada";

    }

}

?>