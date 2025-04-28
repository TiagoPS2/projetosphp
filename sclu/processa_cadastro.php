<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = trim($_POST['nome']);
    $email = trim($_POST['email']);
    $registro = "$nome - $email" . PHP_EOL;

    file_put_contents('usuarios.txt', $registro, FILE_APPEND);
    header('Location: index.php');
}
?>
