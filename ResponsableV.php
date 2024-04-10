<?php  

class ResponsableV{

    public $numeroEmpleado;
    public $numeroLicencia;

    public $nombre;

    public $apellido;

    public function __construct($numeroEmpleado,$numeroLicencia,$nombre,$apellido){

        $this->numeroEmpleado = $numeroEmpleado;
        $this->numeroLicencia = $numeroLicencia;
        $this->nombre = $nombre;
        $this->apellido = $apellido;


    }

    public function getNumeroEmpleado(){    
        return $this->numeroEmpleado;
    }

    public function getNumeroLicencia(){
        return $this->numeroLicencia;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function getApellido(){
        return $this->apellido;
    }

    public function setNumeroEmpleado($numeroEmpleado){
        $this->numeroEmpleado = $numeroEmpleado;
    }

    public function setNumeroLicencia($numeroLicencia){
        $this->numeroLicencia = $numeroLicencia;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function setApellido($apellido){
        $this->apellido = $apellido;
    }

    public function __toString(){
        return "\n Número Empleado:".$this->getNumeroEmpleado()."\n Número Licencia:". $this->getNumeroLicencia()."\n Nombre:". $this->getNombre()."\n Apellido:".$this->getApellido();
    }

    

}