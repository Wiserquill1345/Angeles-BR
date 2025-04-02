<?php

namespace Controllers;
use MVC\Router;
use Model\Propiedad;
use PHPMailer\PHPMailer\PHPMailer;

class PaginasController{
    public static function index(Router $router){

        $propiedades=Propiedad::get(3);
        $inicio = true;

        $router->render("paginas/index", [
            'propiedades' => $propiedades,
            'inicio' => $inicio
        ]);
    }
    public static function nosotros(Router $router){
        $router->render("paginas/nosotros");
    }
    public static function propiedades(Router $router){
        $propiedades = propiedad::all();
        $router->render("paginas/propiedades", [
            'propiedades' => $propiedades
        ]);
    }
    public static function propiedad(Router $router){
        $id = validarORedireccionar("/propiedades");

        $propiedad = Propiedad::find($id);
        $router->render("paginas/propiedad", [
            'propiedad' => $propiedad
        ]);
    }
    public static function blog(Router $router){
        $router->render("paginas/blog");
    }
    public static function entrada(Router $router){
        $router->render("paginas/entrada");
    }
    public static function contacto(Router $router){
        $mensaje=null;
        if($_SERVER["REQUEST_METHOD"]=== "POST"){
            $respuestas = $_POST["contacto"];
            //Crear una instancia de PHP Mailer
            $mail = new PHPMailer();
            //Configurar SMTP
            $mail->isSMTP();
            $mail->Host = $_ENV["EMAIL_HOST"];
            $mail->SMTPAuth = true;
            $mail->Username = $_ENV["EMAIL_USER"];
            $mail->Password = $_ENV["EMAIL_PASS"];
            $mail->SMTPSecure = "tls";
            $mail->Port = $_ENV["EMAIL_PORT"];

            //Configurar el contenido del mail
            $mail->setFrom("sebasmarti11@hotmail.com");
            $mail->addAddress("wiserquill@gmail.com", "El seba");
            $mail->Subject = "Tienes un Nuevo Mensaje";

            //Habilitar HTML
            $mail->isHTML(true);
            $mail->CharSet = "UTF-8";



            //Definir el contenido
            $contenido = "<html>";
            $contenido .= "<p>Tienes un nuevo mensaje</p>";
            $contenido .= "<p>Nombre: " . $respuestas["nombre"] ."</p>";


            //Enviar de forma condicional algunos campos de email o telefono
            if($respuestas["contacto"] === "telefono"){
                //Es teléfono, entonces agregamos el campo de telefono
                $contenido .= "<p>Eligio ser contactado por Teléfono:</p>";
                $contenido .= "<p>Telefono: " . $respuestas["telefono"] ."</p>";
                $contenido .= "<p>Fecha Contacto: " . $respuestas["fecha"] ."</p>";
                $contenido .= "<p>Hora: " . $respuestas["hora"] ."</p>";
            }else{
                //Es email, entonces agregamos el campo de email
                $contenido .= "<p>Eligio ser contactado por email:</p>";
                $contenido .= "<p>Email: " . $respuestas["email"] ."</p>";
            }
            $contenido .= "<p>Mensaje: " . $respuestas["mensaje"] ."</p>";
            $contenido .= "<p>Vende o Compra: " . $respuestas["tipo"] ."</p>";
            $contenido .= "<p>Precio o Presupuesto: $" . $respuestas["precio"] ."</p>";
            $contenido .= "</html>";

            $mail->Body=$contenido;
            $mail->AltBody = "Esto es texto alternativo sin HTML";

            //Enviar el email
            if($mail->send()){
                $mensaje= "Mensaje Enviado Correctamente";
            }else{
                $mensaje=  "El mensaje no se pudo enviar...";
            }

        }
        $router->render("paginas/contacto",[
            "mensaje" => $mensaje
        ]);
    }
    //Desarrollos
    public static function monet(Router $router){
        $router->render("desarrollos/monet");
    }
    public static function paseoSantiago(Router $router){
        $router->render("desarrollos/paseoSantiago");
    }
}