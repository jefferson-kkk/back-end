<?php
require_once 'Livros.php';
require_once 'Connection.php';

class LivroDao{
    private $conn;

    public function __construct(){
        $this->conn = Connection::getInstance();

        // cria a tabela se não existir
        $this->conn->exec("CREATE TABLE IF NOT EXISTS livros(
            id INT AUTO_INCREMENT PRIMARY KEY,
            titulo VARCHAR(100) NOT NULL UNIQUE,
            autor VARCHAR(100) NOT NULL,
            ano_publicacao DATE,
            genero VARCHAR(100) NOT NULL,
            qntd_disponivel INT NOT NULL
        )");
    }

    // CREATE
    public function criarLivro(Livros $livro){
        $stmt = $this->conn->prepare(
            "INSERT INTO livros (titulo, autor, ano_publicacao, genero, qntd_disponivel)
            VALUES (:titulo, :autor, :ano_publicacao, :genero, :qntd_disponivel)"
        );
        
        $stmt->execute([
            ':titulo' => $livro->getTitulo(),
            ':autor' => $livro->getAutor(),
            ':ano_publicacao' => $livro->getAno_Publicacao(),
            ':genero' => $livro->getGenero(),
            ':qntd_disponivel' => $livro->getQntd_Disponivel()
        ]);
        
        return $this->conn->lastInsertId();
    }

    // READ ALL
    public function listarTodosLivros(){
        $stmt = $this->conn->prepare("SELECT * FROM livros");
        $stmt->execute();
        $livros = [];
        
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $livros[] = new Livros(
                $row['titulo'],
                $row['autor'],
                $row['ano_publicacao'],
                $row['genero'],
                $row['qntd_disponivel']
            );
        }
        return $livros;
    }

    // UPDATE
    public function atualizarLivro($tituloOriginal, $novoTitulo, $autor, $anoPublicacao, $genero, $quantidadeDisponivel){
        $stmt = $this->conn->prepare("
            UPDATE livros
            SET titulo = :novoTitulo, autor = :autor, ano_publicacao = :ano_publicacao, 
                genero = :genero, qntd_disponivel = :qntd_disponivel
            WHERE titulo = :tituloOriginal
        ");
        
        $stmt->execute([
            ':novoTitulo' => $novoTitulo,
            ':autor' => $autor,
            ':ano_publicacao' => $anoPublicacao,
            ':genero' => $genero,
            ':qntd_disponivel' => $quantidadeDisponivel,
            ':tituloOriginal' => $tituloOriginal
        ]);
        
        return $stmt->rowCount();
    }

    // DELETE
    public function excluirLivro($titulo) {
        $stmt = $this->conn->prepare("DELETE FROM livros WHERE titulo = :titulo");
        $stmt->execute([':titulo' => $titulo]);
        return $stmt->rowCount();
    }

    // BUSCAR POR TITULO
    public function buscarPorTitulo($titulo) {
        $stmt = $this->conn->prepare("SELECT * FROM livros WHERE titulo = :titulo LIMIT 1");
        $stmt->execute([':titulo' => $titulo]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($row) {
            return new Livros(
                $row['titulo'],
                $row['autor'],
                $row['ano_publicacao'],
                $row['genero'],
                $row['qntd_disponivel']
            );
        }
        return null;
    }

    // BUSCAR POR ID (se necessário, mas note que a tabela tem id)
    public function buscarPorId($id) {
        $stmt = $this->conn->prepare("SELECT * FROM livros WHERE id = :id LIMIT 1");
        $stmt->execute([':id' => $id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($row) {
            return new Livros(
                $row['titulo'],
                $row['autor'],
                $row['ano_publicacao'],
                $row['genero'],
                $row['qntd_disponivel']
            );
        }
        return null;
    }
}