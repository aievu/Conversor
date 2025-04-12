<?php

function obterCotacao($moedaOrigem, $moedaDestino, $valor) {

    $url = "https://economia.awesomeapi.com.br/json/last/{$moedaOrigem}-{$moedaDestino}";

    $resposta = @file_get_contents($url);

    if ($resposta !== false) {
        $dados = json_decode($resposta, true);
        $par = "{$moedaOrigem}{$moedaDestino}";
        if (isset($dados[$par])) {
            return floatval($dados[$par]['bid']);
        }
    }

    $urlInvertida = "https://economia.awesomeapi.com.br/json/last/{$moedaDestino}-{$moedaOrigem}";

    $respostaInvertida = @file_get_contents($urlInvertida);

    if ($respostaInvertida !== false) {
        $dados = json_decode($respostaInvertida, true);
        $parInvertido = "{$moedaDestino}{$moedaOrigem}";
        if (isset($dados[$parInvertido])) {
            return 1 / floatval($dados[$parInvertido]['bid']);
        }
    }

    if ($moedaDestino === $moedaOrigem) {
        return $valor / $valor;
    }

    if ($resposta === false) {
        return ['error' => 'Erro ao acessar a API'];
    }
}

$resultado = null;
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $valor = floatval($_POST['valor']);
    $moedaOrigem = strtoupper($_POST['moedaOrigem']);
    $moedaDestino = strtoupper($_POST['moedaDestino']);

    $cotacao = obterCotacao($moedaOrigem, $moedaDestino, $valor);

    if ($cotacao) {
        $resultado = $valor * $cotacao;
    } else {
        $resultado = "Erro ao obter a cotação!";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversor de Moeda</title>
    <link rel="stylesheet" href="conversao.css">
</head>
<body>
    <div class="container">
        <div class="conversor">
            <h1 id="titulo">Conversão de Moedas</h1>
            <form method="post">
                <input placeholder="Digite um valor" name="valor" type="number" step="any" required>
                <div>
                    <select name="moedaOrigem" required>
                        <option value="BRL">Real</option>
                        <option value="USD">Dolar</option>
                        <option value="EUR">Euro</option>
                        <option value="CLP">Peso Chileno</option>
                        <option value="BTC">Bitcoin</option>
                    </select>
                </div>
                <div>
                    <select name="moedaDestino" required>
                        <option value="BRL">Real</option>
                        <option value="USD">Dolar</option>
                        <option value="EUR">Euro</option>
                        <option value="CLP">Peso Chileno</option>
                        <option value="BTC">Bitcoin</option>
                    </select>
                </div>
                <button type="submit" >Converter</button>
                <?php if($resultado !== null): ?>
                <p><strong>Resultado: </strong> <?= is_numeric($resultado) ? number_format($resultado, 2, ',', '.') . " $moedaDestino" : $resultado ?></p>
                <?php endif; ?>
                </div>
            </form>
        </div>
</body>

</html>