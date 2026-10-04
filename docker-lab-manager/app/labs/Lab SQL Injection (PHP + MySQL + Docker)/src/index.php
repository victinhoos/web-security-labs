<?php
    // Cib
    $host = getenv('DB_HOST');
    $dbname = getenv('DB_NAME');
    $user = getenv('DB_USER');
    $pass = getenv('DB_PASSWORD');

    $resultados = [];

    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $id_usuario = isset($_GET['id']) ? $_GET['id'] : '0';
        $sql = "SELECT usuario, cargo FROM funcionarios WHERE id = " . $id_usuario;

        echo "<div style='background: #ffcccc; padding: 10px; border: 1px solid red; font-family: monospace;'>";
        echo "<strong>Query sendo executada:</strong> " . htmlspecialchars($sql);
        echo "</div>";

        $stmt = $conn->query($sql);
        
        if($stmt) {
            $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

    } catch(PDOException $e) {
        echo "Erro: " . $e->getMessage();
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lab SQL Injection</title>
</head>
<body>
    <h1>Funcionários Públicos</h1>
    <p>O salário é confidencial e não deveria aparecer.</p>

    <ul>
        <?php foreach($resultados as $f): ?>
            <li>
                <strong>Nome:</strong> <?php echo $f['usuario']; ?> <br>
                
                <strong>Cargo:</strong> <?php echo $f['cargo']; ?> 
            </li>
            <hr>
        <?php endforeach; ?>
    </ul>
</body>
</html>