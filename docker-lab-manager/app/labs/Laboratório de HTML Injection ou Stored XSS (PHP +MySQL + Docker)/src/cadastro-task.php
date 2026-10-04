<?php
    // 1. Carrega as dependências
    require_once 'app/database.php';
    require_once 'app/models/Task.php';
    $mensagem = "";
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        
        try {
            $task = new Task($conn);
        
            // Coleta os dados (com proteção básica de espaços em branco)
            $solicitante = trim($_POST['solicitante']);
            $setor       = trim($_POST['setor']);
            $titulo      = trim($_POST['titulo']);
            $prioridade  = trim($_POST['prioridade']);
            $descricao   = trim($_POST['descricao']);

            // Tenta cadastrar
            if($task->Cadastrar($solicitante, $setor, $titulo, $prioridade, $descricao)) {
                $mensagem = "<div class='msg-sucesso'>Chamado aberto com sucesso!</div>";
            } else {
                $mensagem = "<div class='msg-erro'>Erro ao abrir chamado. Tente novamente.</div>";
            }

        } catch (Exception $e) {
            $mensagem = "<div class='msg-erro'>Ocorreu um erro interno.</div>";
        }
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Impripi | Novo Chamado</title>
    <link rel="stylesheet" href="assets/styles/index.css">
    <style>
        /* CSS extra apenas para as mensagens de feedback */
        .msg-sucesso { background-color: #d4edda; color: #155724; padding: 10px; margin-bottom: 20px; border-radius: 5px; border: 1px solid #c3e6cb; }
        .msg-erro { background-color: #f8d7da; color: #721c24; padding: 10px; margin-bottom: 20px; border-radius: 5px; border: 1px solid #f5c6cb; }
    </style>
</head>
<body>
    <header>
        <div class="header-direito"></div>
        <a href="index.php"> <img src="assets/imgs/150px.png" alt="Logo" id="logo">
        </a>
        <div class="header-esquerdo">
            <nav>
                <ul class="links">
                    <a href="index.php"><li>Cancelar</li></a> </ul>
            </nav>
        </div>
    </header>

    <main>
        <section id="cont-form">
            <h1>Abrir Novo Chamado</h1>
            <p class="subtitle">Descreva o problema para a equipe de TI.</p>
            
            <?php echo $mensagem; ?>

            <form action="" method="POST">
                
                <div class="input-group">
                    <label for="solicitante">Nome do Solicitante</label>
                    <input type="text" id="solicitante" name="solicitante" placeholder="Ex: João Silva" required>
                </div>

                <div class="input-group">
                    <label for="setor">Setor / Departamento</label>
                    <select id="setor" name="setor" required>
                        <option value="" disabled selected>Selecione...</option>
                        <option value="ti">TI / Desenvolvimento</option>
                        <option value="rh">Recursos Humanos</option>
                        <option value="financeiro">Financeiro</option>
                        <option value="comercial">Comercial</option>
                    </select>
                </div>

                <div class="input-group">
                    <label for="titulo">Título do Problema</label>
                    <input type="text" id="titulo" name="titulo" placeholder="Ex: Impressora não conecta" required>
                </div>

                <div class="input-group">
                    <label for="prioridade">Prioridade</label>
                    <select id="prioridade" name="prioridade">
                        <option value="baixa">Baixa (Pode esperar)</option>
                        <option value="media" selected>Média (Atrapalha o trabalho)</option>
                        <option value="alta">Alta (Urgente / Parou tudo)</option>
                    </select>
                </div>

                <div class="input-group">
                    <label for="descricao">Descrição Detalhada</label>
                    <textarea id="descricao" name="descricao" rows="5" placeholder="Explique o erro..." required></textarea>
                </div>

                <button type="submit" class="btn-cadastrar">Registrar Chamado</button>

            </form>
        </section>
    </main>
</body>
</html>