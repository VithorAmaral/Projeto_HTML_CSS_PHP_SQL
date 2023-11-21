<?php
session_start();
//print_r($_SESSION);
include_once('config.php');
if ((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true)) {
  unset($_SESSION['email']);
  unset($_SESSION['senha']);
  header('Location: login.php');
}
$logado = $_SESSION['email'];

$sql = "SELECT * FROM itens ORDER BY iditens DESC";

$result = $conexao->query($sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>HOME</title>
  <link rel="stylesheet" href="principal.css">
  <link rel="icon" href="VETOR-abertura-1024x667.png">
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">HOME</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <ul>
        <li><a href="principal.php" id="linkbar">Home</a></li>
        <li><a href="sistema.php" id="linkbar">Area de Usuario</a></li>
        <li><a href="produto.php" id="linkbar">Produtos</a></li>
      </ul>
    </div>
    <div class="d-flex">
      <a href="sair.php" class="btn btn-danger me-5" id="sair">Sair</a>
    </div>
  </nav>
  <img id="casa" src="1102682.png" />
  <img id="carro" src="VETOR-abertura-1024x667.png" />
  <br>
  <?php
  echo "<h1>Bem vindo <u>$logado</u></h1>";
  ?>
  <br>
  <br>
  <a href="cadastro_itens.php"><button id="cadastrar">Cadastrar Novo Empréstimo</button></a>
  <br>
  <div class="m-5">
    <table class="table text-white table-bg">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Item Emprestado</th>
          <th scope="col">Devedor</th>
          <th scope="col">Data de Empréstimo</th>
          <th scope="col">Editar / Devolver</th>
        </tr>
      </thead>
      <tbody>
        <?php
        while ($item_data = mysqli_fetch_assoc($result)) {
          echo "<tr>";
          echo "<td>" . $item_data['iditens'] . "</td>";
          echo "<td>" . $item_data['item_emprestado'] . "</td>";
          echo "<td>" . $item_data['devedor'] . "</td>";
          echo "<td>" . $item_data['data_emprestimo'] . "</td>";
          echo "<td>
                <a class = 'btn btn-sm btn-primary' href = 'edit_itens.php?id=$item_data[iditens]'>
                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
                  <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/>
                </svg>
                </a>
                <a class = 'btn btn-sm btn-success' href = 'deleteitens.php?id=$item_data[iditens]'>
                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-calendar2-check-fill' viewBox='0 0 16 16'>
                  <path d='M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zm9.954 3H2.545c-.3 0-.545.224-.545.5v1c0 .276.244.5.545.5h10.91c.3 0 .545-.224.545-.5v-1c0-.276-.244-.5-.546-.5zm-2.6 5.854a.5.5 0 0 0-.708-.708L7.5 10.793 6.354 9.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z'/>
                </svg>
                </a>
                </td>";
          echo "</tr>";
        }
        ?>
      </tbody>
    </table>
  </div>
</body>

</html>