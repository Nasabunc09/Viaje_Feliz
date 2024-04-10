<?php

include 'Viaje.php';
include 'Pasajero.php';
include 'ResponsableV.php';

/** Muestra en pantalla el menu al usuario
    
  
*/
    
    function menu(){

		echo "\n";
		echo "-----------Menu---------\n";
		echo "1- Ingresar pasajero. \n";
		echo "2- Modificar. \n";
		echo "3- Mostrar. \n";
		echo "0- Salir. \n";
		echo "-----------Menu---------\n";
		
		echo "Ingrese una opcion: ";
		$opcion = (int) trim(fgets(STDIN));
		
		return $opcion;
	}

 

//programa principal	
	$responsable = new ResponsableV ('119745','2003',"Lusiana", "Mendez");
	$viaje = new Viaje('00013','EE.UU','10',$responsable);

    do{
		$opcion = menu();
		$band = "S";
	    switch ($opcion){
	    
	    case '0':
	    
	        echo "Fin del programa! \n";  
	        break;
	        	
		case '1': 
		    echo "\n --Ingrese los datos de los pasajeros --";
			$arrayPasajeros = array();
			echo "\n Nombre : ";
			$nombre = trim(fgets(STDIN));
			echo "\n Apellido : ";
			$apellido = trim(fgets(STDIN));
			echo "\n Número de documento : ";
			$documento = trim(fgets(STDIN));
			echo "\n Teléfono : ";
			$telefono =  trim(fgets(STDIN));
			$pasajero = new Pasajero ($nombre,$apellido,$documento, $telefono);
			
			if ($viaje->agregarPasajero($pasajero)) {

				echo("Pasajero agregado");
			} else {
				echo("El pasajero ya existe");
			}
			
		break;
		 
		case '2':
		      
		      echo "\n Ingrese el numero de documento del pasajero a modificar: ";
		      $documento = trim(fgets(STDIN));
			  if ($viaje->existePasajero($documento)){
				
			    echo "\n Ingrese Nombre a modificar: ";
				$nombre = trim(fgets(STDIN));
				echo "\n Ingrese Apellido a modificar: ";
				$apellido = trim(fgets(STDIN));
				echo "\n Teléfono a modificar: ";
				$telefono =  trim(fgets(STDIN));
				$nuevo_pasajero = new Pasajero( $nombre,$apellido,$documento, $telefono);
				$viaje->modificarPasajero($documento,$nuevo_pasajero);
				echo("Se modifico el pasajero");
			
			  }else{
				     echo("El pasajero ingresado no existe");
			  }
		break;
		 
		 case '3':
				 $viaje->__toString();
		 break;
		 
		 default : echo "\n Ingrese una opcion correcta \n";
		} 
      } while ($opcion != 0 );
   
 ?> 
