<?php
    if (!empty($_GET['id'])) {


        include_once("config.php");
    
        $id = $_GET['id'];
    
        $sqlSelect = "SELECT * FROM itens WHERE iditens = $id";
    
        $result = $conexao -> query($sqlSelect);
    
        if ($result -> num_rows > 0) 
        {
            $sqlDelete = "DELETE FROM itens WHERE iditens = $id";
            $resultDelete = $conexao->query($sqlDelete);
        }
        
    }
    header('Location: principal.php');
?>