<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="rifa.css">
    <title>Rifa Digital</title>
</head>

<body>
    <div class="container">
        <h1>Ação entre Amigos - CSL</h1>
        <form action="rifa.php" method="POST" class="form">
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" required>
            </div>
            <div class="form-group">
                <label for="email">E-mail:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <input type="submit" value="Comprar Bilhete" name="comprar" class="btn">
        </form>

        <?php
        // Inicia ou resume a sessão
        session_start();

        // Verifica se o formulário foi submetido
        if (isset($_POST['comprar'])) {
            // Obtém o nome do comprador
            $nome = $_POST['nome'];

            // Verifica se a sessão de bilhetes já foi iniciada
            if (!isset($_SESSION['bilhetes'])) {
                // Se não, inicializa o array de bilhetes
                $_SESSION['bilhetes'] = array();
            }

            // Adiciona o nome do comprador ao próximo bilhete disponível
            $bilhetes = $_SESSION['bilhetes'];
            $prox_bilhete = count($bilhetes) + 1;
            $bilhetes[$prox_bilhete] = $nome;

            // Exibe os bilhetes comprados
            echo "<h2>Bilhetes Comprados:</h2>";
            echo "<div class='bilhetes'>";
            foreach ($bilhetes as $numero => $comprador) {
                echo "<div class='bilhete'>Bilhete $numero - Comprador: $comprador</div>";
            }
            echo "</div>";

            // Atualiza o array de bilhetes na sessão
            $_SESSION['bilhetes'] = $bilhetes;
        }
        ?>
    </div>
</body>

</html>
