<?php

require_once __DIR__ . '/../controller/bebidascontroller.php';
header('Content-Type: text/html; charset=utf-8');

$controller = new BebidaController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['acao'])) {
        if ($_POST['acao'] === 'salvar') {
            // Se tem nome_original, é edição
            if (!empty($_POST['nome_original'])) {
                $controller->deletar($_POST['nome_original']);
            }
            
            // Cria/recria com os novos dados
            $controller->criar(
                $_POST['nome'],
                $_POST['categoria'],
                $_POST['volume'],
                $_POST['valor'],
                $_POST['qtde']
            );
            
        } elseif ($_POST['acao'] === 'deletar') {
            $controller->deletar($_POST['nome']);
        }
        header('Location: ' . $_SERVER['PHP_SELF']);
        exit;
    }
}

$lista = $controller->ler();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciamento de Bebidas</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', system-ui, sans-serif;
        }

        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
            padding: 2rem;
        }

        h1 {
            font-size: 2.2rem;
            font-weight: 700;
            text-align: center;
            margin-bottom: 2rem;
            color: #2d3436;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        /* Form */
        #bebidaForm {
            background: #ffffff;
            border-radius: 12px;
            padding: 2rem;
            width: 100%;
            max-width: 1000px;
            margin: 0 auto 2rem;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1rem;
        }

        input, select {
            width: 100%;
            padding: 0.8rem 1rem;
            border: 1px solid #e9ecef;
            border-radius: 8px;
            font-size: 0.95rem;
            color: #2d3436;
            background: #f8f9fa;
        }

        select {
            cursor: pointer;
        }

        button {
            padding: 0.8rem 1.5rem;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        #submitBtn {
            background: linear-gradient(90deg, #00c6ff, #0072ff);
            color: white;
            grid-column: 1 / -1;
        }

        #cancelBtn {
            background: #f1f3f5;
            color: #2d3436;
            display: none;
        }

        /* Table */
        table {
            width: 100%;
            max-width: 1000px;
            margin: 0 auto;
            background: white;
            border-radius: 12px;
            border-collapse: collapse;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
        }

        th, td {
            padding: 1rem;
            text-align: left;
            border-bottom: 1px solid #e9ecef;
        }

        th {
            background: #f8f9fa;
            color: #2d3436;
            font-weight: 600;
        }

        td {
            color: #4a5568;
        }

        .btn-edit {
            background: #ffd43b;
            color: #1f1f1f;
            margin-right: 0.5rem;
        }

        .btn-delete {
            background: linear-gradient(90deg, #ff6b6b, #ff4757);
            color: white;
        }

        .btn-edit:hover, .btn-delete:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        @media (max-width: 768px) {
            #bebidaForm {
                grid-template-columns: 1fr;
                padding: 1rem;
            }

            table {
                font-size: 0.9rem;
            }

            td {
                padding: 0.8rem;
            }

            .btn-edit, .btn-delete {
                padding: 0.6rem 1rem;
            }
        }
    </style>
</head>
<body>
    <h1>Gerenciamento de Bebidas</h1>
    
    <!-- Formulário -->
    <form id="bebidaForm" method="POST">
        <input type="hidden" name="acao" id="acao" value="salvar">
        <input type="hidden" name="nome_original" id="nome_original" value="">
        
        <input type="text" name="nome" id="nome" placeholder="Nome da bebida" required>
        <select name="categoria" id="categoria" required>
            <option value="">Selecione a categoria</option>
            <option value="Refrigerante">Refrigerante</option>
            <option value="Cerveja">Cerveja</option>
            <option value="Suco">Suco</option>
            <option value="Água">Água</option>
        </select>
        <input type="text" name="volume" id="volume" placeholder="Volume (ex: 350ml)" required>
        <input type="number" name="valor" id="valor" step="0.01" placeholder="Valor R$" required>
        <input type="number" name="qtde" id="qtde" placeholder="Quantidade" required>
        
        <button type="submit" id="submitBtn">Cadastrar</button>
        <button type="button" id="cancelBtn" onclick="resetForm()">Cancelar</button>
    </form>

    <!-- Tabela de Bebidas -->
    <?php if ($lista && count($lista) > 0): ?>
        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Categoria</th>
                    <th>Volume</th>
                    <th>Valor</th>
                    <th>Quantidade</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($lista as $bebida): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($bebida['nome']); ?></td>
                        <td><?php echo htmlspecialchars($bebida['categoria']); ?></td>
                        <td><?php echo htmlspecialchars($bebida['volume']); ?></td>
                        <td>R$ <?php echo htmlspecialchars($bebida['valor']); ?></td>
                        <td><?php echo htmlspecialchars($bebida['qtde']); ?></td>
                        <td>
                            <button type="button" class="btn-edit" onclick="editarBebida(
                                '<?php echo $bebida['nome']; ?>', 
                                '<?php echo $bebida['categoria']; ?>', 
                                '<?php echo $bebida['volume']; ?>', 
                                '<?php echo $bebida['valor']; ?>', 
                                '<?php echo $bebida['qtde']; ?>'
                            )">Editar</button>
                            
                            <form method="POST" style="display:inline">
                                <input type="hidden" name="acao" value="deletar">
                                <input type="hidden" name="nome" value="<?php echo htmlspecialchars($bebida['nome']); ?>">
                                <button type="submit" class="btn-delete" onclick="return confirm('Confirma exclusão?')">Excluir</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="no-data">Nenhuma bebida cadastrada.</p>
    <?php endif; ?>

    <script>
        function editarBebida(nome, categoria, volume, valor, qtde) {
            console.log("Editando:", {nome, categoria, volume, valor, qtde}); // Debug
            
            document.getElementById('nome').value = nome;
            document.getElementById('categoria').value = categoria;
            document.getElementById('volume').value = volume;
            document.getElementById('valor').value = valor;
            document.getElementById('qtde').value = qtde;
            
            // Marca como edição
            document.getElementById('nome_original').value = nome;
            document.getElementById('acao').value = 'salvar';
            
            // Atualiza visual
            document.getElementById('submitBtn').textContent = 'Atualizar';
            document.getElementById('cancelBtn').style.display = 'block';
            
            // Scroll suave até o form
            document.getElementById('bebidaForm').scrollIntoView({behavior: 'smooth'});
        }

        function resetForm() {
            document.getElementById('nome_original').value = '';
            document.getElementById('nome').value = '';
            document.getElementById('categoria').value = '';
            document.getElementById('volume').value = '';
            document.getElementById('valor').value = '';
            document.getElementById('qtde').value = '';
            
            document.getElementById('submitBtn').textContent = 'Cadastrar';
            document.getElementById('cancelBtn').style.display = 'none';
        }
    </script>
</body>
</html>