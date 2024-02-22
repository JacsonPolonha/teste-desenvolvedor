<?php 
    session_start();
    define('USER', 'admin');
    define('PASS', '1234');
    
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div id="card-login-header">
            <h1>Faça login</h1>
        </div>
        <div id="card-login">
            <div id="form">
                <form action="#" method="post">
                    <label for="name">Nome</label>
                    <input type="text" name="name" id="name" placeholder="admin">
                    <label for="password">Senha</label>
                    <input type="password" name="password" id="password" placeholder="1234">
                    <input type="submit" value="Entrar">
                    <p class="error">
                        <?php
                        if (isset($_POST["name"]) && isset($_POST["password"])) {
                            $user = $_POST["name"];
                            $pass = $_POST["password"];
                            if ($user != USER || $pass != PASS) {
                                echo "Usuário ou senha inválidos";
                            }
                        }
                        ?>
                    </p>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
<?php 
    if(isset($_GET["logout"])){
        if($_GET["logout"] == 'sair'){
            unset($_SESSION["USUARIO"]);
        }
    }

    if($_SERVER["REQUEST_METHOD"] == 'POST'){
        if(isset($_POST["name"]) && isset($_POST["password"])){
            $user = $_POST["name"];
            $pass = $_POST["password"];
            if($user == USER && $pass == PASS){
                $_SESSION["USUARIO"] = $user;
                header("location: index.php");
            }
        }
    }
?>