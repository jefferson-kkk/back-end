
<?php

// crud crete, read, update e delete
class alunoDao{ //adao data access object
    private $alunos = []; // Array para armazenar temporáriamente os objetos e seus  atributos antes de mandar para o banco de dados. Foi criado inicialmente vazio[] ;

    public function CriarAluno(Aluno $aluno){ // metodo create para criar um novo objeto
        $this->alunos[$aluno->getId()] = $aluno;
    }

    public function lerAluno(){  // método read  para ler informações de um objeto já existente
        return $this->alunos;
    }

    public function atualizarAluno($id, $novoNome, $novoCurso){ //método update para atualizar as informações de um obejeto já existente
        if (isset($this->alunos[$id])) {
            $this->alunos[$id]->setNome($novoNome);
            $this->alunos[$id]->setCurso($novoCurso);

        }
        
    }

    public function excluirAluno($id){ //método delete para excluir um objeto
        unset($this->alunos[$id]);
    }
}
?>