<?php

class alunoDao{
    private $alunos = [];
    public function CriarAluno(Aluno $aluno){
    $this->alunos[$aluno->getId()] = $aluno;
    }
    public function lerAluno(){
        return $this ->alunos;
    }
    public function atualizarAluno(){

    }
    public function excluirAluno($id){
        public function excluirAluno($id){
            unset($this->alunos[$id]);
        }
    }
}
?>