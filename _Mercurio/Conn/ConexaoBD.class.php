<?php

abstract class ConexaoBD {

    // ATRIBUTOS DE CONEXÃO
    private static $User = USER;
    private static $Pass = PASS;
    private static $Dba = DBA;
    private static $Host = HOST;

    /**
     * @var PDO */
    private static $Connect = null;

    /**
     * Método usado para se conectar ao banco de dados usando padrão singleton
     */
    private static function Conectar() {
        try {
            if (self::$Connect == null) {
                $Dsn = "mysql:host=" . self::$Host . ";dbname=" . self::$Dba;
                $Options = [PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'];
                self::$Connect = new PDO($Dsn, self::$User, self::$Pass, $Options);
            }
        } catch (\PDOException $e) {
            MsgErro($e->getCode, $e->getMessage, $e->getFile, $e->getLine);
            die();
        }
        self::$Connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return self::$Connect;
    }

// Retorna o OBJ PDO singleton
    protected function getConexao() {
        return self::Conectar();
    }

}
