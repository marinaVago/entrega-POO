<?php
//***La empresa de Transporte de Pasajeros “Viaje Feliz” quiere registrar la información referente a sus viajes. 
//De cada viaje se precisa almacenar el código del mismo, destino, cantidad máxima de pasajeros y los pasajeros del viaje.
//Realice la implementación de la clase Viaje e implemente los métodos necesarios para modificar los atributos de dicha clase 
//incluso los datos de los pasajeros). Utilice un array que almacene la información correspondiente a los pasajeros. 
//Cada pasajero es un array asociativo con las claves “nombre”, “apellido” y “numero de documento”.
//Implementar un script testViaje.php que cree una instancia de la clase Viaje y presente un menú que permita cargar la información del viaje, modificar y ver sus datos.


/*Modificar la clase Viaje para que ahora los pasajeros sean un objeto que tenga los atributos 
nombre, apellido, numero de documento y teléfono. El viaje ahora contiene una referencia a 
una colección de objetos de la clase Pasajero. También se desea guardar la información de la persona 
responsable de realizar el viaje, para ello cree una clase ResponsableV que registre el número de empleado, 
número de licencia, nombre y apellido. La clase Viaje debe hacer referencia al responsable de realizar el viaje. 
Volver a implementar las operaciones que permiten modificar el nombre, apellido y teléfono de un pasajero. 
Luego implementar la operación que agrega los pasajeros al viaje, solicitando por consola la información de los mismos. 
Se debe verificar que el pasajero no este cargado mas de una vez en el viaje. 
De la misma forma cargue la información del responsable del viaje.
Nota: Recuerden que deben enviar el link a la resolución en su repositorio en GitHub.*/


class Viaje{
    private $codigo;
    private $destino;
    private $cantMaxPax;
    private $coleccionPasajeros=[]; // coleccion de objetos Pasajeros
    private $objResponsable; //objeto de la clase responsableV

    public function __construct($codigo, $destino, $cantMaxPax,  $coleccionPasajeros, $objResponsable)
    {
        $this->codigo = $codigo;
        $this->destino = $destino;
        $this->cantMaxPax =$cantMaxPax;
        $this->coleccionPasajeros = $coleccionPasajeros;
        $this->objResponsable= $objResponsable;
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
    public function setObjResponsable($objResponsable){
        $this->objResponsable=$objResponsable;
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
    public function getObjResponsable(){
        return $this->objResponsable;
    }

    //función cargar datos de pasajeros en viaje.
    
   /* public function cargarPasajeros($cantPaxViaje){
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
        }*/
        
    
    
    //busca a un pasajero usando como param el $dni, si lo encuentra modifica sus datos
    public function modificarPasajero($dni,$nuevoNombre, $nuevoApellido, $nuevoTel){
        $coleccionModificar = $this->getColeccionPasajeros();
        $i=0;
        $continua=true;
            while($i< count($coleccionModificar) && $continua);
                $pasajeroBuscado= $coleccionModificar[$i];
                $dniPasajero = $pasajeroBuscado->getDni();
                //$seEncoontro =($psasjeroBuscado->getDni())
                if ($dniPasajero == $dni){
                    $continua=false;
                    $pasajeroBuscado->setNombre($nuevoNombre);
                    $pasajeroBuscado->setApellido($nuevoApellido);
                    $pasajeroBuscado->setTelefono($nuevoTel);
                    $coleccionModificar[$i]=$pasajeroBuscado;
                    $this->setColeccionPasajeros($coleccionModificar);

                }
            $i++;
}
    //busca pasajero por su dni y lo elimina del arreglo.
    //busca y elimina un pasajero.
    public function eliminarPasajero($dni){
        $coleccionModificar = $this->getColeccionPasajeros();
            $i=0;
            $continua=true;
                while($i< count($coleccionModificar) && $continua);
                    $pasajeroBuscado= $coleccionModificar[$i];
                    $dniPasajero = $pasajeroBuscado->getDni();
                    if ($dniPasajero == $dni){
                        $continua=false;
                        array_splice($coleccionModificar, $i); 
                        $this->setColeccionPasajeros($coleccionModificar);
                    }
    }
    //agregar pasajeros
    //agrega un pasajero a la coleccionPasajeros.
    public function agregarPasajero($nombre, $apellido, $dni,$telefono){
        $coleccionaAgregar=$this->getColeccionPasajeros();
        $coleccionAgregar[]=new Pasajero($nombre, $apellido,$dni,$telefono);
        $this->setColeccionPasajeros($coleccionaAgregar);
    }



    //recorrer el arreglo para mostrar los objetos pasajeros.//no funca. pendiente
    public function verDatosPasajeros(){
        $pasajerosaMostrar = $this->getColeccionPasajeros();
        $pasajeros="";
        $i=1;
            foreach ($pasajerosaMostrar as $objPasajero){
                $pasajeros = $pasajeros."\n Pasajero".($i)."----------";
                $pasajeros =$pasajeros. $objPasajero."\n";
            } 
            return $pasajeros;
    }



    public function existePasajero($dni){
        $coleccionExistePax = $this->getColeccionPasajeros();
            $i=0;
            $existe=false;
                while($i< count($coleccionExistePax) && $existe);
                    $pasajeroAVerificar= $coleccionExistePax[$i];
                    $dniPasajero = $pasajeroAVerificar->getDni();
                    if ($dniPasajero == $dni){
                         $existe=true;
                    }
        return $existe;            
                    }
    //muestra en pantalla datos del objeto viaje
    public function __toString()
    {
        $cadena = "Codigo de viaje: ".$this->getCodigo()."\n 
        Destino:".$this->getDestino()."\n 
        Responsable del viaje: ".$this->getObjResponsable()."\n
        Cantidad maxima de pasajeros:".$this->getCantMaxPax()."\n
        Datos de pasajeros:" .$this->verDatosPasajeros();
        
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


