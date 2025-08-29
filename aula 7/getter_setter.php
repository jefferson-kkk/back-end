<?php
class pessoa{
    private $nome;
    private $cpf;
    private $telefone;
    private $idade;
    private $email;
    private $senha;

    //crie o constructor para a classe pessoa.
    private function __construct($nome, $cpf, $telefone, $idade, $email, $senha) {
        $this ->setnome($nome);
        $this ->setcpf($cpf);
        $this ->settelefone($telefone);
        $this ->setidade($idade);
        $this ->email=$email;
        $this ->senha=$senha;
    }
 public function setnome($nome){
    $this ->nome=ucwords(strtolower($nome));
    }
    public function getnome(){
        return $this ->nome;
    }
    public function setcpf($cpf){
    $this ->cpf = preg_replace('/\D/',"", $cpf);
    }
    public function getCpf(){
        return $this ->cpf;
}
    public function settelefone($telefone) {
    $this ->telefone = preg_replace('/\D/', "", $telefone);
} public function gettelefone(){
    return $this ->telefone;
} public function setidade($idade){
    $this ->idade = abs((int)$idade);
} public function getidade(){
    return $this -> idade;
}
}

$pessoa1 = new pessoa(" JeFF", "376-756-509-43", "19-7546-6540", -18, "jeff.2008@gmail.com ", "12345");

echo $pessoa1 ->getnome();

?>