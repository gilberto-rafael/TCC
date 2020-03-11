<?php

class Conexao {
    private static $host = "localhost";
    private static $user = "root";
    private static $password = "";
    private static $db = "teste";

    public static $conn;

    public static function getConnection() {
        if (!isset(self::$conn)) {
            self::$conn = new PDO('mysql:host=' . self::$host . ';dbname=' . self::$db,
                self::$user , self::$password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$conn->setAttribute(PDO::ATTR_ORACLE_NULLS, PDO::NULL_EMPTY_STRING);
        }

        return self::$conn;
    }
}
?>