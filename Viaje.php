<?php
//***La empresa de Transporte de Pasajeros “Viaje Feliz” quiere registrar la información referente a sus viajes. 
//De cada viaje se precisa almacenar el código del mismo, destino, cantidad máxima de pasajeros y los pasajeros del viaje.
//Realice la implementación de la clase Viaje e implemente los métodos necesarios para modificar los atributos de dicha clase 
//incluso los datos de los pasajeros). Utilice un array que almacene la información correspondiente a los pasajeros. 
//Cada pasajero es un array asociativo con las claves “nombre”, “apellido” y “numero de documento”.
//Implementar un script testViaje.php que cree una instancia de la clase Viaje y presente un menú que permita cargar la información del viaje, modificar y ver sus datos.

class Viaje{
    private $codigo;
    private $destino;
    private $cantMaxPax;
    private $coleccionPasajeros=[];

    public function __construct($codigo, $destino, $cantMaxPax)
    {
        $this->codigo = $codigo;
        $this->destino = $destino;
        $this->cantMaxPax =$cantMaxPax;
    }
    public function setCodigo ($codigo){
        $this->codigo =$codigo;
    }
    public function setDestino ($destino){
        $this->destino =$destino;
    }
    public function setCantMaxPax ($cantMaxPax){
        $this->cantMaxPax= $cantMaxPax;
    }
    public function setColeccionPasajeros ($coleccionPasajeros){
        $this ->coleccionPasajeros =$coleccionPasajeros;
    }
    public function getCodigo (){
        return $this->codigo;
    }
    public function getDestino (){
        return $this->destino;
    }
    public function getCantMaxPax (){
        return $this->cantMaxPax;
    }
    public function getColeccionPasajeros (){
        return $this->coleccionPasajeros;
    }

    //función cargar datos de pasajeros en viaje.
    
    public function cargarPasajeros($cantPaxViaje){
        $arregloPasajeros = $this->getColeccionPasajeros();
        if ($cantPaxViaje <= $this->getCantMaxPax()){
            for ($i =0; $i < $cantPaxViaje; $i++){
                echo "ingrese el nombre del " .($i+1)." ° pasajero:\n";
                $nombre = trim(fgets(STDIN));
                echo "ingrese el apellido:\n";
                $apellido = trim(fgets(STDIN));
                echo "ingrese el dni:\n";
                $dni= trim(fgets(STDIN));
                 $arregloPasajeros [$i]["nombre"] = $nombre;
                 $arregloPasajeros [$i]["apellido"] =$apellido;
                 $arregloPasajeros [$i]["dni"] =$dni;
        }
        }else{
            echo "la cantidad de pasajeros a ingresar supera la cantidad maxima de pasajeros del viaje\n:";
            echo "ingrese una cantidad valida menor o igual a ".$this->getCantMaxPax(). "\n";
        }
        
    }
    
    //busca un pasajero por su dni y permite modificar sus datos. 
    public function modificarDatosPasajero($dni, $nuevoApellido,$nuevoNombre,$nuevoDni){
      $arregloaModificar = $this->getColeccionPasajeros();
      $key= array_search($dni, $arregloaModificar);
      $arregloaModificar [$key]["nombre"]=$nuevoNombre;
      $arregloaModificar [$key]["apellido"]=$nuevoApellido;
      $arregloaModificar [$key]["dni"]= $nuevoDni;
      $this->setColeccionPasajeros($arregloaModificar);
    }
    //busca pasajero por su dni y lo elimina del arreglo.
    public function eliminarPasajero($dni,){
        $arregloEliminar =$this->getColeccionPasajeros();
        $key = array_search ($dni, $arregloEliminar);
        array_splice($arregloEliminar, $key); //no estoy segura
        $this->setColeccionPasajeros($arregloEliminar);

    }
    //agregar pasajeros
    public function agregarPasajeros($cantPaxViaje,$nombre,$apellido,$dni){
        $arregloAgregar= $this->getColeccionPasajeros();
        if ($this->getCantMaxPax()< $cantPaxViaje){
           $arregloAgregar[]["nombre"]= $nombre;
           $arregloAgregar[]["apellido"]= $apellido;
           $arregloAgregar[]["dni"]= $dni;
        }else{
            echo "el viaje esta completo. No se pueden agregar pasajeros\n";
        }
        
    }
    //muestra en pantalla datos del objeto viaje
    public function __toString()
    {
        $cadena = "Codigo de viaje: ".$this->getCodigo()."\n 
        Destino:".$this->getDestino()."\n 
        Cantidad maxima de pasajeros:".$this->getCantMaxPax()."\n
        Datos de pasajeros:" .$this->getColeccionPasajeros."\n";
        return $cadena;
    }

    //muestra y obtiene una opcion de menú ***válida***
    
    public function seleccionarOpcion(){
        do
        {
            echo "--------------------------------------------------------------\n";
            echo "Bienvenides a Viaje Feliz. Seleccione una opción:\n";
            echo "\n ( 1 ) Cargar información de viaje"; 
            echo "\n ( 2 ) Modificar datos de un viaje"; 
            echo "\n ( 3 ) Mostrar la informacion completa de un Viaje"; 
            echo "\n ( 4 ) Salir"; 
            echo "\n        ";
            $opcion = trim(fgets(STDIN));
    
            // controlar que la opción elegida es válida. Puede que el usuario se equivoque al elegir una opción <<<*/
            if($opcion < 1 || $opcion > 4)
             {
                 echo "\n---------- Indique una opcion valida ----------\n";
             }
        } //Si la opcion es invalida muestra una advertencia y vuelve a mostrar el menu
        while(!($opcion >= 1 && $opcion <= 4));
    
        echo "--------------------------------------------------------------\n";
        return $opcion;
    }

    }


