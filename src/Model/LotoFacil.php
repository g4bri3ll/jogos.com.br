<?php

namespace src\Model;

use src\DAO\LotoFacilDAO;
use src\Service\LotoFacil\CalculaPorcetagemSaidaPorPosicao;
use src\Service\LotoFacil\CalculaQuantasVezesONumeroSaiuPorIntervaloDeJogo;
use src\Service\LotoFacil\RetornaValorTotalPorPosicaoJogo;

class LotoFacil
{

    const QUANTIDADE_NUMEROS_JOGOS = 15;
    private $arrayNumeroLotoFacil = [
        "um" => 1,
        "dois" => 2,
        "tres" => 3,
        "quatro" => 4,
        "cinco" => 5,
        "seis" => 6,
        "sete" => 7,
        "oito" => 8,
        "nove" => 9,
        "dez" => 10,
        "onze" => 11,
        "doze" => 12,
        "treze" => 13,
        "quartoze" => 14,
        "quinze" => 15,
        "dezesseis" => 16,
        "dezesete" => 17,
        "dezoito" => 18,
        "dezenove" => 19,
        "vinte" => 20,
        "vinte_um" => 21,
        "vinte_dois" => 22,
        "vinte_tres" => 23,
        "vinte_quatro" => 24,
        "vinte_cinco" => 25
    ];

    const UM = "01";
    const DOIS = "02";
    const TRES = "03";
    const QUATRO = "04";
    const CINCO = "05";
    const SEIS = "06";
    const SETE = "07";
    const OITO = "08";
    const NOVE = "09";
    const DEZ = "10";
    const ONZE = "11";
    const DOZE = "12";
    const TREZE = "13";
    const QUARTOZE = "14";
    const QUINZE = "15";
    const DEZESSEIS = "16";
    const DEZESSETE = "17";
    const DEZOITO = "18";
    const DEZENOVE = "19";
    const VINTE = "20";
    const VINTE_UM = "21";
    const VINTE_DOIS = "22";
    const VINTE_TRES = "23";
    const VINTE_QUATRO = "24";
    const VINTE_CINCO = "25";

    private $qtdVezesSaidos = [
        1 => 0,
        2 => 0,
        3 => 0,
        4 => 0,
        5 => 0,
        6 => 0,
        7 => 0,
        8 => 0,
        9 => 0,
        10 => 0,
        11 => 0,
        12 => 0,
        13 => 0,
        14 => 0,
        15 => 0,
        16 => 0,
        17 => 0,
        18 => 0,
        19 => 0,
        20 => 0,
        21 => 0,
        22 => 0,
        23 => 0,
        24 => 0,
        25 => 0
    ];

    /**
     * Adicionar a quantidade de vezes que o numero saiu por cada jogo.
     * Ex: cada jogo o número saiu uma vez
     * @param array $arrayNumerosDosJogos
     * @return true
     */
    public function contaQtdNumeroMaisSaidos(array $arrayNumerosDosJogos)
    {

        foreach ($arrayNumerosDosJogos as $numeros) {

            switch ($numeros) {
                case self::UM:
                    $this->qtdVezesSaidos[1] = $this->qtdVezesSaidos[1] + 1;
                    break;
                case self::DOIS:
                    $this->qtdVezesSaidos[2] = $this->qtdVezesSaidos[2] + 1;
                    break;
                case self::TRES:
                    $this->qtdVezesSaidos[3] = $this->qtdVezesSaidos[3] + 1;
                    break;
                case self::QUATRO:
                    $this->qtdVezesSaidos[4] = $this->qtdVezesSaidos[4] + 1;
                    break;
                case self::CINCO:
                    $this->qtdVezesSaidos[5] = $this->qtdVezesSaidos[5] + 1;
                    break;
                case self::SEIS:
                    $this->qtdVezesSaidos[6] = $this->qtdVezesSaidos[6] + 1;
                    break;
                case self::SETE:
                    $this->qtdVezesSaidos[7] = $this->qtdVezesSaidos[7] + 1;
                    break;
                case self::OITO:
                    $this->qtdVezesSaidos[8] = $this->qtdVezesSaidos[8] + 1;
                    break;
                case self::NOVE:
                    $this->qtdVezesSaidos[9] = $this->qtdVezesSaidos[9] + 1;
                    break;
                case self::DEZ:
                    $this->qtdVezesSaidos[10] = $this->qtdVezesSaidos[10] + 1;
                    break;
                case self::ONZE:
                    $this->qtdVezesSaidos[11] = $this->qtdVezesSaidos[11] + 1;
                    break;
                case self::DOZE:
                    $this->qtdVezesSaidos[12] = $this->qtdVezesSaidos[12] + 1;
                    break;
                case self::TREZE:
                    $this->qtdVezesSaidos[13] = $this->qtdVezesSaidos[13] + 1;
                    break;
                case self::QUARTOZE:
                    $this->qtdVezesSaidos[14] = $this->qtdVezesSaidos[14] + 1;
                    break;
                case self::QUINZE:
                    $this->qtdVezesSaidos[15] = $this->qtdVezesSaidos[15] + 1;
                    break;
                case self::DEZESSEIS:
                    $this->qtdVezesSaidos[16] = $this->qtdVezesSaidos[16] + 1;
                    break;
                case self::DEZESSETE:
                    $this->qtdVezesSaidos[17] = $this->qtdVezesSaidos[17] + 1;
                    break;
                case self::DEZOITO:
                    $this->qtdVezesSaidos[18] = $this->qtdVezesSaidos[18] + 1;
                    break;
                case self::DEZENOVE:
                    $this->qtdVezesSaidos[19] = $this->qtdVezesSaidos[19] + 1;
                    break;
                case self::VINTE:
                    $this->qtdVezesSaidos[20] = $this->qtdVezesSaidos[20] + 1;
                    break;
                case self::VINTE_UM:
                    $this->qtdVezesSaidos[21] = $this->qtdVezesSaidos[21] + 1;
                    break;
                case self::VINTE_DOIS:
                    $this->qtdVezesSaidos[22] = $this->qtdVezesSaidos[22] + 1;
                    break;
                case self::VINTE_TRES:
                    $this->qtdVezesSaidos[23] = $this->qtdVezesSaidos[23] + 1;
                    break;
                case self::VINTE_QUATRO:
                    $this->qtdVezesSaidos[24] = $this->qtdVezesSaidos[24] + 1;
                    break;
                case self::VINTE_CINCO:
                    $this->qtdVezesSaidos[25] = $this->qtdVezesSaidos[25] + 1;
                    break;
            }
        }

        return true;
    }

