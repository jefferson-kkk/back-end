<?php
require_once __DIR__ . '/../controller/bebidascontroller.php';

$controller = new BebidaController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['acao'] === 'salvar') {
        $controller->criar($_POST['nome'], $_POST['categoria'], $_POST['volume'], $_POST['valor'], $_POST['qtde']);
    } elseif ($_POST['acao'] === 'deletar') {
        $controller->deletar($_POST['nome']);
    }
}

$lista = $controller->ler();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de bebidas</title>
</head>
<body>
<h1>Gerenciamento de bebidas</h1>
<br>
<hr>
    <form method="POST">
    <input type="hidden" name="acao" value="salvar">
    <input type="text" name="nome" placeholder="Nome da bebida:" required>
    <select name="categoria" required>
        <option value="">Selecione a categoria</option>
        <option value="Refrigerante">Refrigerante</option>
        <option value="Cerveja">Cerveja</option>
        <option value="Vinho">Vinho</option>
        <option value="Destilado">Destilado</option>
        <option value="Água">Água</option>
        <option value="Suco">Suco</option>
        <option value="Energético">Energético</option>
    </select>
    <input type="text" name="volume" placeholder="Volume (ex: 300ml):" required>
    <input type="number" name="valor" step="0.01" placeholder="Valor em Reais (R$):" required>
    <input type="number" name="qtde" placeholder="Quantidade em estoque:" required>
    <button type="submit">Cadastrar</button>
    <style>
    /* Reset geral */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Poppins', sans-serif;
    }

    body {
        background: linear-gradient(135deg, #004e92, #000428);
        color: #fff;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        min-height: 100vh;
        padding: 20px;
    }

    h1 {
        font-size: 2em;
        text-align: center;
        margin-bottom: 20px;
        text-transform: uppercase;
        letter-spacing: 2px;
        color: #00d4ff;
    }

    form {
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        padding: 30px 40px;
        border-radius: 15px;
        box-shadow: 0 0 20px rgba(0, 212, 255, 0.3);
        display: flex;
        flex-direction: column;
        width: 100%;
        max-width: 400px;
    }

    input, select {
        background: rgba(255, 255, 255, 0.15);
        border: none;
        outline: none;
        color: #fff;
        padding: 12px;
        margin: 8px 0;
        border-radius: 8px;
        font-size: 1em;
        transition: all 0.3s ease;
    }

    input::placeholder {
        color: rgba(255, 255, 255, 0.7);
    }

    select option {
        color: #000;
    }

    input:focus, select:focus {
        background: rgba(0, 212, 255, 0.2);
        box-shadow: 0 0 8px rgba(0, 212, 255, 0.4);
    }

    button {
        background: #00d4ff;
        color: #000;
        border: none;
        padding: 12px;
        margin-top: 15px;
        border-radius: 8px;
        font-size: 1.1em;
        font-weight: bold;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    button:hover {
        background: #00aaff;
        transform: scale(1.05);
        box-shadow: 0 0 15px rgba(0, 212, 255, 0.6);
    }

    hr {
        width: 80%;
        border: 0;
        border-top: 2px solid rgba(255, 255, 255, 0.2);
        margin-bottom: 20px;
    }

    </style>
    </form>

</body>
</html>