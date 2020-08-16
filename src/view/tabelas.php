<?php

include_once "src/view/header.php";?>
<link rel="stylesheet" href="/sorteio/public/css/sorteio.css">


<?php
include_once "src/view/menu.php";

echo "Utilizando a função acima e pensando num volante da Megasena, criar um layout html contendo 3 tabelas com 10 
colunas e 6 linhas numeradas com as 60 dezenas e destacando com a cor roxa [#ff00ff] os números sorteados. Para isso, 
deverão constar 3 apostas não repetidas. Há várias formas de resolver, porém, essa atividade não será avaliada pelo 
layout e sim pela lógica e organização do código.";
?>
	<br><a href="/sorteio/sorteio/sorteio" class="btn btn-primary">Sortear</a> <hr/>
<?php
/** @var string $sTabela */
echo $sTabela;

include_once "src/view/footer.php";
