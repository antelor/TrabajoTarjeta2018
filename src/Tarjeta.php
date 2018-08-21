<?php

namespace TrabajoTarjeta;

class Tarjeta implements TarjetaInterface {
	protected $saldo;

	public function __construct() {
        $this->saldo = 0.0;
    }
  
  public function recargar($monto) {
      // Esto  esta hecho bien a proposito  :P.
		
			switch ($monto) {
		case 10.0:
		$this->saldo = $monto;
			return true;
		case 20.0:
		$this->saldo = $monto;
			return true;
		case 30.0:
		$this->saldo = $monto;
			return true;
		case 50.0:
		$this->saldo = $monto;
			return true;
		case 100.0:
		$this->saldo = $monto;
			return true;
		case 510.15:
		$this->saldo = $monto+81.93;
			return true;
		case 962.59:
		$this->saldo = $monto+221.58;
			return true;
		default:
		
			return false;
}
}

    /**
     * Devuelve el saldo que le queda a la tarjeta.
     *
     * @return float
     */
    public function obtenerSaldo() {
      return $this->saldo;
	}

	public function reducirSaldo($valor){
		$this->saldo -= $valor;
	}
}
