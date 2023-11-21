<?php

if (!empty($_GET['id'])) {


    include_once("config.php");

    $id = $_GET['id'];

    $sqlSelect = "SELECT * FROM itens WHERE iditens = $id";

    $result = $conexao->query($sqlSelect);

    if ($result->num_rows > 0) {
        while ($item_data = mysqli_fetch_assoc($result)) {
            $item_emprestado = $item_data['item_emprestado'];
            $devedor = $item_data['devedor'];
            $data = $item_data['data_emprestimo'];
        }
    } else {
        header('Location: principal.php');
    }
}
else
{
    header('Location: principal.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Itens</title>
    <link rel="stylesheet" href="edit_itens.css">
    <link rel="icon" href="VETOR-abertura-1024x667.png">
</head>

<body>
    <a href="principal.php"><button id="voltar">Voltar</button></a>
    <div class="box">
        <form action="saveEdit_itens.php" method="POST">
            <fieldset>
                <legend><b>Editar Itens</b></legend>
                <br>
                <div class="inputBox">
                    <input type="text" name="item_emprestado" id="item_emprestado" class="inputUser" value = "<?php echo $item_emprestado ?>" required>
                    <label for="nome" class="labelInput">Item Emprestado</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="devedor" id="devedor" class="inputUser" value = "<?php echo $devedor ?>" required>
                    <label for="devedor" class="labelInput">Devedor</label>
                </div>
                <br><br>
                <label for="data_emprestimo"><b>Data de Emprestimo:</b></label>
                <input type="date" name="data_emprestimo" id="data_emprestimo" value = "<?php echo $data ?>" required>
                <br><br>
                <input type="hidden" name = "iditens" value = "<?php echo $id ?>">
                <input type="submit" name="updateItens" id="updateItens">
            </fieldset>
        </form>
    </div>
</body>

</html>