<?php

include_once "src/view/header.php";?>


	<link rel="stylesheet" href="/sorteio/public/css/sorteio.css">


<?php
include_once "src/view/menu.php";

echo "Criar uma simples classe que possa ler o conteúdo de um arquivo texto. Essa classe deverá conter um atributo 
privado que será usado para guardar o conteúdo do arquivo lido, um método para carregar o arquivo e outro para 
visualizar o atributo. Criar um form que solicite ao usuário um arquivo e que ao submeter seja visualizado o conteúdo.";
?>

	<div class="container">
		<div class="row">
			<div class="col-lg-12 form">
				<form action="/sorteio/arquivo/upload" enctype="multipart/form-data" method="post">
					<div class="form-row" style="width: 450px">
						<div>
							<input type="file" name="arquivo">
						</div>
					</div>
					<br>
					<button type="submit" class="btn btn-primary">Upload</button>
				</form>
				<?php
					if (!empty($sArquivo)) {
						echo $sArquivo;
					}
				?>
			</div>
		</div>
	</div>


<?php
include_once "src/view/footer.php";
