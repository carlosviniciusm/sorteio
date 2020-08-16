<?php

include_once "src/view/header.php";
include_once "src/view/menu.php";
?>
	<link rel="stylesheet" href="/sorteio/public/css/sorteio.css">

	<p>Exibir em uma tabela html, dados da api https://randomuser.me/api</p>

	<div class="row">
		<div class="col-sm-3"></div>
		<div class="col-sm-6">
			<table border="1"
				   width="500" class="table table-striped" style="width: 40rem">
				<?php
				/** @var string $sTabela */
				echo $sTabela;
				?>
			</table>
		</div>
		<div class="col-sm-3"></div>
	</div>

<?php
include_once "src/view/footer.php";
