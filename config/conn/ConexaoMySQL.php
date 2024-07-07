<?php

namespace config\conn;

class ConexaoMySQL
{

    function openConnect(){
        return mysqli_connect('localhost','root','', 'csv_db 6');
    }

    function closeConnect(){
        mysqli_close(self::openConnect());
    }

}
