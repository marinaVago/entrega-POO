<?php

include_once 'Viaje.php';

class Aereos extends Viaje{
    private $numVuelo;
    private $tipoAsiento;
    private $aerolinea;
    private $escala;

    public function __construct($codigo, $destino, $cantMaxPax, $coleccionPasajeros,$objResponsable, $importe, $trayecto, $numVuelo, $tipoAsiento, $aerolinea, $escala){
        parent:: __construct($codigo, $destino, $cantMaxPax, $coleccionPasajeros,$objResponsable, $importe, $trayecto);
        
        $this->tipoAsiento=$tipoAsiento;
        $this->aerolinea=$aerolinea;
        $this->escala=$escala;
    }

    public function setNumVuelo($numVuelo){
        $this->numVuelo=$numVuelo;}
    
    public function setTipoAsiento($tipoAsiento){
        $this->tipoAsiento=$tipoAsiento;
    }
    public function setAerolinea($aerolinea){
        $this->aerolinea=$aerolinea;
    }
    public function setEscala($escala){
        $this->escala=$escala;
    }
    public function getNumVuelo(){
        return $this->numVuelo;
    }
    public function getTipoAsiento(){
        return $this->tipoAsiento;
    }
    public function getAerolinea(){
        return $this->aerolinea;
    }
    public function getEscala(){
        return $this->escala;
    }

    public function __toString()
    {
        $cadena= parent::__toString()."\n
        Numero de vuelo: " .$this->getNumVuelo()."\n
        Tipo de asiento: ".$this->getTipoAsiento()."\n
        Aerolinea: ". $this->getAerolinea()."\n
        Escalas: ".$this->getEscala()."\n";
        return $cadena;
    }
    //Si el viaje es aéreo y el asiento es primera clase sin escalas, se incrementa un 40%, 
    //si el viaje además de ser un asiento de primera clase, 
     //y si el vuelo tiene escalas se incrementa el importe del viaje un 60%.
    public function venderPasaje($objPasajero)
    {
        $importeTotal= parent::venderPasaje($objPasajero);
        if ($this->getTipoAsiento()== "primera" && $this->getEscala() == 0){
            $nuevoImporteTotal = $importeTotal + ($importeTotal * 40/100);
        }
        if ($this->getTipoAsiento()=="primera" && $this->getEscalas > 0){
            $nuevoImporteTotal = $importeTotal + ($importeTotal * 60/100);
        }
        return $nuevoImporteTotal; 
    }
}