<?php
    require_once 'app/database.php';
    require_once 'app/models/Task.php';
    ini_set('default_charset', 'utf-8');
    
    try {
        $task = new Task($conn);
        $lista = $task->PesquisaGeral();
    } 
    catch(Exception $e) {
        $lista = []; 
        echo "<H1>ERROR</H1>";
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Impripi | Suporte On-line</title>
    <link rel="stylesheet" href="assets/styles/index.css">
</head>
<body>
    <header>
        <div class="header-direito"></div>
        <img src="assets/imgs/150px.png" alt="Logo" id="logo">
        <div class="header-esquerdo">
            <nav>
                <ul class="links">
                    <a href="cadastro-task.php">
                        <li>+ Abrir Chamado</li>
                    </a>
                </ul>
            </nav>
        </div>
    </header>

    <main>
        <section id="cont-taks">
            <h1>Chamados Recentes</h1>
            <br>
            <div class="fileira">
                <?php foreach ($lista as $a): ?>
                
                <div class="task">
                    <a href="task.php?id=<?php echo $a['id']; ?>">
                        
                        <div class="task-direito">
                            <img src="assets/imgs/logo.png" alt="" id="banner">
                        </div>
                        
                        <div class="task-esquerdo">
                            <div class="task-header">
                                <h2>
                                    <?php echo $a['titulo']; ?>
                                </h2>
                                <span class="date">
                                    <?php echo date('d/m/Y', strtotime($a['data_criacao'])); ?>
                                </span>
                            </div>
                            <p>
                                <?php echo mb_strimwidth($a['descricao'], 0, 80, "..."); ?>
                            </p>
                        </div>
                    </a>
                </div>
                
                <?php endforeach; ?> 
            </div> </section>
    </main>
</body>
</html>