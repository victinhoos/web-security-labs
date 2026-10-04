<?php 

class Task {
    private $conn;
    public function __construct($db_connection) {
        $this->conn = $db_connection;
    }

    //Pesquisa Geral
    function PesquisaGeral(){
        try{
            $query = 'SELECT * FROM tasks';
            $stmt = $this->conn->prepare($query); 
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC); 
        }catch(PDOException $e){
            echo "Erro ao buscar tarefas.";
            return [];
        }
    }

    //Pesquisa Especifica VULNERABILIDADE
    function PesquisaEspecifica(){
    try{
            if(empty($_GET['id'])){
                return false; 
            }

            // VULNERABILIDADE AQUI: Concatenação direta
            $id = $_GET['id'];
            $query = "SELECT * FROM tasks WHERE id = $id"; 
            
            // Executa direto sem preparar parâmetros
            $stmt = $this->conn->query($query);
            
            return $stmt->fetch(PDO::FETCH_ASSOC); 

        } catch(PDOException $e){
            echo "ERROR:" . $e->getMessage();
            return false;
        }
    }


    //Cadastro Task
    function Cadastrar($solicitante, $setor, $titulo, $prioridade, $descricao){
        try {
            $sql = "INSERT INTO tasks (titulo, descricao, status, solicitante, setor, prioridade, data_criacao) 
                    VALUES (:titulo, :descricao, 'Em Aberto', :solicitante, :setor, :prioridade, NOW())";
            
            $stmt = $this->conn->prepare($sql);
            
            $stmt->execute([
                ':titulo'       => $titulo,
                ':descricao'    => $descricao,
                ':solicitante'  => $solicitante,
                ':setor'        => $setor,
                ':prioridade'   => $prioridade
            ]);

            return true; 

        } catch(PDOException $e) {
            error_log($e->getMessage()); 
            return false; 
        }
    }
}
?>
