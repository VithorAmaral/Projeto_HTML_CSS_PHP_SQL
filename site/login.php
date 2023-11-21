<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="widht=device-widht, initial-scale=1.0">
    <title>Tela de login</title>
    <link rel="stylesheet" href="login.css">
    <link rel="icon" href="VETOR-abertura-1024x667.png">
</head>

<body>
    <a href="home.php"><button id="voltar">Voltar</button></a>
    <div class="tela-login">
        <h1>Login</h1>
        <form action="testLogin.php" method="POST">
        <input type="text" name = "email" placeholder="Email">
        <br>
        <br>
        <input type="password" name = "senha" placeholder="Senha">
        <br>
        <br>
        <input class = "inputSubmit" type="submit" name="submit" value="Enviar">
        </form>
    </div>
</body>

</html>