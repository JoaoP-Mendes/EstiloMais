<?php
echo "<h3>🔍 Testando acesso ao MySQL</h3>";

$testes = [
    ['localhost:8080', 'root', ''],      // VDI
    ['localhost', 'root', ''],           // Computador sem senha
    ['localhost', 'root', 'root'],       // Computador com senha root
    ['localhost', 'root', '123456'],     // Computador com senha comum
];

foreach ($testes as $teste) {
    list($host, $user, $pass) = $teste;
    
    echo "<br>Tentando: $user@$host";
    
    try {
        $conn = new mysqli($host, $user, $pass, 'estacio2025');
        
        if ($conn->connect_error) {
            echo " ❌ Erro: " . $conn->connect_error;
        } else {
            echo " ✅ CONEXÃO FUNCIONOU!";
            $conn->close();
            break;
        }
    } catch (Exception $e) {
        echo " ❌ Exception: " . $e->getMessage();
    }
}

echo "<hr>";
echo "<h4>📋 Para configurar:</h4>";
echo "1. Use as credenciais que funcionaram acima<br>";
echo "2. Edite o arquivo config.php<br>";
echo "3. Teste o sistema novamente";
?>