    public function listaNumerosSaidosConcursos()
    {
        $lotofacilDAO = new LotoFacilDAO();
        $jogos = $lotofacilDAO->listaJogo();

        $resultLotofacil = array();

        foreach ($jogos as $jogo) {

            $concurso = $jogo['concurso'];

            //Remove a posição do concurso
            unset($jogo['concurso']);

            //Remove a data do concurso
            unset($jogo['data']);

            //Resta apenas os numeros saído deste concurso nessa variável $jogo
            //Converte para string a variavel $numeros
            $numeros = implode(",", $jogo);

            $resultLotofacil[$concurso] = $numeros;
        }

        return $resultLotofacil;
    }

    /**
     * Retorna todos os numeros pela maior quantidade que ele saiu
     * Ex: Quem saiu mais vezes e o primeiro da lista
     * @return bool
     */
    public function ordernaPorOrdemDescrecente()
    {
        return arsort($this->qtdVezesSaidos);
    }

    /**
     * Retorna os numeros que mais sairam pela quantidade informada
     * @param $qtdNumerosMaisSaidos
     * @return array
     */
    public function retornaNumerosMaisSaido($qtdNumerosMaisSaidos)
    {
        $result = [];
        $cont = 1;

        foreach ($this->qtdVezesSaidos as $posicao => $value) {

            if ($cont <= $qtdNumerosMaisSaidos) {
                $result[$posicao] = $value;
            }

            $cont = $cont + 1;
        }

        return $result;
    }

    /**
     * Este método aqui, somar o valor dos números que saiu por jogo e retorna o array
     * Quantidade de vezes que saiu e o valor total do jogo
     */
    public function retornaAFrequenciaDosNumeros(array $resultadosLotoFacil)
    {
        $calculaNumero = new CalculaQuantasVezesONumeroSaiuPorIntervaloDeJogo();
        return $calculaNumero->retornaQuantidadePorJogo($resultadosLotoFacil);
    }

    /**
     * @return int[]
     */
    public function getArrayNumeroLotoFacil(): array
    {
        return $this->arrayNumeroLotoFacil;
    }

    /**
     * @param int[] $arrayNumeroLotoFacil
     */
    public function setArrayNumeroLotoFacil(array $arrayNumeroLotoFacil)
    {
        $this->arrayNumeroLotoFacil = $arrayNumeroLotoFacil;
    }

    /**
     * @param array $arrayNumeroLotoFacil
     * @return array
     */
    public function retornaValorTotalPorPosicaoJogo(array $arrayNumeroLotoFacil)
    {
        $posicao = [];

        $valorPosicaoPorJogo = new RetornaValorTotalPorPosicaoJogo();

        for ($a = 1; $a < (self::QUANTIDADE_NUMEROS_JOGOS + 1); $a++) {
            $posicao["posicao_" . $a] = $valorPosicaoPorJogo->retornaValorTotalPorPosicaoJogo($arrayNumeroLotoFacil, $a);
        }

        return $posicao;
    }


    public function calculaPorcetagemSaidaPorPosicao(array $arrayPosicaoPorPosicao)
    {
        $calculaPorcentagel = new CalculaPorcetagemSaidaPorPosicao();
        return $calculaPorcentagel->calculaPorcetagemSaidaPorPosicao($arrayPosicaoPorPosicao);
    }
}
