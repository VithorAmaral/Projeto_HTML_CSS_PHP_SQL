<?php

if (isset($_POST['submit_itens'])) {

    include_once("config.php");

    $item_emprestado = $_POST['item_emprestado'];
    $devedor = $_POST['devedor'];
    $data = $_POST['data_emprestimo'];

    $result = mysqli_query($conexao, "INSERT INTO itens(item_emprestado, devedor, data_emprestimo) VALUES ( '$item_emprestado','$devedor', '$data')");

    header('Location: principal.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Itens</title>
    <link rel="icon" href="VETOR-abertura-1024x667.png">
    <link rel="stylesheet" href="cadastro_itens.css">
</head>

<body>
    <a href="principal.php"><button id="voltar">Voltar</button></a>
    <div class="box">
        <form action="cadastro_itens.php" method="POST">
            <fieldset>
                <legend><b>Cadastro de itens</b></legend>
                <br>
                <div class="inputBox">
                    <input type="text" name="item_emprestado" id="item_emprestado" class="inputUser" required>
                    <label for="item_emprestado" class="labelInput">Item Emprestado</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="devedor" id="devedor" class="inputUser" required>
                    <label for="devedor" class="labelInput">Devedor</label>
                </div>
                <br><br>
                <label for="data_emprestimo"><b>Data de Emprestimo:</b></label>
                <input type="date" name="data_emprestimo" id="data_emprestimo" required>
                <br><br><br>
                <input type="submit" name="submit_itens" id="submit_itens">
            </fieldset>
        </form>
    </div>
</body>

</html>