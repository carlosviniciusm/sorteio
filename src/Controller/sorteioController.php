<?php

namespace sorteio\Controller;

use sorteio\model\NumerosAleatorios;

/**
 * Class sorteioController
 * @package sorteio\Controller
 * @version 1.0.0
 */
class sorteioController {

	/**
	 * @var
	 */
	private $aDados;

	/**
	 * sorteioController constructor.
	 * @param $aDados
	 */
	public function __construct($aDados) {
		$this->aDados = $aDados;
	}

	/**
	 * Exibe página inicial do projeto
	 * @return void
	 * @author Carlos Vinicius cvmm321@gmail.com
	 * @since 1.0.0 - Definição do versionamento da função
	 */
	public function index() {
		include_once 'home.php';
	}

	/**
	 * Gera tabelas do sorteio de numeros
	 * @author Carlos Vinicius cvmm321@gmail.com
	 * @return void
	 * @since 1.0.0 - Definição do versionamento da função
	 */
	public function sorteio() {
		$sTabela = $this->gerarTabelas();
		include_once 'src/view/tabelas.php';
	}

	/**
	 * Exibe pagina de sorteio simples
	 * @author Carlos Vinicius cvmm321@gmail.com
	 * @return void
	 * @since 1.0.0 - Definição do versionamento da função
	 */
	public function sorteioSimples() {
		$aNumeros = (new NumerosAleatorios())->gerarNumeros();
		include_once 'src/view/sorteiosimples.php';
	}

	/**
	 * Gera as tabelas de sorteio
	 * @return string
	 * @author Carlos Vinicius cvmm321@gmail.com
	 * @since 1.0.0 - Definição do versionamento da função
	 */
	public function gerarTabelas(): string {
		$iQuantidadeTabelas = 3;
		$sTabela = "";
		$oNumeros = new NumerosAleatorios();

		for ($i = 1; $i <= $iQuantidadeTabelas; $i++) {
			$aNumeros = $oNumeros->gerarNumeros();

			$sTabela .= "<h2 class='titulo'>Tabela {$i}</h2>";
			$sTabela .= "<table class=\"table\">";
			$sTabela .= $this->preencherTabela($aNumeros);
			$sTabela .= "</table>";

			$aNumeros = [];
		}

		return $sTabela;
	}

	/**
	 * Preenche conteúdo da tabela
	 * @param $aNumeros
	 * @return string
	 * @author Carlos Vinicius cvmm321@gmail.com
	 * @since 1.0.0 - Definição do versionamento da função
	 */
	private function preencherTabela($aNumeros) {
		$iQuantidadeColunas = 10;
		$iQuantidadeLinhas = 6;
		$iContLinhas = 0;
		$iContNumeros = 1;
		$sTabela = "";
		while ($iContLinhas < $iQuantidadeLinhas) {
			$sTabela .= "<tr>";
			for ($j = 1; $j <= $iQuantidadeColunas; $j++) {
				if (in_array($iContNumeros, $aNumeros)) {
					$sCor = "sorteado";
				} else {
					$sCor = "";
				}
				$sTabela .= "<td class='{$sCor} celula'>";
				$sTabela .= "$iContNumeros";
				$sTabela .= "</td>";
				$iContNumeros++;
			}
			$sTabela .= "</tr>";
			$iContLinhas++;
		}

		return $sTabela;
	}

}