<?php

// Configurações para VDI (porta 8080)
define('DB_HOST', 'localhost');
define('DB_NAME', 'estacio2025');
define('DB_USER', 'root');
define('DB_PASS', '');

function conectarBanco() {
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    
    if ($conn->connect_error) {
        die("Erro conexão: " . $conn->connect_error);
    }
    
    return $conn;
}
?>