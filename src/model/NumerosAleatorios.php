<?php

namespace sorteio\model;

/**
 * Class NumerosAleatorios
 * @version 1.0.0
 */
class NumerosAleatorios {

	/** @var array */
	private $aNumeros;

	/**
	 * NumerosAleatorios constructor.
	 */
	public function __construct() {
		$this->aNumeros = [];
	}

	/**
	 * Gera números aleatórios
	 * @author Carlos Vinicius cvmm321@gmail.com
	 * @return array
	 * @since 1.0.0 - Definição do versionamento da função
	 */
	public function gerarNumeros(): array {
		$aNumeros = [];
		$aNumeros = $this->gerar($aNumeros);
		sort($aNumeros);

		return $aNumeros;
	}

	/**
	 * Verifica se o número gerado é uma dezena
	 * @param int $iNumero
	 * @return bool
	 * @author Carlos Vinicius cvmm321@gmail.com
	 * @since 1.0.0 - Definição do versionamento da função
	 */
	private function isDezena(int $iNumero): bool {
		return strlen($iNumero) < 2;
	}

	/**
	 * Verifica se o número já existe no array
	 * @param int $iNumero
	 * @return bool
	 * @author Carlos Vinicius cvmm321@gmail.com
	 * @since 1.0.0 - Definição do versionamento da função
	 */
	private function isNumeroExistente(int $iNumero): bool {
		return in_array($iNumero, $this->aNumeros);
	}

	/**
	 * Gera e realiza verificações do numero aleatório gerado
	 * @param array $aNumeros
	 * @return array
	 * @author Carlos Vinicius cvmm321@gmail.com
	 * @since 1.0.0 - Definição do versionamento da função
	 */
	private function gerar(array $aNumeros): array {
		for ($i = 1; $i <= 6; $i++) {
			$iNumero = rand(1, 60);

			if ($this->isDezena($iNumero)) {
				$i = $i - 1;
				continue;
			}

			if ($this->isNumeroExistente($iNumero)) {
				$i = $i - 1;
				continue;
			}

			$aNumeros[] = $iNumero;
			$this->aNumeros[] = $iNumero;
		}

		return $aNumeros;
	}

}