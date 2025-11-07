<?php
// crud crete, read, update e delete
class alunoDao
{ //adao data access object

    private $arquivo = "alunos.json"; // cia um arquivo json para que os daddos sejam armazenados
    private $alunos = []; // Array para armazenar temporáriamente os objetos e seus  atributos antes de mandar para o banco de dados. Foi criado inicialmente vazio[] ;

    // cpnstrutor aluno dao --> carrega os dadods do arquivo ap inciar a aplicação
    public function __construct()
    {
        if (file_exists($this->arquivo)) {
            //le o conteúdo arquivo caso ele já exista
            $conteudo = file_get_contents($this->arquivo); // tribui as informações do arquivo existente a variavel $conteudo
            $dados = json_decode($conteudo, true); // converte um json em rray asssociativo
            
            // Verifica se $dados não é nulo ou false (caso o json esteja mal formatado ou vazio)
            if (is_array($dados)) {
                foreach ($dados as $id => $info) {
                    // $id aqui é a chave do array (ex: 101, 102), que usamos para indexar $this->alunos
                    $this->alunos[$id] = new Aluno(
                        $info['id'],
                        $info['nome'],
                        $info['curso']
                    );
                }
            }
        }
    }

    //metodo auxiliar --> salva o array de alunos no arquivo
    private function salvarEmArquivo() {
        
        // CORREÇÃO 1: Inicializa $dados como um array vazio
        $dados = []; 
        
        foreach($this->alunos as $id => $aluno){
            
            // CORREÇÃO 2: Salva usando o $id como chave (para manter o formato associativo)
            $dados[$id] = [
                'id' => $aluno->getId(),
                'nome'=> $aluno->getNome(),
                'curso'=> $aluno->getCurso()
            ];
        }

        // CORREÇÃO 3: Corrigido o erro de digitação (flie -> file)
        file_put_contents($this->arquivo, json_encode($dados, JSON_PRETTY_PRINT));
    }

    public function CriarAluno(Aluno $aluno)
    { // metodo create para criar um novo objeto
        $this->alunos[$aluno->getId()] = $aluno;
        
        // CORREÇÃO 4: Chama o método para salvar
        $this->salvarEmArquivo(); 
    }

    public function lerAluno(){ 
     // método read  para ler informações de um objeto já existente
        return $this->alunos;
    }

    public function atualizarAluno($id, $novoNome, $novoCurso)
    { //método update para atualizar as informações de um obejeto já existente
        if (isset($this->alunos[$id])) {
            $this->alunos[$id]->setNome($novoNome);
            $this->alunos[$id]->setCurso($novoCurso);
            
            // CORREÇÃO 4: Chama o método para salvar
            $this->salvarEmArquivo(); 
        }
    }
    
    public function excluirAluno($id)
    { //método delete para excluir um objeto
        if (isset($this->alunos[$id])) {
            unset($this->alunos[$id]);

            // CORREÇÃO 4: Chama o método para salvar
            $this->salvarEmArquivo();
        }
    }
}
?>