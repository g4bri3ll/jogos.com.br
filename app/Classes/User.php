<?php

namespace App\Classes;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{

	use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


	/**
		* Função para gerar senhas aleatórias
		*
		* @author    Thiago Belem <contato@thiagobelem.net>
		*
		* @param integer $tamanho Tamanho da senha a ser gerada
		* @param boolean $maiusculas Se terá letras maiúsculas
		* @param boolean $numeros Se terá números
		* @param boolean $simbolos Se terá símbolos
		*
		* @return string A senha gerada
	*/
	public function gerandoCodigo($tamanho = 8, $maiusculas = true, $numeros = true, $simbolos = false)
	{

		$lmin = 'abcdefghijklmnopqrstuvwxyz';
		$lmai = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$num = '1234567890';
		$retorno = '';
		$caracteres = '';
		$caracteres .= $lmin;
		if ($maiusculas) $caracteres .= $lmai;
		if ($numeros) $caracteres .= $num;
		$len = strlen($caracteres);
		for ($n = 1; $n <= $tamanho; $n++) {
			$rand = mt_rand(1, $len);
			$retorno .= $caracteres[$rand-1];
		}

		return $retorno;

	}

}

?>