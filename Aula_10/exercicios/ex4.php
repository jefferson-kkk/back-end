<?php

interface mensagem{
public function enviar();
}


class email implements mensagem{
    public function enviar(){
        echo "Enviando email.";
    }

}

class sms implements mensagem{
    public function enviar(){
        echo"Enviando sms";
    }
}
function notificar($meio) {
    if (method_exists($meio, 'enviar')) {
        return $meio->enviar();
    } else {
        echo 'Método enviar não encontrado.';
    }
}



?>