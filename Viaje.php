<?php


class Viaje{

    public $codigo;
    public $destino;
    public $maximaPasajeros;
    public $arrayPasajeros = array();
    public $responsable;
    

    /*constructor
    * @param Integer $codigo
	* @param String  $destino
	* @param Integer $maximaPasajeros
	* @param Array   $arrayPasajeros
	
	* */
    public function __constructor ($codigo,$destino,$maximaPasajeros,$arrayPasajeros,ResponsableV $responsable){

        $this->codigo = $codigo;
        $this->destino = $destino;
        $this->maximaPasajeros = $maximaPasajeros;
        $this->arrayPasajeros = $arrayPasajeros;
        $this->responsable = $responsable;
    }
    

    // getter y setter
    public function getCodigo(){

        return $this->codigo;       
    }
    
    public function setCodigo($codigo){

         $this->codigo = $codigo;
    }

    public function getDestino(){

        return $this->destino;
    }

    public function setDestino($destino){

       $this->destino = $destino;
    }
    
    public function getMaximaPasajeros(){

        return $this->maximaPasajeros;
    }

    public function setMaximaPasajeros($maximaPasajeros){

         $this->maximaPasajeros = $maximaPasajeros;
    }

    public function getArrayPasajeros(){

        return $this->arrayPasajeros;
    }

    public function setArrayPasajeros($arrayPasajeros){

         $this->arrayPasajeros = $arrayPasajeros;
    }

    public function getResponsable(){
        return $this->responsable;
    }

    public function setResponsable($responsable){

        $this->responsable = $responsable;
    }
    
    public function __toString(){
        $arrayPasajeros = $this->getArrayPasajeros();
       return "\n Código:".$this->getCodigo()."\n Destino:".$this->getDestino()."\n Cantidad Máxima Pasajeros:".$this->getMaximaPasajeros()."\n Pasajeros del Viaje:" .$this->devolverArreglo($arrayPasajeros). "\n Responsable :".$this->getResponsable();
    }

    public function devolverArreglo($arrayPasajeros){

        $cadena = "";

        foreach($arrayPasajeros as $elemento){
            $cadena = $elemento;
        }

        return $cadena;

    }

    public function agregarPasajero($pasajero){
        $ingresado = false;
        if (count($this->arrayPasajeros) < $this->maximaPasajeros){
            if(!$this->existePasajero($pasajero)){
               $this->setArrayPasajeros($pasajero);
               $ingresado = true;
            }
        }

        return $ingresado;
    }

    public function existePasajero($documento){
        $existe = false;
        foreach($this->arrayPasajeros as $i){
            if($i->getNumeroDocumento() == $documento){
                $existe = true;
            }
        }
        return $existe;

    }

    public function modificarPasajero($documento, $nuevo_pasajero){

        $existe = false;
        foreach($this->arrayPasajeros as $i){
            if($i->getNumeroDocumento() == $documento){
                $existe = true;
                $pasajero = $this->arrayPasajeros;
                $pasajero->setNombre($nuevo_pasajero->getNombre());
                $pasajero->setApellido($nuevo_pasajero->getApellido());
                $pasajero->setNumeroDocumento($nuevo_pasajero->getNumeroDocumento());
                $pasajero->setTelefono($nuevo_pasajero->getTelefono());
            }
        }
        return $existe;
    }

   
}


?>
