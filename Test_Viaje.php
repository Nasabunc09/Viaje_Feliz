<?php

include_once 'Viaje.php';
include_once 'Pasajero.php';
include_once 'ResponsableV.php';

$viaje=new Viaje();


/*Menu principal*/ 
menuPrincipal();
$opcion = (int) trim(fgets(STDIN));

    do{
		
		
	    switch ($opcion){
	    
	    case '0':
	       echo "Fin del programa! \n";  
	    break;

		case "1":
			ingresarViaje();
		break;

		case "2":
			ingresarPasajero($viaje);
		break;

		case "3":
			ingresarResponsable($viaje);
		break;
        default : echo "\n Ingrese una opcion correcta";
	    
	    }

	}while ($opcion != 0 );	



/*Se ingresa los datos del viaje, se modifican y muestran*/
function ingresarViaje(){
   
	     	
   	
    do{
	    menuViaje();
		$opcion = (int) trim(fgets(STDIN));
		
	    switch ($opcion){
	    
	    case '0':
	    
	        echo "Fin del programa! \n";  
	    break;

		case "1":
			
			if(empty($viaje)){
				echo "\n --Ingrese los datos del viaje --";
				echo "\n Codigo : ";
				$codigo = (int)trim(fgets(STDIN));
				echo "\n Destino : ";
				$destino = trim(fgets(STDIN));
				echo "\n Cantidad máxima de pasajeros : ";
				$maximaPasajeros = (int)trim(fgets(STDIN));
				echo "Debe ingresar los datos del Responsable del viaje";
				echo "\n Numero Empleado : ";
				$numeroEmpleado = (int)trim(fgets(STDIN));
				echo "\n Numero Licencia : ";
				$numeroLicencia = (int)trim(fgets(STDIN));
				echo "\n Nombre : ";
				$nombre = trim(fgets(STDIN));
				echo "\n Apellido : ";
				$apellido = trim(fgets(STDIN));
				$responsable=new ResponsableV($numeroEmpleado,$numeroLicencia,$nombre,$apellido);
				$viaje=new Viaje();
				$viaje->agregarViaje($codigo,$destino,$maximaPasajeros,$responsable);
                echo "********************.\n";
				echo "Informacion cargada.\n".$viaje;
				echo "********************.\n";

			}else{
				echo "Hay un viaje cargado";
			}
		break;

		case "2":2

			
			if(!empty($viaje)){

				    echo "\n ?que desea modificar? \n";
				
				do{	
					subMenuViaje();
					$opcion = (int) trim(fgets(STDIN));
					
					switch ($opcion){

						case "1":
							echo "Codigo: ".$viaje->getCodigo()." se modifica por: " ;
							$codigo=trim(fgets(STDIN));
							$viaje->setCodigo($codigo);
							echo "Codigo modificado: ". $viaje->getCodigo().".";
						break;
						case "2":
							echo "Destino: ".$viaje->getDestino()." se modifica por: " ;
							$destino=trim(fgets(STDIN));
							$viaje->setDestino($destino);
							echo "Destino modificado: ". $viaje->getDestino().".";
						break;
						case "3":
							echo "Maximo pasajeros: ".$viaje->getMaximaPasajeros()." se modifica por: " ;
							$maximaPasajeros=trim(fgets(STDIN));
							$viaje->setMaximaPasajeros($maximaPasajeros);
							echo "Maximo pasajeros modificado: ". $viaje->getMaximaPasajeros().".";
						break;
						case "4":
							$opcion = 0;
							menuPrincipal();
						break;
						default : echo "\n Ingrese una opcion correcta \n";
					}
				}while ($opcion != 0 );
				

			}else{
				echo "No hay viaje cargado para modificar";
			}
		break;

		case "3":
			
			echo "Informacion cargada.\n".$viaje;
			;
		break;

		case "4":
			$opcion = 0;
			menuPrincipal();
			
		break;
	
		default : echo "\n Ingrese una opcion correcta";
		}

	}while ($opcion != 0 );
}

