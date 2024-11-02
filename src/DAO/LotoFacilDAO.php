<?php

namespace src\DAO;

use config\conn\ConexaoMySQL;

class LotoFacilDAO
{

    public function conn()
    {
        return ConexaoMySQL::getConnection();
    }

    public function listaJogo()
    {
        $query = $this->conn()->query(
            "select 
                *
            from 
                lotofacil"
        );
        return $query->fetchAll();
    }

    public function listaUltimoJogo()
    {

        $query = $this->conn()->query("select COL_1 from lotofacil order by COL_1 desc limit 1");
        $query->fetchAll();
    }
}
