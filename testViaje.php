<?php

include 'Viaje.php';
include 'Pasajero.php';
include 'ResponsableV.php';

//creo instancias de las clases, con datos precargados
$objViaje= new Viaje(12, "plottier", 20, $colecccionPasajeros, $objResponsable);//estta $coleccionPasajeros porque lo pase por parámetro en el construc. sino setear
$objResponsable =new ResponsableV(9050,274,"Marty", "Mc.Fly");
$coleccionPasajeros[0]= new Pasajero("hector","Pereyra",45587412,2995786354);
$coleccionPasajeros[1]= new Pasajero("Ramona", "Ramon", 23456789,2994569874);

do{
    //Se invoca a la funcion seleccionarOpcion
    //Esta funcion despliega un menu y pide al usuario ingresar una opcion
    $opcion = seleccionarOpcion();

    //Se ejecuta el numero de opcion elegido por el usuario
    //Switch es una instruccion alternativa que nos permite elegir a cual de las opciones entrar
    switch ($opcion) {
    case 1: //cargar información de viaje
            //setear codigo, destino, cantmax de pasajeros, datos de pasajeros,
            echo "Ingrese el código del viaje:\n";
            $codigoViaje = trim(fgets(STDIN));
            $objviaje->setCodigo ($codigoViaje);
            echo "ingrese el destino del viaje:\n";
            $destinoViaje = trim(fgets(STDIN));
            $objViaje->setDestino($destinoViaje);
            echo "ingrese la cantidad máxima de pasajeres:\n";
            $cantidadMaxPaxViaje =trim(fgets(STDIN));
            $objViaje->setCantMaxPax($cantidadMaxPaxViaje);
            echo "ingrese la cantidad de pasajeros a ingresar:\n";
            $cantPaxCargar = trim(fgets(STDIN));
            $objViaje->cargarPasajeros($cantPaxCargar);
            echo "responsable del viaje: \n";
            echo "ingrese nombre del responsable:\n";
            $nombreRes= trim(fgets(STDIN));
            echo "ingrese Apellido:\n";
            $apellRes =trim(fgets(STDIN));
            echo "ingrese Numero de empleado\n:";
            $numEmpleado =trim(fgets(STDIN));
            echo "por `ultimo ingrese numero de licencia: \n";
            $numLicencia = trim(fgets(STDIN));
            $objResponsable->setNumEmpleado($numEmpleado);
            $objResponsable->setNumLicencia($numLicencia);
            $objResponsable->setNombre($nombreRes);
            $objResponsable->setApellido($apellRes);
    
        break;
     
    case 2: //Modificar datos de un viaje
        //preguntar que datos desea modificar. Modificar implica obtener un array, modificarlo y setear 
        //la coleccion modificada.
           
                 echo "indique la opcion elegida:\n";
                 echo "(1) Modificar código de viaje\n";
                 echo "(2) Modificar destino de viaje\n";
                 echo "(3) Modificar cantidad máxima de pasajero\n";
                 echo "(4) Agregar pasajeros\n";
                 echo "(5) Modificar datos de pasajero \n";
                 echo "(6) Quitar pasajero\n";
                 $opcionSubMenu= trim(fgets(STDIN));
                switch ($opcionSubMenu){
                    case 1://modificar códig de viaje
                        echo "ingrese el nuevo código de viaje:\n";
                        $nuevoCodigo= trim (fgets(STDIN));
                        $objViaje->setCodigo ($nuevoCodigo);
                      break;
                    case 2: //modificar destino de viaje
                        echo "ingrese el nuevo destino de viaje:\n";
                        $nuevoDestino =trim(fgets(STDIN));
                        $objViaje->setDestino ($nuevoDestino);
                    break;
                    case 3://modificar cant max de pasajeros. 
                        echo "ingrese la nueva cantidad máxima de pasajeros:\n";
                        $nuevaCantMaxPax =trim(fgets(STDIN));
                        $objViaje->setCantMaxPax ($nuevaCantMaxPax);
                        //si la nueva cantidad es menor a la q existia algunos pasajeros quedan afuera del viaje
                    break;
                    case 4://agregar pasajeros
                        echo "ingrese la cantidad de pasajeros a cargar:";
                        $cantPaxCargar= trim(fgets(STDIN));
                        $arregloAgregarPasajeros = $this->getColeccionPasajeros();
                            if ($cantPaxCargar <= $this->getCantMaxPax()) {
                                for ($i =0; $i < $cantPaxCargar; $i++)
                                echo"Ingrese nombre:\n";
                                $nombre (trim(fgets(STDIN)));
                                echo"Ingrese apellido:\n";
                                $apellido (trim(fgets(STDIN)));
                                echo"Ingrese DNI:\n";
                                $dni (trim(fgets(STDIN)));
                                $objViaje->existePasajero($dni);
                            }else{
                                echo "la cantidad de pasajeros a ingresar supera la cantidad maxima de pasajeros del viaje\n:";
                                echo "ingrese una cantidad valida menor o igual a ".$this->getCantMaxPax(). "\n";
                            }
                
                            $arregloAgregarPasajeros =$objviaje->agregarPasajero($nombre,$apellido, $dni, $telefono);
                             $objViaje->setColeccionPasajeros($arregloAgregarPasajeros);
                    break;
                    case 5: //modificar datos de pasajero buscando DNI en el array.
                        Echo "ingrese el DNI de pasajero que desea modificar:\n";
                        $dni= (trim(fgets(STDIN)));
                        echo "ingrese el nuevo Nombre:\n";
                        $nuevoNombre= (trim(fgets(STDIN)));
                        echo "ingrese el nuvo apellido:\n";
                        $nuevoApellido= (trim(fgets(STDIN)));
                        echo "ingrese el nuevo DNI:\n";
                        $nuevoDni = (trim(fgets(stdin)));
                        echo "ingrese el nuevo tel`efono:\n";
                        $nuevoTelefono= trim(fgets(STDIN));
                        $pasajerosModificados =$objViaje->modificarPasajero($dni,$nuevoNombre, $nuevoApellido, $nuevoDni, $nuevoTelefono);
                        $objViaje->setColeccionPasajeros($pasajerosModificados);
                    break;
                    case 6: //eliminar un pasajero
                        Echo "ingrese el DNI del pasajero a eliminar del viaje:\n";
                       $dni = trim(fgets(STDIN));
                       $pasajerosEliminar =$objviaje->eliminarPasajero ($dni);
                       $objViaje->setColeccionPasajeros($pasajerosEliminar);
                    break;
                }
            break;
    case 3: //mostrar en pantalla datos de un viaje
        echo $objViaje;
    
    break;
     
 }while($opcion != 4);
