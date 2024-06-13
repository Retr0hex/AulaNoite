<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="temperatura.css">
    <title>Converter temperatura</title>
</head>

<body>

    <form action="temperatura.php" method="POST">
        <label for="temperatura">Converter Temperatura</label>
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
<style>body {
    background-color: #1f1f1f;
    color: #ffffff;
    font-family: Arial, sans-serif;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
}


form {
    background-color: #333333;
    padding: 20px;
    border-radius: 8px;
    width: 300px;
}

label {
    display: block;
    margin-bottom: 8px;
}

input[type="number"], select {
    width: 100%;
    padding: 8px;
    margin-bottom: 10px;
    border: 1px solid #555555;
    border-radius: 4px;
    background-color: #444444;
    color: #ffffff;
}

input[type="submit"] {
    width: 100%;
    padding: 10px;
    background-color: #007bff;
    color: #ffffff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #0056b3;
}

p {
    text-align: center;
    margin-top: 20px;
}</style>
