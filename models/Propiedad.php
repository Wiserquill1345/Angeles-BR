<?php

namespace Model;

class Propiedad extends ActiveRecord{
    protected static $tabla = "propiedades";
    protected static $columnasDB = ["id","titulo","precio","imagen","descripcion","habitaciones","wc","estacionamiento","creado","vendedorId"];
    public $id;
    public $titulo;
    public $precio;
    public $imagen;
    public $descripcion;
    public $habitaciones;
    public $wc;
    public $estacionamiento;
    public $creado;
    public $vendedorId;

    public function __construct($args = []){
        $this->id = $args["id"] ?? "";
        $this->titulo = $args["titulo"] ?? "";
        $this->precio = $args["precio"] ?? "";
        $this->imagen = $args["imagen"] ?? "";
        $this->descripcion = $args["descripcion"] ?? "";
        $this->habitaciones = $args["habitaciones"] ?? "";
        $this->wc = $args["wc"] ?? "";
        $this->estacionamiento = $args["estacionamiento"] ?? "";
        $this->creado = date("Y/m/d");
        $this->vendedorId = $args["vendedorId"] ?? "";
    }
    public function validar(){
        if(!$this->titulo){
            self::$errores[] = "Debes añadir un titulo";
        }
        if(!$this->precio){
            self::$errores[] = "El Precio es Obligatorio";
        }
        if(strlen($this->descripcion) < 50){
            self::$errores[] = "La Descripcion es Obligatoria y debe tener mas de 50 caracteres";
        }
        if(!$this->habitaciones){
            self::$errores[] = "El numeros de habitaciones es obligatorio";
        }
        if(!$this->wc){
            self::$errores[] = "El numeros de baños es obligatorio";
        }
        if(!$this->estacionamiento){
            self::$errores[] = "El numeros de estacionamiento es obligatorio";
        }
        if(!$this->vendedorId){
            self::$errores[] = "Elige un vendedor";
        }
        if(!$this->imagen){
            self::$errores[] = "La imagen es obligatoria";
        }
        return self::$errores;
    }
}