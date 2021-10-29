<?php
$host = '127.0.0.1';
$user = 'root';
$pass = '';
$charset = 'utf8';
$port = '3306'; //3306 e' la porta default di mysql
$options = [
    \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
    \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
    \PDO::ATTR_EMULATE_PREPARES   => false,
    \PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
];
$dsn = "mysql:host=$host;port=$port;charset=$charset";
try {
     $pdo = new \PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
     throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
?>
