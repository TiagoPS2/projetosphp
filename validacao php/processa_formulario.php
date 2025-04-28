<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = trim($_POST['nome']);
    $email = trim($_POST['email']);
    $mensagem = trim($_POST['mensagem']);

    if (empty($nome) || empty($email) || empty($mensagem)) {
        echo "Todos os campos são obrigatórios!";
    } else {
        // Aqui simularia o envio de e-mail ou salvamento no banco de dados
        echo "Mensagem enviada com sucesso! Obrigado, $nome.";
    }
} else {
    echo "Acesso inválido.";
}
?>
