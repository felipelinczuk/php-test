<?php
    class DataRequest {
        
        public function load(){
            try{       
                $conexao = new PDO("mysql:host=localhost;dbname=cadastrotest", "root", "");
            }
            catch(Exception $e)
            {
                echo 'Erro ao tentar conectar ao BD. Erro: ' . $e;
            }
            $stmt = $conexao->query("SELECT * FROM tb_cliente");
            $data =  $stmt->fetchAll ();
            $table = '<table><thead><tr><th>ID</th><th>NOME</th><th>EMAIL</th></tr></thead><tbody>';
            for($i = 0; $i < $stmt->rowCount(); $i++) {
                    $table .= '<tr><td>' . $data[$i]['id'] . '</td><td>' . $data[$i]['nome'] . '</td><td>' . $data[$i]['email'] . '</td></tr>';
            }
            $table .= '</tbody></table>';
            echo $table;
        }
        
        public function insert($nome, $email){
            try{       
                $conexao = new PDO("mysql:host=localhost;dbname=cadastrotest", "root", "");
            }
            catch(Exception $e)
            {
                echo 'Erro ao tentar conectar ao BD. Erro: ' . $e;
            }
            $stmt = "INSERT INTO tb_cliente VALUES('', ?, ?)";
            $stmt = $conexao->prepare($stmt);
            $stmt->execute([$nome, $email]);
        }
    }

    if(isset($_POST['action'])) {
        $action = $_POST['action'];
        $DR = new DataRequest();
        switch($action){
            case 'load':
                $data = $DR->load();
                echo $data;
                break;
            case 'insert':
                $data = $DR->insert($_POST['nome'],$_POST['email']);
                echo $data;
                break;
            default:
                echo 'Nada a ser feito.';
        }
    }
?>