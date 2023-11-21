<?php
include_once('config.php');

if (isset($_POST['updateItens'])) {

    $id = $_POST['iditens'];
    $item_emprestado = $_POST['item_emprestado'];
    $devedor = $_POST['devedor'];
    $data = $_POST['data_emprestimo'];

    $sqlUpdate = "UPDATE itens SET iditens = '$id', item_emprestado = '$item_emprestado', devedor = '$devedor', data_emprestimo = '$data' WHERE iditens = '$id'";

    $result = $conexao -> query($sqlUpdate);
}
header('Location: principal.php');

?>
