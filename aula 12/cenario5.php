<?php
// ======================================================
// CENÁRIO 5 – Sistema de Biblioteca
// ======================================================

// Substantivos: Usuario, Livro, Revista, Emprestimo, Biblioteca
// Verbos: cadastrarUsuario(), emprestar(), registrarEmprestimo()

class Usuario {
    public $nome;
    public $tipo; // Aluno ou Professor
    public $itensEmprestados = [];

    function __construct($nome, $tipo) {
        $this->nome = $nome;
        $this->tipo = $tipo;
    }
}

class Livro {
    public $titulo;
    public $autor;

    function __construct($titulo, $autor) {
        $this->titulo = $titulo;
        $this->autor = $autor;
    }
}

class Revista {
    public $titulo;
    public $edicao;

    function __construct($titulo, $edicao) {
        $this->titulo = $titulo;
        $this->edicao = $edicao;
    }
}

class Emprestimo {
    public $usuario;
    public $item;

    function __construct($usuario, $item) {
        $this->usuario = $usuario;
        $this->item = $item;
    }

    function registrar() {
        $titulo = $this->item->titulo ?? "Item desconhecido";
        $this->usuario->itensEmprestados[] = $titulo;
        echo "{$this->usuario->nome} pegou emprestado: {$titulo}.<br>";
    }
}

class Biblioteca {
    public $nome;
    public $usuarios = [];

    function __construct($nome) {
        $this->nome = $nome;
    }

    function cadastrarUsuario(Usuario $usuario) {
        $this->usuarios[] = $usuario;
        echo "Usuário {$usuario->nome} cadastrado na biblioteca {$this->nome}.<br>";
    }
}

// ================== SIMULAÇÃO ==================
$biblioteca = new Biblioteca("Biblioteca Central");

$aluno = new Usuario("Lucas", "Aluno");
$professor = new Usuario("Ana", "Professor");

$biblioteca->cadastrarUsuario($aluno);
$biblioteca->cadastrarUsuario($professor);

$livro = new Livro("Dom Casmurro", "Machado de Assis");
$revista = new Revista("Ciência Hoje", "Edição 210");

$emprestimo1 = new Emprestimo($aluno, $livro);
$emprestimo2 = new Emprestimo($professor, $revista);

$emprestimo1->registrar();
$emprestimo2->registrar();
?>
