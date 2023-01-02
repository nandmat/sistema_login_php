<?php
session_start();
if (isset($_SESSION['usuario']) && is_array($_SESSION['usuario'])) {
    require('acoes/conexao.php');

    $adm = $_SESSION['usuario'][1];
    $nome = $_SESSION['usuario'][0];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - <?php echo $nome ?></title>
</head>

<body>
    <?php if ($adm) : ?>
        <table width="40%">
            <thead>
                <tr style="font-weight: bold;">
                    <td>Email</td>
                    <td>Senha</td>
                    <td>Nome</td>
                    <td>ADM</td>
                    <td>ID</td>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = $conexao->prepare("SELECT * FROM usuarios");
                $query->execute();

                $user = $query->fetchAll(PDO::FETCH_ASSOC);

                for ($i = 0; $i < sizeof($user); $i++):
                    $usuarioAtual = $user[$i];
                ?>

                <tr>
                    <td><?php echo $usuarioAtual['email']; ?></td>
                    <td><?php echo $usuarioAtual['senha']; ?></td>
                    <td><?php echo $usuarioAtual['nome']; ?></td>
                    <td><?php echo $usuarioAtual['adm']; ?></td>
                    <td><?php echo $usuarioAtual['id']; ?></td>
                </tr>
                <?php endfor;?>
            </tbody>
        </table>
    <?php endif; ?>
    <a href="acoes/logout.php">Sair</a>
</body>

</html>