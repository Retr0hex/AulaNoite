<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="temperatura.css">
    <title>Converter temperatura</title>
</head>

<body>

    <h1>Converter temperatura</h1>
    <form action="temperatura.php" method="POST">
        <label for="temperatura">Temperatura</label>
        <input type="number" id="temperatura" name="temperatura" step="0.1" required>

        <select id="de_unidade" name="de_unidade">
            <option value="celsius">De Celsius</option>
            <option value="fahrenheit">De Fahrenheit</option>
        </select>
        <br><br>

        <select id="para_unidade" name="para_unidade">
            <option value="celsius">Para Celsius</option>
            <option value="fahrenheit">Para Fahrenheit</option>
        </select>

        <br><br>
        <input type="submit" id="aplicar" name="aplicar" value="Calcular">
    </form>
    <br><br>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $temperatura = $_POST['temperatura'];
        $de_unidade = $_POST['de_unidade'];
        $para_unidade = $_POST['para_unidade'];

        if (empty($temperatura)) {
            $erro = "Por favor, digite alguma temperatura";
        } elseif (!is_numeric($temperatura)) {
            $erro = "Temperatura inválida";
        } else {
            $erro = "";
        }

        if ($erro) {
            echo $erro;
        } else {
            $total = 0;

            if ($de_unidade == "celsius" && $para_unidade == "fahrenheit") {
                $total = $temperatura * 9 / 5 + 32;
            } elseif ($de_unidade == "fahrenheit" && $para_unidade == "celsius") {
                $total = ($temperatura - 32) * 5 / 9;
            } else {
                $total = $temperatura; 
            }

            echo "<label for='total'>Temperatura convertida: $total $para_unidade</label>";
        }
    }
    ?>

</body>

</html>