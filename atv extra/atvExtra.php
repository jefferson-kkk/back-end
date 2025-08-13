<?php
// Solicita os valores ao usuário
echo "Digite o primeiro valor: ";
$valor1 = trim(fgets(STDIN));

echo "Digite o segundo valor: ";
$valor2 = trim(fgets(STDIN));

// Tenta converter para número se possível
if (is_numeric($valor1)) {
    if (strpos($valor1, '.') !== false) {
        $valor1 = (float)$valor1;
    } else {
        $valor1 = (int)$valor1;
    }
}

if (is_numeric($valor2)) {
    if (strpos($valor2, '.') !== false) {
        $valor2 = (float)$valor2;
    } else {
        $valor2 = (int)$valor2;
    }
}

// Obtém os tipos das variáveis
$tipo1 = gettype($valor1);
$tipo2 = gettype($valor2);

// Exibe a mensagem conforme os tipos
if ($tipo1 === $tipo2) {
    echo "Variáveis de tipos iguais! Primeiro valor do tipo $tipo1 e segundo valor do tipo $tipo2\n";
} else {
    echo "ERRO! Variáveis de tipos diferentes. Primeiro valor do tipo $tipo1 e segundo valor do tipo $tipo2\n";
}
?>
