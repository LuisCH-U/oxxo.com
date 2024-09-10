<?php

class Entidad_Registro {
    private $usuario;
    private $clave;
    private $tipoUsuario;
    private $nombre;
    private $apellido;
    private $email;
    private $telefono;
    private $sexo;
    private $dni;

    public function __construct($usuario, $clave, $tipoUsuario, $nombre, $apellido, $email, $telefono, $sexo, $dni) {
        $this->usuario = $usuario;
        $this->clave = $clave;
        $this->tipoUsuario = $tipoUsuario;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->email = $email;
        $this->telefono = $telefono;
        $this->sexo = $sexo;
        $this->dni = $dni;
    }

    public function getUsuario() {
        return $this->usuario;
    }

    public function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    public function getClave() {
        return $this->clave;
    }

    public function setClave($clave) {
        $this->clave = $clave;
    }

    public function getTipoUsuario() {
        return $this->tipoUsuario;
    }

    public function setTipoUsuario($tipoUsuario) {
        $this->tipoUsuario = $tipoUsuario;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getApellido() {
        return $this->apellido;
    }

    public function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getTelefono() {
        return $this->telefono;
    }

    public function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    public function getSexo() {
        return $this->sexo;
    }

    public function setSexo($sexo) {
        $this->sexo = $sexo;
    }

    public function getDni() {
        return $this->dni;
    }

    public function setDni($dni) {
        $this->dni = $dni;
    }

    public function __toString() {
        return "Usuario{ usuario='$this->usuario', clave='$this->clave', tipoUsuario='$this->tipoUsuario', nombre='$this->nombre', apellido='$this->apellido', email='$this->email', telefono='$this->telefono', sexo='$this->sexo', dni='$this->dni' }";
    }
}
