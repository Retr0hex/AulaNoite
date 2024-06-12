<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="gorjeta.css">
    <title>Document</title>
</head>

<body>

    <h1>Gorjeta</h1>
    <form action="gorjeta.php" method="POST">


        <label for="valor">Valor inicial</label>
        <input type="number" id="valor" name="valor" step="0.1" required> <br><br>



        <label for="percentual">Percentual</label>
        <input type="number" id="percentual" name="percentual" step="0.1" required> <br><br>

        <input type="submit" id="aplicar" name="aplicar" value="calcular">
    </form>
    <br>
    <br>









    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['valor']) && isset($_POST['percentual'])) {
            $valor = $_POST['valor'];
            $percentual = $_POST['percentual'];

          

            $erro = empty($valor) || empty($percentual) ? "Por favor, digite algum valor" : ((!is_numeric($valor) || ($percentual < 0) || ($percentual > 100)) ? "Valor ou percentual inválido" : "");
            
            
        }

        if ($erro) {
            echo $erro;
        } else {
            $gorjeta = ($valor * $percentual) / 100;
            $total = $valor + $gorjeta;
          
            echo " <label for='total'>Valor total:$total </label>";
        }
    }





    ?>


    </form>

</body>

</html>