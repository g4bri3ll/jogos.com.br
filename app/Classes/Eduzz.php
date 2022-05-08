<?php

namespace App\Classes;

class Eduzz
{

    ///credential/generate_token autenticar usuário
    private $email = "carlossouzacabral@gmail.com";
    private $senha = "DFGD1DF5GSD1G";
    private $publicKey = "29486438";
    private $apiKey = "d91adc33b1";

    //Recuperando dados da API
    public function autenticandoAPI()
    {

        $dados = [
            'email' => $this->email,
            'publickey' => $this->publicKey,
            'apikey' => $this->apiKey
        ];

        $url = 'https://api2.eduzz.com/credential/generate_token';

        $ch  = curl_init($url);

        curl_setopt($ch, CURLOPT_POST, true);

        curl_setopt($ch, CURLOPT_POSTFIELDS, $dados);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        $resultado = json_decode(curl_exec($ch));

        //dd($resultado);

        foreach ($resultado->data as $value)
        {
            echo $value . "<br />";
        }

    }

}

?>