/*Se ingresa pasajeros,se modifican y muestran*/
function ingresarPasajero($viaje){
	
	  
   do{
	   menuPasajero();
	   $opcion = (int) trim(fgets(STDIN));
	   
	   switch ($opcion){
	   
	   case '0':
	   
		   echo "Fin del programa! \n";  
		   break;

	   case "1":
		   
		   if($viaje->cantidadPasajeros()){
			   $pasajero = new Pasajero();
			   echo "\n --Ingrese los datos del pasajero --";
			   echo "\n Documento : ";
			   $documento = trim(fgets(STDIN));
               if($viaje->existePasajero($documento) > 0){
                   echo"El Documento ingresado ya existe.";
			   }else{

					echo "\n Nombre : ";
					$nombre = trim(fgets(STDIN));
					echo "\n Apellido : ";
					$apellido = trim(fgets(STDIN));
					echo "\n Telefono : ";
					$telefono = trim(fgets(STDIN));
					$pasajero->agregarPasajero($nombre,$apellido,$documento,$telefono);
					
					echo "Informacion cargada.\n".$pasajero;
			    }
		   }else{
			   echo "No se puede cargar mas pasajeros, el maximo es: ".$viaje->getMaximaPasajeros();
		   }
	   break;

	   case "2":
		   if(!empty($viaje)){

			   echo "Ingrese el documento del pasajero a modificar";
			   $documento = trim(fgets(STDIN));
               if($viaje->existePasajero($documento) > 0){
			   		echo "\n ?que desea modificar? \n";
			   
					do{
						subMenuPasajero();
						$opcion = (int) trim(fgets(STDIN));
						
						switch ($opcion){
							case "1":
								echo "Nombre : ".$viaje->getNombre()."se modifica por:" ;
								$nombre=trim(fgets(STDIN));
								$viaje->setNombre($nombre);

							break;
							case "2":
								echo "Apellido : ".$viaje->getApellido()."se modifica por:" ;
								$apellido=trim(fgets(STDIN));
								$viaje->setApellido($apellido);
							break;
							case "3":
								echo "Documento : ".$viaje->getDocumento."se modifica por:" ;
								$documento=trim(fgets(STDIN));
								$viaje->setDocumento($documento);
							break;
							case "4":
								echo "Telefono : ".$viaje->getTelefono."se modifica por:" ;
								$telefono=trim(fgets(STDIN));
								$viaje->setTelefono($telefono);
							break;
							default : echo "\n Ingrese una opcion correcta \n";
						} 
					} while ($opcion != 0 );
				}else{
					echo "No hay pasajero para modificar";
				}
			}
	   break;

	   case "3":
		   echo "La informacion del pasajero es: ";
		   /*$pasajero;*/
	   break;
	   default : echo "\n Ingrese una opcion correcta";
	   }

   }while ($opcion != 0 );
}

