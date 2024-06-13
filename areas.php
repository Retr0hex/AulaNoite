<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Calculadora de Áreas</title>
    <script>
        function updateInputs() {
            var forma = document.getElementById("forma").value;
            var inputs = document.getElementById("inputs");

            inputs.innerHTML = "";

            if (forma === "retangulo") {
                inputs.innerHTML = `
                    <label for="largura">Largura</label>
                    <input type="number" id="largura" name="largura" step="0.1" required><br>
                    <label for="altura">Altura</label>
                    <input type="number" id="altura" name="altura" step="0.1" required><br>
                `;
            } else if (forma === "triangulo") {
                inputs.innerHTML = `
                    <label for="base">Base</label>
                    <input type="number" id="base" name="base" step="0.1" required><br>
                    <label for="altura">Altura</label>
                    <input type="number" id="altura" name="altura" step="0.1" required><br>
                `;
            } else if (forma === "circulo") {
                inputs.innerHTML = `
                    <label for="raio">Raio</label>
                    <input type="number" id="raio" name="raio" step="0.1" required><br>
                `;
            }
        }
    </script>
</head>

<body>

    <h1>Calculadora de Áreas</h1>
    <form action="" method="POST">
        <label for="forma">Escolha a forma</label>
        <select id="forma" name="forma" onchange="updateInputs()" required>
            <option value="">Selecione</option>
            <option value="retangulo">Retângulo</option>
            <option value="triangulo">Triângulo</option>
            <option value="circulo">Círculo</option>
        </select>
        <br><br>

        <div id="inputs">
          
        </div>

        <br><br>
        <input type="submit" id="calcular" name="calcular" value="Calcular">
    </form>
    <br><br>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $forma = $_POST['forma'];
        $area = 0;

        if ($forma == "retangulo") {
            $largura = $_POST['largura'];
            $altura = $_POST['altura'];
            if (is_numeric($largura) && is_numeric($altura)) {
                $area = $largura * $altura;
            } else {
                echo "Digite valores válidos para altura e largura.";
                exit();
            }
        } elseif ($forma == "triangulo") {
            $base = $_POST['base'];
            $altura = $_POST['altura'];
            if (is_numeric($base) && is_numeric($altura)) {
                $area = ($base * $altura) / 2;
            } else {
                echo "Digite valores válidos para base e altura.";
                exit();
            }
        } elseif ($forma == "circulo") {
            $raio = $_POST['raio'];
            if (is_numeric($raio)) {
                $area = pi() * pow($raio, 2);
            } else {
                echo "Digite um valor válido para raio.";
                exit();
            }
        } else {
            echo "Por favor, selecione uma forma válida.";
            exit();
        }

        echo "<label for='area'>Área calculada: $forma de $area cm<sup>2</sup></label>";
    }
    ?>

</body>

</html>
