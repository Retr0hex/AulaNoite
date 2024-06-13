<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="gorjeta.css">
    <title>Calculadora de Gorjeta</title>
</head>

<body>
    <div class="container">
        <h1>Calculadora de Gorjeta</h1>
        <form action="gorjeta.php" method="POST" class="form">
            <div class="form-group">
                <label for="valor">Valor inicial</label>
                <input type="number" id="valor" name="valor" step="0.01" required>
            </div>
            <div class="form-group">
                <label for="percentual">Percentual de Gorjeta (%)</label>
                <input type="number" id="percentual" name="percentual" step="0.01" required>
            </div>
            <div class="form-group">
                <input type="submit" id="aplicar" name="aplicar" value="Calcular" class="btn">
            </div>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $valor = $_POST['valor'];
            $percentual = $_POST['percentual'];

            if (empty($valor) || empty($percentual)) {
                $erro = "Por favor, digite algum valor";
            } elseif (!is_numeric($valor) || $percentual < 0 || $percentual > 100) {
                $erro = "Valor ou percentual inválido";
            } else {
                $erro = "";
            }

            if ($erro) {
                echo "<div class='alert'>$erro</div>";
            } else {
                $gorjeta = ($valor * $percentual) / 100;
                $total = $valor + $gorjeta;

                echo "<div class='result'>Valor total com gorjeta: R$ " . number_format($total, 2, ',', '.') . "</div>";
            }
        }
        ?>
    </div>
</body>

</html>