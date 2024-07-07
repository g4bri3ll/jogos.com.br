<?php

namespace src\DAO;

use config\conn\ConexaoMySQL;

class LotoFacilDAO extends ConexaoMySQL
{

    public function listaJogo()
    {

        $sql = "select * from lotofacil";

        $resultado = mysqli_query($this->openConnect(), $sql);

        $array = array();
        while ($row = mysqli_fetch_assoc($resultado)) {
            $array[]=$row;
        }
        $this->closeConnect();

        return $array;

    }
}
