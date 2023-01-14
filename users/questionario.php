<?php
// Inicialize a sessão
session_start();
 
// Verifique se o usuário está logado, se não, redirecione-o para uma página de login
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
 
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{ font: 14px sans-serif; text-align: left; margin-left: 30px; margin-right: 30px  }
    </style>
</head>
<body>
    <h1  class="my-5" style="text-align:center">Hello, <b><?php echo htmlspecialchars($_SESSION["nome"]); ?></b>! Welcome to our website.</h1>
    <div>    
        <?php
        $link = mysqli_connect("localhost", "root", "", "crud");
        $sql = "SELECT questao, alternativa1,alternativa2,alternativa3,alternativa4,correta FROM perguntas WHERE id_perg ORDER BY id_perg";
        $result = mysqli_query($link, $sql);
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<b>Question:</b> '. $row["questao"] . "<br>" .'<input type="checkbox" name="A" value="on"> <b>A:</b> '. $row["alternativa1"] . "<br>"
                .'<input type="checkbox" name="B" value="on"> <b>B:</b> '. $row["alternativa2"] . "<br>".'<input type="checkbox" name="C" value="on"> <b>C:</b> '. $row["alternativa3"] . "<br>"
                .'<input type="checkbox" name="C" value="on"> <b>D:</b> '. $row["alternativa4"] ."<br><br><br>";
            }
        }
        ?>
    </div>
    <p>
        <a href="concluido.php" class="btn btn-primary">Conclude</a>
        <a href="reset-password.php" class="btn btn-warning">Reset your password</a>
        <a href="logout.php" class="btn btn-danger ml-3">Log out</a>
    </p>
</body>
</html>