/** Se ingresa responsable, se modifica y se muestra */
function ingresarResponsable($viaje){
   
	$responsable = $viaje->getObjResponsable();
	  
	do{
		menuResponsable();
		$opcion = (int) trim(fgets(STDIN));
		
		switch ($opcion){
		
		case '0':
		
			echo "Fin del programa! \n";  
			break;
 
		
 
		case "1":

			if(!empty($viaje->getObjResponsable)){
 
				echo "\n ?que desea modificar? \n";
				
					 
						 subMenuResponsable();
						 $opcion = (int) trim(fgets(STDIN));
						 
						 switch ($opcion){
							 case "1":
								 echo "Nombre: ".$responsable->getNombreResponsable();
								 echo "se modifica por: ";
								 $nombre=trim(fgets(STDIN));
								 $responsable->setNombreResponsable($nombre);
								 echo "Se cambio correctamente a".$responsable->getNombreResponsable()."\n";
							 break;
							 case "2":
								 echo "Apellido : ".$responsable->getApellidoResponsable();
								 echo "se modifica por: " ;
								 $apellido=trim(fgets(STDIN));
								 $responsable->setApellidoResponsable($apellido);
							 break;
							 case "3":
								 echo "Numero Licencia : ".$responsable->getNumeroLicencia()."se modifica por:" ;
								 $numeroLicencia=trim(fgets(STDIN));
								 $responsable->setNumeroLicencia($numeroLicencia);
							 break;
							 case "4":
								echo "Numero Empleado : ".$responsable->getNumeroEmpleado."se modifica por:" ;
								$numeroEmpleado=trim(fgets(STDIN));
								$responsable->setNumeroEmpleado($numeroEmpleado);
							break;
							case "5":
								ingresarResponsable($viaje);
							break;

							default : echo "\n Ingrese una opcion correcta \n";
						 } 
					
			}else{
				echo "No hay pasajero para modificar";
			}
		break;
 
		case "2":
			echo "La informacion del responsable es: ";
			$responsable;
		break;
		default : echo "\n Ingrese una opcion correcta";
		}
 
	}while ($opcion != 0 );
 }

 /**Menues */
function menuPrincipal(){

	echo "\n";
	echo "-----------Menu Principal---------\n";
	echo "1- Datos viaje. \n";
	echo "2- Datos pasajero. \n";
	echo "3- Datos responsable. \n";
	echo "0- Salir. \n";
	echo "-----------Menu Viaje---------\n";
	
	
}

function menuViaje(){

	echo "\n";
	echo "-----------Menu Viaje---------\n";
	echo "1- Ingresar datos viaje. \n";
	echo "2- Modificar datos del viaje. \n";
	echo "3- Mostrar informacion del viaje. \n";
	echo "4- Volver menu anterior.. \n";
	echo "-----------Menu Viaje---------\n";
	
	
}

function subMenuViaje(){

	echo "\n";
	echo "-----------Menu Modificar Viaje---------\n";
	echo "1- Modificar codigo \n";
	echo "2- Modificar destino. \n";
	echo "3- Modificar maximo pasajeros. \n";
	echo "4- Volver menu anterior.. \n";
	echo "-----------Menu Modificar Viaje---------\n";
	

}


function menuPasajero(){

	echo "\n";
	echo "-----------Menu Pasajero---------\n";
	echo "1- Ingresar pasajero. \n";
	echo "2- Modificar pasajero. \n";
	echo "3- Mostrar pasajeros. \n";
	echo "4- Volver menu anterior.. \n";
	echo "-----------Menu Pasajero---------\n";
	
}

function subMenuPasajero(){

	echo "\n";
	echo "-----------Menu Modificar Pasajero---------\n";
	echo "1- Modificar nombre \n";
	echo "2- Modificar apellido. \n";
	echo "3- Modificar telefono. \n";
	echo "4- Modificar documento. \n";
	echo "5- Volver menu anterior.. \n";
	echo "-----------Menu Modificar Pasajero---------\n";
	

}

function menuResponsable(){

	echo "\n";
	echo "-----------Menu Responsable---------\n";
	/*echo "1- Ingresar responsable. \n";*/ 
	echo "1- Modificar responsable. \n";
	echo "2- Mostrar responsable. \n";
	echo "3- Volver menu anterior.. \n";
	echo "-----------Menu Responsable---------\n";
	

}

function subMenuResponsable(){

	echo "\n";
	echo "-----------Menu Modificar Responsable---------\n";
	echo "1- Modificar nombre \n";
	echo "2- Modificar apellido. \n";
	echo "3- Modificar numero licencia. \n";
	echo "4- Modificar numero empleado. \n";
	echo "5- Volver menu anterior.. \n";
	echo "-----------Menu Modificar Responsable---------\n";
	

}
