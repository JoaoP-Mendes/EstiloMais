<?php
// Tente conectar como root SEM senha primeiro
try {
    $pdo = new PDO("mysql:host=localhost", "root", "");
    
    // Criar banco
    $pdo->exec("CREATE DATABASE IF NOT EXISTS estacio2025");
    
    // Criar usuário
    $pdo->exec("CREATE USER IF NOT EXISTS 'estacio_user'@'localhost' IDENTIFIED BY 'estacio123'");
    $pdo->exec("GRANT ALL PRIVILEGES ON estacio2025.* TO 'estacio_user'@'localhost'");
    $pdo->exec("FLUSH PRIVILEGES");
    
    echo "✅ Usuário 'estacio_user' criado com sucesso!";
    
} catch (PDOException $e) {
    echo "❌ Não foi possível criar usuário: " . $e->getMessage();
    echo "<br><br>O MySQL no VDI deve estar:<br>";
    echo "1. Desligado<br>";
    echo "2. Com senha diferente<br>";
    echo "3. Com configuração restritiva<br>";
}
?>