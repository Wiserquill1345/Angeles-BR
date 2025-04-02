<?php 
namespace Model;
class ActiveRecord{
    
    //Base de datos
    protected static $db;
    //arreglo para identificar que columnas van a tener los datos
    protected static $columnasDB = [];
    //Variable usada para determinar de que tabla se hereda
    protected static $tabla = "";

    //Errores
    protected static $errores = [];

    public static function setDB($database){
        self::$db = $database;
    }
    public function guardar(){
        if($this->id != ""){
            $this->actualizar();
        }else{
            $this->crear();
        }
    }
    public function crear(){
        //Sanitizar los datos
        $atributos = $this->sanitizarDatos();

        //Creamos una consulta
        $query = " INSERT INTO " . static::$tabla . " ( "; 
        $query.= join(",", array_keys($atributos));
        $query.= " ) VALUES(' ";
        $query.= join("','", array_values($atributos));
        $query.= " ') ";

        $resultado = self::$db->query($query);

        if($resultado){
            //redireccionamos al usuario

            header("Location: /admin?resultado=1");
        }
    }
    public function actualizar(){
        $atributos = $this->sanitizarDatos();

        $valores = [];
        foreach($atributos as $key=>$value){
            $valores[] = "$key='$value'";
        }

        $query = "UPDATE " . static::$tabla . " SET ";
        $query.= join(",",$valores);
        $query.= " WHERE id = '" . self::$db->escape_string($this->id) . "' ";
        $query.= " LIMIT 1";
        
        $resultado = self::$db->query($query);

        if($resultado){
            //redireccionamos al usuario

            header("Location: /admin?resultado=2");
        }
    }
    //Eliminar un registro
    public function eliminar(){
        $query = "DELETE FROM " . static::$tabla . " WHERE id = " . self::$db->escape_string($this->id) . " LIMIT 1";
        $resultado = self::$db->query($query);
        if($resultado){
            $this->borrarImagen($this->imagen);
            header("Location: /admin?resultado=3");
        }
    }
    //Identificar y unir los atributos a la base de datos
    public function atributos(){
        $atributos = [];
        foreach(static::$columnasDB as $atributo){
            if($atributo === "id") continue;
            $atributos[$atributo] = $this->$atributo;
        }    

        return $atributos;
    }
    public function sanitizarDatos(){
        $atributos = $this->atributos();
        $sanitizado = [];
        foreach($atributos as $key => $value){
            $sanitizado[$key] = self::$db->escape_string($value);
  
        }
        return $sanitizado;
    }

    //Validacion
    public static function getErrores(){
        return static::$errores;
    }
    public function validar(){
        static::$errores = [];
        return static::$errores;
    }
    public function setImagen($imagen){
        if(!is_null($this->id)){
            $this->borrarImagen($imagen);
        }

        if($imagen){
            $this->imagen= $imagen;
        }
    }
    public function borrarImagen($imagen){
        $existeArchivo = file_exists(CARPETA_IMAGENES . $imagen);
        //Si existe lo borra
        if ($existeArchivo) {
            unlink(CARPETA_IMAGENES . $imagen);
        }    
    }
    //Lista todos los registros
    public static function all(){
        $query = "SELECT * FROM " . static::$tabla;
        $resultado = self::consultarSQL($query);
        return $resultado;
    }

    //Obtiene determinado numero de registros
    public static function get($cantidad){
        $query = "SELECT * FROM " . static::$tabla . " LIMIT " . $cantidad;
        $resultado = self::consultarSQL($query);
        return $resultado;
    }

    public static function find($id){    
        $query = "SELECT * FROM " . static::$tabla . " WHERE id = $id";
        $resultado = self::consultarSQL($query);
        return array_shift($resultado);
    }
    public static function consultarSQL($query){
        $resultado = self::$db->query($query);

        $array = [];
        while($registro = $resultado->fetch_assoc()){
            $array[] = static::crearObjeto($registro);
        }
        $resultado->free();
        return $array;
    }
    //Mapeamos los arreglos para convertirlos a objetos
    protected static function crearObjeto($registro){
        $objeto = new static;
        foreach($registro as $key=>$value){
            if(property_exists($objeto, $key)){
                $objeto->$key = $value;
            }
        }
        return $objeto;
    }
    //Sincroniza el objeto en memoria con los cambios realizados por el usuario
    public function sincronizar($args = []){
        foreach($args as $key=>$value){
            if(property_exists($this, $key) && !is_null($value)){
                $this->$key = $value; 
            }
        }
    }
}