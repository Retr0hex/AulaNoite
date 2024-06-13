<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleimc.css">
    
    <title>Calculadora de IMC</title>
</head>

<body>

    <div class="container">
        <h1>Calculadora de IMC</h1>
        <form action="imc.php" method="POST">
            <label for="peso">Peso (kg):</label>
            <input type="number" id="peso" name="peso" step="0.1" required>
            <br><br>

            <label for="altura">Altura (m):</label>
            <input type="number" id="altura" name="altura" step="0.01" required>
            <br><br>

            <input type="submit" id="calcular" name="calcular" value="Calcular">
        </form>
        <br><br>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $peso = $_POST['peso'];
            $altura = $_POST['altura'];

            if (is_numeric($peso) && is_numeric($altura) && $peso > 0 && $altura > 0) {
                $imc = $peso / ($altura * $altura);
                $imc = number_format($imc, 2);

                echo "<p>Seu IMC é: $imc</p>";

                if ($imc < 18.5) {
                    echo "<p>Classificação: Abaixo do peso</p>";
                } elseif ($imc >= 18.5 && $imc < 24.9) {
                    echo "<p>Classificação: Peso normal</p>";
                } elseif ($imc >= 25 && $imc < 29.9) {
                    echo "<p>Classificação: Sobrepeso</p>";
                } else {
                    echo "<p>Classificação: Obesidade</p>";
                }
            } else {
                echo "<p>Por favor, insira valores válidos para peso e altura.</p>";
            }
        }
        ?>
    </div>
</body>

</html>

