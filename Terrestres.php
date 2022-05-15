<?php
include_once 'Viaje.php';

class Terrestres extends Viaje{
    private $tipoAsiento;


    public function __construct ($codigo, $destino, $cantMaxPax, $coleccionPasajeros,$objResponsable, $importe, $trayecto, $tipoAsiento){
        parent::__construct($codigo, $destino, $cantMaxPax, $coleccionPasajeros,$objResponsable, $importe, $trayecto);
            $this->tipoAsiento=$tipoAsiento;
        
    }
    public function setTipoAsiento ($tipoAsiento){
        $this->tipoAsiento=$tipoAsiento;
    }
    public function getTipoAsiento (){
        return $this->tipoAsiento;
    }
    public function __tostring(){
        $cadena= parent::__toString()."\n
        Tipo de asiento: ".$this->getTipoAsiento()."\n";
        return $cadena;
    }
    public function venderPasaje($objPasajero)
    {
       $importeTotal=  parent::venderPasaje($objPasajero);
       if ($this->getTipoAsiento() == 'CAMA'){
           $nuevoImporte= $importeTotal + ($importeTotal*25/100);
       }
       return $nuevoImporte;

    }
}