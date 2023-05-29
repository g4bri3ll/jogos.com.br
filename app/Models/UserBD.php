<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Exception;
use App\Classes\User;
use Illuminate\Support\Facades\Hash;

class UserBD extends Exception
{

	public function listaJogoSalvos($idUser, $status)
	{

		$dados = DB::select('SELECT codigo AS nome FROM temp_jogos_tres WHERE id_users = ? AND salvar = ?
								UNION
							SELECT codigo AS nome FROM temp_jogos_quatro WHERE id_users = ? AND status = ?
								UNION
							SELECT codigo AS nome FROM temp_jogos_cinco WHERE id_users = ? AND status = ?
								UNION
							SELECT codigo AS nome FROM temp_jogos_sete WHERE id_users = ? AND status = ?', [$idUser, $status, $idUser, $status, $idUser, $status, $idUser, $status]);

		return $dados;

	}

	public function cadastrar(User $user)
	{

		try{

			DB::table('users')
        	->insert([
        		'name' => $user->user,
        		'email' => $user->email,
        		'password' => Hash::make($user->password),
        	]);

			/*$cadastrar = DB::select('INSERT INTO users (name, email, password) VALUE (?,?,?)', [$user->user, $user->email, $user->password]);
			*/
			return 0;

		} catch (Exception $e) {        // ... mas não aqui.
    		return "Pegou Exception padrão <br />" . $e;
		}

	}

	public function verificarLogin($email, $senha)
	{

		try {

			$users = DB::table('users')
						->select('email','name')
						->where('email', $email)
						->where('password', $senha)
						->get();

			return $users;

		} catch (Exception $e) {        // ... mas não aqui.
    		return "Pegou Exception padrão <br />" . $e->getMessage();
		}

	}

    /**
     * @param $senha
     * @param $idUser
     * @return string|true
     */
	public function salvaSenhaNova($senha, $idUser)
	{
		try {
			DB::select('UPDATE users SET password = ? WHERE id = ?', [$senha, $idUser]);
			return true;
		} catch (Exception $e) {
    		return "Pegou Exception padrão <br />" . $e->getMessage();
		}
	}

	public function validaEmail($email)
	{
		$retornaEmail = DB::select('SELECT * FROM users WHERE email LIKE ?', [$email]);
		return $retornaEmail;
	}

}

?>
