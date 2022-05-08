<?php

namespace App\Classes;

class Numeros
{
	
	private $id;
	private $idUser;
	private $status; 
	private $codigo; 
	private $um;
	private $dois;
	private $tres;
	private $quatro;
	private $cinco;
	private $seis;
	private $sete;
	private $oito;
	private $nove;
	private $dez;
	private $onze;
	private $doze;
	private $treze;
	private $quartoze;
	private $quinze;

	//Atribuir o set a todos os atributos
	public function __set($atrib, $value){
		$this->$atrib = $value;
	}
	
	//Atribuir o get a todos os atributos
	public function __get($atrib){
		return $this->$atrib;
	}


	public function numeros()
	{

		$numeros = [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25];

		return $numeros;

	}

}

?>