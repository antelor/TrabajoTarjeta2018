<?php

namespace TrabajoTarjeta;

use PHPUnit\Framework\TestCase;

class TarjetaTest extends TestCase {

    /**
     * Comprueba que la tarjeta aumenta su saldo cuando se carga saldo válido.
     */
    public function testCargaSaldo() {
        $tiempo = new TiempoFalso();
        $tarjeta = new Tarjeta($tiempo);

        $this->assertTrue($tarjeta->recargar(10.0));
        $this->assertEquals($tarjeta->obtenerSaldo(), 10.0);

        $this->assertTrue($tarjeta->recargar(20.0));
        $this->assertEquals($tarjeta->obtenerSaldo(), 30.0);
    }

    /**
     * Comprueba que la tarjeta no puede cargar saldos invalidos.
     */
    public function testCargaSaldoInvalido() {
      $tarjeta = new Tarjeta($tiempo);

      $this->assertFalse($tarjeta->recargar(15.0));
      $this->assertEquals($tarjeta->obtenerSaldo(), 0.0);
    }

    public function testMedioBoletoLimitacionTiempo(){
        $tiempo = new TiempoFalso;
        $medio = new Medioboleto($tiempo);
        $medio->recargar(100.0);

        $medio->reducirSaldo(14.80);
        $this->assertFalse($medio->reducirSaldo(14.80));
    }

    public function testMedioBoletoLimitacionDia(){
        $tiempo = new TiempoFalso();
        $medio = new Medioboleto($tiempo);
        $medio->recargar(100.0);

        $colectivo = new Colectivo(NULL, NULL, NULL);
        $boleto = new Boleto(14.80, $colectivo, $medio, $medio->obtenerID(), $colectivo->linea(), get_class($medio), $medio->obtenerViajesplusAbonados(), $medio->valordelospasajesplus(), date("d/m/Y H:i", time()));
        
        $colectivo->pagarCon($medio);
        $colectivo->pagarCon($medio);
        $this->assertEquals( $colectivo->pagarCon($medio)->obtenerValor(), 14.80 );

    }
}
