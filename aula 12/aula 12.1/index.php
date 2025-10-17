<?php

require_once "crud.php";
require_once "alunodao.php";

//  Objeto da classe alunodao para gerenciar os metodos do crud

    $dao = new alunoDao();

    // create

    // cria objetos
    $dao-> CriarAluno(new Aluno(1, "Maria", "Design"));
    $dao-> CriarAluno(new Aluno(2, "Gabriel", "Moda"));
    $dao-> CriarAluno(new Aluno(3, "Eduardo", "Manicure"));
    $dao-> CriarAluno(new Aluno(4, "Aurora", "Arquitetura"));
    $dao-> CriarAluno(new Aluno(5, "Oliver", "Director"));
    $dao-> CriarAluno(new Aluno(6, "Amanda", "Lutadora"));
    $dao-> CriarAluno(new Aluno(7, "Geysa", "Engenheira"));
    $dao-> CriarAluno(new Aluno(8, "Joab", "Professor"));
    $dao-> CriarAluno(new Aluno(9, "Bernardo", "Streamer"));


    // read

    echo "\nlistagem inicial\n";
    foreach($dao->lerAluno() as $aluno){
        echo  "{$aluno->getId()} - {$aluno->getNome()} - {$aluno->getCurso()}\n";
    }

    //  update

    // atualiza os objetos
    $dao->atualizarAluno(3, "viviane", "eletricista");
    $dao->atualizarAluno(7, "Clotilde", "engenheira");
    $dao->atualizarAluno(8, "joana", "professor");
    $dao->atualizarAluno(9, "bernardo", "dev");
    $dao->atualizarAluno(6, "amanda", "logistica");
    $dao->atualizarAluno(5, "oliver", "eletrica");
    

    echo "\nApós Atualização\n";
    foreach($dao->lerAluno() as $aluno){
        echo  "{$aluno->getId()} - {$aluno->getNome()} - {$aluno->getCurso()}\n";
    }

    // delete
    $dao->excluirAluno(7);
    $dao->excluirAluno(4);
    
    $dao->excluirAluno(2);
    echo "\napós exclusão\n";
    foreach($dao->lerAluno() as $aluno){
        echo  "{$aluno->getId()} - {$aluno->getNome()} - {$aluno->getCurso()}\n";
    }

?>