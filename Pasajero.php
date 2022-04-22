<?php

class Pasajero{
    private $nombre;
    private $apellido;
    private $dni;
    private $telefono;

    public function __construct($nombre, $apellido,$dni, $telefono)
    {
        $this->nombre=$nombre;
        $this->apellido =$apellido;
        $this->dni=$dni;
        $this->telefono=$telefono;
    }

    public function getNombre(){
        return $this->nombre;
    }
    public function getApellido(){
        return $this->apellido;
    }
    public function getDni(){
        return $this->dni;
    }
    public function getTelefono(){
        return $this->telefono;
    }
    public function setNombre($nombre){
        $this->nombre=$nombre;
    }
    public function setApellido($apellido){
        $this->apellido= $apellido;
    }
    public function setDni($dni){
        $this->dni=$dni;
    }
    public function setTelefono($telefono){
        $this->telefono=$telefono;
    }

    public function __toString()
    {
        $cad= "Datos del pasajero/a:\n
        Nombre: " .$this->getNombre()."\n
        Apellido: ". $this->getApellido()."\n
        DNI: ".$this->getDni()."\n
        Telefono: ".$this->getTelefono()."\n";
        return $cad;

    }
    //Volver a implementar las operaciones que permiten modificar el nombre, apellido y teléfono de un pasajero.
    /*podria ser que le imprima al usuario la lista de pasajeros, le pida ingresar el numero de orden $key para poder modificar los datos en el test*/
    public function modificarPasajero($nuevoNombre, $nuevoApellido, $nuevoDni, $nuevoTel){
        $this->setNombre($nuevoNombre);
        $this->setApellido($nuevoApellido);
        $this->setDni($nuevoDni);
        $this->setTelefono($nuevoTel);
    }

}
