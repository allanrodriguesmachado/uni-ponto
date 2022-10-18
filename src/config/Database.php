<?php

class Database
{
    /**
     * Classe responsável por fazer
     * conexão com o banco de dados
     */
    public static function getConnection()
    {
        $envPath = realpath(dirname(__FILE__) . '/../env.ini');
        $env = parse_ini_file($envPath);
        $coon = new mysqli(
            $env['host'],
            $env['username'],
            $env['password'],
            $env['database'],
        );

        if ($coon->connect_error) {
            die("Error: " . $coon->connect_error);
        }

        return $coon;
    }

    /**
     * Consulta no banco de dados
     */
    public static function getResultFromQuery($sql) {
        $conn = self::getConnection();
        $result  = $conn->query($sql);
        $conn->close();

        return $result;
    }
}