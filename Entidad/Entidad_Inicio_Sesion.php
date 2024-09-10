<?php

class Entidad_Inicio_Sesion {
    
    private $email;
    private $clave;
    
    public function __construct($email, $clave) {
        $this->email = $email;
        $this->clave = $clave;
    }
    
    public function getEmail() {
        return $this->email;
    }

    public function getClave() {
        return $this->clave;
    }

    public function setEmail($email) {
        $this->email = $email;
        return $this;
    }

    public function setClave($clave) {
        $this->clave = $clave;
        return $this;
    }
    
    public function __toString() {
        return "email='$this->email', clave='$this->clave'";
    }


    
}
