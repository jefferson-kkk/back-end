<?php

// CORREÇÃO: Verifica e ajusta o caminho do controller
$controllerPath = __DIR__ . '/../controller/LivrosController.php';
if (!file_exists($controllerPath)) {
    // Tenta caminho alternativo
    $controllerPath = __DIR__ . '/controller/LivrosController.php';
    if (!file_exists($controllerPath)) {
        die("Erro: Arquivo LivrosController.php não encontrado. Verifique o caminho.");
    }
}

require_once $controllerPath;
header('Content-Type: text/html; charset=utf-8');

$controller = new LivrosController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['acao'])) {
        if ($_POST['acao'] === 'salvar') {
            // Lógica de atualização para livros
            if (!empty($_POST['titulo_original'])) {
                // É edição - usa o método atualizar
                $controller->atualizar(
                    $_POST['titulo_original'], // titulo original
                    $_POST['titulo'],          // novo titulo
                    $_POST['autor'],
                    $_POST['ano_publicacao'],
                    $_POST['genero'],
                    $_POST['qntd_disponivel']
                );
            } else {
                // É criação - usa o método criar
                $controller->criarLivros(
                    $_POST['titulo'],
                    $_POST['autor'],
                    $_POST['ano_publicacao'],
                    $_POST['genero'],
                    $_POST['qntd_disponivel']
                );
            }
            
        } elseif ($_POST['acao'] === 'deletar') {
            $controller->deletar($_POST['titulo']);
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
    <title>Gerenciamento de Livros</title>
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
        #livroForm {
            background: #ffffff;
            border-radius: 12px;
            padding: 2rem;
            width: 100%;
            max-width: 1200px;
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

        #submitBtn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        #cancelBtn {
            background: #f1f3f5;
            color: #2d3436;
            display: none;
        }

        /* Table */
        table {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            background: white;
            border-radius: 12px;
            border-collapse: collapse;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
            overflow: hidden;
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
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }

        .btn-delete {
            background: linear-gradient(90deg, #ff6b6b, #ff4757);
            color: white;
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }

        .btn-edit:hover, .btn-delete:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        @media (max-width: 768px) {
            #livroForm {
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
                padding: 0.4rem 0.8rem;
                font-size: 0.8rem;
            }
        }
    </style>
</head>
<body>
    <h1>📚 Gerenciamento de Livros</h1>
    
    <!-- Formulário -->
    <form id="livroForm" method="POST">
        <input type="hidden" name="acao" id="acao" value="salvar">
        <input type="hidden" name="titulo_original" id="titulo_original" value="">
        
        <input type="text" name="titulo" id="titulo" placeholder="Título do livro" required>
        <input type="text" name="autor" id="autor" placeholder="Autor" required>
        <input type="date" name="ano_publicacao" id="ano_publicacao" placeholder="Ano de Publicação" required>
        <select name="genero" id="genero" required>
            <option value="">Selecione o gênero</option>
            <option value="Ficção">Ficção</option>
            <option value="Romance">Romance</option>
            <option value="Aventura">Aventura</option>
            <option value="Terror">Terror</option>
            <option value="Fantasia">Fantasia</option>
            <option value="Biografia">Biografia</option>
            <option value="História">História</option>
            <option value="Ciência">Ciência</option>
            <option value="Tecnologia">Tecnologia</option>
            <option value="Autoajuda">Autoajuda</option>
        </select>
        <input type="number" name="qntd_disponivel" id="qntd_disponivel" placeholder="Quantidade Disponível" min="0" required>
        
        <button type="submit" id="submitBtn">Cadastrar Livro</button>
        <button type="button" id="cancelBtn" onclick="resetForm()">Cancelar</button>
    </form>

    <!-- Tabela de Livros -->
    <?php if ($lista && count($lista) > 0): ?>
        <table>
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Autor</th>
                    <th>Ano Publicação</th>
                    <th>Gênero</th>
                    <th>Quantidade</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($lista as $livro): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($livro->getTitulo()); ?></td>
                        <td><?php echo htmlspecialchars($livro->getAutor()); ?></td>
                        <td><?php echo htmlspecialchars($livro->getAno_Publicacao()); ?></td>
                        <td><?php echo htmlspecialchars($livro->getGenero()); ?></td>
                        <td><?php echo htmlspecialchars($livro->getQntd_Disponivel()); ?></td>
                        <td>
                            <button type="button" class="btn-edit" onclick="editarLivro(
                                '<?php echo addslashes($livro->getTitulo()); ?>',
                                '<?php echo addslashes($livro->getAutor()); ?>',
                                '<?php echo addslashes($livro->getAno_Publicacao()); ?>',
                                '<?php echo addslashes($livro->getGenero()); ?>',
                                '<?php echo $livro->getQntd_Disponivel(); ?>'
                            )">Editar</button>
                            
                            <form method="POST" style="display:inline">
                                <input type="hidden" name="acao" value="deletar">
                                <input type="hidden" name="titulo" value="<?php echo htmlspecialchars($livro->getTitulo()); ?>">
                                <button type="submit" class="btn-delete" onclick="return confirm('Tem certeza que deseja excluir este livro?')">Excluir</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p style="text-align: center; color: #666; margin-top: 2rem; font-size: 1.1rem;">
            Nenhum livro cadastrado no sistema.
        </p>
    <?php endif; ?>

    <script>
        function editarLivro(titulo, autor, anoPublicacao, genero, qntdDisponivel) {
            console.log("Editando:", titulo, autor, anoPublicacao, genero, qntdDisponivel);
            
            // Preenche os campos do formulário
            document.getElementById('titulo').value = titulo;
            document.getElementById('autor').value = autor;
            document.getElementById('ano_publicacao').value = anoPublicacao;
            document.getElementById('genero').value = genero;
            document.getElementById('qntd_disponivel').value = parseInt(qntdDisponivel);
            
            // Marca como edição
            document.getElementById('titulo_original').value = titulo;
            document.getElementById('acao').value = 'salvar';
            
            // Atualiza visual
            document.getElementById('submitBtn').textContent = 'Atualizar Livro';
            document.getElementById('cancelBtn').style.display = 'block';
            
            // Scroll suave até o form
            document.getElementById('livroForm').scrollIntoView({behavior: 'smooth'});
        }

        function resetForm() {
            document.getElementById('titulo_original').value = '';
            document.getElementById('titulo').value = '';
            document.getElementById('autor').value = '';
            document.getElementById('ano_publicacao').value = '';
            document.getElementById('genero').value = '';
            document.getElementById('qntd_disponivel').value = '';
            
            document.getElementById('submitBtn').textContent = 'Cadastrar Livro';
            document.getElementById('cancelBtn').style.display = 'none';
        }

        // Configura a data atual como padrão para o campo de ano de publicação
        document.addEventListener('DOMContentLoaded', function() {
            const anoInput = document.getElementById('ano_publicacao');
            if (anoInput && !anoInput.value) {
                const today = new Date().toISOString().split('T')[0];
                anoInput.value = today;
            }
        });

        console.log("Sistema de gerenciamento de livros carregado");
    </script>
</body>
</html>