<?php

namespace Model;

class Vendedor extends ActiveRecord
{
    protected static $tabla = "vendedores";
    protected static $columnasDB = ["id", "nombre", "apellido", "telefono"];
    public $id;
    public $nombre;
    public $apellido;
    public $telefono;

    public function __construct($args = [])
    {
        $this->id = $args["id"] ?? "";
        $this->nombre = $args["nombre"] ?? "";
        $this->apellido = $args["apellido"] ?? "";
        $this->telefono = $args["telefono"] ?? "";
    }

    public function validar()
    {
        if (!$this->nombre) {
            self::$errores[] = "El nombre es obligatorio";
        }
        if (!$this->apellido) {
            self::$errores[] = "El apellido es obligatorio";
        }
        if (!$this->telefono) {
            self::$errores[] = "El telefono es obligatorio";
        }
        //Preg_match nos permite filtrar datos mediante una expresion regular como este que solo acepta numeros hasta un tamaño de 10 caracteres
        if(!preg_match("/[0-9]{10}/",$this->telefono)){
            self::$errores[] = "El formato no es valido";
        }
        return self::$errores;
    }
}