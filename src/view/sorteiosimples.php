<?php

include_once "src/view/header.php";
include_once "src/view/menu.php";

echo "Criar uma função que retorne um array com 6 dezenas aleatórias entre 1 e 60, atentando que os números nunca se repitam e que estejam na ordem crescente.";
echo "<br>";
/** @var array $aNumeros */
echo implode(", ",$aNumeros);

include_once "src/view/footer.php";
