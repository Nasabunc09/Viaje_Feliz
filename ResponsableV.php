<?php  

class ResponsableV {

    private $numeroEmpleado;
    private $numeroLicencia;
    private $nombre;
    private $apellido;

    /*constructor
    * @param Integer  $numeroEmpleado
	* @param Integer  $numeroLicencia
	* @param String   $nombre
    * @param String   $apellido
	*/

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

    public function getNombreResponsable(){
        return $this->nombre;
    }

    public function getApellidoResponsable(){
        return $this->apellido;
    }

    public function setNumeroEmpleado($numeroEmpleado){
        $this->numeroEmpleado = $numeroEmpleado;
    }

    public function setNumeroLicencia($numeroLicencia){
        $this->numeroLicencia = $numeroLicencia;
    }

    public function setNombreResponsable($nombre){
        $this->nombre = $nombre;
    }

    public function setApellidoResponsable($apellido){
        $this->apellido = $apellido;
    }

    public function __toString(){
        return "Número Empleado: ".$this->getNumeroEmpleado()."\n". 
               "Número Licencia: ". $this->getNumeroLicencia()."\n".
               "Nombre: ". $this->getNombreResponsable()."\n". 
               "Apellido: ".$this->getApellidoResponsable();
    }
 
    public function agregarResponsable($numeroEmpleado,$numeroLicencia,$nombre,$apellido){

        $this->setNumeroEmpleado($numeroEmpleado);
        $this->setNumeroLicencia($numeroLicencia);
        $this->setNombreResponsable($nombre);
        $this->setApellidoResponsable($apellido);
    }
    

}