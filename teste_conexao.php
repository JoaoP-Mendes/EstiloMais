<?php
$usuario = "root";
$senha = ""; // Tente primeiro vazio, se não funcionar coloque sua senha

try {
    $pdo = new PDO("mysql:host=localhost;dbname=estacio2025", $usuario, $senha);
    echo "✅ Conexão com banco de dados FUNCIONOU!";
} catch (PDOException $e) {
    echo "❌ Erro na conexão: " . $e->getMessage();
    echo "<br>Tente com senha: root ou deixe em branco";
}
?>