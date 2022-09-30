<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('style.css')}}" type="text/css">
    <title>Imc</title>
</head>
<body>
    <div class="fundo">
        <div class="formulario-imc">
            <h3>Insira seus dados para o calculo de IMC</h3>
            <form action="{{url('/calcularIMC')}}" method="get">
                <label for="nome">Nome:</label>
                <br>
                <input type="text" name="nome">
                <br>
                <br>
                <label for="nascimento">Data de nascimento:</label>
                <br>
                <input type="date" name="nascimento">
                <br>
                <br>
                <label for="peso">Peso (KG):</label>
                <br>
                <input type="number" step="0.1" name="peso">
                <br>
                <br>
                <label for="altura">Altura (M):</label>
                <br>
                <input type="number" step="0.01" name="altura">
                <br>
                <br>
                <label for="sono">Tempo de sono (Horas)</label>
                <br>
                <input type="number" name="sono">
                <br>
                <br>
                <button type="submit">Calcular IMC</button>
            </form>
        </div>
    </div>
</body>
</html>