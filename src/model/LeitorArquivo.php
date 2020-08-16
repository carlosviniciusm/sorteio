<?php

namespace sorteio\model;

/**
 * Class LeitorArquivo
 * @package sorteio\model
 * @version 1.0.0
 */
class LeitorArquivo {

	/**
	 * @var false|string
	 */
	private $sConteudoArquivo;
	/**
	 * @var
	 */
	private $aFile;

	/**
	 * LeitorArquivo constructor.
	 * @param $aArquivo
	 */
	public function __construct($aArquivo) {
		if (isset($aArquivo)) {
			$this->aFile = $aArquivo;
		}

		$this->sConteudoArquivo = file_get_contents($this->aFile['tmp_name']);
	}

	/**
	 * Faz upload do arquivo no diretorio do projeto
	 * @param $aDados
	 * @return bool
	 * @author Carlos Vinicius cvmm321@gmail.com
	 * @since 1.0.0 - Definição do versionamento da função
	 */
	public function carregarArquivo($aDados): bool {
		$sUploadDir = $_SERVER['DOCUMENT_ROOT'].'/sorteio/public/files/';
		$sUploadFile = $sUploadDir . basename($aDados['name']);

		if (move_uploaded_file($aDados['tmp_name'], $sUploadFile)) {
			return true;
		}

		return false;
	}

	/**
	 * Exibe em tela conteudo do arquivo importado
	 * @return string
	 * @author Carlos Vinicius cvmm321@gmail.com
	 * @since 1.0.0 - Definição do versionamento da função
	 */
	public function visualizarArquivo() {
		if (pathinfo($this->aFile['name'], PATHINFO_EXTENSION) != "txt") {
			return "Só será possível visualizar arquivos txt, apesar disso, seu arquivo foi salvo com sucesso!";
		}

		$sUploadDir = $_SERVER['DOCUMENT_ROOT'].'/sorteio/public/files/' . $this->aFile['name'];

		$sLinha = "";
		$rArquivo = fopen($sUploadDir, 'r');
		while(!feof($rArquivo)) {
			$sLinha .= fgets($rArquivo, 1024) . '<br>';
		}
		fclose($rArquivo);

		return "Arquivo carregado com sucesso. <br>Conteúdo do arquivo: <br>" . $sLinha;
	}

}