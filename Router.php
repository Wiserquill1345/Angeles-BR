<?php
namespace MVC;
class Router{
    public $rutasGET = [];
    public $rutasPOST = [];

    public function get($url,$fn){
        $this->rutasGET[$url] = $fn;
    }
    public function post($url,$fn){
        $this->rutasPOST[$url] = $fn;
    }
    public function comprobarRutas(){
        session_start();

        $auth = $_SESSION["login"] ?? null;
        
        //Arreglo de rutas protegidas
        $rutas_protegidas = ["/admin","/propiedades/crear","/propiedades/actualizar","/propiedades/eliminar","/vendedores/crear","/vendedores/actualizar","/vendedores/eliminar"];


        $urlActual = strtok($_SERVER["REQUEST_URI"], "?");
        $metodo = $_SERVER["REQUEST_METHOD"];

        if(in_array($urlActual, $rutas_protegidas) && !$auth){
            header("Location: /");
        }

        if($metodo==="GET"){
            $fn = $this->rutasGET[$urlActual] ?? null;
        }
        else{
            $fn = $this->rutasPOST[$urlActual] ?? null;
        }
        if($fn){
            //Nos permite buscar una funcion la cual no sabemos como se va a llamar
            call_user_func($fn,$this);
        }else{
            echo "Pagina no encontrada";
        }
    }
    //Muestra una vista
    public function render($view, $datos = []){

        foreach($datos as $key=>$value){
            //$$ significa variable de variable
            $$key = $value;
        }
        ob_start(); // Almacena en memoria durante un momento

        include __DIR__ . "/views/$view.php"; //Se almacena en memoria
        $contenido = ob_get_clean(); // Limpia el buffer
        include __DIR__ . "/views/layout.php"; 
    }
}