<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Cadastro de Usuários</title>
</head>
<body>
  <h2>Cadastro de Usuários</h2>
  <form action="processa_cadastro.php" method="post">
    <input type="text" name="nome" placeholder="Nome" required><br><br>
    <input type="email" name="email" placeholder="E-mail" required><br><br>
    <button type="submit">Cadastrar</button>
  </form>

  <h3>Usuários Cadastrados:</h3>
  <ul>
    <?php
    if(file_exists('usuarios.txt')) {
        $usuarios = file('usuarios.txt');
        foreach($usuarios as $usuario) {
            echo "<li>$usuario</li>";
        }
    }
    ?>
  </ul>
</body>
</html>
