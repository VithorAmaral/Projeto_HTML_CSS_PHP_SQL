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

$sql = "SELECT * FROM usuarios ORDER BY id DESC";

$result = $conexao->query($sql);

//print_r($result);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>SISTEMA</title>
  <link rel="stylesheet" href="sistema.css">
  <link rel="icon" href="VETOR-abertura-1024x667.png">
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">SISTEMA</a>
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
  <br>
  <img id="casa" src="1102682.png" />
  <img id="carro" src="VETOR-abertura-1024x667.png" />
  <br>
  <?php
  echo "<h1>Bem vindo <u>$logado</u></h1>";
  ?>
  <br>
  <div class="m-5">
    <table class="table text-white table-bg">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nome</th>
          <th scope="col">Senha</th>
          <th scope="col">Email</th>
          <th scope="col">Telefone</th>
          <th scope="col">Sexo</th>
          <th scope="col">Data de Nascimento</th>
          <th scope="col">Cidade</th>
          <th scope="col">Estado</th>
          <th scope="col">Endereço</th>
          <th scope="col">Editar / Excluir</th>
        </tr>
      </thead>
      <tbody>
        <?php
        while ($user_data = mysqli_fetch_assoc($result)) {
          echo "<tr>";
          echo "<td>" . $user_data['id'] . "</td>";
          echo "<td>" . $user_data['nome'] . "</td>";
          echo "<td>" . $user_data['senha'] . "</td>";
          echo "<td>" . $user_data['email'] . "</td>";
          echo "<td>" . $user_data['telefone'] . "</td>";
          echo "<td>" . $user_data['sexo'] . "</td>";
          echo "<td>" . $user_data['data_nasc'] . "</td>";
          echo "<td>" . $user_data['cidade'] . "</td>";
          echo "<td>" . $user_data['estado'] . "</td>";
          echo "<td>" . $user_data['endereco'] . "</td>";
          echo "<td>
                <a class = 'btn btn-sm btn-primary' href = 'edit.php?id=$user_data[id]'>
                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
                  <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/>
                </svg>
                </a>
                <a class = 'btn btn-sm btn-danger' href = 'delete.php?id=$user_data[id]'>
                  <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash-fill' viewBox='0 0 16 16'>
                    <path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z'/>
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