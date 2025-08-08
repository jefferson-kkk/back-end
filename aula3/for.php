<!-- ordem crecente -->
<?php
for ($i = 1; $i <= 5; $i++) {
echo "Número: $i
";
}
?>

<!-- decrescente -->
<?php
for ($i = 10; $i >= 1; $i--) {
echo "Contagem regressiva: $i
";
}
?>

<!-- Percorrendo array -->
<?php
 $nomes = ["Ana", "Bruno", 
 "Carlos"];
for ($i = 0; $i < count($nomes); $i++) {
echo $nomes[$i] . "
";
}
?>