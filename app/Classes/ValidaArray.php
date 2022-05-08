<?php

namespace App\Classes;

class ValidaArray
{

	public function juntarArray($arrayJogos)
	{
			
		$arrayJogos = array_unique($arrayJogos, SORT_REGULAR);
		return $arrayJogos;

	}

}

?>