<?php
class carro{
    private $modelo;
    private $marca;

    public function __construct($modelo, $marca){
    $this -> setmodelo ($modelo);
    $this -> setmarca($marca);

} public function setmarca($marca){
    $this -> marca = ucwords(strtolower($marca));
} public function getmarca(){
    return $this -> marca;
}public function setmodelo($modelo){
    $this -> modelo = ucwords(strtolower($modelo));
} public function getmodelo(){
    return $this -> modelo;
}
}

$carro1 = new carro("Versa", "nissan");
echo $carro1 -> getmodelo();

?>


<!-- exercicio 2 -->

<?php
class pessoa{
    private $nome;
    private $idade;
    private $email;

    public function __construct($nome, $idade, $email){
    $this -> nome =$nome;
    $this -> idade=$idade;
    $this -> email = $email;
    } 
    public  function setnome($nome){
    $this -> nome = ucwords(strtolower($nome));
    }
    public function getnome(){
        return $this -> nome;
    }
    public function setidade($idade){
        $this -> idade= abs((int)$idade);
    }
    public function getidade(){
        return $this -> idade;
    }
    public  function setemail($email){
    $this -> email = ucwords(strtolower($email));
    }
 public function exibirinfo(){
    return "o nome é: $this->nome, a idade é: $this->idade,
    o email é: $this->email";
 }
}
$pessoa1 = new pessoa("samuel", 25, "samuel@exemplo.com.");
echo $pessoa1 -> exibirinfo();
?>


<!-- exercicio 3 -->
<?php
class aluno{
    private $nome;
    private $nota;
     public function __construct($nome, $nota){
        $this -> setnome($nome);
        $this -> setnota($nota);
     }
     public function setnome($nome){
        $this ->  nome = ucwords(strtolower($nome));
        }   public function getnome(){
            $this -> nome;
        }

        public function setnota($nota){
            $this -> nota = abs( (int)$nota); 
            if($nota >= 0 && $nota <=10){
                $this ->nota = $nota;
            }else{
                $this -> nota = 0;
            }
        }
         public function getnota(){
            $this -> nota;
        }
 
}$aluno1 = new aluno ("samuel", $nota );
?>


<!-- exercicio 4 -->
<?php
class produto{
    private $nome;
    private $preco;
    private $estoque;

    public function __construct($nome, $preco, $estoque){
        $this -> setnome($nome);
        $this -> setpreco ($preco);
        $this -> setestoque  ($estoque);
    }
    public function setnome($nome){
        $this -> nome = ucwords (strtolower($nome));
    }
    public function getnome(){
        $this -> nome;
    }
    public function setpreco($preco){
        $this -> preco = abs((float)$preco);
    }
    public function getpreco(){
        $this -> preco;
    }
    public function setestoque($estoque){
        $this -> estoque = abs((int)$estoque);
    }
    public function getestoque(){
        $this -> estoque;
    }
}
$produto = new produto("arroz", 20.50, 100);
?>

<!-- exercicio 5 -->
<?php
class funcionario{
    private $salario;
    private $nome;

    public function __construct($nome, $salario) {
        $this->  setnome($nome);
        $this -> setsalario($salario);

    }
    public function setnome($nome){
        $this ->nome = ucwords (strtolower($nome));

    }
    public function getnome(){
        $this-> nome;
    }
    public function setsalario($salario){
        $this -> salario = abs((float)$salario);
}
    public function getsalario(){
    $this -> salario;
}
}$funcionario = new funcionario("samuel",0.00001,);
?>