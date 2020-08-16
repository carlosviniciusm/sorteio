<?php

namespace sorteio\Controller;

use sorteio\model\LeitorArquivo;

/**
 * Class arquivoController
 * @package sorteio\Controller
 * @version 1.0.0
 */
class arquivoController {

	/** @var array */
	private $aDados;

	/**
	 * arquivoController constructor.
	 * @param $aDados
	 */
	public function __construct($aDados) {
		$this->aDados = $aDados;
	}

	/**
	 * Pagina inicial
	 * @author Carlos Vinicius cvmm321@gmail.com
	 * @return void
	 * @since 1.0.0 - Definição do versionamento da função
	 */
	public function index() {
		require_once "src/view/upload.php";
	}

	/**
	 * Salva e exibe conteudo de um arquivo importado
	 * @param $aDados
	 * @author Carlos Vinicius cvmm321@gmail.com
	 * @return string
	 * @since 1.0.0 - Definição do versionamento da função
	 */
	public function upload($aDados) {
		$sArquivo = "";
		if (empty($aDados['files']['name'])) {
			$sArquivo = "Insira um arquivo válido para realizar upload.";
			require_once "src/view/upload.php";
			die();
		}

		$oLeitorArquivo = new LeitorArquivo($aDados['files']);

		if ($oLeitorArquivo->carregarArquivo($aDados['files'])) {
			$sArquivo = $oLeitorArquivo->visualizarArquivo();
		}

		require_once "src/view/upload.php";
	}
}