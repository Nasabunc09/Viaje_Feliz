<?php

class Pasajero{

    public $nombre;
    public $apellido;
    public $documento;
    public $telefono;
    

    /*constructor
    * @param String  $nombre
	* @param String  $apellido
	* @param Integer $documento
    * @param Integer $telefono
	*/
    public function __constructor ($nombre,$apellido,$documento,$telefono){

        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->documento = $documento;
        $this->telefono = $telefono;
      
    }
    

    // getter y setter
    public function getNombre(){

        return $this->nombre;       
    }
    
    public function setNombre($nombre){

         $this->nombre = $nombre;
    }

    public function getApellido(){

        return $this->apellido;
    }

    public function setApellido($apellido){

         $this->apellido = $apellido;
    }

    public function getTelefono(){
        return $this->telefono;
    }

    public function setTelefono($telefono){
        $this->telefono=$telefono;
    }
    
    public function getDocumento(){

        return $this->documento;
    }

    public function setDocumento($documento){

         $this->documento = $documento;
    }

    
    public function __toString(){
        return "\n Nombre: ".$this->getNombre()."\n Apellido: ".$this->getApellido()."\n Documento: ".$this->getDocumento()."\n Telefono: ".$this->getTelefono();
    }
   
   
}



