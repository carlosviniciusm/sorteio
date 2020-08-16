<?php


namespace sorteio\Controller;


class apiController {

	/**
	 * @var
	 */
	private $aDados;

	private $sValor;

	/**
	 * apiController constructor.
	 * @param $aDados
	 */
	public function __construct($aDados) {
		$this->aDados = $aDados;
	}

	/**
	 * Exibe página inicial do modulo
	 * @return void
	 * @author Carlos Vinicius cvmm321@gmail.com
	 * @since 1.0.0 - Definição do versionamento da função
	 */
	public function index() {
		$sUrl = "https://randomuser.me/api";
		$sCh = curl_init($sUrl);
		curl_setopt($sCh, CURLOPT_RETURNTRANSFER, true);
		$aDados = json_decode(curl_exec($sCh), true);

		$sTabela = $this->varrerArrayRecursivo($aDados);

		include_once 'src/view/api.php';
	}

	public function varrerArrayRecursivo($aDados) {
		foreach ($aDados as $mDado) {
			if (is_array($mDado)) {
				$sNome = array_search($mDado, $aDados);
				$this->sValor .= "<tr><td colspan='2' class='border border-dark celula-center'>$sNome</td></tr>";
				$this->varrerArrayRecursivo($mDado);
			} else {
				$s = array_search($mDado, $aDados);
				$this->sValor .= "<tr><td>$s</td><td>$mDado</td></tr>";
			}
		}
		return $this->sValor;
	}
}