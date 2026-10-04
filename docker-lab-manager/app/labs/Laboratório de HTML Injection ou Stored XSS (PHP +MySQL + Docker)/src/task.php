<?php
    require_once 'app/database.php';
    require_once 'app/models/Task.php';

    $tarefa = null;

    if (isset($_GET['id'])) {
        $task = new Task($conn);
        $tarefa = $task->PesquisaEspecifica();
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Impripi | Visualizar Task</title>
    <link rel="stylesheet" href="assets/styles/index.css">
    <script src="assets/js/alert.js" defer></script>
</head>
<body>
    <header>
        <div class="header-direito"></div>
        <a href="index.php">
            <img src="assets/imgs/150px.png" alt="Logo" id="logo">
        </a>
        <div class="header-esquerdo">
            <nav>
                <ul class="links">
                    <a href="index.php"><li>Voltar</li></a>
                </ul>
            </nav>
        </div>
    </header>

    <main>
        <section id="task-view">
            
            <?php 
            if ($tarefa): 
            ?>

            <div class="task-card-full">
                <div class="task-header-info">
                    <div class="status-badge pendente">
                        <?= isset($tarefa['status']) ? $tarefa['status'] : 'Em Aberto' ?>
                    </div>
                    
                    <span class="id-chamado">Task #<?= $tarefa['id'] ?? $_GET['id'] ?></span>
                </div>

                <h1><?= $tarefa['titulo'] ?></h1>
                
                <div class="task-meta">
                    <p>
                        <strong>Solicitante:</strong> 
                        <?= $tarefa['solicitante'] ?> - <?= $tarefa['setor'] ?>
                    </p>
                    
                    <p><strong>Data:</strong> <?= $tarefa['data_criacao'] ?></p>
                    
                    <p><strong>Prioridade:</strong> 
                        <span class="prioridade-<?= strtolower($tarefa['prioridade']) ?>">
                            <?= $tarefa['prioridade'] ?>
                        </span>
                    </p>
                </div>

                <hr class="divisor">

                <div class="task-body">
                    <h3>Descrição:</h3>
                    <p><?= $tarefa["descricao"] ?></p>
                </div>

                <div class="task-actions">
                    <button class="btn-responder">Responder</button>
                    <button class="btn-fechar">Fechar Task</button>
                </div>
            </div>

            <?php else: ?>
                
                <div class="erro-container" style="text-align: center; padding: 50px; color: white;">
                    <h2>Ops! Tarefa não encontrada.</h2>
                    <p>Verifique se o link está correto ou se a tarefa foi excluída.</p>
                    <br>
                    <a href="index.php" style="color: #fff; text-decoration: underline;">Voltar para o início</a>
                </div>

            <?php endif; ?>

        </section>
    </main>
</body>
</html>