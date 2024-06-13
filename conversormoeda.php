<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="conversormoeda.css">
    <title>Converter moeda</title>
</head>

<body>
    <h1>Converter moeda</h1>
    <form action="conversormoeda.php" method="POST">
        <label for="moeda_origem">De:</label>
        <select name="moeda_origem" id="moeda_origem">
            <option value="USD">USD</option>
            <option value="EUR">EUR</option>
            <option value="BRL">BRL</option>
        </select>

        <label for="moeda_destino">Para:</label>
        <select name="moeda_destino" id="moeda_destino">
            <option value="USD">USD</option>
            <option value="EUR">EUR</option>
            <option value="BRL">BRL</option>
        </select>

        <label for="valor">Valor:</label>
        <input type="number" name="valor" id="valor" step="0.01" required>

        <button type="submit">Converter</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $moeda_origem = $_POST['moeda_origem'];
        $moeda_destino = $_POST['moeda_destino'];
        $valor = $_POST['valor'];

        $conversao = [
            'USD' => ['USD' => 1, 'EUR' => 0.85, 'BRL' => 5.20],
            'EUR' => ['USD' => 1.18, 'EUR' => 1, 'BRL' => 6.12],
            'BRL' => ['USD' => 0.19, 'EUR' => 0.16, 'BRL' => 1]
        ];

        if (isset($conversao[$moeda_origem][$moeda_destino])) {
            $taxa = $conversao[$moeda_origem][$moeda_destino];
            $valor_convertido = $valor * $taxa;

            $simbolos = [
                'USD' => '$',
                'EUR' => '€',
                'BRL' => 'R$'
            ];

            $simbolo = $simbolos[$moeda_destino];
            echo "<p>Valor convertido: {$simbolo} " . number_format($valor_convertido, 2) . "</p>";
        } else {
            echo "<p>Conversão não disponível.</p>";
        }
    }
    ?>
</body>

</html>